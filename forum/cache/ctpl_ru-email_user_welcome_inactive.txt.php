<?php if (!defined('IN_PHPBB')) exit; ?>Subject: Добро пожаловать на форум «<?php echo (isset($this->_rootref['SITENAME'])) ? $this->_rootref['SITENAME'] : ''; ?>» — <?php echo (isset($this->_rootref['U_BOARD'])) ? $this->_rootref['U_BOARD'] : ''; ?>


<?php echo (isset($this->_rootref['WELCOME_MSG'])) ? $this->_rootref['WELCOME_MSG'] : ''; ?>


Пожалуйста, сохраните это сообщение. Параметры Вашего аккаунта:

----------------------------
URL форума:       <?php echo (isset($this->_rootref['U_BOARD'])) ? $this->_rootref['U_BOARD'] : ''; ?>

----------------------------

Пожалуйста, кликните по указанной ниже ссылке для активации Вашего аккаунта:

<?php echo (isset($this->_rootref['U_ACTIVATE'])) ? $this->_rootref['U_ACTIVATE'] : ''; ?>


Ваш пароль надёжно сохранен в нашей базе данных и не может быть извлечён из неё. Если Вы забудете свой пароль, то Вы сможете восстановить его, используя e-mail, указанный при регистрации.

Спасибо за регистрацию.

<?php echo (isset($this->_rootref['EMAIL_SIG'])) ? $this->_rootref['EMAIL_SIG'] : ''; ?>