<?php
/* Smarty version 4.5.5, created on 2025-08-04 22:04:13
  from 'app:userpublicProfileForm.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6891204df05347_23807176',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3421955854dbc3db10a9b61434d943a03ec7702c' => 
    array (
      0 => 'app:userpublicProfileForm.tpl',
      1 => 1752100232,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
    'app:controllers/notification/inPlaceNotification.tpl' => 1,
    'app:controllers/fileUploadContainer.tpl' => 1,
  ),
),false)) {
function content_6891204df05347_23807176 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="text/javascript">
	$(function() {
		// Attach the form handler.
		$('#publicProfileForm').pkpHandler(
			'$.pkp.controllers.form.FileUploadFormHandler',
			{
				$uploader: $('#plupload'),
				uploaderOptions: {
					uploadUrl: <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'json_encode' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('op'=>"uploadProfileImage",'escape'=>false),$_smarty_tpl ) ) ));?>
,
					baseUrl: <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'json_encode' ][ 0 ], array( $_smarty_tpl->tpl_vars['baseUrl']->value ));?>
,
					filters: {
						mime_types : [
							{ title : "Image files", extensions : "jpg,jpeg,png,gif" }
						]
					},
					multipart_params: {
						csrfToken: <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['csrf'][0], array( array('type'=>"json"),$_smarty_tpl ) );?>

					},
					resize: {
						width: <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['profileImageMaxWidth']->value ));?>
,
						height: <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( $_smarty_tpl->tpl_vars['profileImageMaxHeight']->value ));?>
,
						crop: true,
					}
				}
			}
		);
	});
<?php echo '</script'; ?>
>

<form type="post" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('op'=>"deleteProfileImage"),$_smarty_tpl ) );?>
" id="deleteProfileImageForm">
	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['csrf'][0], array( array(),$_smarty_tpl ) );?>

</form>

<form class="pkp_form" id="publicProfileForm" method="post" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('op'=>"savePublicProfile"),$_smarty_tpl ) );?>
" enctype="multipart/form-data">
	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['csrf'][0], array( array(),$_smarty_tpl ) );?>


	<?php $_smarty_tpl->_subTemplateRender("app:controllers/notification/inPlaceNotification.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('notificationId'=>"publicProfileNotification"), 0, false);
?>

	<?php $_block_plugin1 = isset($_smarty_tpl->smarty->registered_plugins['block']['fbvFormSection'][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['fbvFormSection'][0] : null;
if (!is_callable($_block_plugin1)) {
throw new SmartyException('block tag \'fbvFormSection\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('fbvFormSection', array('title'=>"user.profile.form.profileImage"));
$_block_repeat=true;
echo $_block_plugin1(array('title'=>"user.profile.form.profileImage"), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
		<?php if ($_smarty_tpl->tpl_vars['profileImage']->value) {?>
						<img src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['publicSiteFilesPath']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['profileImage']->value['uploadName'];?>
?<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'uniqid' ][ 0 ], array( '' ));?>
" alt="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"user.profile.form.profileImage"),$_smarty_tpl ) );?>
" />
			<div>
				<button onclick="document.getElementById('deleteProfileImageForm').submit(); return false;" class="pkp_button pkp_button_offset"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.delete"),$_smarty_tpl ) );?>
</button>
			</div>
		<?php }?>
	<?php $_block_repeat=false;
echo $_block_plugin1(array('title'=>"user.profile.form.profileImage"), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>
	<?php $_block_plugin2 = isset($_smarty_tpl->smarty->registered_plugins['block']['fbvFormSection'][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['fbvFormSection'][0] : null;
if (!is_callable($_block_plugin2)) {
throw new SmartyException('block tag \'fbvFormSection\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('fbvFormSection', array());
$_block_repeat=true;
echo $_block_plugin2(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
		<?php $_smarty_tpl->_subTemplateRender("app:controllers/fileUploadContainer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('id'=>"plupload"), 0, false);
?>
	<?php $_block_repeat=false;
echo $_block_plugin2(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

	<?php $_block_plugin3 = isset($_smarty_tpl->smarty->registered_plugins['block']['fbvFormSection'][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['fbvFormSection'][0] : null;
if (!is_callable($_block_plugin3)) {
throw new SmartyException('block tag \'fbvFormSection\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('fbvFormSection', array());
$_block_repeat=true;
echo $_block_plugin3(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fbvElement'][0], array( array('type'=>"textarea",'label'=>"user.biography",'multilingual'=>"true",'name'=>"biography",'id'=>"biography",'rich'=>true,'value'=>$_smarty_tpl->tpl_vars['biography']->value),$_smarty_tpl ) );?>

	<?php $_block_repeat=false;
echo $_block_plugin3(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>
	<?php $_block_plugin4 = isset($_smarty_tpl->smarty->registered_plugins['block']['fbvFormSection'][0]) ? $_smarty_tpl->smarty->registered_plugins['block']['fbvFormSection'][0] : null;
if (!is_callable($_block_plugin4)) {
throw new SmartyException('block tag \'fbvFormSection\' not callable or registered');
}
$_smarty_tpl->smarty->_cache['_tag_stack'][] = array('fbvFormSection', array());
$_block_repeat=true;
echo $_block_plugin4(array(), null, $_smarty_tpl, $_block_repeat);
while ($_block_repeat) {
ob_start();?>
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['fbvElement'][0], array( array('type'=>"text",'label'=>"user.url",'name'=>"userUrl",'id'=>"userUrl",'value'=>$_smarty_tpl->tpl_vars['userUrl']->value,'maxlength'=>"255"),$_smarty_tpl ) );?>

	<?php $_block_repeat=false;
echo $_block_plugin4(array(), ob_get_clean(), $_smarty_tpl, $_block_repeat);
}
array_pop($_smarty_tpl->smarty->_cache['_tag_stack']);?>

	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['call_hook'][0], array( array('name'=>"User::PublicProfile::AdditionalItems"),$_smarty_tpl ) );?>


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
