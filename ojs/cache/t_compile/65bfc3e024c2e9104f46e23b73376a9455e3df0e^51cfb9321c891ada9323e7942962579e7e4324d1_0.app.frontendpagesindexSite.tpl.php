<?php
/* Smarty version 4.5.5, created on 2025-07-27 12:49:58
  from 'app:frontendpagesindexSite.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_688612667824b3_40860051',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51cfb9321c891ada9323e7942962579e7e4324d1' => 
    array (
      0 => 'app:frontendpagesindexSite.tpl',
      1 => 1753464068,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
    'app:frontend/components/header.tpl' => 1,
    'app:frontend/objects/announcement_summary.tpl' => 1,
    'app:frontend/components/footer.tpl' => 1,
  ),
),false)) {
function content_688612667824b3_40860051 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\xampp\\htdocs\\ojs\\lib\\pkp\\lib\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.truncate.php','function'=>'smarty_modifier_truncate',),));
?>
 
<?php $_smarty_tpl->_subTemplateRender("app:frontend/components/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>








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

	<?php if ($_smarty_tpl->tpl_vars['about']->value) {?>
		<div class="about_site">
			<?php echo nl2br((string) $_smarty_tpl->tpl_vars['about']->value, (bool) 1);?>

		</div>
	<?php }?>

		<?php if ($_smarty_tpl->tpl_vars['numAnnouncementsHomepage']->value && call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'count' ][ 0 ], array( $_smarty_tpl->tpl_vars['announcements']->value ))) {?>
		<section class="cmp_announcements media">
		
			<header class="page-header">
				<h2>
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"announcement.announcements"),$_smarty_tpl ) );?>

				</h2>
			</header>
			<div class="media-list">
				<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['announcements']->value, 'announcement', false, NULL, 'announcements', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['announcement']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['announcement']->value) {
$_smarty_tpl->tpl_vars['announcement']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_announcements']->value['iteration']++;
?>
					<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_announcements']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_announcements']->value['iteration'] : null) > $_smarty_tpl->tpl_vars['numAnnouncementsHomepage']->value) {?>
						<?php break 1;?>
					<?php }?>
					<?php $_smarty_tpl->_subTemplateRender("app:frontend/objects/announcement_summary.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('heading'=>"h3"), 0, true);
?>
				<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
			</div>
		</section>
	<?php }?>
















































<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'count' ][ 0 ], array( $_smarty_tpl->tpl_vars['journals']->value )) > 0) {?>
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

  
  <div class="swiper-container">
    <div class="swiper-wrapper">
      <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['journals']->value, 'journal');
$_smarty_tpl->tpl_vars['journal']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['journal']->value) {
$_smarty_tpl->tpl_vars['journal']->do_else = false;
?>
        <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', "url", null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('journal'=>$_smarty_tpl->tpl_vars['journal']->value->getPath()),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
        <?php $_smarty_tpl->_assignInScope('thumb', $_smarty_tpl->tpl_vars['journal']->value->getLocalizedData('journalThumbnail'));?>
        <?php $_smarty_tpl->_assignInScope('description', $_smarty_tpl->tpl_vars['journal']->value->getLocalizedDescription());?>

      <div class="swiper-slide">
  <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['url']->value ));?>
" style="text-decoration: none; display: flex; align-items: center; gap: 20px;">
    <?php if ($_smarty_tpl->tpl_vars['thumb']->value) {?>

      <img src="<?php echo $_smarty_tpl->tpl_vars['journalFilesPath']->value;
echo $_smarty_tpl->tpl_vars['journal']->value->getId();?>
/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['thumb']->value['uploadName'],'url' ));?>
" alt="<?php echo $_smarty_tpl->tpl_vars['journal']->value->getLocalizedName();?>
" class="slide-img" />
       
    <?php }?>
    <div class="slide-content">
      <div class="slide-title"><?php echo $_smarty_tpl->tpl_vars['journal']->value->getLocalizedName();?>
</div>
      <?php if ($_smarty_tpl->tpl_vars['description']->value) {?>
        <div class="slide-description"><?php echo smarty_modifier_truncate(preg_replace('!<[^>]*?>!', ' ', (string) $_smarty_tpl->tpl_vars['description']->value),300,"...");?>
</div>
      <?php }?>
      <div>
        <span class="slide-link">Voir la revue</span>
      </div>
    </div>
  </a>
</div>






      <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>

    <!-- Navigation flèches -->
    <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div>

    <!-- Pagination -->
    <div class="swiper-pagination"></div>
  </div>
</div>

<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
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

<?php echo '</script'; ?>
>
<?php }?>








<?php if (call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'count' ][ 0 ], array( $_smarty_tpl->tpl_vars['journals']->value )) > 0) {?>
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
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['journals']->value, 'journal', false, NULL, 'recentJournals', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['journal']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['journal']->value) {
$_smarty_tpl->tpl_vars['journal']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_recentJournals']->value['iteration']++;
?>
          <?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_recentJournals']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_recentJournals']->value['iteration'] : null) <= 6) {?>             <?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', "url", null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('journal'=>$_smarty_tpl->tpl_vars['journal']->value->getPath()),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
            <?php $_smarty_tpl->_assignInScope('thumb', $_smarty_tpl->tpl_vars['journal']->value->getLocalizedData('journalThumbnail'));?>

            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
              <div class="recent-journal-card">
                <?php if ($_smarty_tpl->tpl_vars['thumb']->value) {?>
                  <img src="<?php echo $_smarty_tpl->tpl_vars['journalFilesPath']->value;
echo $_smarty_tpl->tpl_vars['journal']->value->getId();?>
/<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['thumb']->value['uploadName'],"url" ));?>
" alt="<?php echo $_smarty_tpl->tpl_vars['journal']->value->getLocalizedName();?>
">
                <?php }?>
                <div class="recent-journal-card-body">
                  <h6><?php echo $_smarty_tpl->tpl_vars['journal']->value->getLocalizedName();?>
</h6>
                  <a href="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['url']->value ));?>
" class="revue">Voir la revue</a>
                </div>
              </div>
            </div>
          <?php }?>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
      </div>
    </div>
  </div>
<?php }?>








<!-- .page -->

<?php $_smarty_tpl->_subTemplateRender("app:frontend/components/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
