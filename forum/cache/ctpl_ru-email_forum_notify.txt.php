<?php if (!defined('IN_PHPBB')) exit; ?>Subject: Уведомление о новом сообщении - «<?php echo (isset($this->_rootref['FORUM_NAME'])) ? $this->_rootref['FORUM_NAME'] : ''; ?>»

Здравствуйте, <?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?>!

Вы получили это сообщение потому, что следите за форумом «<?php echo (isset($this->_rootref['FORUM_NAME'])) ? $this->_rootref['FORUM_NAME'] : ''; ?>» на форуме «<?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?>». В этом форуме со времени вашего последнего посещения появилось новое сообщение в теме «<?php echo (isset($this->_rootref['TOPIC_TITLE'])) ? $this->_rootref['TOPIC_TITLE'] : ''; ?>». Вы можете перейти по ссылке, чтобы просмотреть тему; новые уведомления не будут приходить, пока Вы не просмотрите тему:

<?php echo (isset($this->_rootref['U_NEWEST_POST'])) ? $this->_rootref['U_NEWEST_POST'] : ''; ?>


Если Вы хотите просмотреть тему, перейдите по следующей ссылке:
<?php echo (isset($this->_rootref['U_TOPIC'])) ? $this->_rootref['U_TOPIC'] : ''; ?>


Если Вы хотите просмотреть форум, перейдите по следующей ссылке:
<?php echo (isset($this->_rootref['U_FORUM'])) ? $this->_rootref['U_FORUM'] : ''; ?>


Если Вы больше не хотите следить за форумом, то либо щелкните по находящейся в нем ссылке «Отписаться от форума», либо перейдите по следующей ссылке:

<?php echo (isset($this->_rootref['U_STOP_WATCHING_FORUM'])) ? $this->_rootref['U_STOP_WATCHING_FORUM'] : ''; ?>


<?php echo (isset($this->_rootref['EMAIL_SIG'])) ? $this->_rootref['EMAIL_SIG'] : ''; ?>