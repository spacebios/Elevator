<?php
/**
 * Created by PhpStorm.
 * User: Mashka
 * Date: 02.04.2017
 * Time: 15:16
 */

namespace main\app;


interface ElevControllerInterface
{
    public function visit($h);
    public function stop();
    public function getElevator();
}