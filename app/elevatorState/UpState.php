<?php
/**
 * Created by Spacebios.
 */

namespace main\app\elevatorState;


use main\app\Elevator;

/**
 * Class UpState
 * @package main\app\state
 *
 * @property Elevator $elev
 */
class UpState implements StateInterface
{
    /**
     * UpState constructor.
     * @param $e Elevator
     */
    public function __construct($e)
    {
        $this->elev = $e;
    }

    /**
     * @var UpState
     */
    private $elev;

    public function up()
    {

    }

    public function down()
    {
        $this->stop();
        $this->elev->getState()->down();
    }

    public function stop()
    {
        $this->elev->setState($this->elev->getStopState());
        $this->elev->setLiftPosition($this->elev->getLiftPosition() + (time() - $this->elev->getMoveStartTime()) * $this->elev->getMoveSpeed());
    }
}