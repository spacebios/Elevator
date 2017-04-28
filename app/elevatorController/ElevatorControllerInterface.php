<?php

declare(strict_types=1);

namespace main\app\elevatorController;

/**
 * Interface ElevatorControllerInterface
 * @package main\app\elevatorController
 */
interface ElevatorControllerInterface
{
    public function visit(float $h);
    public function stop();
    public function getElevator();
}