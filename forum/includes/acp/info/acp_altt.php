<?php

/**
*
* @package - NV advanced last topic titles
* @version $Id: acp_altt.php 32 2008-12-26 09:30:23Z nickvergessen $
* @copyright (c) nickvergessen: http://www.flying-bits.org/ - nickvergessen@gmx.de
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/

/**
* @ignore
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

/**
* @package module_install
*/
class acp_altt_info
{
	function module()
	{
		return array(
			'filename'	=> 'acp_altt',
			'title'		=> 'ALTT_TITLE',
			'version'	=> '1.2.8',
			'modes'		=> array(
				'config_altt'	=> array(
					'title'			=> 'ALTT_CONFIG',
					'auth'			=> 'acl_a_board',
					'cat'			=> array('ALTT_TITLE'),
				),
			),
		);
	}
}

?>