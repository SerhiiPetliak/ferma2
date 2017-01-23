<?php if (!defined('IN_PHPBB')) exit; $this->_tpl_include('overall_header.html'); ?>


<a name="maincontent"></a>

<?php if ($this->_rootref['S_EDIT']) {  ?>


	<a href="<?php echo (isset($this->_rootref['U_BACK'])) ? $this->_rootref['U_BACK'] : ''; ?>" style="float: <?php echo (isset($this->_rootref['S_CONTENT_FLOW_END'])) ? $this->_rootref['S_CONTENT_FLOW_END'] : ''; ?>;">&laquo; <?php echo ((isset($this->_rootref['L_BACK'])) ? $this->_rootref['L_BACK'] : ((isset($user->lang['BACK'])) ? $user->lang['BACK'] : '{ BACK }')); ?></a>

	<h1><?php echo ((isset($this->_rootref['L_ACP_RP_RANKS'])) ? $this->_rootref['L_ACP_RP_RANKS'] : ((isset($user->lang['ACP_RP_RANKS'])) ? $user->lang['ACP_RP_RANKS'] : '{ ACP_RP_RANKS }')); ?></h1>

	<p><?php echo ((isset($this->_rootref['L_ACP_REP_RANKS_EXPLAIN'])) ? $this->_rootref['L_ACP_REP_RANKS_EXPLAIN'] : ((isset($user->lang['ACP_REP_RANKS_EXPLAIN'])) ? $user->lang['ACP_REP_RANKS_EXPLAIN'] : '{ ACP_REP_RANKS_EXPLAIN }')); ?></p>

	<form id="acp_rep_ranks" method="post" action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">
	
	<fieldset>
		<legend><?php echo ((isset($this->_rootref['L_ACP_RANKS'])) ? $this->_rootref['L_ACP_RANKS'] : ((isset($user->lang['ACP_RANKS'])) ? $user->lang['ACP_RANKS'] : '{ ACP_RANKS }')); ?></legend>
	<dl>
		<dt><label for="title"><?php echo ((isset($this->_rootref['L_RP_RANK_TITLE'])) ? $this->_rootref['L_RP_RANK_TITLE'] : ((isset($user->lang['RP_RANK_TITLE'])) ? $user->lang['RP_RANK_TITLE'] : '{ RP_RANK_TITLE }')); ?>:</label></dt>
		<dd><input name="title" type="text" id="title" value="<?php echo (isset($this->_rootref['RANK_TITLE'])) ? $this->_rootref['RANK_TITLE'] : ''; ?>" maxlength="255" /></dd>
	</dl>
	<dl>
		<dt><label for="min_points"><?php echo ((isset($this->_rootref['L_RP_RANK_MINIMUM'])) ? $this->_rootref['L_RP_RANK_MINIMUM'] : ((isset($user->lang['RP_RANK_MINIMUM'])) ? $user->lang['RP_RANK_MINIMUM'] : '{ RP_RANK_MINIMUM }')); ?>:</label></dt>
		<dd><input name="min_points" type="text" id="min_points" maxlength="10" value="<?php echo (isset($this->_rootref['MIN_POINTS'])) ? $this->_rootref['MIN_POINTS'] : ''; ?>" /></dd>
	</dl>


	<p class="submit-buttons">
		<input type="hidden" name="action" value="save" />

		<input class="button1" type="submit" id="submit" name="submit" value="<?php echo ((isset($this->_rootref['L_SUBMIT'])) ? $this->_rootref['L_SUBMIT'] : ((isset($user->lang['SUBMIT'])) ? $user->lang['SUBMIT'] : '{ SUBMIT }')); ?>" />&nbsp;
		<input class="button2" type="reset" id="reset" name="reset" value="<?php echo ((isset($this->_rootref['L_RESET'])) ? $this->_rootref['L_RESET'] : ((isset($user->lang['RESET'])) ? $user->lang['RESET'] : '{ RESET }')); ?>" />
		<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

	</p>
	</fieldset>
	</form>

<?php } else { ?>


	<h1><?php echo ((isset($this->_rootref['L_ACP_RP_RANKS'])) ? $this->_rootref['L_ACP_RP_RANKS'] : ((isset($user->lang['ACP_RP_RANKS'])) ? $user->lang['ACP_RP_RANKS'] : '{ ACP_RP_RANKS }')); ?></h1>

	<p><?php echo ((isset($this->_rootref['L_ACP_REP_RANKS_EXPLAIN'])) ? $this->_rootref['L_ACP_REP_RANKS_EXPLAIN'] : ((isset($user->lang['ACP_REP_RANKS_EXPLAIN'])) ? $user->lang['ACP_REP_RANKS_EXPLAIN'] : '{ ACP_REP_RANKS_EXPLAIN }')); ?></p>

	<form id="acp_ranks" method="post" action="<?php echo (isset($this->_rootref['U_ACTION'])) ? $this->_rootref['U_ACTION'] : ''; ?>">
	<fieldset class="tabulated">
	<legend><?php echo ((isset($this->_rootref['L_ACP_MANAGE_RANKS'])) ? $this->_rootref['L_ACP_MANAGE_RANKS'] : ((isset($user->lang['ACP_MANAGE_RANKS'])) ? $user->lang['ACP_MANAGE_RANKS'] : '{ ACP_MANAGE_RANKS }')); ?></legend>

	<table cellspacing="1">
	<thead>
	<tr>
		<th><?php echo ((isset($this->_rootref['L_RP_RANK_TITLE'])) ? $this->_rootref['L_RP_RANK_TITLE'] : ((isset($user->lang['RP_RANK_TITLE'])) ? $user->lang['RP_RANK_TITLE'] : '{ RP_RANK_TITLE }')); ?></th>
		<th><?php echo ((isset($this->_rootref['L_RP_RANK_MINIMUM'])) ? $this->_rootref['L_RP_RANK_MINIMUM'] : ((isset($user->lang['RP_RANK_MINIMUM'])) ? $user->lang['RP_RANK_MINIMUM'] : '{ RP_RANK_MINIMUM }')); ?></th>
		<th><?php echo ((isset($this->_rootref['L_ACTION'])) ? $this->_rootref['L_ACTION'] : ((isset($user->lang['ACTION'])) ? $user->lang['ACTION'] : '{ ACTION }')); ?></th>
	</tr>
	</thead>
	<tbody>
	<?php $_ranks_count = (isset($this->_tpldata['ranks'])) ? sizeof($this->_tpldata['ranks']) : 0;if ($_ranks_count) {for ($_ranks_i = 0; $_ranks_i < $_ranks_count; ++$_ranks_i){$_ranks_val = &$this->_tpldata['ranks'][$_ranks_i]; if (!($_ranks_val['S_ROW_COUNT'] & 1)  ) {  ?><tr class="row1"><?php } else { ?><tr class="row2"><?php } ?>

		<td style="text-align: center;"><?php echo $_ranks_val['RANK_TITLE']; ?></td>
		<td style="text-align: center;"><?php if ($_ranks_val['S_SPECIAL_RANK']) {  ?>&nbsp; - &nbsp;<?php } else { echo $_ranks_val['MIN_POINTS']; } ?></td>
		<td style="text-align: center;"><a href="<?php echo $_ranks_val['U_EDIT']; ?>"><?php echo (isset($this->_rootref['ICON_EDIT'])) ? $this->_rootref['ICON_EDIT'] : ''; ?></a> <a href="<?php echo $_ranks_val['U_DELETE']; ?>"><?php echo (isset($this->_rootref['ICON_DELETE'])) ? $this->_rootref['ICON_DELETE'] : ''; ?></a></td>
	</tr>
	<?php }} ?>

	</tbody>
	</table>

	<p class="quick">
		<input class="button2" name="add" type="submit" value="<?php echo ((isset($this->_rootref['L_RP_ADD_RANK'])) ? $this->_rootref['L_RP_ADD_RANK'] : ((isset($user->lang['RP_ADD_RANK'])) ? $user->lang['RP_ADD_RANK'] : '{ RP_ADD_RANK }')); ?>" />
		<?php echo (isset($this->_rootref['S_FORM_TOKEN'])) ? $this->_rootref['S_FORM_TOKEN'] : ''; ?>

	</p>
	</fieldset>
	</form>

<?php } $this->_tpl_include('overall_footer.html'); ?>