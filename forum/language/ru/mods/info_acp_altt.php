<?php

/**
*
* @package - NV advanced last topic titles
* @version $Id: info_acp_altt.php 7 2008-09-08 23:34:25Z nickvergessen $
* @copyright (c) nickvergessen: http://www.flying-bits.org/ - nickvergessen@gmx.de
* @license http://opensource.org/licenses/gpl-license.php GNU Public License 
*
*/
if (!defined('IN_PHPBB'))
{
        exit;
}
if (empty($lang) || !is_array($lang))
{
        $lang = array();
}

$lang = array_merge($lang, array(
	'ALTT_ACTIVE'					=> 'Активировать мод NV advanced last topic titles',

	'ALTT_CHAR_LIMIT'				=> 'Количество символов, которые будут отображаться на странице',
	'ALTT_CHAR_LIMIT_EXP'			=> 'Введите 0 или 64 для снятия ограничений',
	'ALTT_CONFIG'					=> 'конфигурация мода NV advanced last topic titles',
	'ALTT_CONFIG_SAVED'				=> 'сохранить изменения',

	'ALTT_LINK_NAME'				=> 'текст ссылки это заголовок',
	'ALTT_LINK_URL'					=> 'ссылка ведёт к',
	'ALTT_FIRST_POST'				=> 'Первое сообщение в последней теме',
	'ALTT_LAST_POST'				=> 'Последнее сообщение в последней теме',
	'ALTT_FIRST_UNREAD_POST'		=> 'Первое непрочитанное сообщение в последней теме',
	'ALTT_FIRST_UNREAD_POST_NOTE'	=> 'Помните: Если нет непрочитанных сообщений, ссылка будет вести к последнему сообщению.',
	'ALTT_POST'						=> 'Сообщение',
	'ALTT_TOPIC'					=> 'Тема',
	'ALTT_LINK_STYLE'				=> 'Стилизация ссылок',
	'ALTT_BOLD'						=> 'Жирный',
	'ALTT_ITALIC'					=> 'Курсив',
	'ALTT_ADV'						=> 'подробнее:',

	'ALTT_IGNORE_PASSWORD'			=> 'Игнорировать пароль',
	'ALTT_IGNORE_PASSWORD_EXP'		=> 'Название будет выводиться даже если это форум под паролем.',
	'ALTT_IGNORE_RIGHTS'			=> 'Игнорировать права',
	'ALTT_IGNORE_RIGHTS_EXP'		=> 'Если Вы игнорируете права, название будет выводиться даже если у пользователя нет прав на просмотр форума и сообщения.',

	'ALTT_TITLE'					=> 'NV advanced last topic titles',

	'CREATE_INDEX'					=> 'Создать индекс',
	'CREATE_INDEX_EXP'				=> 'Создание индексов повышает скорость работы мода. У некоторых пользователей недостаточно прав для создания индексов и это приводит к ошибкам при установке. Поэтому просто выключите эту возможность здесь.',

	'INSTALLER_INTRO'				=> 'Введение',
	'INSTALLER_INTRO_WELCOME'		=> 'Вас приветствует мастер установки модуля',
	'INSTALLER_INTRO_WELCOME_NOTE'	=> 'Выберите в списке слева требуемое действие.',

	'INSTALLER_INSTALL'					=> 'Установить',
	'INSTALLER_INSTALL_MENU'			=> 'Установка',
	'INSTALLER_INSTALL_SUCCESSFUL'		=> 'Установка модуля версии %s успешно завершена. Не забудьте удалить с сервера папку install_altt.',
	'INSTALLER_INSTALL_VERSION'			=> 'Установить версию %s',
	'INSTALLER_INSTALL_WELCOME'			=> 'Вас приветствует мастер установки модуля',
	'INSTALLER_INSTALL_WELCOME_NOTE'	=> 'Во время установки данной модификации все изменения в базе данных от предыдущей версии будут удалены.',

	'INSTALLER_NEEDS_FOUNDER'			=> 'Необходимо войти на конференцию с правами основателя.',

	'INSTALLER_UPDATE'					=> 'Обновление',
	'INSTALLER_UPDATE_MENU'				=> 'Обновление',
	'INSTALLER_UPDATE_NOTE'				=> 'Обновление модуля от версии %s до версии %s',
	'INSTALLER_UPDATE_SUCCESSFUL'		=> 'Обновление модуля от версии %s до версии %s успешно завершено. Не забудьте удалить с сервера папку install__altt.',
	'INSTALLER_UPDATE_VERSION'			=> 'Обновить с версии ',
	'INSTALLER_UPDATE_WELCOME'			=> 'Вас приветствует мастер обновления модуля',

	'INSTALL_MODIFICATION'				=> 'NV advanced last topic titles v%s',
	'LOG_INSTALL_MODIFICATION'			=> 'Установлен мод "NV advanced last topic titles" v%s',
	'LOG_UPDATE_MODIFICATION'			=> 'Мод "NV advanced last topic titles" обновлен до v%s',
	
	'WARNING'							=> 'Внимание',
));

?>
