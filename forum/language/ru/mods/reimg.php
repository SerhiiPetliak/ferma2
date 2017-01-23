<?php
/**
*
* reimg [English]
*
* @package language
* @version $Id: reimg.php 8775 2009-06-05 09:30:12Z DavidIQ $
* @copyright (c) 2009 DavidIQ.com
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
//
// NOTE TO TRANSLATORS:  Text in parenthesis refers to keys on the keyboard

$lang = array_merge($lang, array(
	'LOADING_TEXT'					=> 'Загрузка...',
	'LOADING_TITLE'					=> 'Кликните чтобы отменить',
	'FOCUS_TITLE'					=> 'Кликните чтобы увеличить',
	'FULL_EXPAND_TITLE'				=> 'Расширить до натуральной величины (f)',
	'CREDITS_TEXT'					=> 'Powered by <i>Highslide JS</i>',
	'CREDITS_TITLE'					=> 'Перейти на страницу Highslide JS',
	'PREVIOUS_TEXT'					=> 'Предыдущий',
	'NEXT_TEXT'						=> 'Следующий',
	'MOVE_TEXT'						=> 'Переместить',
	'CLOSE_TEXT'					=> 'Закрыть',
	'CLOSE_TITLE'					=> 'Закрыть (esc)',
	'RESIZE_TITLE' 					=> 'Изменить размеры',
	'PLAY_TEXT' 					=> 'Проиграть',
	'PLAY_TITLE' 					=> 'Проиграть слайдшоу (spacebar)',
	'PAUSE_TEXT' 					=> 'Пауза',
	'PAUSE_TITLE' 					=> 'Пауза для слайдшоу (spacebar)',
	'PREVIOUS_TITLE' 				=> 'Предыдущий (влево)',
	'NEXT_TITLE' 					=> 'Следующий (вправо)',
	'MOVE_TITLE' 					=> 'Переместить',
	'IMAGE_NUMBER' 					=> 'Изображение %1 из %2',
	'RESTORE_TITLE' 				=> 'Кликните, чтобы закрыть изображение, кликните и перетащите для перемещения. Используйте стрелки для перемещения между изображениями.',
	
	'REIMG_SETTINGS'				=> 'Настройки',
	'REIMG_MAX_SIZE'				=> 'Максимально-допустимые размеры',
	'REIMG_MAX_SIZE_EXPLAIN'		=> 'При превышении указанных размеров изображение будет изменено. Введите 0 для отмены горизонтального или вертикального изменения.',
	'REIMG_REL_WIDTH'				=> 'Максимально-допустимая ширина изображения',
	'REIMG_REL_WIDTH_EXPLAIN'		=> 'При превышении указанной ширины изображение будет изменено. Введите 0 для отмены изменения изображения.',
	'REIMG_SWAP_PORTRAIT'			=> 'Нормализуйте пейзаж/портрет',
	'REIMG_SWAP_PORTRAIT_EXPLAIN'	=> 'Если опция установлена, пейзажи и портреты будут изменяться одинаково.',
	'REIMG_LINK_METHOD'				=> 'Увеличить ссылкой',
	'REIMG_LINK_METHOD_EXPLAIN'		=> 'Ваберите способ вызова оригинального изображения.',
	'REIMG_LINK_BUTTON'				=> 'Увеличить кнопкой',
	'REIMG_LINK_IMAGE'				=> 'Измененное изображение',
	'REIMG_LINK_BOTH'				=> 'Оба',
	'REIMG_ZOOM_BLANK'				=> 'В новом окне',
	'REIMG_ZOOM_DEFAULT'			=> 'Стандартный',
	'REIMG_ZOOM_EXTURL'				=> 'Внешний',
	'REIMG_ZOOM_LITEBOX'			=> 'Lightbox',
	'REIMG_ZOOM_LITEBOX_1_1'		=> 'Lightbox 1:1',
	'REIMG_ZOOM_LITEBOX_RESIZED'	=> 'Lightbox resized',
	'REIMG_ZOOM_HIGHSLIDE'			=> 'Highslide',
	'REIMG_ZOOM_METHOD'				=> 'Способ увеличения',
	'REIMG_ZOOM_METHOD_EXPLAIN'		=> 'Выберите способ, который будет использоваться, чтобы рассмотреть оригинальное изображение.',
	'REIMG_IGNORE_SIG_IMG'			=> 'Игнорировать изображения в подписях',
	'REIMG_IGNORE_SIG_IMG_EXPLAIN'	=> 'Если опция включена, изображения в подписях не будут изменяться.',
	
	'IMG_ICON_REIMG_LOADING'		=> 'Загрузка',
	'IMG_ICON_REIMG_ZOOM_IN'		=> 'Увеличить',
	'IMG_ICON_REIMG_ZOOM_OUT'		=> 'Уменьшить',
	
	'REIMG_ZOOM_IN'					=> 'Увеличить (реальные размеры: %1$d x %2$d)',
	'REIMG_ZOOM_OUT'				=> 'Уменьшить',
));

?>