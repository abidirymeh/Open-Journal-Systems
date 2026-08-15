{**
 * templates/frontend/components/headerHead.tpl
 *
 * Copyright (c) 2014-2021 Simon Fraser University
 * Copyright (c) 2000-2021 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * Common site header <head> tag and contents.
 *}

<head>

	<meta charset="{$defaultCharset|escape}">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		{$pageTitleTranslated|strip_tags}
		{* Add the journal name to the end of page titles *}
		{if $requestedPage|escape|default:"index" != 'index' && $currentContext && $currentContext->getLocalizedName()}
			| {$currentContext->getLocalizedName()}
		{/if}
	</title>

	{load_header context="frontend"}
	{load_stylesheet context="frontend"}
<link rel="stylesheet" href="{$baseUrl}/plugins/themes/bootstrap3/styles/custom.css?v=6">

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





</style>