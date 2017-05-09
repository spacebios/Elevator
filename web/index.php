<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use \main\app\button\NumberButton;
use \main\app\Elevator;
use \main\app\elevatorController\ElevatorController;

require __DIR__ . '/../vendor/autoload.php';


$lift = new Elevator();
$ctrl = new ElevatorController();
$ctrl->setElevator($lift);

$numbtn0 = new NumberButton('street', 5, $ctrl);
$numbtn1 = new NumberButton('1', 9, $ctrl);
$numbtn2 = new NumberButton('2', 12, $ctrl);
$numbtn3 = new NumberButton('3', 12, $ctrl);

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