<?php 
$I = new AcceptanceTester($scenario);
$I->am('a bot');
$I->wantTo('Get posts from the JSON API');

$I->amGoingTo('query the JSON API');
$I->sendGET('/', array('json'=>1));

$I->expect("a valid JSON response");
$I->seeResponseCodeIs(200);
$I->seeResponseIsJson();
$I->seeResponseContainsJson(array('status' => 'ok'));

$I->amGoingTo('inspect the posts in the response');
$posts = $I->grabDataFromJsonResponse('posts');

$I->expectTo("see at least one post");
$I->assertGreaterThenOrEqual(1, count($posts));