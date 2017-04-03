<?php

namespace main\app;

/**
 * Interface ElevControllerInterface
 * @package main\app
 */
interface ElevControllerInterface
{
    public function visit($h);
    public function stop();
    public function getElevator();
}