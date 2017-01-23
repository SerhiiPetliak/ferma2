<?php
/**
*
* @package phpBB3 FAQ Manager
* @copyright (c) 2007 EXreaction, Lithium Studios
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

// Create the lang array if it does not already exist
if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// Merge the following language entries into the lang array
$lang = array_merge($lang, array(
	'ACP_FAQ_MANAGER'			=> 'Менеджер ЧаВо',

	'BACKUP_LOCATION_NO_WRITE'	=> 'Невозможно создать файл бекапа. Пожалуйста проверьте правадоступа к дериктории store/faq_backup/ и файлам и папкам находящимся в ней .',
	'BAD_FAQ_FILE'				=> 'Файл, который Вы пытаетесь отредактировать, не является файлом часто задаваемых вопросов.',

	'CAT_ALREADY_EXISTS'		=> 'Категория с указанным именем уже существует.',
	'CATEGORY_NOT_EXIST'		=> 'Требуемая категория не существует.',
	'CREATE_CATEGORY'			=> 'Создать категорию',
	'CREATE_FIELD'				=> 'Создать поле',

	'DELETE_CAT'				=> 'Удалить категорию',
	'DELETE_CAT_CONFIRM'		=> 'Вы действительно хотите удалить эту категорию?  Если вы это сделаете, все файлы находящиеся в категории будут удалены!',
	'DELETE_VAR'				=> 'Удалить поле',
	'DELETE_VAR_CONFIRM'		=> 'Вы действительно хотите удалить это поле?',

	'FAQ_CAT_LIST'				=> 'Здесь Вы можете просмотреть и редактировать существующие категории.',
	'FAQ_EDIT_SUCCESS'			=> 'ЧаВо успешно обновлен.',
	'FAQ_FILE_NOT_EXIST'		=> 'Файл, который Вы пытаетесь отредактировать, не существует.',
	'FAQ_FILE_NO_WRITE'			=> 'Невозможно обновить файл.  Пожалуйста поверте права доступа к файлу .',
	'FAQ_FILE_SELECT'			=> 'Выберите файл, который Вы хотите отредактировать.',

	'LANGUAGE'					=> 'Язык',
	'LOAD_BACKUP'				=> 'Загрузить бекап',

	'NAME'						=> 'Имя файла',
	'NOT_ALLOWED_OUT_OF_DIR'	=> 'Вам запрещено редактирование файлов за пределами языковой папки.',
	'NO_FAQ_FILES'				=> 'Нет доступных ЧаВо-файлов.',
	'NO_FAQ_VARS'				=> 'В файле нет ЧаВо-переменных.',

	'VAR_ALREADY_EXISTS'		=> 'Поле с указанным именем уже существует.',
	'VAR_NOT_EXIST'				=> 'Запрошеная переменная не существует.',
));

?>