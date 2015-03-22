<?php 
$I = new FunctionalTester($scenario);

$I->am('a new customer');
$I->wantTo('add a dog to my profile');

$I->amOnRoute('register_dog_route');

$I->fillField('name', 'Tsuma');
$I->fillField('breed', 'dumb dog');
$I->selectOption('size', 'md');
$I->click('button[type=submit]');

$I->seeRecord('dogs', ['name' => 'Tsuma']);

