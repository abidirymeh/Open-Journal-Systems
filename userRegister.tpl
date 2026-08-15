{include file="frontend/components/header.tpl" pageTitle="user.register"}
{if $currentContext && $currentContext->getPath() != "index"}
    <script>
        window.location.href = "/ojs/index.php/index/fr/user/register";
    </script>
{/if}


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

{assign var="siteContextId" value=PKP\core\PKPApplication::SITE_CONTEXT_ID|intval}

<div class="register-container">
<div class="register-hero">
	<div class="marquee">
		Bienvenue à UJPS — Créez votre compte pour rejoindre notre plateforme scientifique 
	</div>
</div>


<div class="register-body register-card">
	<form class="pkp_form register" id="register" method="post" action="{url op="register"}" aria-label="Registration form">
		{csrf}
		{if $source}
			<input type="hidden" name="source" value="{$source|escape}" />
		{/if}

		{include file="common/formErrors.tpl"}
		{include file="frontend/components/registrationForm.tpl"}
		{include file="frontend/components/registrationFormContexts.tpl"}

				{if $currentContext}
					<fieldset class="consent" aria-labelledby="consent-legend">
						{if $currentContext->getSetting('privacyStatement')}
							<div class="form-group optin optin-privacy">
								<label>
									<input type="checkbox" name="privacyConsent" value="1"{if $privacyConsent} checked="checked"{/if} aria-required="true">
									{capture assign="privacyUrl"}{url router=\PKP\core\PKPApplication::ROUTE_PAGE page="about" op="privacy"}{/capture}
									{translate key="user.register.form.privacyConsent" privacyUrl=$privacyUrl}
								</label>
							</div>
						{/if}
						<div class="form-group optin optin-email">
							<label>
								<input type="checkbox" name="emailConsent" value="1"{if $emailConsent} checked="checked"{/if}>
								{translate key="user.register.form.emailConsent"}
							</label>
						</div>
					</fieldset>

					{assign var=contextId value=$currentContext->getId()}
					{assign var=userCanRegisterReviewer value=0}
					{foreach from=$reviewerUserGroups[$contextId] item=userGroup}
						{if $userGroup->permitSelfRegistration}
							{assign var=userCanRegisterReviewer value=$userCanRegisterReviewer+1}
						{/if}
					{/foreach}
					{if $userCanRegisterReviewer}
						<fieldset class="reviewer" aria-labelledby="reviewer-legend">
							<legend id="reviewer-legend">
								{if $userCanRegisterReviewer > 1}
									{translate key="user.reviewerPrompt"}
								{else}
									{translate key="user.reviewerPrompt.optin"}
								{/if}
							</legend>
							<div class="fields">
								<div id="reviewerOptinGroup" class="form-group optin">
									{foreach from=$reviewerUserGroups[$contextId] item=userGroup}
										{if $userGroup->permitSelfRegistration}
											<label>
												{assign var="userGroupId" value=$userGroup->id}
												<input type="checkbox" name="reviewerGroup[{$userGroupId}]" value="1"{if in_array($userGroupId, $userGroupIds)} checked="checked"{/if}>
												{translate key="user.reviewerPrompt.userGroup" userGroup=$userGroup->getLocalizedData('name')|escape}
											</label>
										{/if}
									{/foreach}
								</div>
								<div id="reviewerInterests" class="form-group reviewer_interests">
									<label for="interests">
										{translate key="user.interests"}
										<input class="form-control" type="text" name="interests" id="interests" value="{$interests|default:""|escape}" aria-describedby="interests-help">
										<span id="interests-help" class="sr-only">{translate key="user.register.noContextReviewerInterests"}</span>
									</label>
								</div>
							</div>
						</fieldset>
					{/if}
				{/if}

				{if !$currentContext}
					<fieldset class="consent" aria-labelledby="consent-legend">
						{if $siteWidePrivacyStatement}
							<div class="form-group optin optin-privacy">
								<label>
									<input type="checkbox" name="privacyConsent[{$siteContextId}]" id="privacyConsent[{$siteContextId}]" value="1"{if $privacyConsent[$siteContextId]} checked="checked"{/if} aria-required="true">
									{capture assign="privacyUrl"}{url router=\PKP\core\PKPApplication::ROUTE_PAGE page="about" op="privacy"}{/capture}
									{translate key="user.register.form.privacyConsent" privacyUrl=$privacyUrl}
								</label>
							</div>
						{/if}
						<div class="form-group optin optin-email">
							<label>
								<input type="checkbox" name="emailConsent" value="1"{if $emailConsent} checked="checked"{/if}>
								{translate key="user.register.form.emailConsent"}
							</label>
						</div>
						<div class="form-group reviewer_nocontext_interests">
							<label for="interests">
								{translate key="user.register.noContextReviewerInterests"}
								<input class="form-control" type="text" name="interests" id="interests" value="{$interests|default:""|escape}" aria-describedby="interests-help">
								<span id="interests-help" class="sr-only">{translate key="user.register.noContextReviewerInterests"}</span>
							</label>
						</div>
					</fieldset>
				{/if}

				{if $recaptchaPublicKey}
					<fieldset class="recaptcha_wrapper" aria-labelledby="recaptcha-legend">
						<legend id="recaptcha-legend" class="sr-only">{translate key="common.recaptcha"}</legend>
						<div class="fields">
							<div class="recaptcha">
								<div class="g-recaptcha" data-sitekey="{$recaptchaPublicKey|escape}"></div>
							</div>
						</div>
					</fieldset>
				{/if}

				{if $altchaEnabled}
					<fieldset class="altcha_wrapper" aria-labelledby="altcha-legend">
						<legend id="altcha-legend" class="sr-only">{translate key="common.altcha"}</legend>
						<div class="fields">
							<altcha-widget challengejson='{$altchaChallenge|@json_encode}' floating></altcha-widget>
						</div>
					</fieldset>
				{/if}

						<div class="buttons d-grid gap-2 mt-4">
			<button class="btn btn-primary" type="submit">
				{translate key="user.register"}
			</button>
			{capture assign="rolesProfileUrl"}{url page="user" op="profile" path="roles"}{/capture}
			<a class="btn btn-outline-secondary" href="{url page="login" source=$rolesProfileUrl}">
				{translate key="user.login"}
			</a>
		</div>
	</form>
</div>
{include file="common/frontend/footer.tpl"}