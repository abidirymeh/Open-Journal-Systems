<?php
/* Smarty version 4.5.5, created on 2025-07-27 12:58:01
  from 'app:forminterestsInput.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68861449a6d1a3_04939328',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '91fb7bae6e73572049641f71de19b722dbff7118' => 
    array (
      0 => 'app:forminterestsInput.tpl',
      1 => 1752100232,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_68861449a6d1a3_04939328 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
>
	$(document).ready(function(){
		$("#<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['FBV_id']->value ));?>
").find(".interests").tagit({
			fieldName: 'interests[]',
			allowSpaces: true,
			autocomplete: {
				source: function(request, response) {
					$.ajax({
						url: <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'json_encode' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('router'=>PKP\core\PKPApplication::ROUTE_PAGE,'page'=>'user','op'=>'getInterests','escape'=>false),$_smarty_tpl ) ) ));?>
,
						data: {'term': request.term},
						dataType: 'json',
						success: function(jsonData) {
							if (jsonData.status == true) {
								response(jsonData.content);
							}
						}
					});
				}
			}
		});
	});
<?php echo '</script'; ?>
>

<div id="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['FBV_id']->value ));?>
">
	<!-- The container which will be processed by tag-it.js as the interests widget -->
	<ul class="interests">
		<?php if ($_smarty_tpl->tpl_vars['FBV_interests']->value) {
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['FBV_interests']->value, 'interest');
$_smarty_tpl->tpl_vars['interest']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['interest']->value) {
$_smarty_tpl->tpl_vars['interest']->do_else = false;
?><li class="hidden"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['interest']->value ));?>
</li><?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
}?>
	</ul>
	<?php if ($_smarty_tpl->tpl_vars['FBV_label_content']->value) {?><span><?php echo $_smarty_tpl->tpl_vars['FBV_label_content']->value;?>
</span><?php }?>
</div>
<?php }
}
