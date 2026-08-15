<?php
/* Smarty version 4.5.5, created on 2025-07-27 19:47:41
  from 'app:managementtoolsimportexport.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6886744d1752f6_14933126',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '05cfa382d9a1905a4b9a0dc48e5de5723a79360b' => 
    array (
      0 => 'app:managementtoolsimportexport.tpl',
      1 => 1752100232,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6886744d1752f6_14933126 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="pkp_page_content pkp_page_importexport_plugins">
	<ul>
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['plugins']->value, 'plugin');
$_smarty_tpl->tpl_vars['plugin']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['plugin']->value) {
$_smarty_tpl->tpl_vars['plugin']->do_else = false;
?>
		<li><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('op'=>"importexport",'path'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'to_array' ][ 0 ], array( "plugin",$_smarty_tpl->tpl_vars['plugin']->value->getName() ))),$_smarty_tpl ) );?>
"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['plugin']->value->getDisplayName() ));?>
</a>:&nbsp;<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['plugin']->value->getDescription() ));?>
</li>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	</ul>
</div>
<?php }
}
