<?php

namespace main\app\elevatorController;

/**
 * Interface ElevatorControllerInterface
 * @package main\app\elevatorController
 */
interface ElevatorControllerInterface
{
    public function visit($h);
    public function stop();
    public function getElevator();
}