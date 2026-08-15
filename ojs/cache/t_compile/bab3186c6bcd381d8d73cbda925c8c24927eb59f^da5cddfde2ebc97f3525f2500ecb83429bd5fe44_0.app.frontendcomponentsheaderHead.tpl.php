<?php
/* Smarty version 4.5.5, created on 2025-07-28 09:26:55
  from 'app:frontendcomponentsheaderHead.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6887344fbba023_87868613',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'da5cddfde2ebc97f3525f2500ecb83429bd5fe44' => 
    array (
      0 => 'app:frontendcomponentsheaderHead.tpl',
      1 => 1753450229,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6887344fbba023_87868613 (Smarty_Internal_Template $_smarty_tpl) {
?>
<head>

	<meta charset="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['defaultCharset']->value ));?>
">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?php echo preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->tpl_vars['pageTitleTranslated']->value);?>

				<?php if ((($tmp = call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['requestedPage']->value )) ?? null)===null||$tmp==='' ? "index" ?? null : $tmp) != 'index' && $_smarty_tpl->tpl_vars['currentContext']->value && $_smarty_tpl->tpl_vars['currentContext']->value->getLocalizedName()) {?>
			| <?php echo $_smarty_tpl->tpl_vars['currentContext']->value->getLocalizedName();?>

		<?php }?>
	</title>

	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['load_header'][0], array( array('context'=>"frontend"),$_smarty_tpl ) );?>

	<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['load_stylesheet'][0], array( array('context'=>"frontend"),$_smarty_tpl ) );?>

<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/plugins/themes/bootstrap3/styles/custom.css?v=6">

</head>


<style>

.custom-topbar {
  background-color: #ffffff;
  height:27px;
  /* Pas de margin-left ici sur .topbar-links */
}
.topbar-links {
  overflow: hidden; /* évite que le contenu dépasse */
  white-space: nowrap; /* pour éviter que les boutons passent à la ligne */
}

.topbar-links a {
  white-space: nowrap;
}


.topbar-logo img {
  /* marge à gauche et déplacement vertical léger pour affiner */
  margin-left: 20px;
  transform: translateY(-0.5px);
}

.search-bar-custom input {
  max-width: 600px;
  margin: 0 auto;
  display: block;
}

/* Styles boutons restent inchangés */


/* Style des boutons */
.btn {
  border-radius: 20px;
  font-weight: 500;
  font-size: 14px;
}

/* Couleurs personnalisées */
.btn-dashboard {
  background-color: #4f0019;
  color: #fff;
  border: none;
}
.btn-dashboard:hover {
  background-color: #6f0029;
}

.btn-logout {
  background-color: #000;
  color: #fff;
}
.btn-logout:hover {
  background-color: #333;
}

.btn-login,
.btn-outline-secondary {
  color: #4f0019;
  border: 1px solid #4f0019;
  background-color: #fff;
}
.btn-login:hover,
.btn-outline-secondary:hover {
  background-color: #4f0019;
  color: #fff;
}

.btn-register {
  background-color: #4f0019;
  color: #fff;
  border: none;
}
.btn-register:hover {
  background-color: #6f0029;
}





</style><?php }
}
