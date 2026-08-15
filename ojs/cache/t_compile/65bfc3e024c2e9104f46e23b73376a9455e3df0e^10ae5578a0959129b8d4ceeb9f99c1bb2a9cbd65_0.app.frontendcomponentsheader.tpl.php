<?php
/* Smarty version 4.5.5, created on 2025-07-27 12:49:58
  from 'app:frontendcomponentsheader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_68861266d4d836_48378016',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '10ae5578a0959129b8d4ceeb9f99c1bb2a9cbd65' => 
    array (
      0 => 'app:frontendcomponentsheader.tpl',
      1 => 1753460098,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
    'app:frontend/components/headerHead.tpl' => 1,
  ),
),false)) {
function content_68861266d4d836_48378016 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\ojs\\lib\\pkp\\lib\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.replace.php','function'=>'smarty_modifier_replace',),));
?>

<?php $_smarty_tpl->_assignInScope('showingLogo', true);
if ($_smarty_tpl->tpl_vars['displayPageHeaderTitle']->value && !$_smarty_tpl->tpl_vars['displayPageHeaderLogo']->value) {?>
    <?php $_smarty_tpl->_assignInScope('showingLogo', false);
}?>





<!DOCTYPE html>
<html lang="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['currentLocale']->value,"_","-");?>
" xml:lang="<?php echo smarty_modifier_replace($_smarty_tpl->tpl_vars['currentLocale']->value,"_","-");?>
">
<?php if (!$_smarty_tpl->tpl_vars['pageTitleTranslated']->value) {?>
    <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', "pageTitleTranslated", null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>$_smarty_tpl->tpl_vars['pageTitle']->value),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);
}
$_smarty_tpl->_subTemplateRender("app:frontend/components/headerHead.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<body class="pkp_page_<?php echo (($tmp = call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['requestedPage']->value )) ?? null)===null||$tmp==='' ? "index" ?? null : $tmp);?>
 pkp_op_<?php echo (($tmp = call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['requestedOp']->value )) ?? null)===null||$tmp==='' ? "index" ?? null : $tmp);
if ($_smarty_tpl->tpl_vars['showingLogo']->value) {?> has_site_logo<?php }?>">
<div class="pkp_structure_page">

        <nav id="accessibility-nav" class="sr-only" role="navigation" aria-label="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"plugins.themes.bootstrap3.accessible_menu.label"),$_smarty_tpl ) ) ));?>
">
        <ul>
            <li><a href="#main-navigation"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"plugins.themes.bootstrap3.accessible_menu.main_navigation"),$_smarty_tpl ) ) ));?>
</a></li>
            <li><a href="#main-content"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"plugins.themes.bootstrap3.accessible_menu.main_content"),$_smarty_tpl ) ) ));?>
</a></li>
            <li><a href="#sidebar"><?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"plugins.themes.bootstrap3.accessible_menu.sidebar"),$_smarty_tpl ) ) ));?>
</a></li>
        </ul>
    </nav>

    





<header class="navbar navbar-default" id="headerNavigationContainer" role="banner">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-menu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="<?php echo $_smarty_tpl->tpl_vars['homeUrl']->value;?>
">
        <img src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/templates/images/structure/ujps1.png" alt="Logo UJPS" title="Logo UJPS" style="height: 120px;">
      </a>
    </div>

    <div class="collapse navbar-collapse" id="nav-menu">
      <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', "primaryMenu", null);?>
        <?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['load_menu'][0], array( array('name'=>"primary",'id'=>"main-navigation",'ulClass'=>"nav navbar-nav"),$_smarty_tpl ) );?>

      <?php $_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>

      <?php echo $_smarty_tpl->tpl_vars['primaryMenu']->value;?>


      <div class="topbar-links navbar-right">
        <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('context'=>'index','page'=>'index'),$_smarty_tpl ) );?>
" class="btn accueil-btn">Accueil</a>
        <?php if ($_smarty_tpl->tpl_vars['isUserLoggedIn']->value) {?>
          <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>'user','op'=>'profile'),$_smarty_tpl ) );?>
" class="btn btn-dashboard me-2">Profil</a>
          <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>'admin'),$_smarty_tpl ) );?>
" class="btn btn-dashboard me-2">Administration</a>
          <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>'login','op'=>'signOut','source'=>'ojs/index.php/index/fr/index'),$_smarty_tpl ) );?>
" class="btn btn-logout me-2">Déconnexion</a>
        <?php } else { ?>
          <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>'login'),$_smarty_tpl ) );?>
" class="btn btn-register">Connexion</a>
          <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>'user','op'=>'register'),$_smarty_tpl ) );?>
" class="btn btn-register">S’inscrire</a>
        <?php }?>
      </div>
    </div>
  </div>
</header>


<style>


.topbar-links .btn {
  color: white !important;

    margin-top:40px;
    margin-bottom:30px;
}

/* Style personnalisé pour le bouton Accueil */
.btn.accueil-btn {
  color: #4f0019 !important;          /* Texte rouge bordeaux */
  background-color: white !important; /* Fond blanc */
  border: 2px solid #4f0019 !important; /* Bordure rouge bordeaux */
}

.info-block {
  background-color: #f9f9f9;
  border-left: 4px solid #4f0019;
  padding: 15px;
  border-radius: 8px;
  max-width: 250px;
  font-family: Arial, sans-serif;
}

.info-block h4 {
  color: #4f0019;
  margin-bottom: 10px;
}

.info-block ul li a {
  color: #333;
  text-decoration: none;
  font-weight: 600;
  display: block;
  margin-bottom: 8px;
}

.info-block ul li a:hover {
  color: #4f0019;
  text-decoration: underline;
}

/* Cible précise des liens dans la navbar principale */
.navbar-default .navbar-nav > li > a {
  color: #4f0019 !important;
  font-weight: normal !important; /* pour enlever le gras */
  text-decoration: none !important;
  transition: color 0.3s ease !important;
}

.navbar-default .navbar-nav > li > a:hover,
.navbar-default .navbar-nav > li > a:focus,
.navbar-default .navbar-nav > li.active > a {
  color: #a13b52 !important;
  text-decoration: underline !important;
}

.info-block a {
  color: #4f0019;
  font-weight: 600;
  text-decoration: none;
  transition: color 0.3s ease;
}

.info-block a:hover,
.info-block a:focus {
  color: #a13b52;
  text-decoration: underline;
}

.navbar-brand img {
  margin-left: 10px;  /* marge à gauche */
  margin-right: 20px; /* marge à droite */
  margin-top: 1px;    /* marge en haut */
  /* tu peux ajuster ces valeurs */
}

</style>


        <div class="pkp_structure_content container">
        <main class="pkp_structure_main col-xs-12 col-sm-10 col-md-8" role="main">
<?php }
}
