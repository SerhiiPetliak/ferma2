<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>


<h1><?php echo ((isset($this->_rootref['L_ALTT_TITLE'])) ? $this->_rootref['L_ALTT_TITLE'] : ((isset($user->lang['ALTT_TITLE'])) ? $user->lang['ALTT_TITLE'] : '{ ALTT_TITLE }')); ?></h1><?php if ($this->_rootref['ALTT_VERSION']) {  ?><p><?php echo (isset($this->_rootref['ALTT_VERSION'])) ? $this->_rootref['ALTT_VERSION'] : ''; ?></p><?php } ?>


<form id="acp_board" method="post" action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">
	<fieldset>
		<dl>
			<dt><label for="altt_char_limit"><?php echo ((isset($this->_rootref['L_ALTT_CHAR_LIMIT'])) ? $this->_rootref['L_ALTT_CHAR_LIMIT'] : ((isset($user->lang['ALTT_CHAR_LIMIT'])) ? $user->lang['ALTT_CHAR_LIMIT'] : '{ ALTT_CHAR_LIMIT }')); ?>:</label><br />
			<span><?php echo ((isset($this->_rootref['L_ALTT_CHAR_LIMIT_EXP'])) ? $this->_rootref['L_ALTT_CHAR_LIMIT_EXP'] : ((isset($user->lang['ALTT_CHAR_LIMIT_EXP'])) ? $user->lang['ALTT_CHAR_LIMIT_EXP'] : '{ ALTT_CHAR_LIMIT_EXP }')); ?></span></dt>
			<dd><input type="text" name="altt_char_limit" size="6" value="<?php echo (isset($this->_rootref['ALTT_CHAR_LIMIT'])) ? $this->_rootref['ALTT_CHAR_LIMIT'] : ''; ?>" /></dd>
		</dl>
		<dl>
			<dt><label for="altt_link_name"><?php echo ((isset($this->_rootref['L_ALTT_LINK_NAME'])) ? $this->_rootref['L_ALTT_LINK_NAME'] : ((isset($user->lang['ALTT_LINK_NAME'])) ? $user->lang['ALTT_LINK_NAME'] : '{ ALTT_LINK_NAME }')); ?>:</label></dt>
			<dd><input type="radio" class="radio" name="altt_link_name" value="1" <?php if ($this->_rootref['ALTT_LINK_NAME']) {  ?>checked="checked"<?php } ?> /><span style="font-weight: bold;">&nbsp;<?php echo ((isset($this->_rootref['L_ALTT_TOPIC'])) ? $this->_rootref['L_ALTT_TOPIC'] : ((isset($user->lang['ALTT_TOPIC'])) ? $user->lang['ALTT_TOPIC'] : '{ ALTT_TOPIC }')); ?></span></dd>
			<dd><input type="radio" class="radio" name="altt_link_name" value="0" <?php if (! $this->_rootref['ALTT_LINK_NAME']) {  ?>checked="checked"<?php } ?> /><span style="font-weight: bold;">&nbsp;<?php echo ((isset($this->_rootref['L_ALTT_POST'])) ? $this->_rootref['L_ALTT_POST'] : ((isset($user->lang['ALTT_POST'])) ? $user->lang['ALTT_POST'] : '{ ALTT_POST }')); ?></span></dd>
		</dl>
		<dl>
			<dt><label for="altt_link_url"><?php echo ((isset($this->_rootref['L_ALTT_LINK_URL'])) ? $this->_rootref['L_ALTT_LINK_URL'] : ((isset($user->lang['ALTT_LINK_URL'])) ? $user->lang['ALTT_LINK_URL'] : '{ ALTT_LINK_URL }')); ?>:</label></dt>
			<dd><input type="radio" class="radio" name="altt_link_url" value="1" <?php if ($this->_rootref['ALTT_LINK_URL'] == (1)) {  ?>checked="checked"<?php } ?> /><span style="font-weight: bold;">&nbsp;<?php echo ((isset($this->_rootref['L_ALTT_FIRST_POST'])) ? $this->_rootref['L_ALTT_FIRST_POST'] : ((isset($user->lang['ALTT_FIRST_POST'])) ? $user->lang['ALTT_FIRST_POST'] : '{ ALTT_FIRST_POST }')); ?></span></dd>
			<dd><input type="radio" class="radio" name="altt_link_url" value="0" <?php if ($this->_rootref['ALTT_LINK_URL'] == 0) {  ?>checked="checked"<?php } ?> /><span style="font-weight: bold;">&nbsp;<?php echo ((isset($this->_rootref['L_ALTT_LAST_POST'])) ? $this->_rootref['L_ALTT_LAST_POST'] : ((isset($user->lang['ALTT_LAST_POST'])) ? $user->lang['ALTT_LAST_POST'] : '{ ALTT_LAST_POST }')); ?></span></dd>
			<dd><input type="radio" class="radio" name="altt_link_url" value="2" <?php if ($this->_rootref['ALTT_LINK_URL'] == (2)) {  ?>checked="checked"<?php } ?> /><span style="font-weight: bold;">&nbsp;<?php echo ((isset($this->_rootref['L_ALTT_FIRST_UNREAD_POST'])) ? $this->_rootref['L_ALTT_FIRST_UNREAD_POST'] : ((isset($user->lang['ALTT_FIRST_UNREAD_POST'])) ? $user->lang['ALTT_FIRST_UNREAD_POST'] : '{ ALTT_FIRST_UNREAD_POST }')); ?></span><br /><?php echo ((isset($this->_rootref['L_ALTT_FIRST_UNREAD_POST_NOTE'])) ? $this->_rootref['L_ALTT_FIRST_UNREAD_POST_NOTE'] : ((isset($user->lang['ALTT_FIRST_UNREAD_POST_NOTE'])) ? $user->lang['ALTT_FIRST_UNREAD_POST_NOTE'] : '{ ALTT_FIRST_UNREAD_POST_NOTE }')); ?></dd>
		</dl>
		<dl>
			<dt><label for="altt_style"><?php echo ((isset($this->_rootref['L_ALTT_LINK_STYLE'])) ? $this->_rootref['L_ALTT_LINK_STYLE'] : ((isset($user->lang['ALTT_LINK_STYLE'])) ? $user->lang['ALTT_LINK_STYLE'] : '{ ALTT_LINK_STYLE }')); ?>:</label></dt>
			<dd><input id="altt_style" name="altt_style_bold" class="radio" type="checkbox" value="1" <?php if ($this->_rootref['ALTT_STYLE_BOLD']) {  ?>checked="checked"<?php } ?> /><span style="font-weight: bold;">&nbsp;<?php echo ((isset($this->_rootref['L_ALTT_BOLD'])) ? $this->_rootref['L_ALTT_BOLD'] : ((isset($user->lang['ALTT_BOLD'])) ? $user->lang['ALTT_BOLD'] : '{ ALTT_BOLD }')); ?></span></dd>
			<dd><input id="altt_style" name="altt_style_italic" class="radio" type="checkbox" value="1" <?php if ($this->_rootref['ALTT_STYLE_ITALIC']) {  ?>checked="checked"<?php } ?> /><span style="font-weight: bold;">&nbsp;<?php echo ((isset($this->_rootref['L_ALTT_ITALIC'])) ? $this->_rootref['L_ALTT_ITALIC'] : ((isset($user->lang['ALTT_ITALIC'])) ? $user->lang['ALTT_ITALIC'] : '{ ALTT_ITALIC }')); ?></span></dd>
			<dd><input id="altt_style" name="altt_style_adv" class="radio" type="checkbox" value="1" <?php if ($this->_rootref['ALTT_STYLE_ADV']) {  ?>checked="checked"<?php } ?> /><span style="font-weight: bold;">&nbsp;<?php echo ((isset($this->_rootref['L_ALTT_ADV'])) ? $this->_rootref['L_ALTT_ADV'] : ((isset($user->lang['ALTT_ADV'])) ? $user->lang['ALTT_ADV'] : '{ ALTT_ADV }')); ?></span>&nbsp;<input type="text" name="altt_style_adv2" size="32" maxlength="255" value="<?php echo (isset($this->_rootref['ALTT_STYLE_ADV2'])) ? $this->_rootref['ALTT_STYLE_ADV2'] : ''; ?>" /></dd>
		</dl>
		<dl>
			<dt><label for="altt_active"><?php echo ((isset($this->_rootref['L_ALTT_IGNORE_RIGHTS'])) ? $this->_rootref['L_ALTT_IGNORE_RIGHTS'] : ((isset($user->lang['ALTT_IGNORE_RIGHTS'])) ? $user->lang['ALTT_IGNORE_RIGHTS'] : '{ ALTT_IGNORE_RIGHTS }')); ?>:</label><br />
			<span><?php echo ((isset($this->_rootref['L_ALTT_IGNORE_RIGHTS_EXP'])) ? $this->_rootref['L_ALTT_IGNORE_RIGHTS_EXP'] : ((isset($user->lang['ALTT_IGNORE_RIGHTS_EXP'])) ? $user->lang['ALTT_IGNORE_RIGHTS_EXP'] : '{ ALTT_IGNORE_RIGHTS_EXP }')); ?></span></dt>
			<dd><input type="radio" class="radio" name="altt_ignore_rights" value="1" <?php if ($this->_rootref['ALTT_IGNORE_RIGHTS']) {  ?>checked="checked"<?php } ?>/> <?php echo ((isset($this->_rootref['L_YES'])) ? $this->_rootref['L_YES'] : ((isset($user->lang['YES'])) ? $user->lang['YES'] : '{ YES }')); ?> &nbsp; 
				<input type="radio" class="radio" name="altt_ignore_rights" value="0" <?php if (! $this->_rootref['ALTT_IGNORE_RIGHTS']) {  ?>checked="checked"<?php } ?> /> <?php echo ((isset($this->_rootref['L_NO'])) ? $this->_rootref['L_NO'] : ((isset($user->lang['NO'])) ? $user->lang['NO'] : '{ NO }')); ?></dd>
		</dl>
		<dl>
			<dt><label for="altt_active"><?php echo ((isset($this->_rootref['L_ALTT_IGNORE_PASSWORD'])) ? $this->_rootref['L_ALTT_IGNORE_PASSWORD'] : ((isset($user->lang['ALTT_IGNORE_PASSWORD'])) ? $user->lang['ALTT_IGNORE_PASSWORD'] : '{ ALTT_IGNORE_PASSWORD }')); ?>:</label><br />
			<span><?php echo ((isset($this->_rootref['L_ALTT_IGNORE_PASSWORD_EXP'])) ? $this->_rootref['L_ALTT_IGNORE_PASSWORD_EXP'] : ((isset($user->lang['ALTT_IGNORE_PASSWORD_EXP'])) ? $user->lang['ALTT_IGNORE_PASSWORD_EXP'] : '{ ALTT_IGNORE_PASSWORD_EXP }')); ?></span></dt>
			<dd><input type="radio" class="radio" name="altt_ignore_password" value="1" <?php if ($this->_rootref['ALTT_IGNORE_PASSWORD']) {  ?>checked="checked"<?php } ?>/> <?php echo ((isset($this->_rootref['L_YES'])) ? $this->_rootref['L_YES'] : ((isset($user->lang['YES'])) ? $user->lang['YES'] : '{ YES }')); ?> &nbsp; 
				<input type="radio" class="radio" name="altt_ignore_password" value="0" <?php if (! $this->_rootref['ALTT_IGNORE_PASSWORD']) {  ?>checked="checked"<?php } ?> /> <?php echo ((isset($this->_rootref['L_NO'])) ? $this->_rootref['L_NO'] : ((isset($user->lang['NO'])) ? $user->lang['NO'] : '{ NO }')); ?></dd>
		</dl>
		<dl>
			<dt><label for="altt_active"><?php echo ((isset($this->_rootref['L_ALTT_ACTIVE'])) ? $this->_rootref['L_ALTT_ACTIVE'] : ((isset($user->lang['ALTT_ACTIVE'])) ? $user->lang['ALTT_ACTIVE'] : '{ ALTT_ACTIVE }')); ?>:</label></dt>
			<dd><input type="radio" class="radio" name="altt_active" value="1" <?php if ($this->_rootref['ALTT_ACTIVE']) {  ?>checked="checked"<?php } ?>/> <?php echo ((isset($this->_rootref['L_YES'])) ? $this->_rootref['L_YES'] : ((isset($user->lang['YES'])) ? $user->lang['YES'] : '{ YES }')); ?> &nbsp; 
				<input type="radio" class="radio" name="altt_active" value="0" <?php if (! $this->_rootref['ALTT_ACTIVE']) {  ?>checked="checked"<?php } ?> /> <?php echo ((isset($this->_rootref['L_NO'])) ? $this->_rootref['L_NO'] : ((isset($user->lang['NO'])) ? $user->lang['NO'] : '{ NO }')); ?></dd>
		</dl>
		<p class="submit-buttons">
			<input class="button1" type="submit" id="submit" name="submit" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" />&nbsp;
			<input class="button2" type="reset" id="reset" name="reset" value="<?php echo ((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?>" />
		</p>
	<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

	</fieldset>
</form>
<?php $this->_tpl_include('overall_footer.html'); ?>