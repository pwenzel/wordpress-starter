<?php 
$I = new AcceptanceTester($scenario);
$I->am('Google Bot');
$I->wantTo('See the XML Sitemap');

$I->sendGET('/sitemap.xml');
$I->seeResponseCodeIs(200);
$I->seeResponseIsXml();
$I->see('<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"');
$I->dontSee('<b>Notice</b>'); // error sometimes thrown if Wordpress timezone not set
$I->dontSee('error');
