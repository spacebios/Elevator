<?php

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
     * @param $e object
     */
    public function addController($e)
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
    public function visit($h)
    {

    }

    public function stop()
    {

    }
}