<?php
/* Smarty version 4.5.5, created on 2025-07-28 20:45:33
  from 'app:statsusers.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6887d35d78f775_15951551',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'eb49efdba8393e06994883a5537056cc22d0c5ed' => 
    array (
      0 => 'app:statsusers.tpl',
      1 => 1752100232,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6887d35d78f775_15951551 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7228780666887d35d77a246_92524344', "page");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layouts/backend.tpl");
}
/* {block "page"} */
class Block_7228780666887d35d77a246_92524344 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page' => 
  array (
    0 => 'Block_7228780666887d35d77a246_92524344',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<div class="pkpStats">
		<div class="pkpStats__panel">
			<pkp-header>
				<h1 id="usersTableLabel" class="pkpHeader__title"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.statistics.statistics.registeredUsers"),$_smarty_tpl ) );?>
</h1>
				<template #actions>
					<pkp-button ref="exportButton" @click="openExportModal">
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.export"),$_smarty_tpl ) );?>

					</pkp-button>
				</template>
			</pkp-header>
			<pkp-table labelled-by="usersTableLabel">
				<table-header>
					<table-column><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.name"),$_smarty_tpl ) );?>
</table-column>
					<table-column><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"stats.total"),$_smarty_tpl ) );?>
</table-column>
				</table-header>
				<table-body>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['userStats']->value, 'row');
$_smarty_tpl->tpl_vars['row']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['row']->value) {
$_smarty_tpl->tpl_vars['row']->do_else = false;
?>
						<table-row>
							<table-cell><?php echo $_smarty_tpl->tpl_vars['row']->value['name'];?>
</table-cell>
							<table-cell><?php echo $_smarty_tpl->tpl_vars['row']->value['value'];?>
</table-cell>
						</table-row>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
				</table-body>
			</pkp-table>
		</div>
	</div>
<?php
}
}
/* {/block "page"} */
}
