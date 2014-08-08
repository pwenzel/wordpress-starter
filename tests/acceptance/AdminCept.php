<?php 
$I = new AcceptanceTester($scenario);
$I->am('an editor');
$I->wantTo('Administer posts');

TestCommons::logMeIn($I);

$I->expectTo('see my dashboard');
$I->see('Dashboard');

$I->click('Posts');
$I->expectTo('see the posts panel');
$I->see('Posts','h2');