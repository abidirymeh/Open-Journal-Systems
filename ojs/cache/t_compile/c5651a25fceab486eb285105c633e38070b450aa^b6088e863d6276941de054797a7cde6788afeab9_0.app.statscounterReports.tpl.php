<?php
/* Smarty version 4.5.5, created on 2025-07-28 20:47:38
  from 'app:statscounterReports.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6887d3da4080f9_70735737',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b6088e863d6276941de054797a7cde6788afeab9' => 
    array (
      0 => 'app:statscounterReports.tpl',
      1 => 1752100232,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6887d3da4080f9_70735737 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5701644566887d3da406fa3_75719074', "page");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layouts/backend.tpl");
}
/* {block "page"} */
class Block_5701644566887d3da406fa3_75719074 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page' => 
  array (
    0 => 'Block_5701644566887d3da406fa3_75719074',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<counter-reports-page v-bind="pageInitConfig" />
<?php
}
}
/* {/block "page"} */
}
