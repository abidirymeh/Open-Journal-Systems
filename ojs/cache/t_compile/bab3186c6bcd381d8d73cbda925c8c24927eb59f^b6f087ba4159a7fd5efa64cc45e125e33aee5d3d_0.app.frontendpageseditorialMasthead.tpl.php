<?php
/* Smarty version 4.5.5, created on 2025-07-28 09:26:54
  from 'app:frontendpageseditorialMasthead.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6887344eed0c88_32075662',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b6f087ba4159a7fd5efa64cc45e125e33aee5d3d' => 
    array (
      0 => 'app:frontendpageseditorialMasthead.tpl',
      1 => 1753017076,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
    'app:frontend/components/header.tpl' => 1,
    'app:frontend/components/breadcrumbs.tpl' => 1,
    'app:common/frontend/footer.tpl' => 1,
  ),
),false)) {
function content_6887344eed0c88_32075662 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("app:frontend/components/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>"common.editorialMasthead"), 0, false);
?>

<div id="main-content" class="page page_masthead">
	<?php $_smarty_tpl->_subTemplateRender("app:frontend/components/breadcrumbs.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('currentTitleKey'=>"common.editorialMasthead"), 0, false);
?>

		<div class="page-header">
		<h1><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.editorialMasthead"),$_smarty_tpl ) );?>
</h1>
	</div>
	
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mastheadRoles']->value, 'mastheadRole');
$_smarty_tpl->tpl_vars['mastheadRole']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mastheadRole']->value) {
$_smarty_tpl->tpl_vars['mastheadRole']->do_else = false;
?>
		<?php if (array_key_exists($_smarty_tpl->tpl_vars['mastheadRole']->value->id,$_smarty_tpl->tpl_vars['mastheadUsers']->value)) {?>
			<h2><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['mastheadRole']->value->getLocalizedData('name') ));?>
</h2>
			<ul class="user_listing" role="list">
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['mastheadUsers']->value[$_smarty_tpl->tpl_vars['mastheadRole']->value->id], 'mastheadUser');
$_smarty_tpl->tpl_vars['mastheadUser']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['mastheadUser']->value) {
$_smarty_tpl->tpl_vars['mastheadUser']->do_else = false;
?>
				<li>
					<span class="date_start"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.fromUntil",'from'=>$_smarty_tpl->tpl_vars['mastheadUser']->value['dateStart'],'until'=>''),$_smarty_tpl ) );?>
</span><span class="name"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['mastheadUser']->value['user']->getFullName() ));
if ($_smarty_tpl->tpl_vars['mastheadUser']->value['user']->getData('orcid') && $_smarty_tpl->tpl_vars['mastheadUser']->value['user']->hasVerifiedOrcid()) {?><span class="orcid"><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['mastheadUser']->value['user']->getData('orcid') ));?>
" target="_blank" aria-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.editorialHistory.page.orcidLink",'name'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['mastheadUser']->value['user']->getFullName() ))),$_smarty_tpl ) );?>
"><?php echo $_smarty_tpl->tpl_vars['orcidIcon']->value;?>
</a></span><?php }?></span><?php if (!empty($_smarty_tpl->tpl_vars['mastheadUser']->value['user']->getLocalizedData('affiliation'))) {?><span class="affiliation"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['mastheadUser']->value['user']->getLocalizedData('affiliation') ));?>
</span><?php }?>
				</li>
			<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</ul>
		<?php }?>
	<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
	<p>
		<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', 'editorialHistoryUrl', null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>"about",'op'=>"editorialHistory",'router'=>\PKP\core\PKPApplication::ROUTE_PAGE),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"about.editorialMasthead.linkToEditorialHistory",'url'=>$_smarty_tpl->tpl_vars['editorialHistoryUrl']->value),$_smarty_tpl ) );?>

	</p>
	<hr>

	<?php if (!empty($_smarty_tpl->tpl_vars['reviewers']->value)) {?>
		<h2><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.editorialMasthead.peerReviewers"),$_smarty_tpl ) );?>
</h2>
		<p><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.editorialMasthead.peerReviewers.description",'year'=>$_smarty_tpl->tpl_vars['previousYear']->value),$_smarty_tpl ) );?>
</p>
		<ul class="user_listing" role="list">
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reviewers']->value, 'reviewer');
$_smarty_tpl->tpl_vars['reviewer']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['reviewer']->value) {
$_smarty_tpl->tpl_vars['reviewer']->do_else = false;
?>
			<li>
				<span class="name"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['reviewer']->value->getFullName() ));
if ($_smarty_tpl->tpl_vars['reviewer']->value->getData('orcid') && $_smarty_tpl->tpl_vars['reviewer']->value->hasVerifiedOrcid()) {?><span class="orcid"><a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['reviewer']->value->getData('orcid') ));?>
" target="_blank" aria-label="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.editorialHistory.page.orcidLink",'name'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['reviewer']->value->getFullName() ))),$_smarty_tpl ) );?>
"><?php echo $_smarty_tpl->tpl_vars['orcidIcon']->value;?>
</a></span><?php }?></span><?php if (!empty($_smarty_tpl->tpl_vars['reviewer']->value->getLocalizedData('affiliation'))) {?><span class="affiliation"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['reviewer']->value->getLocalizedData('affiliation') ));?>
</span><?php }?>
			</li>
		<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
		</ul>
	<?php }?>
</div><!-- .page -->

<?php $_smarty_tpl->_subTemplateRender("app:common/frontend/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
