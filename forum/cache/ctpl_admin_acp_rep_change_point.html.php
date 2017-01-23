<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>


<a name="maincontent"></a>



<h1><?php echo ((isset($this->_rootref['L_ACP_RP_POINTS'])) ? $this->_rootref['L_ACP_RP_POINTS'] : ((isset($user->lang['ACP_RP_POINTS'])) ? $user->lang['ACP_RP_POINTS'] : '{ ACP_RP_POINTS }')); ?></h1>

<form id="acp_change_point" method="post" action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">

<fieldset>
<dl>
	<dt><label for="usernames"><?php echo ((isset($this->_rootref['L_USERNAMES'])) ? $this->_rootref['L_USERNAMES'] : ((isset($user->lang['USERNAMES'])) ? $user->lang['USERNAMES'] : '{ USERNAMES }')); ?>:</label></dt>
	<dd><textarea name="usernames" cols="40" rows="3" id="usernames"></textarea></dd>
	<dd>[ <a href="<?php echo (isset($this->_rootref['U_FIND_USERNAME'])) ? $this->_rootref['U_FIND_USERNAME'] : ''; ?>" onclick="find_username(this.href); return false;"><?php echo ((isset($this->_rootref['L_FIND_USERNAME'])) ? $this->_rootref['L_FIND_USERNAME'] : ((isset($user->lang['FIND_USERNAME'])) ? $user->lang['FIND_USERNAME'] : '{ FIND_USERNAME }')); ?></a> ]</dd>
	
</dl>

	<dt></dt>
	<dd><select id="action" name="action"><option value="add"><?php echo ((isset($this->_rootref['L_RP_ADD'])) ? $this->_rootref['L_RP_ADD'] : ((isset($user->lang['RP_ADD'])) ? $user->lang['RP_ADD'] : '{ RP_ADD }')); ?></option><option value="subtract"><?php echo ((isset($this->_rootref['L_RP_SUBTRACT'])) ? $this->_rootref['L_RP_SUBTRACT'] : ((isset($user->lang['RP_SUBTRACT'])) ? $user->lang['RP_SUBTRACT'] : '{ RP_SUBTRACT }')); ?></option><option value="alter"><?php echo ((isset($this->_rootref['L_RP_CHANGE'])) ? $this->_rootref['L_RP_CHANGE'] : ((isset($user->lang['RP_CHANGE'])) ? $user->lang['RP_CHANGE'] : '{ RP_CHANGE }')); ?></option></select> <input name="point" type="text" class="text small" maxlength="100" id="point" /> <?php echo ((isset($this->_rootref['L_RP_POINTS'])) ? $this->_rootref['L_RP_POINTS'] : ((isset($user->lang['RP_POINTS'])) ? $user->lang['RP_POINTS'] : '{ RP_POINTS }')); ?></dd>
</dl>


<p class="submit-buttons">
	<input class="button1" type="submit" id="submit" name="submit" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" />&nbsp;
	<input class="button2" type="reset" id="reset" name="reset" value="<?php echo ((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?>" />
</p>
<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

</fieldset>
</form>

<?php $this->_tpl_include('overall_footer.html'); ?>