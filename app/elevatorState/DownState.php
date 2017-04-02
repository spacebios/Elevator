<?php
/**
 * Created by Spacebios.
 */

namespace main\app\elevatorState;


use main\app\Elevator;

/**
 * Class DownState
 * @package main\app\state
 */
class DownState implements StateInterface
{
    /**
     * DownState constructor.
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
        $this->stop();
        $this->elev->getState()->up();
    }

    public function down()
    {

    }

    public function stop()
    {
        $this->elev->setState($this->elev->getStopState());
        $this->elev->setLiftPosition($this->elev->getLiftPosition() - (time() - $this->elev->getMoveStartTime()) * $this->elev->getMoveSpeed());
    }
}