<?php

declare(strict_types=1);

namespace main\app\architector;


use main\app\Elevator;
use main\app\elevatorController\ElevatorController;
use main\app\Floor;

/**
 * Class BuildingBuilder
 * @package main\app\architector
 */
class BuildingBuilder
{
    public $floors;

    public $elevator;

    public $controller;

    public function addFloor($name, $height)
    {
        array_push($this->floors, new Floor($name, $height));
    }

    public function addController()
    {
        $this->controller = new ElevatorController();
        if($this->elevator instanceof Elevator) $this->controller->setElevator($this->elevator);
    }

    public function addElevator()
    {
        $this->elevator = new Elevator();
        if($this->controller instanceof ElevatorController) $this->controller->setElevator($this->elevator);
    }
}