<?php

declare(strict_types=1);

namespace main\app\elevatorController;

/**
 * Class MultiElevController
 * @package main\app\elevatorController
 */
class MultiElevController implements ElevatorControllerInterface
{
    /**
     * @var array of objects
     */
    private $controller = Array();

    /**
     * @param $e ElevatorControllerInterface
     */
    public function addController(ElevatorControllerInterface $e)
    {
        array_push($this->controller, $e);
    }

    /**
     * @return array of objects
     */
    public function getElevator()
    {

    }

    /**
     * @param $h float
     */
    public function visit(float $h)
    {

    }

    public function stop()
    {

    }
}