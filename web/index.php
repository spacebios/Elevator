<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use \main\app\button\NumberButton;
use \main\app\Elevator;
use \main\app\ElevController;

require __DIR__ . '/../vendor/autoload.php';


$lift = new Elevator();
$ctrl = new ElevController();
$ctrl->setElevator($lift);
$numbtn1 = new NumberButton(5, $ctrl);
$numbtn2 = new NumberButton(9, $ctrl);
$numbtn3 = new NumberButton(12, $ctrl);

$numbtn1->press();

$numbtn3->press();

$numbtn2->press();

//
//$ctrl->visit(6);
//
//echo $lift->getPosition() . "\n";
//
//
//$lift->up();
//
//echo $lift->getPosition() . "\n";
//sleep(2);
//
//echo $lift->getPosition() . "\n";
//
//$lift->down();
//
//sleep(4);
//echo $lift->getPosition() . "\n";