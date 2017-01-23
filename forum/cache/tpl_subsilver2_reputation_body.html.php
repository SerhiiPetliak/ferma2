<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>


<form name="reputation" method="post" action="<?php echo (isset($this->_rootref['U_POST_ACTION'])) ? $this->_rootref['U_POST_ACTION'] : ''; ?>">
<table class="tablebg" width="100%" cellspacing="1" border="0" align="center">
<tr>
	<th><?php echo ((isset($this->_rootref['L_RP_TITLE'])) ? $this->_rootref['L_RP_TITLE'] : ((isset($user->lang['RP_TITLE'])) ? $user->lang['RP_TITLE'] : '{ RP_TITLE }')); ?></th>
</tr>
<tr>
	<td class="row1" align="center">
	<b class="genmed"><?php echo ((isset($this->_rootref['L_RP_COMMENT'])) ? $this->_rootref['L_RP_COMMENT'] : ((isset($user->lang['RP_COMMENT'])) ? $user->lang['RP_COMMENT'] : '{ RP_COMMENT }')); ?>:</b><br />
	<textarea id="comment" name="message" rows="5" cols="50"></textarea>
	<?php if ($this->_rootref['S_GIVE_NEGATIVE']) {  ?>

	<br />
	<span class="genmed"><input type="radio" class="radio" name="point" value="1"<?php if ($this->_rootref['POSITIVE']) {  ?> checked="checked"<?php } ?> checked="checked" /><?php echo ((isset($this->_rootref['L_RP_POSITIVE'])) ? $this->_rootref['L_RP_POSITIVE'] : ((isset($user->lang['RP_POSITIVE'])) ? $user->lang['RP_POSITIVE'] : '{ RP_POSITIVE }')); ?> &nbsp; <input type="radio" class="radio" name="point" value="-1"<?php if (! $this->_rootref['POSITIVE']) {  ?> checked="checked"<?php } ?> /><?php echo ((isset($this->_rootref['L_RP_NEGATIVE'])) ? $this->_rootref['L_RP_NEGATIVE'] : ((isset($user->lang['RP_NEGATIVE'])) ? $user->lang['RP_NEGATIVE'] : '{ RP_NEGATIVE }')); ?></span>
	<?php } else { ?>

	<input type="hidden" name="mode" value="positive" />
	<?php } ?>

	</td>
</tr>
<tr>
	<td class="cat" align="center"><input type="submit" class="btnmain" name="submit" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" /></td>
</tr>
</table>
<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

</form>

<?php $this->_tpl_include('overall_footer.html'); ?>