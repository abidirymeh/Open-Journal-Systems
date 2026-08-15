<?php

/**
 * @file classes/user/form/ContactForm.php
 *
 * Copyright (c) 2014-2021 Simon Fraser University
 * Copyright (c) 2003-2021 John Willinsky
 * Distributed under the GNU GPL v3. For full terms see the file docs/COPYING.
 *
 * @class ContactForm
 *
 * @ingroup user_form
 *
 * @brief Form to edit user's contact information.
 */

namespace PKP\user\form;

use APP\core\Application;
use APP\facades\Repo;
use APP\template\TemplateManager;
use PKP\facades\Locale;
use PKP\invitation\core\enums\InvitationStatus;
use PKP\invitation\invitations\changeProfileEmail\ChangeProfileEmailInvite;
use PKP\invitation\models\InvitationModel;
use PKP\user\User;

class ContactForm extends BaseProfileForm
{
    public const ACTION_CANCEL_EMAIL_CHANGE = 'cancelPendingEmail';

    /**
     * Constructor.
     *
     * @param User $user
     */
    public function __construct($user)
    {
        parent::__construct('user/contactForm.tpl', $user);

        // Validation checks for this form
        $this->addCheck(new \PKP\form\validation\FormValidatorEmail($this, 'email', 'required', 'user.profile.form.emailRequired'));
        $this->addCheck(new \PKP\form\validation\FormValidator($this, 'country', 'required', 'user.profile.form.countryRequired'));
        $this->addCheck(new \PKP\form\validation\FormValidatorCustom(
            $this,
            'email',
            'required',
            'user.register.form.emailExists',
            function (string $email, int $userId) {
                if ($user = Repo::user()->getByEmail($email, true)) {
                    return (int)$user->getId() === $userId;
                }

                return true;
            },
            [(int)$user->getId()]
        ));





             // Validation pour les e-mails privés
        $this->addCheck(new \PKP\form\validation\FormValidatorEmail($this, 'email_private_1', 'optional', 'user.profile.form.emailRequired'));
        $this->addCheck(new \PKP\form\validation\FormValidatorEmail($this, 'email_private_2', 'optional', 'user.profile.form.emailRequired'));
        $this->addCheck(new \PKP\form\validation\FormValidatorCustom(
            $this,
            'email_private_1',
            'optional',
            'user.register.form.emailExists',
            function (string $email, int $userId) {
                if ($email === '') return true;
                if ($user = Repo::user()->getByEmail($email, true)) {
                    return (int)$user->getId() === $userId;
                }
                return true;
            },
            [(int)$user->getId()]
        ));
        $this->addCheck(new \PKP\form\validation\FormValidatorCustom(
            $this,
            'email_private_2',
            'optional',
            'user.register.form.emailExists',
            function (string $email, int $userId) {
                if ($email === '') return true;
                if ($user = Repo::user()->getByEmail($email, true)) {
                    return (int)$user->getId() === $userId;
                }
                return true;
            },
            [(int)$user->getId()]
        ));
    }





    /**
     * @copydoc BaseProfileForm::fetch
     *
     * @param null|mixed $template
     */
    public function fetch($request, $template = null, $display = false)
    {
        $site = $request->getSite();
        $countries = [];
        foreach (Locale::getCountries() as $country) {
            $countries[$country->getAlpha2()] = $country->getLocalName();
        }
        asort($countries);
        $templateMgr = TemplateManager::getManager($request);

        $invitationModel = InvitationModel::byType(ChangeProfileEmailInvite::INVITATION_TYPE)
            ->byUserId($this->_user->getId())
            ->stillActive()
            ->first();

        $invitation = new ChangeProfileEmailInvite($invitationModel);

        $templateMgr->assign([
            'countries' => $countries,
            'availableLocales' => $site->getSupportedLocaleNames(),
            'changeEmailPending' => $invitationModel ? $invitation->getPayload()->newEmail : null,
        ]);

        return parent::fetch($request, $template, $display);
    }

    /**
     * @copydoc BaseProfileForm::initData()
     */
    public function initData()
    {
        $user = $this->getUser();

        $this->_data = [
            'country' => $user->getCountry(),
            'email' => $user->getEmail(),
            'phone' => $user->getPhone(),
            'signature' => $user->getSignature(null), // Localized
            'mailingAddress' => $user->getMailingAddress(),
            'affiliation' => $user->getAffiliation(null), // Localized
            'locales' => $user->getLocales(),
            'email_private_1' => $user->getData('email_private_1'),
            'email_private_2' => $user->getData('email_private_2'),
            ];

            error_log('initData - email_private_1: ' . ($this->_data['email_private_1'] ?? 'null'));
            error_log('initData - email_private_2: ' . ($this->_data['email_private_2'] ?? 'null'));
    }

    /**
     * Assign form data to user-submitted data.
     */
       public function readInputData()
    {
        parent::readInputData();

        $this->readUserVars([
            'country', 'email', 'signature', 'phone', 'mailingAddress', 'affiliation', 'locales', 'pendingEmail', 'action',
            'email_private_1', 'email_private_2',
        ]);

        error_log('readInputData - email_private_1: ' . ($this->getData('email_private_1') ?? 'null'));
        error_log('readInputData - email_private_2: ' . ($this->getData('email_private_2') ?? 'null'));

        if ($this->getData('locales') == null || !is_array($this->getData('locales'))) {
            $this->setData('locales', []);
        }
    }

    /**
     * @copydoc Form::execute()
     */
    public function cancelPendingEmail()
    {
        $user = $this->getUser();

        $invitationModel = InvitationModel::byType(ChangeProfileEmailInvite::INVITATION_TYPE)
            ->byUserId($user->getId())
            ->stillActive()
            ->first();

        if ($invitationModel) {
            $invitation = new ChangeProfileEmailInvite($invitationModel);

            $formPendingEmail = $this->getData('pendingEmail');
            if ($invitation->getPayload()->newEmail == $formPendingEmail) {
                $invitationModel->markAs(InvitationStatus::DECLINED);
            }
        }
    }

    /**
     * @copydoc Form::execute()
     */
    public function execute(...$functionArgs)
{
    $user = $this->getUser();

    error_log('execute - Début pour user_id: ' . $user->getId());

    if ($user->getEmail() !== $this->getData('email')) {
        $functionArgs['emailUpdated'] = $this->getData('email');
    }

    parent::execute(...$functionArgs);

    $user->setCountry($this->getData('country'));
    $user->setSignature($this->getData('signature'), null);
    $user->setPhone($this->getData('phone'));
    $user->setMailingAddress($this->getData('mailingAddress'));
    $user->setAffiliation($this->getData('affiliation'), null);

    error_log('execute - Avant setData - email_private_1: ' . ($this->getData('email_private_1') ?? 'null'));
    error_log('execute - Avant setData - email_private_2: ' . ($this->getData('email_private_2') ?? 'null'));

    $user->setData('email_private_1', $this->getData('email_private_1'));
    $user->setData('email_private_2', $this->getData('email_private_2'));

    error_log('execute - Après setData - email_private_1: ' . ($user->getData('email_private_1') ?? 'null'));
    error_log('execute - Après setData - email_private_2: ' . ($user->getData('email_private_2') ?? 'null'));

    try {
        Repo::user()->edit($user);
        error_log('execute - Utilisateur sauvegardé avec succès - user_id: ' . $user->getId());
    } catch (Exception $e) {
        error_log('execute - Erreur lors de la sauvegarde de l\'utilisateur: ' . $e->getMessage());
    }

    $request = Application::get()->getRequest();
    $site = $request->getSite();
    $availableLocales = $site->getSupportedLocales();
    $locales = [];
    foreach ($this->getData('locales') as $locale) {
        if (Locale::isLocaleValid($locale) && in_array($locale, $availableLocales)) {
            $locales[] = $locale;
        }
    }
    $user->setLocales($locales);

    error_log('execute - Fin pour user_id: ' . $user->getId());
}
}

if (!PKP_STRICT_MODE) {
    class_alias('\PKP\user\form\ContactForm', '\ContactForm');
}