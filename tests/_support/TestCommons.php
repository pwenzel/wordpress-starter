<?php
/**
 * @link http://codeception.com/docs/07-AdvancedUsage
 */
class TestCommons
{
    public static $username = TEST_WP_USERNAME;
    public static $password = TEST_WP_PASSWORD;
    public static $feedkey  = TEST_WP_FEEDKEY;

    public static function logMeIn($I)
    {
        $I->amOnPage('/wp-login.php');
        $I->fillField('Username', self::$username);
        $I->fillField('Password', self::$password);
        $I->click('Log In');
    }

}