<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('simple_header.html'); ?>

<div id="pageheader">
	<h2><a class="titles" href="<?php echo (isset($this->_rootref['U_USER'])) ? $this->_rootref['U_USER'] : ''; ?>"><?php echo (isset($this->_rootref['USERNAME'])) ? $this->_rootref['USERNAME'] : ''; ?></a></h2>

	<p><?php echo ((isset($this->_rootref['L_RP_TOTAL_POINTS'])) ? $this->_rootref['L_RP_TOTAL_POINTS'] : ((isset($user->lang['RP_TOTAL_POINTS'])) ? $user->lang['RP_TOTAL_POINTS'] : '{ RP_TOTAL_POINTS }')); ?>: <?php echo (isset($this->_rootref['TOTAL_POINTS'])) ? $this->_rootref['TOTAL_POINTS'] : ''; ?></p>
</div>

<br clear="all" /><br />
<table class="tablebg" width="100%" cellspacing="1">
<tr>
		<tr>
			<th>&nbsp;</th>
			<th><?php echo ((isset($this->_rootref['L_FROM'])) ? $this->_rootref['L_FROM'] : ((isset($user->lang['FROM'])) ? $user->lang['FROM'] : '{ FROM }')); ?></th>
			<th><?php echo ((isset($this->_rootref['L_RP_COMMENT'])) ? $this->_rootref['L_RP_COMMENT'] : ((isset($user->lang['RP_COMMENT'])) ? $user->lang['RP_COMMENT'] : '{ RP_COMMENT }')); ?></th>
			<th><?php echo ((isset($this->_rootref['L_POSTS'])) ? $this->_rootref['L_POSTS'] : ((isset($user->lang['POSTS'])) ? $user->lang['POSTS'] : '{ POSTS }')); ?></th>
			<?php if ($this->_rootref['S_MODERATE']) {  ?><th>&nbsp;</th><?php } ?>

		</tr>
	<?php if (sizeof($this->_tpldata['reputation'])) {  $_reputation_count = (isset($this->_tpldata['reputation'])) ? sizeof($this->_tpldata['reputation']) : 0;if ($_reputation_count) {for ($_reputation_i = 0; $_reputation_i < $_reputation_count; ++$_reputation_i){$_reputation_val = &$this->_tpldata['reputation'][$_reputation_i]; if (!($_reputation_val['S_ROW_COUNT'] & 1)  ) {  ?><tr class="row2"><?php } else { ?>	<tr class="row1"><?php } ?>

			<td class="genmed" align="center"><?php echo $_reputation_val['POINT_IMG']; ?></td>
			<td class="genmed"><?php echo $_reputation_val['FROM']; ?><br /><strong>on</strong> <?php echo $_reputation_val['TIME']; ?></td>
			<td class="genmed"><?php echo $_reputation_val['COMMENT']; ?></td>
			<td class="genmed"><a href="<?php echo $_reputation_val['U_POST']; ?>"><?php echo $_reputation_val['POST_SUBJECT']; ?></a></td>
			<?php if ($this->_rootref['S_MODERATE']) {  ?><td><a href="<?php echo $_reputation_val['U_DELETE']; ?>"><img src="<?php echo (isset($this->_rootref['T_IMAGES_PATH'])) ? $this->_rootref['T_IMAGES_PATH'] : ''; ?>reputation/icon_delete.gif"></a></td><?php } ?>

		</tr>
	<?php }} } else { ?>

		<tr class="row2" align="center">
			<td class="genmed" align="center" colspan="<?php if ($this->_rootref['S_MODERATE']) {  ?>5<?php } else { ?>4<?php } ?>"><?php echo ((isset($this->_rootref['L_RP_EMPTY_DATA'])) ? $this->_rootref['L_RP_EMPTY_DATA'] : ((isset($user->lang['RP_EMPTY_DATA'])) ? $user->lang['RP_EMPTY_DATA'] : '{ RP_EMPTY_DATA }')); ?></td>
		</tr>
	<?php } ?>

</table>



<?php if ($this->_rootref['PAGINATION']) {  ?><a href="#" onclick="jumpto(); return false;" title="<?php echo ((isset($this->_rootref['L_JUMP_TO_PAGE'])) ? $this->_rootref['L_JUMP_TO_PAGE'] : ((isset($user->lang['JUMP_TO_PAGE'])) ? $user->lang['JUMP_TO_PAGE'] : '{ JUMP_TO_PAGE }')); ?>"><?php echo (isset($this->_rootref['S_ON_PAGE'])) ? $this->_rootref['S_ON_PAGE'] : ''; ?></a> &bull; <span><?php echo (isset($this->_rootref['PAGINATION'])) ? $this->_rootref['PAGINATION'] : ''; } ?>

<br /><br />
<?php $this->_tpl_include('simple_footer.html'); ?>