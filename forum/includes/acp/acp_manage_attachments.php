<?php
/** 
*
* @package acp
* @version $Id: acp_manage_attachments.php,v 1.01 2008/01/26 08:40:15 rxu Exp $
* @copyright (c) 2005 phpBB Group 
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @package acp
*/
class acp_manage_attachments
{
	var $u_action;
	
	function main($id, $mode)
	{
		global $db, $user, $auth, $template, $cache;
		global $config, $phpbb_admin_path, $phpbb_root_path, $phpEx;

		$user->add_lang(array('posting', 'viewtopic', 'acp/attachments'));

		$error = $notify = array();
		$submit = (isset($_POST['submit'])) ? true : false;
		$action = request_var('action', '');

		$l_title = 'ACP_MANAGE_ATTACHMENTS';
		
		$this->tpl_name = 'acp_manage_attachments';
		$this->page_title = $l_title;

		$template->assign_vars(array(
			'L_TITLE'			=> $user->lang[$l_title],
			'L_TITLE_EXPLAIN'	=> $user->lang[$l_title . '_EXPLAIN'],
			'U_ACTION'			=> $this->u_action)
		);

		if ($submit)
		{
			$delete_files = (isset($_POST['delete'])) ? array_keys(request_var('delete', array('' => 0))) : array();
			$add_files = (isset($_POST['add'])) ? array_keys(request_var('add', array('' => 0))) : array();
			$post_ids = request_var('post_id', array('' => 0));
			
			$current_post_ids = request_var('current_post_id', array('' => 0));
			$current_topic_ids = request_var('current_topic_id', array('' => 0));
			$next_post_ids = $post_ids;
			$unset_topic_ids = $unset_post_ids = array();
			

			if(sizeof($delete_files) && sizeof($add_files))
			{
				foreach ($delete_files as $attach_id)
				{
					if (!empty($current_post_ids[$attach_id]) && !empty($next_post_ids[$attach_id]))
					{
						unset($current_post_ids[$attach_id]);
						unset($next_post_ids[$attach_id]);
					}
				}
			}
			
			if(sizeof($add_files))
			{
				$unset_post_ids = array_diff($current_post_ids, $next_post_ids);
				
				$sql = 'SELECT topic_id
					FROM ' . POSTS_TABLE . '
					WHERE ' . $db->sql_in_set('post_id', $next_post_ids);
				$result = $db->sql_query($sql);
				$next_topic_ids = array();
				while ($row = $db->sql_fetchrow($result))
				{
					$next_topic_ids[] = $row['topic_id'];
				}
				$db->sql_freeresult($result);
				$unset_topic_ids = array_diff($current_topic_ids, $next_topic_ids);
			}


			if (sizeof($delete_files))
			{
				// Select those attachments we want to delete...
				$sql = 'SELECT real_filename
					FROM ' . ATTACHMENTS_TABLE . '
					WHERE ' . $db->sql_in_set('attach_id', $delete_files) . '
						AND is_orphan = 0';
				$result = $db->sql_query($sql);
				while ($row = $db->sql_fetchrow($result))
				{
					$deleted_filenames[] = $row['real_filename'];
				}
				$db->sql_freeresult($result);
				delete_attachments('attach', $delete_files);
				add_log('admin', 'LOG_ATTACH_DEL', implode(', ', $deleted_filenames));
				$notify[] = sprintf($user->lang['LOG_ATTACH_DEL'], implode(', ', $deleted_filenames));
			}

			$upload_list = array();
			foreach ($add_files as $attach_id)
			{
				if (!in_array($attach_id, array_keys($delete_files)) && !empty($post_ids[$attach_id]) && $post_ids[$attach_id] != $current_post_ids[$attach_id])
				{
					$upload_list[$attach_id] = $post_ids[$attach_id];
				}
			}
			unset($add_files);

			if (sizeof($upload_list))
			{
				$template->assign_var('S_UPLOADING_FILES', true);

				$sql = 'SELECT forum_id, forum_name
					FROM ' . FORUMS_TABLE;
				$result = $db->sql_query($sql);

				$forum_names = array();
				while ($row = $db->sql_fetchrow($result))
				{
					$forum_names[$row['forum_id']] = $row['forum_name'];
				}
				$db->sql_freeresult($result);

				$sql = 'SELECT forum_id, topic_id, post_id, poster_id
					FROM ' . POSTS_TABLE . '
					WHERE ' . $db->sql_in_set('post_id', $upload_list);
				$result = $db->sql_query($sql);

				$post_info = array();
				while ($row = $db->sql_fetchrow($result))
				{
					$post_info[$row['post_id']] = $row;
				}
				$db->sql_freeresult($result);

				// Select those attachments we want to change...
				$sql = 'SELECT *
					FROM ' . ATTACHMENTS_TABLE . '
					WHERE ' . $db->sql_in_set('attach_id', array_keys($upload_list)) . '
						AND is_orphan = 0';
				$result = $db->sql_query($sql);

				while ($row = $db->sql_fetchrow($result))
				{
					$post_row = $post_info[$upload_list[$row['attach_id']]];

					$template->assign_block_vars('upload', array(
						'FILE_INFO'		=> sprintf($user->lang['LOG_ATTACH_REASSIGNED'], $post_row['post_id'], $row['real_filename']),
						'S_DENIED'		=> (!$auth->acl_get('f_attach', $post_row['forum_id'])) ? true : false,
						'L_DENIED'		=> (!$auth->acl_get('f_attach', $post_row['forum_id'])) ? sprintf($user->lang['UPLOAD_DENIED_FORUM'], $forum_names[$row['forum_id']]) : '')
					);

					if (!$auth->acl_get('f_attach', $post_row['forum_id']))
					{
						continue;
					}

					// Adjust attachment entry
					$sql_ary = array(
						'in_message'	=> 0,
						'is_orphan'		=> 0,
						'poster_id'		=> $post_row['poster_id'],
						'post_msg_id'	=> $post_row['post_id'],
						'topic_id'		=> $post_row['topic_id'],
					);

					$sql = 'UPDATE ' . ATTACHMENTS_TABLE . '
						SET ' . $db->sql_build_array('UPDATE', $sql_ary) . '
						WHERE attach_id = ' . $row['attach_id'];
					$db->sql_query($sql);

					$sql = 'UPDATE ' . POSTS_TABLE . '
						SET post_attachment = 1
						WHERE post_id = ' . $post_row['post_id'];
					$db->sql_query($sql);
					
					$sql = 'UPDATE ' . TOPICS_TABLE . '
						SET topic_attachment = 1
						WHERE topic_id = ' . $post_row['topic_id'];
					$db->sql_query($sql);

					if(sizeof($unset_post_ids))
					{
						$sql = 'UPDATE ' . POSTS_TABLE . '
							SET post_attachment = 0
							WHERE ' . $db->sql_in_set('post_id', $unset_post_ids);
						$db->sql_query($sql);
					}

					if(sizeof($unset_topic_ids))
					{
						$sql = 'UPDATE ' . TOPICS_TABLE . '
							SET topic_attachment = 0
							WHERE ' . $db->sql_in_set('topic_id', $unset_topic_ids);
						$db->sql_query($sql);
					}
					
					add_log('admin', 'LOG_ATTACH_REASSIGNED', $post_row['post_id'], $row['real_filename']);
				}
				$db->sql_freeresult($result);
			}
		}

		$template->assign_vars(array(
			'S_ATTACHMENTS'		=> true)
		);

		// Just get the files
		$sql = 'SELECT *
			FROM ' . ATTACHMENTS_TABLE . '
			WHERE is_orphan = 0
			ORDER BY filetime DESC';
		$result = $db->sql_query($sql);

		while ($row = $db->sql_fetchrow($result))
		{
			$size_lang = ($row['filesize'] >= 1048576) ? $user->lang['MB'] : (($row['filesize'] >= 1024) ? $user->lang['KB'] : $user->lang['BYTES']);
			$row['filesize'] = ($row['filesize'] >= 1048576) ? round((round($row['filesize'] / 1048576 * 100) / 100), 2) : (($row['filesize'] >= 1024) ? round((round($row['filesize'] / 1024 * 100) / 100), 2) : $row['filesize']);

			$template->assign_block_vars('attachments', array(
				'FILESIZE'			=> $row['filesize'] . ' ' . $size_lang,
				'FILETIME'			=> $user->format_date($row['filetime']),
				'REAL_FILENAME'		=> basename($row['real_filename']),
				'PHYSICAL_FILENAME'	=> basename($row['physical_filename']),
				'ATTACH_ID'			=> $row['attach_id'],
				'POST_ID'			=> $row['post_msg_id'],
				'TOPIC_ID'			=> $row['topic_id'],
				'POST_IDS'			=> (!empty($post_ids[$row['attach_id']])) ? $post_ids[$row['attach_id']] : '',
				'U_FILE'			=> append_sid($phpbb_root_path . 'download/file.' . $phpEx, 'mode=view&amp;id=' . $row['attach_id']))
			);
		}
		$db->sql_freeresult($result);

		if (sizeof($error))
		{
			$template->assign_vars(array(
				'S_WARNING'		=> true,
				'WARNING_MSG'	=> implode('<br />', $error))
			);
		}

		if (sizeof($notify))
		{
			$template->assign_vars(array(
				'S_NOTIFY'		=> true,
				'NOTIFY_MSG'	=> implode('<br />', $notify))
			);
		}

	}
}

?>