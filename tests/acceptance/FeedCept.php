<?php 
$I = new AcceptanceTester($scenario);
$I->am('a feed reader');
$I->wantTo('Check for a valid RSS Feed');

$I->sendGET('/feed/' . TestCommons::getFeedKey());
$I->seeResponseCodeIs(200);
$I->seeResponseIsXml();
