<?php
/**
 * RegistrationCest.php
 * hennadii.shvedko
 * 31.10.2023
 */

namespace App\Tests\acceptance;

use App\Tests\AcceptanceTester;

class RegistrationCest
{
    public function frontpageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/');
        $I->see('Jagaad online learning platform');
    }

    public function registrationPageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/register');
        $I->seeElement('#registration_form_username');
        $I->seeElement('#registration_form_email');
        $I->seeElement('#registration_form_plainPassword');
        $I->seeElement('#registration_form_agreeTerms');
        $I->seeElement('button[type="submit"]');
    }

    public function registrationFormWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/register');
        $I->fillField('registration_form[username]', 'TestusernameAcceptance');
        $I->fillField('registration_form[email]', 'testusernameAcceptance@test.com');
        $I->fillField('registration_form[plainPassword]', '123456');
        $I->checkOption('Agree terms');
        $I->click('Register');
        $I->amOnPage('/login');
        $I->see('Login');
    }
}
