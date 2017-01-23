<?php
/**
*
* @package acp
* @version $Id: nv_altt_version.php 32 2008-12-26 09:30:23Z nickvergessen $
* @copyright (c) 2005 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* @package nv_altt
*/

if (!defined('IN_PHPBB'))
{
	exit;
}

class nv_altt_version
{
	function version()
	{
		return array(
			'author'	=> 'nickvergessen',
			'title'		=> 'NV Advanced Last Topic Titles',
			'tag'		=> 'nv_altt',
			'version'	=> '1.2.8',
			'file'		=> array('www.flying-bits.org', 'updatecheck', 'nv_altt.xml'),
		);
	}
}

?>