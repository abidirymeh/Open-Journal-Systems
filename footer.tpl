{**
 * templates/frontend/components/footer.tpl
 *
 * Copyright (c) 2014-2023 Simon Fraser University
 * Copyright (c) 2003-2023 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @brief Common site frontend footer.
 *
 * @uses $isFullWidth bool Should this page be displayed without sidebars? This
 *       represents a page-level override, and doesn't indicate whether or not
 *       sidebars have been configured for thesite.
 *}

	</main>

	{* Sidebars *}
  
	{if empty($isFullWidth)}
		{capture assign="sidebarCode"}{call_hook name="Templates::Common::Sidebar"}{/capture}
		{if $sidebarCode}
			<aside id="sidebar" class="pkp_structure_sidebar left col-xs-12 col-sm-8 col-md-4" role="complementary" aria-label="{translate|escape key="common.navigation.sidebar"}">
				{$sidebarCode}
			</aside><!-- pkp_sidebar.left -->
		{/if}
	{/if}
	</div><!-- pkp_structure_content -->








<footer class="footer pt-4 mt-5 text-dark" role="contentinfo" style="background: #fff; border-top: 3px solid #4f0019;">
  <div class="container">
    <div class="row justify-content-center text-center align-items-center mb-4">

      <!-- Bloc centré contenant tout -->
      <div class="col-12 d-flex flex-column flex-md-row justify-content-center align-items-center gap-5">

        <!-- Logo OJS à gauche -->
        <div class="d-flex justify-content-center">
          <a href="{url page="about" op="aboutThisPublishingSystem"}">
            <img class="img-fluid" style="max-height: 60px;" alt="{translate key="about.aboutThisPublishingSystem"}" src="{$baseUrl}/{$brandImage}">
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
          <img src="{$baseUrl}/public/site/images/logouni1.png" alt="Université de Jendouba" style="max-height: 100px;">
        </div>

      </div>
    </div>

    <!-- Copyright -->
    <div class="row">
      <div class="col-12 text-center text-muted small py-2 border-top">
        &copy; {$smarty.now|date_format:"Y"} Université de Jendouba — Plateforme des revues scientifiques. Tous droits réservés.
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

{load_script context="frontend" scripts=$scripts}

{call_hook name="Templates::Common::Footer::PageFooter"}



















</body>
</html>
