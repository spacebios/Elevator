<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use \main\app\architect\Architect;

require __DIR__ . '/../vendor/autoload.php';

$architect = new Architect();
$architect->construct();


