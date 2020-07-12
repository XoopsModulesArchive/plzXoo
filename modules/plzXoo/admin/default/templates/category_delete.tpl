<h2><?php echo  _MD_A_PLZXOO_MESSAGE_CONFIRM_DELETE ?></h2>
<p>
	<?php echo  _MD_A_PLZXOO_MESSAGE_DELETE_CATEGORY ?>
</p>

<form method="POST">
<table class="outer">
	<?php echo  $template['editform']->ticket_->makeHTMLhidden() ?>
	<tr>
		<td class='head' nowrap><?php echo  _MD_A_PLZXOO_LANG_CID ?></td>
		<td class='odd'><?php echo  $template['obj']->getVar('cid') ?></td>
	</tr>
	<tr>
		<td class='head'><?php echo  _MD_A_PLZXOO_LANG_NAME ?></td>
		<td class='even'><?php echo  $template['obj']->getVar('name') ?></td>
	</tr>
	<tr>
		<td class='head'><?php echo  _MD_A_PLZXOO_LANG_DESCRIPTION ?></td>
		<td class='odd'><?php echo  $template['obj']->getVar('description') ?></td>
	</tr>
	<tr>
		<td class='head'><?php echo  _MD_A_PLZXOO_LANG_SIZE ?></td>
		<td class='odd'><?php echo  $template['obj']->getVar('size') ?></td>
	</tr>
	<tr>
		<td class='head'><?php echo  _MD_A_PLZXOO_LANG_WEIGHT ?></td>
		<td class='odd'><?php echo  $template['obj']->getVar('weight') ?></td>
	</tr>
	<tr>
		<td class='head'><?php echo  _MD_A_PLZXOO_LANG_CONTROL ?></td>
		<td class='even'><input type='submit' value='<?php echo  _MD_A_PLZXOO_LANG_EXECUTE ?>'></td>
	</tr>
</table>
</form>
