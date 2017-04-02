<?php
/**
 * Created by Spacebios
 */
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require __DIR__ . '/../vendor/autoload.php';


$lift = new \main\app\Elevator();

$lift->up();

echo $lift->getPosition() . "\n";
sleep(2);

echo $lift->getPosition() . "\n";

$lift->down();

sleep(4);
echo $lift->getPosition() . "\n";