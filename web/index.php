<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use \main\app\button\NumberButton;
use \main\app\Elevator;
use \main\app\elevatorController\ElevatorController;
use \main\app\architector\BuildingBuilder;

require __DIR__ . '/../vendor/autoload.php';

$building = (new BuildingBuilder())->addElevator()->addController();
$building->addFloor(0, 0);
$building->addFloor(1, 2);
$building->addFloor(2, 4);
$building->addFloor(3, 6);
$building->addFloor(4, 8);
