<?php
/* Smarty version 4.5.5, created on 2025-07-27 18:06:04
  from 'app:dashboardeditors.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68865c7c4216b7_89370028',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '830caeed3aef506466134daddc7ba92cd55e1e9a' => 
    array (
      0 => 'app:dashboardeditors.tpl',
      1 => 1753176677,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68865c7c4216b7_89370028 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_184915841768865c7c41ead1_15803226', "page");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layouts/backend.tpl");
}
/* {block "page"} */
class Block_184915841768865c7c41ead1_15803226 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page' => 
  array (
    0 => 'Block_184915841768865c7c41ead1_15803226',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<dashboard-page v-bind="pageInitConfig" />

<?php
}
}
/* {/block "page"} */
}
