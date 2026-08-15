<?php
/* Smarty version 4.5.5, created on 2025-08-12 19:01:37
  from 'app:frontendcomponentsfooter.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_689b81816bab94_09801124',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4dffb64063bb972c37e05619a2ccd9d0ea7473ac' => 
    array (
      0 => 'app:frontendcomponentsfooter.tpl',
      1 => 1754926760,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_689b81816bab94_09801124 (Smarty_Internal_Template $_smarty_tpl) {
?>
	</main>

	  
	<?php if (empty($_smarty_tpl->tpl_vars['isFullWidth']->value)) {?>
		<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', "sidebarCode", null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['call_hook'][0], array( array('name'=>"Templates::Common::Sidebar"),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
		<?php if ($_smarty_tpl->tpl_vars['sidebarCode']->value) {?>
			<aside id="sidebar" class="pkp_structure_sidebar left col-xs-12 col-sm-8 col-md-4" role="complementary" aria-label="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.navigation.sidebar"),$_smarty_tpl ) ) ));?>
">
				<?php echo $_smarty_tpl->tpl_vars['sidebarCode']->value;?>

			</aside><!-- pkp_sidebar.left -->
		<?php }?>
	<?php }?>
	</div><!-- pkp_structure_content -->








<footer class="footer pt-4 mt-5 text-dark" role="contentinfo" style="background: #fff; border-top: 3px solid #4f0019;">
  <div class="container">
    <div class="row justify-content-center text-center align-items-center mb-4">

      <!-- Bloc centré contenant tout -->
      <div class="col-12 d-flex flex-column flex-md-row justify-content-center align-items-center gap-5">

        <!-- Logo OJS à gauche -->
        <div class="d-flex justify-content-center">
          <a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>"about",'op'=>"aboutThisPublishingSystem"),$_smarty_tpl ) );?>
">
            <img class="img-fluid" style="max-height: 60px;" alt="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"about.aboutThisPublishingSystem"),$_smarty_tpl ) );?>
" src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/<?php echo $_smarty_tpl->tpl_vars['brandImage']->value;?>
">
          </a>
        </div>

        <!-- Infos Université -->
        <div class="text-center">
          <h5 class="fw-bold mb-3" style="color: #4f0019;">Université de Jendouba</h5>
          <p class="mb-2 small">
            <i class="bi bi-geo-alt me-2"></i>Campus Universitaire Mohamed Yaalaoui,<br>Avenue de l’Union du Maghreb Arabe, 8189 Jendouba Nord
          </p>
          <p class="mb-2 small">
            <i class="bi bi-telephone me-2"></i>+216 78 611 300 | +216 78 611 299
          </p>
          <p class="mb-0 small">
            <i class="bi bi-envelope me-2"></i>
            <a href="mailto:contact@uj.rnu.tn" class="text-dark text-decoration-none text-decoration-underline-hover">contact@uj.rnu.tn</a>
          </p>
        </div>

        <!-- Logo Université à droite -->
        <div class="d-flex justify-content-center">
          <img src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/public/site/images/logouni1.png" alt="Université de Jendouba" style="max-height: 100px;">
        </div>

      </div>
    </div>

    <!-- Copyright -->
    <div class="row">
      <div class="col-12 text-center text-muted small py-2 border-top">
        &copy; <?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'date_format' ][ 0 ], array( time(),"Y" ));?>
 Université de Jendouba — Plateforme des revues scientifiques. Tous droits réservés.
      </div>
    </div>
  </div>
</footer>


<!-- Bootstrap Icons for social media and contact info -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<!-- Custom CSS for hover effects -->
<style>
.text-decoration-underline-hover:hover {
  text-decoration: underline !important;
}
.social-links a:hover {
  color: #4f0019 !important;
  transition: color 0.3s ease;
}
</style>



</div><!-- pkp_structure_page -->

<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['load_script'][0], array( array('context'=>"frontend",'scripts'=>$_smarty_tpl->tpl_vars['scripts']->value),$_smarty_tpl ) );?>


<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['call_hook'][0], array( array('name'=>"Templates::Common::Footer::PageFooter"),$_smarty_tpl ) );?>




















<?php echo '<script'; ?>
 src="https://app.chatgptbuilder.io/webchat/plugin.js?v=6"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
>
  ktt10.setup({
    id: 'Hx96ehDyC3DavL22',
    accountId: '1916051',
    color: '#6D251C'
  });

  
<?php echo '</script'; ?>
>


</body>
</html>
<?php }
}
