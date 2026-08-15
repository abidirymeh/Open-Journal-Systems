<?php
/* Smarty version 4.5.5, created on 2025-07-28 09:18:18
  from 'app:frontendpagesuserRegister.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_6887324a2b3651_87834618',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd49dc0801a97aaed7a39f9de90403c63b1cc8e43' => 
    array (
      0 => 'app:frontendpagesuserRegister.tpl',
      1 => 1753690469,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
    'app:frontend/components/header.tpl' => 1,
    'app:common/formErrors.tpl' => 1,
    'app:frontend/components/registrationForm.tpl' => 1,
    'app:frontend/components/registrationFormContexts.tpl' => 1,
    'app:common/frontend/footer.tpl' => 1,
  ),
),false)) {
function content_6887324a2b3651_87834618 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("app:frontend/components/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>"user.register"), 0, false);
if ($_smarty_tpl->tpl_vars['currentContext']->value && $_smarty_tpl->tpl_vars['currentContext']->value->getPath() != "index") {?>
    <?php echo '<script'; ?>
>
        window.location.href = "/ojs/index.php/index/fr/user/register";
    <?php echo '</script'; ?>
>
<?php }?>


<style>
.register-container {
  max-width: 1500px;
  width: 140%;          /* adapte la largeur à 90% de l'écran */
  margin: 40px auto;   /* centré horizontalement, margin-left supprimé */
  padding: 0 20px;
  margin-left:50px;
  
  box-sizing: border-box;
}
@media (max-width: 768px) {
  .register-container {
    width: 100%;
    margin: 20px auto;
    padding: 0 10px;
  }

  .register-body {
    padding: 30px 15px;
  }

  .register-hero h1 {
    font-size: 1.5rem;
  }
}

/* Titre principal animé */
/* HERO avec effet défilement */
.register-hero {
	background: radial-gradient(circle, #4f0019 0%, #4f0019 100%);
	padding: 40px 0;
	overflow: hidden;
	border-radius: 20px 20px 0 0;
	box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
	position: relative;
	color: white;
}

.marquee {
	display: inline-block;
	white-space: nowrap;
	animation: scroll-left 12s linear infinite;
	padding-left: 100%;
}

.register-hero h1 {
	display: inline-block;
	font-size: 1.5rem;
	font-weight: 700;
	text-shadow: 0 0 10px rgba(255,255,255,0.2);
}

@keyframes scroll-left {
	0% {
		transform: translateX(0%);
	}
	100% {
		transform: translateX(-100%);
	}
}
.marquee:hover {
	animation-play-state: paused;
	cursor: pointer;
}


.register-hero p {
	font-size: 1.2rem;
	font-weight: 400;
	margin-top: 12px;
	animation: fadeInSlide 2.2s ease-in-out forwards;
}

@keyframes fadeInSlide {
	from {
		opacity: 0;
		transform: translateY(20px);
	}
	to {
		opacity: 1;
		transform: translateY(0);
	}
}

/* Formulaire */
.register-body {
	background-color: #ffffff;
	padding: 50px 60px;
	border-radius: 0 0 20px 20px;
	box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

/* Suppression cadre inutile */
.register-card {
	background: none;
	box-shadow: none;
	padding: 0;
}

/* Champ de formulaire */
.register-card .form-control {
	border: 1px solid #ddd;
	border-radius: 10px;
	padding: 15px;
	font-size: 1rem;
	transition: all 0.3s ease-in-out;
}

.register-card .form-control:focus {
	border-color: #4f0019;
	box-shadow: 0 0 0 3px rgba(79, 0, 25, 0.1);
}

/* Bouton principal */
.register-card .btn-primary {
	background: linear-gradient(90deg, #4f0019 0%, #6b1333 100%);
	border: none;
	border-radius: 10px;
	padding: 14px;
	font-size: 1rem;
	font-weight: 600;
	transition: all 0.3s ease-in-out;
}

.register-card .btn-primary:hover {
	background: linear-gradient(90deg, #6b1333 0%, #8a1e44 100%);
	transform: translateY(-2px);
	box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Bouton secondaire */
.register-card .btn-outline-secondary {
	border: 1px solid #ccc;
	border-radius: 10px;
	font-size: 1rem;
	color: #4f0019;
	background-color: transparent;
	padding: 14px;
	transition: all 0.3s ease-in-out;
}

.register-card .btn-outline-secondary:hover {
	border-color: #4f0019;
	color: #fff;
	background-color: #4f0019;
}

/* Labels */
.register-card label {
	font-weight: 500;
	color: #333;
	margin-bottom: 8px;
	display: block;
}

/* Espacement des groupes */
.form-group {
	margin-bottom: 1.5rem;
}

/* Responsive */
@media (max-width: 768px) {
	.register-container {
		padding: 0 15px;
	}

	.register-body {
		padding: 30px 20px;
	}

	.register-hero h1 {
		font-size: 2rem;
	}
}
</style>

<?php $_smarty_tpl->_assignInScope('siteContextId', call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'intval' ][ 0 ], array( PKP\core\PKPApplication::SITE_CONTEXT_ID )));?>

<div class="register-container">
<div class="register-hero">
	<div class="marquee">
		Bienvenue à UJPS — Créez votre compte pour rejoindre notre plateforme scientifique 
	</div>
</div>


<div class="register-body register-card">
	<form class="pkp_form register" id="register" method="post" action="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('op'=>"register"),$_smarty_tpl ) );?>
" aria-label="Registration form">
		<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['csrf'][0], array( array(),$_smarty_tpl ) );?>

		<?php if ($_smarty_tpl->tpl_vars['source']->value) {?>
			<input type="hidden" name="source" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['source']->value ));?>
" />
		<?php }?>

		<?php $_smarty_tpl->_subTemplateRender("app:common/formErrors.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		<?php $_smarty_tpl->_subTemplateRender("app:frontend/components/registrationForm.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
		<?php $_smarty_tpl->_subTemplateRender("app:frontend/components/registrationFormContexts.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

				<?php if ($_smarty_tpl->tpl_vars['currentContext']->value) {?>
					<fieldset class="consent" aria-labelledby="consent-legend">
						<?php if ($_smarty_tpl->tpl_vars['currentContext']->value->getSetting('privacyStatement')) {?>
							<div class="form-group optin optin-privacy">
								<label>
									<input type="checkbox" name="privacyConsent" value="1"<?php if ($_smarty_tpl->tpl_vars['privacyConsent']->value) {?> checked="checked"<?php }?> aria-required="true">
									<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', "privacyUrl", null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('router'=>\PKP\core\PKPApplication::ROUTE_PAGE,'page'=>"about",'op'=>"privacy"),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"user.register.form.privacyConsent",'privacyUrl'=>$_smarty_tpl->tpl_vars['privacyUrl']->value),$_smarty_tpl ) );?>

								</label>
							</div>
						<?php }?>
						<div class="form-group optin optin-email">
							<label>
								<input type="checkbox" name="emailConsent" value="1"<?php if ($_smarty_tpl->tpl_vars['emailConsent']->value) {?> checked="checked"<?php }?>>
								<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"user.register.form.emailConsent"),$_smarty_tpl ) );?>

							</label>
						</div>
					</fieldset>

					<?php $_smarty_tpl->_assignInScope('contextId', $_smarty_tpl->tpl_vars['currentContext']->value->getId());?>
					<?php $_smarty_tpl->_assignInScope('userCanRegisterReviewer', 0);?>
					<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reviewerUserGroups']->value[$_smarty_tpl->tpl_vars['contextId']->value], 'userGroup');
$_smarty_tpl->tpl_vars['userGroup']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['userGroup']->value) {
$_smarty_tpl->tpl_vars['userGroup']->do_else = false;
?>
						<?php if ($_smarty_tpl->tpl_vars['userGroup']->value->permitSelfRegistration) {?>
							<?php $_smarty_tpl->_assignInScope('userCanRegisterReviewer', $_smarty_tpl->tpl_vars['userCanRegisterReviewer']->value+1);?>
						<?php }?>
					<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
					<?php if ($_smarty_tpl->tpl_vars['userCanRegisterReviewer']->value) {?>
						<fieldset class="reviewer" aria-labelledby="reviewer-legend">
							<legend id="reviewer-legend">
								<?php if ($_smarty_tpl->tpl_vars['userCanRegisterReviewer']->value > 1) {?>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"user.reviewerPrompt"),$_smarty_tpl ) );?>

								<?php } else { ?>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"user.reviewerPrompt.optin"),$_smarty_tpl ) );?>

								<?php }?>
							</legend>
							<div class="fields">
								<div id="reviewerOptinGroup" class="form-group optin">
									<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['reviewerUserGroups']->value[$_smarty_tpl->tpl_vars['contextId']->value], 'userGroup');
$_smarty_tpl->tpl_vars['userGroup']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['userGroup']->value) {
$_smarty_tpl->tpl_vars['userGroup']->do_else = false;
?>
										<?php if ($_smarty_tpl->tpl_vars['userGroup']->value->permitSelfRegistration) {?>
											<label>
												<?php $_smarty_tpl->_assignInScope('userGroupId', $_smarty_tpl->tpl_vars['userGroup']->value->id);?>
												<input type="checkbox" name="reviewerGroup[<?php echo $_smarty_tpl->tpl_vars['userGroupId']->value;?>
]" value="1"<?php if (in_array($_smarty_tpl->tpl_vars['userGroupId']->value,$_smarty_tpl->tpl_vars['userGroupIds']->value)) {?> checked="checked"<?php }?>>
												<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"user.reviewerPrompt.userGroup",'userGroup'=>call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['userGroup']->value->getLocalizedData('name') ))),$_smarty_tpl ) );?>

											</label>
										<?php }?>
									<?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
								</div>
								<div id="reviewerInterests" class="form-group reviewer_interests">
									<label for="interests">
										<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"user.interests"),$_smarty_tpl ) );?>

										<input class="form-control" type="text" name="interests" id="interests" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( (($tmp = $_smarty_tpl->tpl_vars['interests']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp) ));?>
" aria-describedby="interests-help">
										<span id="interests-help" class="sr-only"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"user.register.noContextReviewerInterests"),$_smarty_tpl ) );?>
</span>
									</label>
								</div>
							</div>
						</fieldset>
					<?php }?>
				<?php }?>

				<?php if (!$_smarty_tpl->tpl_vars['currentContext']->value) {?>
					<fieldset class="consent" aria-labelledby="consent-legend">
						<?php if ($_smarty_tpl->tpl_vars['siteWidePrivacyStatement']->value) {?>
							<div class="form-group optin optin-privacy">
								<label>
									<input type="checkbox" name="privacyConsent[<?php echo $_smarty_tpl->tpl_vars['siteContextId']->value;?>
]" id="privacyConsent[<?php echo $_smarty_tpl->tpl_vars['siteContextId']->value;?>
]" value="1"<?php if ($_smarty_tpl->tpl_vars['privacyConsent']->value[$_smarty_tpl->tpl_vars['siteContextId']->value]) {?> checked="checked"<?php }?> aria-required="true">
									<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', "privacyUrl", null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('router'=>\PKP\core\PKPApplication::ROUTE_PAGE,'page'=>"about",'op'=>"privacy"),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
									<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"user.register.form.privacyConsent",'privacyUrl'=>$_smarty_tpl->tpl_vars['privacyUrl']->value),$_smarty_tpl ) );?>

								</label>
							</div>
						<?php }?>
						<div class="form-group optin optin-email">
							<label>
								<input type="checkbox" name="emailConsent" value="1"<?php if ($_smarty_tpl->tpl_vars['emailConsent']->value) {?> checked="checked"<?php }?>>
								<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"user.register.form.emailConsent"),$_smarty_tpl ) );?>

							</label>
						</div>
						<div class="form-group reviewer_nocontext_interests">
							<label for="interests">
								<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"user.register.noContextReviewerInterests"),$_smarty_tpl ) );?>

								<input class="form-control" type="text" name="interests" id="interests" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( (($tmp = $_smarty_tpl->tpl_vars['interests']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp) ));?>
" aria-describedby="interests-help">
								<span id="interests-help" class="sr-only"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"user.register.noContextReviewerInterests"),$_smarty_tpl ) );?>
</span>
							</label>
						</div>
					</fieldset>
				<?php }?>

				<?php if ($_smarty_tpl->tpl_vars['recaptchaPublicKey']->value) {?>
					<fieldset class="recaptcha_wrapper" aria-labelledby="recaptcha-legend">
						<legend id="recaptcha-legend" class="sr-only"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.recaptcha"),$_smarty_tpl ) );?>
</legend>
						<div class="fields">
							<div class="recaptcha">
								<div class="g-recaptcha" data-sitekey="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['recaptchaPublicKey']->value ));?>
"></div>
							</div>
						</div>
					</fieldset>
				<?php }?>

				<?php if ($_smarty_tpl->tpl_vars['altchaEnabled']->value) {?>
					<fieldset class="altcha_wrapper" aria-labelledby="altcha-legend">
						<legend id="altcha-legend" class="sr-only"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"common.altcha"),$_smarty_tpl ) );?>
</legend>
						<div class="fields">
							<altcha-widget challengejson='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'json_encode' ][ 0 ], array( $_smarty_tpl->tpl_vars['altchaChallenge']->value ));?>
' floating></altcha-widget>
						</div>
					</fieldset>
				<?php }?>

						<div class="buttons d-grid gap-2 mt-4">
			<button class="btn btn-primary" type="submit">
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"user.register"),$_smarty_tpl ) );?>

			</button>
			<?php $_smarty_tpl->smarty->ext->_capture->open($_smarty_tpl, 'default', "rolesProfileUrl", null);
echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>"user",'op'=>"profile",'path'=>"roles"),$_smarty_tpl ) );
$_smarty_tpl->smarty->ext->_capture->close($_smarty_tpl);?>
			<a class="btn btn-outline-secondary" href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>"login",'source'=>$_smarty_tpl->tpl_vars['rolesProfileUrl']->value),$_smarty_tpl ) );?>
">
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"user.login"),$_smarty_tpl ) );?>

			</a>
		</div>
	</form>
</div>
<?php $_smarty_tpl->_subTemplateRender("app:common/frontend/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
