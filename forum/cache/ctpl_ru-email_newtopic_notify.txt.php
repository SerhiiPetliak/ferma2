<?php if (!defined('IN_PHPBB')) exit; ?>Subject: Уведомление о новой теме — «<?php echo (isset($this->_rootref['FORUM_NAME'])) ? $this->_rootref['FORUM_NAME'] : ''; ?>»

Здравствуйте, <?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>!

Вы получили это сообщение потому, что следите за форумом «<?php echo (isset($this->_rootref['FORUM_NAME'])) ? $this->_rootref['FORUM_NAME'] : ''; ?>» на форуме «<?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?>». В этом форуме с момента вашего последнего посещения появилась новая тема «<?php echo (isset($this->_rootref['TOPIC_TITLE'])) ? $this->_rootref['TOPIC_TITLE'] : ''; ?>». Вы можете перейти по ссылке, чтобы просмотреть ее. Новые уведомления не будут приходить, пока Вы не просмотрите форум:

<?php echo (isset($this->_rootref['U_FORUM'])) ? $this->_rootref['U_FORUM'] : ''; ?>


Если Вы больше не хотите следить за форумом, то либо щелкните по находящейся в нем ссылке «Отписаться от форума», либо перейдите по следующей ссылке:

<?php echo (isset($this->_rootref['U_STOP_WATCHING_FORUM'])) ? $this->_rootref['U_STOP_WATCHING_FORUM'] : ''; ?>


<?php echo (isset($this->_rootref['EMAIL_SIG'])) ? $this->_rootref['EMAIL_SIG'] : ''; ?>