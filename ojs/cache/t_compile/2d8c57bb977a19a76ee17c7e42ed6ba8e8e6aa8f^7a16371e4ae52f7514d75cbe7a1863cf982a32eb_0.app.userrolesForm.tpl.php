<?php
/* Smarty version 4.5.5, created on 2025-08-04 22:04:21
  from 'app:userrolesForm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68912055917fb9_81899127',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a16371e4ae52f7514d75cbe7a1863cf982a32eb' => 
    array (
      0 => 'app:userrolesForm.tpl',
      1 => 1752100232,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
    'app:controllers/notification/inPlaceNotification.tpl' => 1,
    'app:user/userGroups.tpl' => 1,
  ),
),false)) {
function content_68912055917fb9_81899127 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
	$(function() {
		// Attach the form handler.
		$('#rolesForm').pkpHandler('$.pkp.controllers.form.AjaxFormHandler');
	});
<?php echo '</script'; ?>
>

<form class="pkp_form" id="rolesForm" method="post" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('op'=>"saveRoles"),$_smarty_tpl ) );?>
" enctype="multipart/form-data">
	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['csrf'][0], array( array(),$_smarty_tpl ) );?>


	<?php $_smarty_tpl->_subTemplateRender("app:controllers/notification/inPlaceNotification.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('notificationId'=>"rolesFormNotification"), 0, false);
?>

	<?php $_smarty_tpl->_subTemplateRender("app:user/userGroups.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<p>
		<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', "privacyUrl", null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('router'=>PKP\core\PKPApplication::ROUTE_PAGE,'page'=>"about",'op'=>"privacy"),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"user.privacyLink",'privacyUrl'=>$_smarty_tpl->tpl_vars['privacyUrl']->value),$_smarty_tpl ) );?>

	</p>

	<p><span class="formRequired"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.requiredField"),$_smarty_tpl ) );?>
</span></p>

	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fbvFormButtons'][0], array( array('hideCancel'=>true,'submitText'=>"common.save"),$_smarty_tpl ) );?>

</form>
<?php }
}
