{**
 * templates/frontend/pages/indexSite.tpl
 *
 * Copyright (c) 2014-2023 Simon Fraser University
 * Copyright (c) 2003-2023 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * Site index.
 *
 *}
 
{include file="frontend/components/header.tpl"}


{*******************************************************************************************************************}

{* Barre de recherche en dessous *}
{* Barre de recherche améliorée *}





<section class="shine-banner">

<div class="marquee-container">
  <h1 class="shine-title">Bienvenue sur Notre Plateforme Scientifique</h1>
</div>
  <p class="shine-subtitle">      Cette plateforme centralise l'ensemble des revues scientifiques hébergées par notre institution. Elle offre une large visibilité aux chercheurs, facilite l'accès aux publications, et promeut la diffusion du savoir à l'échelle nationale et internationale.
</p>
</section>

<style>

.container {
  max-width: 1200px;  /* ou la largeur que tu souhaites */
  margin-left: auto;
  margin-right: auto;
  padding-left: 15px;  /* pour éviter que ça colle aux bords */
  padding-right: 15px;
  box-sizing: border-box;
}


.search-bar-custom input.form-control {
  transition: box-shadow 0.3s ease;
}

.search-bar-custom input.form-control:focus {
  box-shadow: 0 0 10px #4f0019;
  border-color: #4f0019;
}
 

/* Conteneur centré avec max-width */
.shine-banner {
  background: linear-gradient(135deg, #4f0019, #3f3f3fff, #4f0019);
  background-size: 700% 700%;
  animation: shimmer 10s ease infinite;
  padding: 20px;
  text-align: center;
  border-radius: 20px;
  color: #fff;
  margin: 20px auto;       /* CENTRAGE horizontal automatique */
  max-width: 1300px;       /* largeur max du cadre */
  width: 150%;              /* largeur fluide selon écran (90% parent) */
  box-shadow: 0 10px 120px rgba(79, 0, 25, 0.4);
  position: relative;
  overflow: hidden;
  box-sizing: border-box;
}

/* Animation de lumière */
.shine-banner::before {
  content: '';
  position: absolute;
  top: 0;
  left: -75%;
  width: 50%;
  height: 100%;
  background: linear-gradient(to right, rgba(255,255,255,0.1), rgba(255,255,255,0.3), rgba(255,255,255,0.1));
  transform: skewX(-20deg);
  animation: light-sweep 5s infinite;
}

/* Titre */
.shine-title {
  font-size: 2em;
  margin-bottom: 10px;
}

/* Sous-titre */
.shine-subtitle {
  font-size: 1em;
  line-height: 1.6;
  padding: 0 10px;
}

/* Animations */
@keyframes shimmer {
  0% { background-position: 0% 50%; }
  50% { background-position: 100% 50%; }
  100% { background-position: 0% 50%; }
}

@keyframes light-sweep {
  0% { left: -75%; }
  100% { left: 125%; }
}

/* Adaptation mobile */
@media (max-width: 768px) {
  .shine-banner {
    padding: 15px 10px;
    width: 95%;      /* presque toute la largeur sur petits écrans */
  }
  .shine-title {
    font-size: 1.5em;
  }
  .shine-subtitle {
    font-size: 0.9em;
    padding: 0 5px;
  }
}



</style>






























<div id="main-site" class="page_index_site">

	{if $about}
		<div class="about_site">
			{$about|nl2br}
		</div>
	{/if}

	{* Announcements *}
	{if $numAnnouncementsHomepage && $announcements|count}
		<section class="cmp_announcements media">
		
			<header class="page-header">
				<h2>
					{translate key="announcement.announcements"}
				</h2>
			</header>
			<div class="media-list">
				{foreach name=announcements from=$announcements item=announcement}
					{if $smarty.foreach.announcements.iteration > $numAnnouncementsHomepage}
						{break}
					{/if}
					{include file="frontend/objects/announcement_summary.tpl" heading="h3"}
				{/foreach}
			</div>
		</section>
	{/if}
















































{if $journals|@count > 0}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />

<style>


.swiper-container {
  max-width: 800px;
  margin: 0 auto;
  padding: 40px 0 60px 0;
  position: relative; /* Important pour positionner les flèches */
}


.swiper-slide {
  background: #fff;
  border-radius: 12px;
  box-shadow: 0 10px 12px rgba(255, 255, 255, 0.1);
  overflow: hidden;
  position: relative;
  display: flex;
  flex-direction: row; /* horizontal au lieu de column */
  align-items: center;
  gap: 20px;
  padding: 20px;
  transition: transform 0.3s ease;
  max-width: 1000px;
  margin: 0 auto;
}


.swiper-slide:hover {
  transform: translateY(-8px);
  box-shadow: 0 8px 24px rgba(0,0,0,0.15);
}

.slide-img {
  width: 30%;
  max-height: 300px;
  object-fit: cover;
  align:center;
}

.slide-content {
  padding: 18px 24px;
  flex-grow: 1;
  display: flex;
  flex-direction: column;
}






.slide-title {
  font-weight: 700;
  font-size: 1.6rem;
  color: #4f0019;
  margin-bottom: 10px;
  flex-shrink: 0;
}

.slide-description {
  font-size: 1.5rem;
  color: #555;
  flex-grow: 1;
  overflow: hidden;
  text-overflow: ellipsis;
  display: -webkit-box;
  -webkit-line-clamp: 4;
  -webkit-box-orient: vertical;
  margin-bottom: 15px;
}
.slide-link {
  margin-top: auto;
  align-self: center;
  padding: 10px 23px;
  border-radius: 30px;
  background-color: #4f0019;
  color: white;
  font-weight: 1000;
  text-decoration: none;
  transition: background-color 0.3s ease;
  font-size: 1.2rem;
  box-shadow: 0 4px 10px rgba(79, 0, 25, 0.4);
}

.slide-link:hover {
  background-color: #a13b52;
  cursor: pointer;
}
@media (max-width: 768px) {
  .swiper-slide:first-child .slide-link {
    width: 100%;
    text-align: center;
    box-sizing: border-box;
  }
}
.swiper-slide:first-child {
  padding: /* rien ou très peu */;
}


.swiper-button-next,
.swiper-button-prev {
  color: #4f0019;;
  top: 50%;
  width: 48px;
  height: 48px;
  margin-top: -24px;
  border-radius: 50%;
  background: rgba(255,255,255,0.95);
  box-shadow: 0 4px 15px rgba(0,0,0,0.1);
  transition: background 0.3s ease;
  z-index: 10;
  opacity: 1 !important; /* forcer visibilité */
}

.swiper-button-next:hover,
.swiper-button-prev:hover {
  background: #4f0019;;
  color: white;
}





.swiper-button-next {
  right: -80px;
}

.swiper-button-prev {
  left: -80px;
}





.swiper-pagination-bullet {
  background: #4f0019;;
  opacity: 0.6;
}

.swiper-pagination-bullet-active {
  opacity: 1;
}

</style>


















<div class="container">

  {*<h4 class="text-center mb-5 text-uppercase" style="color: #4f0019;;">Les derniers numéros publiés</h4>*}

  <div class="swiper-container">
    <div class="swiper-wrapper">
      {foreach from=$journals item=journal}
        {capture assign="url"}{url journal=$journal->getPath()}{/capture}
        {assign var="thumb" value=$journal->getLocalizedData('journalThumbnail')}
        {assign var="description" value=$journal->getLocalizedDescription()}

      <div class="swiper-slide">
  <a href="{$url|escape}" style="text-decoration: none; display: flex; align-items: center; gap: 20px;">
    {if $thumb}

      <img src="{$journalFilesPath}{$journal->getId()}/{$thumb.uploadName|escape:'url'}" alt="{$journal->getLocalizedName()}" class="slide-img" />
       
    {/if}
    <div class="slide-content">
      <div class="slide-title">{$journal->getLocalizedName()}</div>
      {if $description}
        <div class="slide-description">{$description|strip_tags|truncate:300:"..."}</div>
      {/if}
      <div>
        <span class="slide-link">Voir la revue</span>
      </div>
    </div>
  </a>
</div>






      {/foreach}
    </div>

    <!-- Navigation flèches -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>

    <!-- Pagination -->
    <div class="swiper-pagination"></div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
<script>
  const swiper = new Swiper('.swiper-container', {
  loop: true,
  autoplay: {
    delay: 4000,
    disableOnInteraction: false,
  },
  slidesPerView: 1,   // UNE seule revue visible
  spaceBetween: 30,
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
});

</script>
{/if}








{if $journals|@count > 0}
  <style>
    .recent-journals-section {
      background-color: rgba(255, 255, 255, 0.1);
      padding: 40px 0;
      margin-top: 60px;
    }

    .recent-journals-section h3 {
      text-align: center;
      color: #4f0019;;
      text-transform: uppercase;
      margin-bottom: 30px;
      font-weight: bold;
    }

    .recent-journal-card {
      background: #fff;
      border-radius: 10px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      overflow: hidden;
      transition: transform 0.3s ease;
      height: 100%;
    }

    .recent-journal-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }

    .recent-journal-card img {
      width: 100%;
      height: 150px;
      object-fit: contain;
      background: #edededff;
      padding: 10px;
    }

    .recent-journal-card-body {
      padding: 15px;
      text-align: center;
    }

    .recent-journal-card-body h6 {
      font-size: 1.5rem;
      font-weight: 600;
      color: #4f0019;;
      margin-bottom: 10px;
    }

    .recent-journal-card-body a {
      display: inline-block;
      font-size: 1rem;
      text-decoration: none;
      color: #fff;
      background: #4f0019;;
      padding: 6px 14px;
      border-radius: 20px;
      transition: background 0.3s ease;
    }

    .recent-journal-card-body a:hover {
      background: #4f0019;;
    }

    .recent-journal-card-body h6 {
  display: inline-block;
  padding: 8px 14px;
  border: 2px solid #4f0019;
  background-color: white;
  color: #4f0019;
  border-radius: 20px;
  font-size: 1rem;
  font-weight: 600;
}


.marquee-container {
  width: 100%;
  overflow: hidden;
  white-space: nowrap;
  box-sizing: border-box;
}

.shine-title {
  display: inline-block;
  font-size: 2em;
  animation: scroll-text 15s linear infinite;
  color: #ffffffff;
  font-weight: bold;
}

.revue {
  color: white !important;
}

@keyframes scroll-text {
  0%   { transform: translateX(100%); }
  100% { transform: translateX(-100%); }
}

  </style>

  <div class="recent-journals-section">
    <div class="container">
      <h3>Revues récemment ajoutées</h3>
      <div class="row g-4 justify-content-center">
        {foreach from=$journals item=journal name=recentJournals}
          {if $smarty.foreach.recentJournals.iteration <= 6} {* Affiche les 6 derniers seulement *}
            {capture assign="url"}{url journal=$journal->getPath()}{/capture}
            {assign var="thumb" value=$journal->getLocalizedData('journalThumbnail')}

            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
              <div class="recent-journal-card">
                {if $thumb}
                  <img src="{$journalFilesPath}{$journal->getId()}/{$thumb.uploadName|escape:"url"}" alt="{$journal->getLocalizedName()}">
                {/if}
                <div class="recent-journal-card-body">
                  <h6>{$journal->getLocalizedName()}</h6>
                  <a href="{$url|escape}" class="revue">Voir la revue</a>
                </div>
              </div>
            </div>
          {/if}
        {/foreach}
      </div>
    </div>
  </div>
{/if}








<!-- .page -->

{include file="frontend/components/footer.tpl"}
