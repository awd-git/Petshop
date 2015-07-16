<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');

include_once(dirname(__DIR__).'/vendor/autoload.php');

@$cat = new \Animals\Cat();

printf("Name is currently %s\n", $cat->getName());

$cat->setName("Garfield");

printf("Name has been changed to %s\n", $cat->getName());

$cat->speak(); echo PHP_EOL;
$cat->speak('brrrr'); echo PHP_EOL;

@$dog = new \Animals\Dog();

printf("Name is currently %s\n", $dog->getName());

$dog->setName("Odie");

printf("Name has been changed to %s\n", $dog->getName());

$dog->speak(); echo PHP_EOL;

include 'petShop.php';
saveTest();
savePetShop();

logStats();

logStats('we are done');