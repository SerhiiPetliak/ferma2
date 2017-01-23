<?php
/**
*
* captcha_qa [Russian]
*
* @package language
* @version $Id: captcha_qa.php 9966 2009-08-12 15:12:03Z Kellanved $
* @copyright (c) 2009 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
*
*/

/**
* DO NOT CHANGE
*/
if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty($lang) || !is_array($lang))
{
	$lang = array();
}

// DEVELOPERS PLEASE NOTE
//
// All language files should use UTF-8 as their encoding and the files must not contain a BOM.
//
// Placeholders can now contain order information, e.g. instead of
// 'Page %s of %s' you can (and should) write 'Page %1$s of %2$s', this allows
// translators to re-order the output of data while ensuring it remains correct
//
// You do not need this where single placeholders are used, e.g. 'Message %d' is fine
// equally where a string contains only two placeholders which are used to wrap text
// in a url you again do not need to specify an order e.g., 'Click %sHERE%s' is fine

$lang = array_merge($lang, array(
	'CAPTCHA_QA'				=> 'Текстовое подтверждение',
	'CONFIRM_QUESTION_EXPLAIN'	=> 'Этот вопрос предназначен для предотвращения автоматических регистраций.',
	'CONFIRM_QUESTION_WRONG'	=> 'Вы ввели неверный ответ на вопрос.',

	'QUESTION_ANSWERS'			=> 'Ответы',
	'ANSWERS_EXPLAIN'			=> 'Пожалуйста, введите правильные ответы. Каждый ответ должен вводиться с новой строки.',
	'CONFIRM_QUESTION'			=> 'Вопрос',

	'ANSWER'					=> 'Ответ',
	'EDIT_QUESTION'				=> 'Редактировать вопрос',
	'QUESTIONS'					=> 'Вопрос',
	'QUESTIONS_EXPLAIN'			=> 'При прохождении регистрации пользователю будет предложен один из этих вопросов. Для использования данного модуля, по крайней мере один из вопросов должен быть установлен для языка по умолчанию. Вопросы должны быть простыми для Вашей аудитории, но сложными для ботов, которые используют Google для поиска ответов на распространенные вопросы. Рекомендуется использовать большое количество часто сменяемых вопросов. Установите строгую проверку, если ответ на вопрос зависит от регистра или знаков препинания.',
	'QUESTION_DELETED'			=> 'Вопрос удалён',
	'QUESTION_LANG'				=> 'Язык',
	'QUESTION_LANG_EXPLAIN'		=> 'Язык, на котором написаны вопрос и ответ на него.',
	'QUESTION_STRICT'			=> 'Строгая проверка',
	'QUESTION_STRICT_EXPLAIN'	=> 'Если функция активирована, при проверке ответов будут учитываться регистр, пробелы и знаки препинания.',

	'QUESTION_TEXT'				=> 'Вопрос',
	'QUESTION_TEXT_EXPLAIN'		=> 'Вопрос, который будет задаваться при регистрации.',

	'QA_ERROR_MSG'				=> 'Пожалуйста, заполните все поля и введите не менее одного ответа.',
	'QA_LAST_QUESTION'			=> 'Пока плагин активирован, Вы не можете удалить все вопросы.',

));

?>