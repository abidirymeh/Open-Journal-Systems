<?php
/* Smarty version 4.5.5, created on 2025-07-27 19:44:29
  from 'app:managementdistribution.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6886738d0a20e2_53023274',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '307230f58e343f3c2ed648a8e44266d777b2af35' => 
    array (
      0 => 'app:managementdistribution.tpl',
      1 => 1752100232,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6886738d0a20e2_53023274 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13797602496886738d085b47_68666878', "page");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layouts/backend.tpl");
}
/* {block "page"} */
class Block_13797602496886738d085b47_68666878 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page' => 
  array (
    0 => 'Block_13797602496886738d085b47_68666878',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<h1 class="app__pageHeading">
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.distribution.title"),$_smarty_tpl ) );?>

	</h1>

	<?php if ($_smarty_tpl->tpl_vars['currentContext']->value->getData('disableSubmissions')) {?>
		<notification>
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.setup.disableSubmissions.notAccepting"),$_smarty_tpl ) );?>

		</notification>
	<?php }?>

	<tabs :track-history="true">
		<tab id="license" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"submission.license"),$_smarty_tpl ) );?>
">
			<pkp-form
				v-bind="components.<?php echo PKP\components\forms\context\PKPLicenseForm::FORM_LICENSE;?>
"
				@set="set"
			/>
		</tab>
		<tab id="dois" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.dois.title"),$_smarty_tpl ) );?>
">
			<tabs :is-side-tabs="true" :track-history="true">
				<tab id="doisSetup" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.setup.dois.setup"),$_smarty_tpl ) );?>
">
				<doi-setup-settings-form
						v-bind="components.<?php echo PKP\components\forms\context\PKPDoiSetupSettingsForm::FORM_DOI_SETUP_SETTINGS;?>
"
						@set="set"
				/>
				</tab>
				<tab id="doisRegistration" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.setup.dois.registration"),$_smarty_tpl ) );?>
">
					<doi-registration-settings-form
						v-bind="components.<?php echo PKP\components\forms\context\PKPDoiRegistrationSettingsForm::FORM_DOI_REGISTRATION_SETTINGS;?>
"
						@set="set"
					/>
				</tab>
			</tabs>
		</tab>
		<tab id="indexing" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.setup.searchEngineIndexing"),$_smarty_tpl ) );?>
">
			<pkp-form
				v-bind="components.<?php echo PKP\components\forms\context\PKPSearchIndexingForm::FORM_SEARCH_INDEXING;?>
"
				@set="set"
			/>
		</tab>
		<tab id="payments" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.paymentMethod"),$_smarty_tpl ) );?>
">
			<pkp-form
				v-bind="components.<?php echo PKP\components\forms\context\PKPPaymentSettingsForm::FORM_PAYMENT_SETTINGS;?>
"
				@set="set"
			/>
		</tab>
		<?php if ($_smarty_tpl->tpl_vars['displayStatisticsTab']->value) {?>
		<tab id="statistics" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.setup.statistics"),$_smarty_tpl ) );?>
">
			<pkp-form
				v-bind="components.<?php echo PKP\components\forms\context\PKPContextStatisticsForm::FORM_CONTEXT_STATISTICS;?>
"
				@set="set"
			/>
		</tab>
		<?php }?>
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['call_hook'][0], array( array('name'=>"Template::Settings::distribution"),$_smarty_tpl ) );?>

	</tabs>
<?php
}
}
/* {/block "page"} */
}
