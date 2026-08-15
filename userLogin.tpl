{include file="frontend/components/header.tpl" pageTitle="user.login"}
{if $currentContext && $currentContext->getPath() != "index"}
    <script>
        window.location.href = "/ojs/index.php/index/fr/login";
    </script>
{/if}

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


		{* Image section *}
		<div class="d-none d-md-block col-md-6 p-0">
			<img src="{$baseUrl}/templates/images/structure/b.png" alt="Image de connexion" class="login-image">
		</div>

		{* Form section *}
		<div class="col-12 col-md-6 p-5 login-form">
			<h2 class="text-center mb-4">{translate key="user.login"}</h2>

			{if $loginMessage}
				<p class="alert alert-info">{translate key=$loginMessage}</p>
			{/if}

			{if $error}
				<div class="alert alert-danger">
					{translate key=$error reason=$reason}
				</div>
			{/if}

			<form class="cmp_form login" id="login" method="post" action="{$loginUrl}" role="form">
				{csrf}
				<input type="hidden" name="source" value="{$source|default:""|escape}" />

				<div class="mb-3">
					<label for="username" class="form-label">{translate key="user.usernameOrEmail"} <span class="text-danger">*</span></label>
					<input type="text" class="form-control" id="username" name="username" value="{$username|default:""|escape}" required autocomplete="username">
				</div>

				<div class="mb-3">
					<label for="password" class="form-label">{translate key="user.password"} <span class="text-danger">*</span></label>
					<input type="password" class="form-control" id="password" name="password" required maxlength="32" autocomplete="current-password">
					<small><a href="{url page="login" op="lostPassword"}">{translate key="user.login.forgotPassword"}</a></small>
				</div>

				<div class="form-check mb-3">
					<input class="form-check-input" type="checkbox" name="remember" id="remember" value="1" checked="{$remember}">
					<label class="form-check-label" for="remember">
						{translate key="user.login.rememberUsernameAndPassword"}
					</label>
				</div>

				{if $recaptchaPublicKey}
					<div class="mb-3">
						<div class="g-recaptcha" data-sitekey="{$recaptchaPublicKey|escape}"></div>
					</div>
				{/if}

				{if $altchaEnabled}
					<div class="mb-3">
						<altcha-widget challengejson='{$altchaChallenge|@json_encode}' floating></altcha-widget>
					</div>
				{/if}

				<div class="d-grid gap-2">
					<button class="btn btn-primary" type="submit">
						{translate key="user.login"}
					</button>

					{if !$disableUserReg}
						<a href="{url page='user' op='register' source=$source}" class="btn btn-outline-secondary">
							{translate key="user.login.registerNewAccount"}
						</a>
					{/if}
				</div>
			</form>
		</div>
	</div>

</div>

{include file="frontend/components/footer.tpl"}
