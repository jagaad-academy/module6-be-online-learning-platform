<?php
/**
 * RegistrationCest.php
 * hennadii.shvedko
 * 31.10.2023
 */

namespace App\Tests\acceptance;

use App\Tests\AcceptanceTester;

class CourseEnrollmentCest
{
    public function enrollmentWorks(AcceptanceTester $I)
    {
        $I->amOnPage('/login');
        $I->fillField('_username', 'TestusernameAcceptance');
        $I->fillField('_password', '123456');
        $I->click('button[type="submit"]');
        $I->see('Profile of TESTUSERNAMEACCEPTANCE');

        $I->amOnPage('/courses');
        $I->seeElement('.course-item');
        $I->click('Join Now');
        $I->see('Information about the course');
    }
}
