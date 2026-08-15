<?php
/* Smarty version 4.5.5, created on 2025-07-27 12:58:08
  from 'app:userapiProfileForm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68861450ae7a96_75924408',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6923fba42782e92b2f3ffe1abb54fb4eecfb0358' => 
    array (
      0 => 'app:userapiProfileForm.tpl',
      1 => 1752100232,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
    'app:controllers/notification/inPlaceNotification.tpl' => 1,
  ),
),false)) {
function content_68861450ae7a96_75924408 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
	$(function() {
		// Attach the form handler.
		$('#apiProfileForm').pkpHandler('$.pkp.controllers.form.AjaxFormHandler');
	});
<?php echo '</script'; ?>
>

<form class="pkp_form" id="apiProfileForm" method="post" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('op'=>"saveAPIProfile"),$_smarty_tpl ) );?>
" enctype="multipart/form-data">
	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['csrf'][0], array( array(),$_smarty_tpl ) );?>


	<?php $_smarty_tpl->_subTemplateRender("app:controllers/notification/inPlaceNotification.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('notificationId'=>"apiProfileNotification"), 0, false);
?>

	<?php $_block_plugin1 = isset($_smarty_tpl->smarty->registered_plugins['block']['fbvFormSection'][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['fbvFormSection'][0] : null;
if (!is_callable($_block_plugin1)) {
throw new SmartyException('block tag \'fbvFormSection\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('fbvFormSection', array('title'=>"user.apiKey"));
$_block_repeat=true;
echo $_block_plugin1(array('title'=>"user.apiKey"), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
		<?php if (!$_smarty_tpl->tpl_vars['apiKey']->value) {
$_smarty_tpl->_assignInScope('apiKey', call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'translate' ][ 0 ], array( "common.none" )));
}?>
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fbvElement'][0], array( array('id'=>'apiKey','type'=>"text",'readonly'=>"true",'inline'=>true,'value'=>$_smarty_tpl->tpl_vars['apiKey']->value,'size'=>$_smarty_tpl->tpl_vars['fbvStyles']->value['size']['MEDIUM']),$_smarty_tpl ) );?>

		<?php if (!$_smarty_tpl->tpl_vars['apiSecretMissing']->value) {?>
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fbvElement'][0], array( array('id'=>'apiKeyAction','type'=>"hidden",'readonly'=>"true",'value'=>$_smarty_tpl->tpl_vars['apiKeyAction']->value),$_smarty_tpl ) );?>

			<button
				type="submit"
				<?php if ($_smarty_tpl->tpl_vars['apiKeyAction']->value === \PKP\user\form\APIProfileForm::API_KEY_DELETE) {?>
					onClick="return confirm(<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'json_encode' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>'user.apiKey.remove.confirmation.message'),$_smarty_tpl ) ) )) ));?>
)"
					class="pkpButton pkp_button_offset"
				<?php } else { ?>
					class="pkp_button pkp_button_primary"
				<?php }?>
			>
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>$_smarty_tpl->tpl_vars['apiKeyActionTextKey']->value),$_smarty_tpl ) );?>

			</button>
		<?php }?>
		<p>
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>$_smarty_tpl->tpl_vars['apiKeyAction']->value === \PKP\user\form\APIProfileForm::API_KEY_NEW ? "user.apiKey.generateWarning" : "user.apiKey.removeWarning"),$_smarty_tpl ) );?>

		</p>
	<?php $_block_repeat=false;
echo $_block_plugin1(array('title'=>"user.apiKey"), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

	<p>
		<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', "privacyUrl", null);?>
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('router'=>PKP\core\PKPApplication::ROUTE_PAGE,'page'=>"about",'op'=>"privacy"),$_smarty_tpl ) );?>

		<?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"user.privacyLink",'privacyUrl'=>$_smarty_tpl->tpl_vars['privacyUrl']->value),$_smarty_tpl ) );?>

	</p>
</form>
<?php }
}
