<?php
/* Smarty version 4.5.5, created on 2025-07-27 19:44:29
  from 'app:managementworkflow.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6886738d53f2b0_75036995',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4673846e66bcdae63c2168b2d58f5c6e48515e92' => 
    array (
      0 => 'app:managementworkflow.tpl',
      1 => 1752100232,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6886738d53f2b0_75036995 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3466707116886738d510e55_47470152', "page");
?>

<?php $_smarty_tpl->inheritance->endChild($_smarty_tpl, "layouts/backend.tpl");
}
/* {block "page"} */
class Block_3466707116886738d510e55_47470152 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'page' => 
  array (
    0 => 'Block_3466707116886738d510e55_47470152',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<h1 class="app__pageHeading">
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.workflow.title"),$_smarty_tpl ) );?>

	</h1>

	<?php if ($_smarty_tpl->tpl_vars['currentContext']->value->getData('disableSubmissions')) {?>
		<notification>
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.setup.disableSubmissions.notAccepting"),$_smarty_tpl ) );?>

		</notification>
	<?php }?>

	<tabs :track-history="true">
		<tab id="submission" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.publication.submissionStage"),$_smarty_tpl ) );?>
">
			<tabs :is-side-tabs="true" :track-history="true">
				<tab id="disableSubmissions" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.setup.disableSubmissions"),$_smarty_tpl ) );?>
">
					<pkp-form
						v-bind="components.<?php echo PKP\components\forms\context\PKPDisableSubmissionsForm::FORM_DISABLE_SUBMISSIONS;?>
"
						@set="set"
					/>
				</tab>
				<tab id="instructions" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.setup.workflow.guidance"),$_smarty_tpl ) );?>
">
					<pkp-form
						v-bind="components.submissionGuidanceSettings"
						@set="set"
					/>
				</tab>
				<tab id="metadata" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"submission.informationCenter.metadata"),$_smarty_tpl ) );?>
">
					<pkp-form
						v-bind="components.<?php echo PKP\components\forms\context\PKPMetadataSettingsForm::FORM_METADATA_SETTINGS;?>
"
						@set="set"
					/>
				</tab>
				<tab id="components" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"grid.genres.title.short"),$_smarty_tpl ) );?>
">
					<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'genresUrl', null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('router'=>PKP\core\PKPApplication::ROUTE_COMPONENT,'component'=>"grid.settings.genre.GenreGridHandler",'op'=>"fetchGrid",'escape'=>false),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['load_url_in_div'][0], array( array('id'=>"genresGridContainer",'url'=>$_smarty_tpl->tpl_vars['genresUrl']->value),$_smarty_tpl ) );?>

				</tab>
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['call_hook'][0], array( array('name'=>"Template::Settings::workflow::submission"),$_smarty_tpl ) );?>

			</tabs>
		</tab>
		<?php if ($_smarty_tpl->tpl_vars['hasReviewStage']->value) {?>
			<tab id="review" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.publication.reviewStage"),$_smarty_tpl ) );?>
">
				<tabs :is-side-tabs="true" :track-history="true">
					<tab id="reviewSetup" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"navigation.setup"),$_smarty_tpl ) );?>
">
						<pkp-form
							v-bind="components.<?php echo PKP\components\forms\context\PKPReviewSetupForm::FORM_REVIEW_SETUP;?>
"
							@set="set"
						/>
					</tab>
					<tab id="reviewerGuidance" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.publication.reviewerGuidance"),$_smarty_tpl ) );?>
">
						<pkp-form
							v-bind="components.<?php echo PKP\components\forms\context\PKPReviewGuidanceForm::FORM_REVIEW_GUIDANCE;?>
"
							@set="set"
						/>
					</tab>
					<tab id="reviewForms" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.reviewForms"),$_smarty_tpl ) );?>
">
						<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'reviewFormsUrl', null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('router'=>PKP\core\PKPApplication::ROUTE_COMPONENT,'component'=>"grid.settings.reviewForms.ReviewFormGridHandler",'op'=>"fetchGrid",'escape'=>false),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['load_url_in_div'][0], array( array('id'=>"reviewFormGridContainer",'url'=>$_smarty_tpl->tpl_vars['reviewFormsUrl']->value),$_smarty_tpl ) );?>

					</tab>
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['call_hook'][0], array( array('name'=>"Template::Settings::workflow::review"),$_smarty_tpl ) );?>

				</tabs>
			</tab>
		<?php }?>
		<tab id="library" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.publication.library"),$_smarty_tpl ) );?>
">
			<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'libraryGridUrl', null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('router'=>PKP\core\PKPApplication::ROUTE_COMPONENT,'component'=>"grid.settings.library.LibraryFileAdminGridHandler",'op'=>"fetchGrid",'canEdit'=>true,'escape'=>false),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['load_url_in_div'][0], array( array('id'=>"libraryGridDiv",'url'=>$_smarty_tpl->tpl_vars['libraryGridUrl']->value),$_smarty_tpl ) );?>

		</tab>
		<tab id="emails" label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"manager.publication.emails"),$_smarty_tpl ) );?>
">
			<pkp-form
				v-bind="components.emailSetup"
				@set="set"
			/>
			<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['call_hook'][0], array( array('name'=>"Template::Settings::workflow::emails"),$_smarty_tpl ) );?>

		</tab>
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['call_hook'][0], array( array('name'=>"Template::Settings::workflow"),$_smarty_tpl ) );?>

	</tabs>
<?php
}
}
/* {/block "page"} */
}
