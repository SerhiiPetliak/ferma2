<?php
/**
*
* help_faq [Russian]
*
* @package language
* @version $Id: help_faq.php 8896 2008-09-19 16:59:40Z acydburn $
* @copyright (c) 2005 phpBB Group
* @license http://opensource.org/licenses/gpl-license.php GNU Public License
* Translation: Kastaneda http://www.teosofia.ru
*
*/

/**
*/
if (!defined('IN_PHPBB'))
{
exit;
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

$help = array(
array(
			0 => '--',
			1 => 'Вход на форум и регистрация'
	),
array(
			0 => 'Почему я не могу войти на форум?',
			1 => 'Возможно несколько причин. Прежде всего, убедитесь в том, что вы правильно вводите имя пользователя и пароль. Если данные вводятся правильно, то свяжитесь с администратором форума, чтобы проверить, не был ли вам закрыт доступ к форуму. Также возможно, что администратор неправильно настроил конфигурацию форума. Свяжитесь с ним для исправления настроек.'
	),
array(
			0 => 'Зачем вообще нужна регистрация?',
			1 => 'Регистрация не является обязательным мероприятием. Тем не менее, она предоставляет дополнительные возможности и удобства, недоступные анонимным посетителям (гостям): аватары, отправку и получение личных сообщений, переписку по электронной почте, участие в группах, подписки на получение уведомлений о появлении новых сообщений, закладки на любимые темы и так далее. Регистрация занимает всего несколько секунд, но предоставляет зарегистрированным пользователям более широкие и удобные возможности по использованию возможностей форума. Поэтому мы рекомендуем это сделать.'
	),
array(
			0 => 'Почему мне периодически приходится заново вводить имя и пароль?',
			1 => 'Если вы не отметили флажком пункт «Автоматически входить при каждом посещении» на странице входа, то сможете оставаться под своим именем на форуме лишь ограниченное время. Это сделано для того, чтобы никто другой не смог воспользоваться вашей учетной записью. Для того чтобы вам не приходилось вводить имя пользователя и пароль каждый раз, вы можете отметить флажком указанный пункт на странице входа, но мы не рекомендуем делать это на общедоступном компьютере, например в библиотеке, Интернет-кафе, университете и т.п. Если пункт «Автоматически входить при каждом посещении» отсутствует, то это значит, что администратор отключил эту возможность.'
	),
array(
			0 => 'Как сделать, чтобы я не появлялся в списке активных пользователей?',
			1 => 'В центре пользователя в группе общих настроек можно найти опцию «Скрывать мое пребывание на форуме». Если установить переключатель в положение «Да», то вы будете видны только администраторам, модераторам и самому себе. Для всех остальных вы будете скрытым пользователем.'
	),
array(
			0 => 'Я забыл пароль!',
			1 => 'Не паникуйте! Хоть ваш пароль и не может быть восстановлен, вы всегда можете запросить новый. Для этого перейдите на страницу входа, щелкните на этой странице ссылку «Забыли пароль?», следуйте предложенным инструкциям и вскоре вы снова сможете войти на форум.'
	),
array(
			0 => 'Я только что зарегистрировался, но не могу войти!',
			1 => 'Для начала проверьте, правильно ли вы вводите имя пользователя и пароль. Если вы уверены, что вводите имя и пароль правильно, то может быть одна из двух причин. Если включена поддержка COPPA, и вы при регистрации указали, что вам меньше 13 лет, то вам необходимо следовать полученным инструкциям. Если это не ваш случай, то значит, требуется активация учетной записи. На многих форумах требуется, чтобы все новые пользователи были активированы самостоятельно, либо администратором до того, как они смогут в них войти. Эта информация отображается в процессе регистрации. Если вам пришло сообщение на указанный вами при регистрации адрес электронной почты, то следуйте инструкциям, указанными в этом сообщении. Если вы не получили сообщения, то возможно вы указали неправильный адрес при регистрации, либо он заблокирован каким-либо фильтром. Если вы уверены, что ввели правильный адрес электронной почты, но сообщения так и не получили, то обратитесь за помощью к администратору форума.'
	),
array(
			0 => 'Я давно зарегистрирован, но больше не могу войти!',
			1 => 'Наиболее вероятные причины: вы ввели неверное имя или пароль (проверьте электронное сообщение, которое пришло вам после регистрации), или администратор удалил вашу учетную запись по каким-либо причинам. Если верно второе, то возможно вы не написали ни одного сообщения. Администраторы могут удалять неактивных пользователей в целях уменьшения размера базы данных. Попробуйте зарегистрироваться снова и принять активное участие в дискуссиях.'
	),
array(
			0 => 'Что такое COPPA?',
			1 => 'COPPA (Child Online Privacy and Protection Act) или закон о защите личных сведений детей в интернете от 1998 г. — это закон Соединенных Штатов, требующий от сайтов, потенциально собирающих личные сведения, иметь письменное разрешение родителей или других юридических опекунов для регистрации на этих сайтах детей младше тринадцати лет. Допустимо наличие иного вида подтверждения того, что опекуны разрешают сбор личных сведений от детей младше тринадцати лет. Обратите внимание на то, что phpBB Group не может давать рекомендаций по правовым вопросам и не является объектом юридических отношений.<br />Примечание переводчика: в России данный акт не имеет юридической силы.',
	),
array(
			0 => 'Почему я не могу зарегистрироваться?',
			1 => 'Возможно, администратор заблокировал ваш IP-адрес или запретил имя, под которым вы пытаетесь зарегистрироваться. Также он мог вообще отключить регистрацию новых пользователей. Свяжитесь с администратором для получения более точной информации.',
	),
array(
			0 => 'Для чего предназначена функция «Удалить cookies»?',
			1 => 'Она удаляет все файлы cookies, которые позволяют вам оставаться под вашим зарегистрированным именем на форуме, а также выполняет другие функции, такие, как отслеживание прочитанных сообщений, если эта возможность разрешена администратором. Если у вас имеются проблемы с входом или с выходом из форума, то функция удаления cookies может помочь в решении этой проблемы.',
	),
array(
			0 => '--',
			1 => 'Параметры и настройки пользователя'
	),
array(
			0 => 'Как изменить мои настройки?',
			1 => 'Если вы являетесь зарегистрированным пользователем, то все ваши настройки хранятся в базе данных. Для изменения настроек нажмите ссылку «Центр пользователя», которая обычно находится сверху страниц форума. Нажав на ссылку, вы попадете в центр пользователя, в котором сможете изменить все свои настройки.'
	),
array(
			0 => 'На форуме неправильное время!',
			1 => 'Обычно время правильное (если часы сервера, на котором размещен форум, настроены правильно). То, что вам кажется неправильным временем — это всего лишь разница в часовых поясах. Вы можете изменить текущий часовой пояс на другой пояс в группе общих настроек центра пользователя. Примечание: для изменения часового пояса, равно, как и большинства других настроек, необходимо быть зарегистрированным пользователем. Если вы все еще не зарегистрированы, то настал удобный момент сделать это прямо сейчас.'
	),
array(
			0 => 'Я изменил часовой пояс, но время все равно неправильное!',
			1 => 'Если вы уверены, что правильно указали часовой пояс и опцию летнего времени (<abbr title="Daylight Saving Time">DST</abbr>), но время по-прежнему отображается неверно, то это значит, что время неправильно установлено на сервере. Сообщите администратору об этой ошибке, чтобы он устранил ее.'
	),
array(
			0 => 'Моего языка нет в списке!',
			1 => 'Наиболее вероятные причины этого состоят в том, что администратор не установил поддержку вашего языка на форуме, или же просто никто еще не перевел phpBB на ваш язык. Поинтересуйтесь у администратора, есть ли у него возможность установить нужный вам языковый пакет. Если такого пакета не существует, то не стесняйтесь — у вас имеется прекрасная возможность создать и распространить по всему миру свою локализацию. Более подробную информацию можно получить на сайте phpBB (ссылка на него находится внизу страниц форума).'
	),
array(
			0 => 'Как поместить картинку вместе со своим именем?',
			1 => 'На страницах просмотра тем под именем пользователей могут быть две картинки. Одно из них может относиться к вашему званию, обычно это звёздочки, квадратики или точки, указывающие на то, сколько сообщений вы оставили или на ваш статус на форуме. Другое, обычно более крупное изображение, известно как «аватара» и обычно уникально для каждого пользователя. Если вы не можете использовать аватары, то значит таково решение администрации. Вы можете связаться с одним из администраторов и выяснить у него причины данного запрета.'
	),
array(
			0 => 'Что такое звание и как изменить его?',
			1 => 'Большинство сетевых форумов используют систему званий для отображения количества отправленных пользователями сообщений, а также для идентификации некоторых пользователей. Например, модераторы и администраторы могут иметь специальные звания. Обычно звания отображаются чуть ниже имен пользователей на страницах просмотра тем, а также в профилях пользователей. Напрямую вы не можете изменить свое звание, поскольку они устанавливаются администрацией. Пожалуйста, не злоупотребляйте отправкой ненужных и бессмысленных сообщений только лишь для того, чтобы быстрее повысить свое звание. Подобными операциями вы добьетесь лишь того, что администратор просто-напросто уменьшит количество отправленных вами сообщений. Но если вы очень хотите изменить свое звание, то можете лично попросить об этом администратора форума.'
	),
array(
			0 => 'Почему, когда я нажимаю ссылку для отправки пользователю электронного сообщения, появляется страница входа?',
			1 => 'Только зарегистрированные пользователи могут отправлять электронные сообщения другим пользователям через встроенную почтовую форму (если эта возможность вообще разрешена администрацией). Это сделано для предотвращения злоупотреблений использования почтовой системы анонимными пользователями, а также для защиты электронных адресов пользователей от кражи.'
	),
array(
			0 => '--',
			1 => 'Создание и размещение сообщений'
	),
array(
			0 => 'Как создать новую тему?',
			1 => 'Для создания новой темы в одном из форумов щелкните соответствующую кнопку на странице темы или форума. Возможно, вам придется зарегистрироваться перед отправкой сообщения, или созданием темы. Доступные вам возможности перечислены внизу страниц форумов или тем (список <em>Вы <strong>можете</strong> начинать темы, Вы <strong>можете</strong> отвечать на сообщения и т.п.</em>).'
	),
array(
			0 => 'Как отредактировать или удалить сообщение?',
			1 => 'Если вы не являетесь администратором или модератором форума, то вы можете редактировать и удалять только свои собственные сообщения. Вы можете отредактировать свое сообщение, нажав кнопку «Редактировать сообщение», иногда лишь в течение ограниченного времени после его размещения. Если после вашего сообщения имеются сообщения от других пользователей, то после редактирования сообщения вы увидите небольшую надпись ниже отредактированного вами сообщения. Эта надпись будет показывать, сколько раз и когда именно вы редактировали данное сообщение. Эта надпись не появится, если ниже вашего сообщения нет сообщений от других пользователей, и если сообщение редактировали администраторы или модераторы. Но последние могут оставить заметку, относительно того, почему они редактировали ваше сообщение. Обычные пользователи не могут удалять свои сообщения, если после них есть сообщения от других пользователей.'
	),
array(
			0 => 'Как добавить подпись к своему сообщению?',
			1 => 'Чтобы добавить подпись к сообщению, сначала вы должны создать ее в центре пользователя в группе настроек «Подпись». После создания подписи вы можете отметить флажком пункт «Присоединить подпись» в форме отправки сообщения для добавления подписи к размещаемому сообщению. Также вы можете настроить автоматическое добавление подписи ко всем отправляемым вами сообщениям, выбрав соответствующую опцию в группе настроек «Размещение сообщений». Несмотря на это, вы сможете отменять добавление подписи в отдельных сообщениях, убрав флажок «Присоединить подпись» в форме отправки сообщения.'
	),
array(
			0 => 'Как создать голосование?',
			1 => 'При создании новой темы или при редактировании первого сообщения темы (если имеете на это необходимые права), щелкните вкладку или перейдите в форму «Голосование» под основной формой создания сообщения (в зависимости от используемого стиля). Если вы не видите такой вкладки или формы, то значит, вы не имеете прав на создание голосований. Введите вопрос в поле «Вопрос» и, как минимум, два варианта ответа в поле «Варианты ответа». Вводите каждый вариант ответа на новой строке текстового поля. Количество возможных вариантов ответа ограничено и устанавливается администратором форума. Также вы можете задать количество вариантов ответа при голосовании, установить время проведения голосования (0 означает, что голосование будет постоянным), а также разрешить пользователям изменять свои ответы.'
	),
array(
			0 => 'Почему я не могу добавить больше вариантов ответа?',
			1 => 'Ограничение количества вариантов ответа устанавливается администратором форума. Если вам нужно добавить количество вариантов, превышающее это ограничение, то обратитесь с этим вопросом к администратору.'
	),
array(
			0 => 'Как отредактировать или удалить голосование?',
			1 => 'Так же, как и сообщения, голосования могут редактироваться только их создателями, модераторами или администраторами. Для редактирования голосования перейдите к редактированию первого сообщения в теме (голосование всегда связан именно с ним). Если никто не успел проголосовать, то вы можете удалить голосование или отредактировать любой из вариантов ответа. Но если кто-нибудь уже проголосовал, то только модераторы или администраторы могут отредактировать или удалить голосование. Это сделано для того, чтобы нельзя было менять варианты ответов во время голосования.'
	),
array(
			0 => 'Почему мне недоступны некоторые форумы?',
			1 => 'Некоторые форумы могут быть доступны только определенным пользователям или группам пользователей. Чтобы их просматривать, размещать в них сообщения и совершать другие операции, вам могут потребоваться специальные права доступа. Свяжитесь с модератором или администратором форума для получения доступа к таким форумам.'
	),
array(
			0 => 'Почему я не могу добавлять вложения?',
			1 => 'Возможность добавления вложений может быть организована на уровне форумов, групп пользователей или отдельных пользователей. Администратор форума может не разрешить добавление вложений в определенных форумах. Также возможно, что добавлять вложения разрешено только членам определенных групп. Если вы не знаете, почему не можете добавлять вложения, то обратитесь за разъяснениями к администратору.'
	),
array(
			0 => 'Почему я получил предупреждение?',
			1 => 'На каждом форуме администраторы устанавливают свой собственный свод правил. Если администратор думает, что вы нарушили одно из этих правил, то он может выдать вам предупреждение. Обратите внимание на то, что это решение администратора форума, и phpBB Group не имеет никакого отношения к предупреждениям, выдаваемым на данном форуме. Если вы не знаете, за что получили предупреждение, то свяжитесь с администратором форума.'
	),
array(
			0 => 'Как мне пожаловаться на сообщения модератору?',
			1 => 'Рядом с каждым сообщением вы увидите кнопку, предназначенную для отправки жалобы на него, если это разрешено администратором форума. Щелкнув по этой кнопке, вы пройдете через ряд шагов, необходимых для оправки жалобы на сообщение.'
	),
array(
			0 => 'Что означает кнопка «Сохранить» при создании сообщения?',
			1 => 'Эта кнопка позволяет вам сохранять сообщения для того, чтобы закончить редактирование и отправить их позже. Для загрузки сохраненного сообщения перейдите в раздел «Черновики» центра пользователя.'
	),
array(
			0 => 'Почему мое сообщение нуждается в проверки модератором?',
			1 => 'Администратор форума может решить, что сообщения, отправляемые пользователями, требуют предварительного просмотра перед окончательным отображением. Также возможно, что администратор включил вас в группу пользователей, сообщения от которых, по его мнению, должны быть предварительно просмотрены перед размещением. Свяжитесь с администратором форума для получения дополнительной информации.'
	),
array(
			0 => 'Как мне вновь поднять мою тему?',
			1 => 'Щелкнув по ссылке «Поднять тему» при просмотре темы, вы можете «поднять» ее в верхнюю часть первой страницы форума. Если этого не происходит, то это означает, что возможность поднятия тем отключена, или время, которое должно пройти до повторного поднятия темы, еще не прошло. Также можно поднять тему, просто ответив на нее. При этом удостоверьтесь, что тем самым вы не нарушаете правил форума, на котором находитесь.'
	),
array(
			0 => '--',
			1 => 'Форматирование сообщений и типы создаваемых тем'
	),
array(
			0 => 'Что такое BBCode?',
			1 => 'BBCode — это специальная реализация языка HTML, предоставляющая более удобные возможности по форматированию сообщений. Возможность использования BBCode в сообщениях определяется администратором форума. Кроме этого, BBCode может быть отключен вами в любое время в любом размещаемом сообщении прямо из формы его написания. Сам BBCode по стилю очень похож на HTML, но теги в нем заключаются в квадратные скобки [ … ], а не в &lt; … &gt;. Для получения более подробных сведений о BBCode прочтите руководство по BBCode, ссылка на которое доступна из формы отправки сообщений.'
	),
array(
			0 => 'Могу ли я использовать HTML?',
			1 => 'Нет. На этом форуме невозможна отправка и обработка кода HTML в сообщениях. Большая часть возможностей HTML по форматированию сообщений может быть реализована с использованием BBCode.'
	),
array(
			0 => 'Что такое смайлики?',
			1 => 'Смайлики, или эмотиконы — это небольшие картинки, которые могут быть использованы для выражения чувств. Например :) означает радость, а :( означает печаль. Полный список смайликов можно увидеть в форме создания сообщений. Только не перестарайтесь, используя их: они легко могут сделать сообщение нечитаемым, и модератор может отредактировать ваше сообщение, или вообще удалить его. Администратор также может наложить ограничение на количество смайликов в одном сообщении.'
	),
array(
			0 => 'Могу ли я добавлять рисунки к сообщениям?',
			1 => 'Да, вы можете размещать рисунки в сообщениях. Если администратор разрешил добавлять вложения, то вы можете напрямую загрузить рисунок в сообщение. В противном случае вы можете указать ссылку на рисунок, хранящийся на другом сервере. Пример ссылки на рисунок: http://www.teosofia.ru/my-picture.gif. Вы не можете указывать ссылку на рисунки, хранящиеся на вашем компьютере (если он не является общедоступным сервером), ни на рисунки, для доступа к которым необходима аутентификация, например, на почтовые ящики hotmail или yahoo, защищенные паролями сайты и т.п. Для указания ссылок на рисунки используйте в сообщениях тег BBCode [img].'
	),
array(
			0 => 'Что такое важные объявления?',
			1 => 'Эти объявления содержат важную информацию, и вы должны прочесть их по возможности. Важные объявления появляются вверху каждого из форумов, а также в вашем центре пользователя. Необходимые права на создание важных объявлений предоставляются администратором форума.'
	),
array(
			0 => 'Что такое объявления?',
			1 => 'Объявления чаще всего содержат важную информацию для форума, на котором вы находитесь в настоящий момент, и вы должны прочесть их по возможности. Объявления появляются вверху каждой страницы форума, в котором они созданы. Так же, как и с важными объявлениями, необходимые права на создание объявлений устанавливаются администратором.'
	),
array(
			0 => 'Что такое прикрепленные темы?',
			1 => 'Прикрепленные темы в форуме находятся ниже всех объявлений и только на первой его странице. Чаще всего они содержат достаточно важную информацию, поэтому вы должны прочесть их по возможности. Так же, как и с объявлениями, необходимые права на создание прикрепленных тем устанавливаются администратором.'
	),
array(
			0 => 'Что такое закрытые темы?',
			1 => 'Это такие темы, в которых пользователи больше не могут оставлять сообщения, и все находящиеся в них голосования автоматически завершаются. Темы могут быть закрыты по многим причинам модератором форума или администратором форума. Также вы можете иметь возможность самостоятельно закрывать созданные вами темы, в зависимости от прав, предоставленных администратором форума.'
	),
array(
			0 => 'Что такое значки тем?',
			1 => 'Значки тем — это выбранные авторами рисунки, связанные с сообщениями и отражающие их содержимое. Возможность использования значков тем зависит от разрешений, установленных администратором.'
	),
// This block will switch the FAQ-Questions to the second template column
array(
			0 => '--',
			1 => '--'
	),
array(
			0 => '--',
			1 => 'Уровни пользователей и группы'
	),
array(
			0 => 'Кто такие администраторы?',
			1 => 'Администраторы — это пользователи, наделенные высшим уровнем контроля над форумом. Они могут управлять всеми аспектами работы форума, включая разграничение прав доступа, отключение пользователей, создание групп пользователей, назначение модераторов и т.п., в зависимости от прав, предоставленных им основателем форума. Также администраторы могут обладать всеми возможностями модераторов во всех форумах, в зависимости от прав, предоставленных им основателем.'
	),
array(
			0 => 'Кто такие модераторы?',
			1 => 'Модераторы — это пользователи (или группы пользователей), которые следят за вверенными им форумами. У них есть возможность редактировать или удалять сообщения, закрывать, открывать, перемещать, удалять и объединять темы в форумах, за которыми они следят. Основные задачи модераторов — не допускать несоответствия содержимого сообщений обсуждаемым темам (оффтопик) и оскорблений.'
	),
array(
			0 => 'Что такое группы пользователей?',
			1 => 'Группы пользователей разбивают сообщество на структурные части, управляемые администратором форума. Каждый пользователь может состоять в нескольких группах (в отличие от многих других форумов), и каждой группе могут быть назначены индивидуальные права доступа. Это облегчает администраторам назначение прав доступа одновременно большому количеству пользователей, например, изменение модераторских прав или предоставление пользователям доступа к закрытым форумам.'
	),
array(
			0 => 'Где находятся группы и как вступить в них?',
			1 => 'Вы можете получить информацию обо всех существующих группах, нажав ссылку «Группы» в центре пользователя. Если вы хотите вступить в одну из них, то нажмите соответствующую кнопку. Однако, не все группы общедоступны. Некоторые могут требовать предварительного одобрения для вступления в них, другие могут быть закрытыми или даже скрытыми. Если группа общедоступна, то вы можете запросить членство в ней, щелкнув по соответствующей кнопке. Если требуется одобрение на участие в группе, вы можете отправить запрос на вступление, щелкнув по соответствующей кнопке. Руководитель группы должен будет одобрить ваше участие в группе и может спросить, зачем вы хотите присоединиться. Пожалуйста, не беспокойте руководителя группы, выясняя, почему он отклонил ваш запрос — у него могут быть для этого свои причины.'
	),
array(
			0 => 'Как стать руководителем группы?',
			1 => 'Руководители групп обычно назначаются при их создании администраторами форума. Если вы заинтересованы в создании группы, то для начала свяжитесь с администратором — попробуйте отправить ему личное сообщение со своим предложением.'
	),
array(
			0 => 'Почему названия некоторых групп имеют разные цвета?',
			1 => 'Администратор форума может присваивать цвета участникам групп для того, чтобы их было проще отличать друг от друга.'
	),
array(
			0 => 'Что такое группа по умолчанию?',
			1 => 'Если вы состоите более чем в одной группе, ваша группа по умолчанию используется для того, чтобы определить, какие групповые цвет и звание должны быть вам присвоены. Администратор форума может предоставить вам разрешение самому изменять вашу группу по умолчанию в центре пользователя.'
	),
array(
			0 => 'Что означает ссылка «Команда сайта»?',
			1 => 'При нажатии ссылки «Команда сайта» откроется страница, на которой вы найдете список администраторов и модераторов форума, а также другую информацию, такую, как сведения о форумах, которыми они заведуют.'
	),
array(
			0 => '--',
			1 => 'Личные сообщения'
	),
array(
			0 => 'Я не могу отправлять личные сообщения!',
			1 => 'Это может быть вызвано тремя причинами: вы не зарегистрированы или не вошли на форум, администратор запретил отправку личных сообщений на всем форуме, или же администратор запретил это вам лично. Если верно третье, то спросите у администратора, почему он это сделал.'
	),
array(
			0 => 'Я постоянно получаю нежелательные личные сообщения!',
			1 => 'Вы можете запретить пользователю отправлять вам личные сообщения, используя правила для сообщений в центре пользователя. Если вы получаете оскорбительные личные сообщения от конкретного пользователя, то проинформируйте об этом администратора форума, который имеет возможность вообще запретить пользователю отправку личных сообщений.'
	),
array(
			0 => 'Я получил спам или оскорбительное сообщение!',
			1 => 'Нам грустно слышать это. Форма отправки электронных сообщений на данном форуме включает меры предосторожности и возможность отслеживания пользователей, отправляющих подобные сообщения. Отправьте сообщение администратору форума с полной копией полученного вами сообщения. Очень важно при этом включить все заголовки, в которых содержится подробная информация об отправителе. Администратор форума сможет в этом случае принять меры.'
	),
array(
			0 => '--',
			1 => 'Друзья и недоброжелатели'
	),
array(
			0 => 'Что означают списки друзей и недоброжелателей?',
			1 => 'Вы можете включать в эти списки других пользователей форума. Пользователи, добавленные в список друзей, будут указаны в вашем центре пользователя для получения быстрого доступа к информации о том, находятся ли они сейчас в сети, и для отправки им личных сообщений. Сообщения от этих пользователей также могут выделяться специальным цветом, если это поддерживается стилем форума. Если вы добавили пользователей в список недоброжелателей, то любые отправленные ими сообщения будут скрыты по умолчанию.'
	),
array(
			0 => 'Как добавлять или удалять пользователей из списков друзей и недоброжелателей?',
			1 => 'Вы можете добавлять пользователей в свои списки двумя способами. В профиле каждого пользователя есть ссылка для его добавления в список друзей или недоброжелателей. Кроме того, вы можете сделать это прямо из центра пользователя в списках друзей и недоброжелателей, непосредственным вводом имени пользователя. Вы можете также удалять пользователей из соответствующих списков на той же странице.'
	),
array(
			0 => '--',
			1 => 'Поиск в форумах'
	),
array(
			0 => 'Как осуществлять поиск в форумах?',
			1 => 'Введите слова для поиска в соответствующем поле, расположенном на главной странице, страницах просмотра форума или темы. Вы можете осуществить расширенный поиск, щелкнув по ссылке «Расширенный поиск», доступной на всех страницах форума. Способ доступа к поиску может отличаться в зависимости от используемого стиля.'
	),
array(
			0 => 'Почему поиск не дает результатов?',
			1 => 'Ваш поисковый запрос, возможно, был слишком неопределенным, или включал много общих слов, поиск по которым в phpBB3 не осуществляется. Для более тщательного поиска используйте возможности расширенного поиска.'
	),
array(
			0 => 'В результате моего поиска я получил пустую страницу!',
			1 => 'Ваш поиск дал слишком большое количество результатов, которые сервер не смог обработать. Используйте возможности расширенного поиска и более тщательно задавайте условия поиска и форумы, на которых он должен быть осуществлен.'
	),
array(
			0 => 'Как найти конкретного пользователя?',
			1 => 'Перейдите на страницу «Участники», щелкните по ссылке «Найти пользователя», и задайте необходимые условия для поиска.'
	),
array(
			0 => 'Как найти свои сообщения и темы?',
			1 => 'Вы можете найти свои сообщения, щелкнув либо по ссылке «Ваши сообщения» на главной странице, либо по ссылке «Показать ваши сообщения» в центре пользователя. Чтобы найти созданные вами темы, используйте страницу расширенного поиска, заполнив соответствующие условия для его осуществления.'
	),
array(
			0 => '--',
			1 => 'Закладки и подписки на темы'
	),
array(
			0 => 'Чем отличаются закладки от подписок?',
			1 => 'Закладки в phpBB3 похожи на закладки в браузере. Вы не будете предупреждены о произошедших изменениях, но сможете вернуться в тему позже. Однако, оформив подписку, вы будете получать уведомления об изменениях в теме или форумах форума предпочтительным вам способом или способами. Просмотреть свои подписки можно на странице «Подписки» в центре пользователя.'
	),
array(
			0 => 'Как мне подписаться на определенную тему или форум?',
			1 => 'Чтобы подписаться на определенный форум, зайдите на него и щелкните по ссылке «Подписаться на форум». Для подписки на тему поставьте соответствующую галочку при отправке ответа, либо щелкните по ссылке «Подписаться на тему» на странице просмотра темы.'
	),
array(
			0 => 'Как отказаться от подписки?',
			1 => 'Для управления своими подписками перейдите в центр пользователя и щелкните по ссылке «Подписки».'
	),
array(
			0 => '--',
			1 => 'Вложения'
	),
array(
			0 => 'Какие вложения разрешены на этом форуме?',
			1 => 'Администратор каждого форума может разрешить или запретить определенные типы вложений. Если вы не знаете, какие вложения разрешены, свяжитесь с администратором форума для получения помощи.'
	),
array(
			0 => 'Как найти свои вложения?',
			1 => 'Чтобы найти список отправленных вами вложений, зайдите в центр пользователя и щелкните по ссылке «Вложения».'
	),
array(
			0 => '--',
			1 => 'Сведения о phpBB 3 (Olympus)'
	),
array(
			0 => 'Кто написал phpBB 3?',
			1 => 'Это программное обеспечение (в его исходной форме) создано и распространяется <a target="_blank" href="http://www.phpbb.com/">phpBB Group</a>. Оно доступно на условиях GNU (General Public License) и может свободно распространяться. Для получения более подробных сведений перейдите по указанной ссылке.'
	),
array(
			0 => 'Почему здесь нет такой-то функции?',
			1 => 'Это программное обеспечение создано и лицензировано phpBB Group. Если вы считаете, что какая-то функция должна быть добавлена, то посетите сайт phpbb.com и узнайте, что по этому поводу думает phpBB Group. Пожалуйста, не оставляйте запросов о добавлении каких-либо функций на форуме phpbb.com — phpBB Group использует SourceForge для работы над новыми функциями. Пожалуйста, сначала просмотрите форумы, чтобы выяснить, каково наше мнение по поводу данной функции (если такое мнение у нас есть) и только после этого следуйте процедуре, которая там будет описана.'
	),
array(
			0 => 'С кем можно связаться по вопросам некорректного использования или юридических вопросов, связанных с этим форумом?',
			1 => 'Вы можете связаться с любым из администраторов, перечисленных на странице «Команда сайта». Если вы не получите ответа, то свяжитесь с владельцем домена или, если форум находится на бесплатном домене (Yahoo!, chat.ru, free.fr, f2s.com и т.д.), с руководством или технической поддержкой данного домена. Обратите внимание на то, что phpBB Group не имеет никакого юридического контроля над данным форумом и не несет никакой ответственности за то, кем и как используется данный форум. Абсолютно бессмысленно обращаться к phpBB Group по юридическим вопросам (о приостановке работы форума, ответственности за него и т.д.), которые не относятся напрямую к сайту phpbb.com, или которые частично относятся к программному обеспечению phpBB Group. Если же вы все-таки отправите жалобу в адрес phpBB Group об использовании данного форума третьей стороной, то не ждите подробного ответа, или вы можете вообще не получить его.'
	),
array(
			0 => 'Перевод FAQ',
			1 => 'Адаптирован перевод FAQ, выполненный <a href="http://www.teosofia.ru/phpbb3-documentation/" target="_blank">Kastaneda</a>'
)
);

?>
