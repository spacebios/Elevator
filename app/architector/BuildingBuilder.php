<?php

declare(strict_types=1);

namespace main\app\architector;


use main\app\Elevator;
use main\app\elevatorController\ElevatorController;
use main\app\elevatorController\ElevatorControllerInterface;
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

    public $numberButtons;

    /**
     * @param string $name
     * @param float $height
     * @return $this
     */
    public function addFloor(string $name, float $height)
    {
        if($this->controller instanceof ElevatorController){

            $floor = (new Floor($name, $height))->addDirectionButtons($this->controller);
            array_push($this->floors, $floor);
            array_push($this->numberButtons, $floor->createNumberButton($this->controller));
            return $this;
        }else{
            echo "You should add controller first";
            return $this;
        }
    }

    public function addController()
    {
        $this->controller = new ElevatorController();
        if($this->elevator instanceof Elevator) $this->controller->setElevator($this->elevator);
        return $this;
    }

    public function addElevator()
    {
        $this->elevator = new Elevator();
        if($this->controller instanceof ElevatorController) $this->controller->setElevator($this->elevator);
        return $this;
    }

    /**
     * @return Building
     */
    public function build() : Building
    {
        return new Building($this);
    }

    /**
     * @return array
     */
    public function getFloors() : array
    {
        return $this->floors;
    }

    /**
     * @return Elevator
     */
    public function getElevator() : Elevator
    {
        return $this->elevator;
    }

    /**
     * @return ElevatorControllerInterface
     */
    public function getController() : ElevatorControllerInterface
    {
        return $this->controller;
    }

    /**
     * @return array
     */
    public function getNumberButtons() : array
    {
        return $this->numberButtons;
    }
}