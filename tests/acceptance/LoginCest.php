<?php
/**
 * RegistrationCest.php
 * hennadii.shvedko
 * 31.10.2023
 */

namespace App\Tests\acceptance;

use App\Tests\AcceptanceTester;

class LoginCest
{
    public function authorizationPageWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->seeElement('#username');
        $I->seeElement('#password');
        $I->seeElement('button[type="submit"]');
    }
    public function authorizationFormFailedOnWrongCredentials(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('_username', 'TestusernameAcceptance1');
        $I->fillField('_password', '123456');
        $I->click('button[type="submit"]');
        $I->see('Invalid credentials.');
    }

    public function authorizationFormWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('_username', 'TestusernameAcceptance');
        $I->fillField('_password', '123456');
        $I->click('button[type="submit"]');
        $I->see('Profile of TestusernameAcceptance');
    }
}
