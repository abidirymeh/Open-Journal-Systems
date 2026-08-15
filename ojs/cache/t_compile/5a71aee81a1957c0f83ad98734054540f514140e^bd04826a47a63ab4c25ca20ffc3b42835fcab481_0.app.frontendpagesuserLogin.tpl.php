<?php
/* Smarty version 4.5.5, created on 2025-07-28 09:11:37
  from 'app:frontendpagesuserLogin.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.5.5',
  'unifunc' => 'content_688730b9713098_74303258',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bd04826a47a63ab4c25ca20ffc3b42835fcab481' => 
    array (
      0 => 'app:frontendpagesuserLogin.tpl',
      1 => 1753690291,
      2 => 'app',
    ),
  ),
  'includes' => 
  array (
    'app:frontend/components/header.tpl' => 1,
    'app:frontend/components/footer.tpl' => 1,
  ),
),false)) {
function content_688730b9713098_74303258 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_subTemplateRender("app:frontend/components/header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('pageTitle'=>"user.login"), 0, false);
if ($_smarty_tpl->tpl_vars['currentContext']->value && $_smarty_tpl->tpl_vars['currentContext']->value->getPath() != "index") {?>
    <?php echo '<script'; ?>
>
        window.location.href = "/ojs/index.php/index/fr/login";
    <?php echo '</script'; ?>
>
<?php }?>

<style>

.login-wrapper {
	min-height: 100vh;
	width: 100%;
	justify-content: center;       /* centre horizontalement */
	padding: 60px 16px 40px;
	box-sizing: border-box;
}

.login-card {
	width: 1000px;                 /* largeur fixe PC */
	box-shadow: 0 0 10px rgba(0,0,0,0.1);
	border-radius: 12px;
	background-color: #fff;
}

/* Ajustement pour les écrans mobiles */
@media (max-width: 768px) {
	.login-card {
		width: 100%;              /* largeur à 100% sur mobile */
		margin-top: 20px;         /* un peu moins de marge en haut */
		padding: 0 16px;          /* padding horizontal pour respirer */
		box-sizing: border-box;   /* inclure le padding dans la largeur */
	}
}










	.login-image {
		background-color: #f5f5f5;
		object-fit: cover;
		width: 100%;
			border-radius: 12px;

		height: 100%;
	}
	.login-form h2 {
		color: #4f0019;
		font-weight: bold;
	}
	.login-form .form-control {
		border-radius: 10px;
	}
	.login-form .btn-primary {
		background-color: #4f0019;
		border: none;
		border-radius: 10px;
		transition: 0.3s;
	}
	.login-form .btn-primary:hover {
		background-color: #6b1333;
	}
	.login-form .btn-outline-secondary {
		border-radius: 10px;
		transition: 0.3s;
	}
	.login-form small a {
		color: #4f0019;
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
  color: #4f0019;
  font-weight: bold;
}

@keyframes scroll-text {
  0%   { transform: translateX(100%); }
  100% { transform: translateX(-100%); }
}
















@media (max-width: 768px) {
	.login-wrapper {
		padding: 30px 16px;
	}

	.login-card {
		margin-top: 20px;
		flex-direction: column;
		align-items: center;
	}
}

</style>

<div class="login-wrapper">

	<div class="login-card d-flex flex-wrap">


<div class="marquee-container">
  <h1 class="shine-title">Bienvenue sur Notre Plateforme Scientifique</h1>
</div>


				<div class="d-none d-md-block col-md-6 p-0">
			<img src="<?php echo $_smarty_tpl->tpl_vars['baseUrl']->value;?>
/templates/images/structure/b.png" alt="Image de connexion" class="login-image">
		</div>

				<div class="col-12 col-md-6 p-5 login-form">
			<h2 class="text-center mb-4"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"user.login"),$_smarty_tpl ) );?>
</h2>

			<?php if ($_smarty_tpl->tpl_vars['loginMessage']->value) {?>
				<p class="alert alert-info"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>$_smarty_tpl->tpl_vars['loginMessage']->value),$_smarty_tpl ) );?>
</p>
			<?php }?>

			<?php if ($_smarty_tpl->tpl_vars['error']->value) {?>
				<div class="alert alert-danger">
					<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>$_smarty_tpl->tpl_vars['error']->value,'reason'=>$_smarty_tpl->tpl_vars['reason']->value),$_smarty_tpl ) );?>

				</div>
			<?php }?>

			<form class="cmp_form login" id="login" method="post" action="<?php echo $_smarty_tpl->tpl_vars['loginUrl']->value;?>
" role="form">
				<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['csrf'][0], array( array(),$_smarty_tpl ) );?>

				<input type="hidden" name="source" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( (($tmp = $_smarty_tpl->tpl_vars['source']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp) ));?>
" />

				<div class="mb-3">
					<label for="username" class="form-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"user.usernameOrEmail"),$_smarty_tpl ) );?>
 <span class="text-danger">*</span></label>
					<input type="text" class="form-control" id="username" name="username" value="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( (($tmp = $_smarty_tpl->tpl_vars['username']->value ?? null)===null||$tmp==='' ? '' ?? null : $tmp) ));?>
" required autocomplete="username">
				</div>

				<div class="mb-3">
					<label for="password" class="form-label"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"user.password"),$_smarty_tpl ) );?>
 <span class="text-danger">*</span></label>
					<input type="password" class="form-control" id="password" name="password" required maxlength="32" autocomplete="current-password">
					<small><a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>"login",'op'=>"lostPassword"),$_smarty_tpl ) );?>
"><?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"user.login.forgotPassword"),$_smarty_tpl ) );?>
</a></small>
				</div>

				<div class="form-check mb-3">
					<input class="form-check-input" type="checkbox" name="remember" id="remember" value="1" checked="<?php echo $_smarty_tpl->tpl_vars['remember']->value;?>
">
					<label class="form-check-label" for="remember">
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"user.login.rememberUsernameAndPassword"),$_smarty_tpl ) );?>

					</label>
				</div>

				<?php if ($_smarty_tpl->tpl_vars['recaptchaPublicKey']->value) {?>
					<div class="mb-3">
						<div class="g-recaptcha" data-sitekey="<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'escape' ][ 0 ], array( $_smarty_tpl->tpl_vars['recaptchaPublicKey']->value ));?>
"></div>
					</div>
				<?php }?>

				<?php if ($_smarty_tpl->tpl_vars['altchaEnabled']->value) {?>
					<div class="mb-3">
						<altcha-widget challengejson='<?php echo call_user_func_array($_smarty_tpl->registered_plugins[ 'modifier' ][ 'json_encode' ][ 0 ], array( $_smarty_tpl->tpl_vars['altchaChallenge']->value ));?>
' floating></altcha-widget>
					</div>
				<?php }?>

				<div class="d-grid gap-2">
					<button class="btn btn-primary" type="submit">
						<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"user.login"),$_smarty_tpl ) );?>

					</button>

					<?php if (!$_smarty_tpl->tpl_vars['disableUserReg']->value) {?>
						<a href="<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['url'][0], array( array('page'=>'user','op'=>'register','source'=>$_smarty_tpl->tpl_vars['source']->value),$_smarty_tpl ) );?>
" class="btn btn-outline-secondary">
							<?php echo call_user_func_array( $_smarty_tpl->smarty->registered_plugins[Smarty::PLUGIN_FUNCTION]['translate'][0], array( array('key'=>"user.login.registerNewAccount"),$_smarty_tpl ) );?>

						</a>
					<?php }?>
				</div>
			</form>
		</div>
	</div>

</div>

<?php $_smarty_tpl->_subTemplateRender("app:frontend/components/footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
}
}
