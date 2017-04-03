<?php

namespace main\app\elevatorState;


use main\app\Elevator;

/**
 * Class StopState
 * @package main\app\elevatorState
 */
class StopState implements StateInterface
{
    /**
     * StopState constructor.
     * @param $e Elevator
     */
    public function __construct($e)
    {
        $this->elev = $e;
    }

    /**
    * @var Elevator
    */
    private $elev;


    public function up()
    {
        $this->elev->setMoveStartTime(time());
        $this->elev->setState($this->elev->getUpState());
    }

    public function down()
    {
        $this->elev->setMoveStartTime(time());
        $this->elev->setState($this->elev->getDownState());
    }

    public function stop()
    {

    }
}