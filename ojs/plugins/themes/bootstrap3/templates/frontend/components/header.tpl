{**
 * lib/pkp/templates/frontend/components/header.tpl
 * Personnalisé par Rimeh Abidi
 *}

{assign var="showingLogo" value=true}
{if $displayPageHeaderTitle && !$displayPageHeaderLogo}
    {assign var="showingLogo" value=false}
{/if}





<!DOCTYPE html>
<html lang="{$currentLocale|replace:"_":"-"}" xml:lang="{$currentLocale|replace:"_":"-"}">
{if !$pageTitleTranslated}
    {capture assign="pageTitleTranslated"}{translate key=$pageTitle}{/capture}
{/if}
{include file="frontend/components/headerHead.tpl"}

<body class="pkp_page_{$requestedPage|escape|default:"index"} pkp_op_{$requestedOp|escape|default:"index"}{if $showingLogo} has_site_logo{/if}">
<div class="pkp_structure_page">

    {* Navigation accessible *}
    <nav id="accessibility-nav" class="sr-only" role="navigation" aria-label="{translate|escape key="plugins.themes.bootstrap3.accessible_menu.label"}">
        <ul>
            <li><a href="#main-navigation">{translate|escape key="plugins.themes.bootstrap3.accessible_menu.main_navigation"}</a></li>
            <li><a href="#main-content">{translate|escape key="plugins.themes.bootstrap3.accessible_menu.main_content"}</a></li>
            <li><a href="#sidebar">{translate|escape key="plugins.themes.bootstrap3.accessible_menu.sidebar"}</a></li>
        </ul>
    </nav>

    {* En-tête *}






<header class="navbar navbar-default" id="headerNavigationContainer" role="banner">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-menu">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="{$homeUrl}">
        <img src="{$baseUrl}/templates/images/structure/ujps1.png" alt="Logo UJPS" title="Logo UJPS" style="height: 120px;">
      </a>
    </div>

    <div class="collapse navbar-collapse" id="nav-menu">
      {capture assign="primaryMenu"}
        {load_menu name="primary" id="main-navigation" ulClass="nav navbar-nav"}
      {/capture}

      {$primaryMenu}

      <div class="topbar-links navbar-right">
        <a href="{url context='index' page='index'}" class="btn accueil-btn">Accueil</a>
        {if $isUserLoggedIn}
          <a href="{url page='user' op='profile'}" class="btn btn-dashboard me-2">Profil</a>
          <a href="{url page='admin'}" class="btn btn-dashboard me-2">Administration</a>
          <a href="{url page='login' op='signOut' source='ojs/index.php/index/fr/index'}" class="btn btn-logout me-2">Déconnexion</a>
        {else}
          <a href="{url page='login'}" class="btn btn-register">Connexion</a>
          <a href="{url page='user' op='register'}" class="btn btn-register">S’inscrire</a>
        {/if}
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


    {* Contenu principal *}
    <div class="pkp_structure_content container">
        <main class="pkp_structure_main col-xs-12 col-sm-10 col-md-8" role="main">
