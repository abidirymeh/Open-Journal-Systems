<?php
/* Smarty version 4.5.5, created on 2025-08-04 22:04:22
  from 'app:useruserGroupSelfRegistration.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_689120567fdda3_01283853',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '799a9abe47fe49705e3066df48e675dad1d05851' => 
    array (
      0 => 'app:useruserGroupSelfRegistration.tpl',
      1 => 1752100232,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_689120567fdda3_01283853 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_assignInScope('contextId', $_smarty_tpl->tpl_vars['context']->value->getId());
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['readerUserGroups']->value[$_smarty_tpl->tpl_vars['contextId']->value], 'userGroup');
$_smarty_tpl->tpl_vars['userGroup']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['userGroup']->value) {
$_smarty_tpl->tpl_vars['userGroup']->do_else = false;
?>
	<?php $_smarty_tpl->_assignInScope('userGroupId', $_smarty_tpl->tpl_vars['userGroup']->value->id);?>
	<?php if (in_array($_smarty_tpl->tpl_vars['userGroup']->value->id,$_smarty_tpl->tpl_vars['userGroupIds']->value)) {?>
		<?php $_smarty_tpl->_assignInScope('checked', true);?>
	<?php } else { ?>
		<?php $_smarty_tpl->_assignInScope('checked', false);?>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['userGroup']->value->permitSelfRegistration) {?>
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fbvElement'][0], array( array('type'=>"checkbox",'id'=>"readerGroup-".((string)$_smarty_tpl->tpl_vars['userGroupId']->value),'name'=>"readerGroup[".((string)$_smarty_tpl->tpl_vars['userGroupId']->value)."]",'checked'=>$_smarty_tpl->tpl_vars['checked']->value,'label'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['userGroup']->value->getLocalizedData('name') )),'translate'=>false),$_smarty_tpl ) );?>

	<?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['authorUserGroups']->value[$_smarty_tpl->tpl_vars['contextId']->value], 'userGroup');
$_smarty_tpl->tpl_vars['userGroup']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['userGroup']->value) {
$_smarty_tpl->tpl_vars['userGroup']->do_else = false;
?>
	<?php $_smarty_tpl->_assignInScope('userGroupId', $_smarty_tpl->tpl_vars['userGroup']->value->id);?>
	<?php if (in_array($_smarty_tpl->tpl_vars['userGroup']->value->id,$_smarty_tpl->tpl_vars['userGroupIds']->value)) {?>
		<?php $_smarty_tpl->_assignInScope('checked', true);?>
	<?php } else { ?>
		<?php $_smarty_tpl->_assignInScope('checked', false);?>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['userGroup']->value->permitSelfRegistration) {?>
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fbvElement'][0], array( array('type'=>"checkbox",'id'=>"authorGroup-".((string)$_smarty_tpl->tpl_vars['userGroupId']->value),'name'=>"authorGroup[".((string)$_smarty_tpl->tpl_vars['userGroupId']->value)."]",'checked'=>$_smarty_tpl->tpl_vars['checked']->value,'label'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['userGroup']->value->getLocalizedData('name') )),'translate'=>false),$_smarty_tpl ) );?>

	<?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reviewerUserGroups']->value[$_smarty_tpl->tpl_vars['contextId']->value], 'userGroup');
$_smarty_tpl->tpl_vars['userGroup']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['userGroup']->value) {
$_smarty_tpl->tpl_vars['userGroup']->do_else = false;
?>
	<?php $_smarty_tpl->_assignInScope('userGroupId', $_smarty_tpl->tpl_vars['userGroup']->value->id);?>
	<?php if (in_array($_smarty_tpl->tpl_vars['userGroup']->value->id,$_smarty_tpl->tpl_vars['userGroupIds']->value)) {?>
		<?php $_smarty_tpl->_assignInScope('checked', true);?>
	<?php } else { ?>
		<?php $_smarty_tpl->_assignInScope('checked', false);?>
	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['userGroup']->value->permitSelfRegistration) {?>
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fbvElement'][0], array( array('type'=>"checkbox",'id'=>"reviewerGroup-".((string)$_smarty_tpl->tpl_vars['userGroupId']->value),'name'=>"reviewerGroup[".((string)$_smarty_tpl->tpl_vars['userGroupId']->value)."]",'checked'=>$_smarty_tpl->tpl_vars['checked']->value,'label'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['userGroup']->value->getLocalizedData('name') )),'translate'=>false),$_smarty_tpl ) );?>

	<?php }
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}
}
