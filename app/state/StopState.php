<?php
/**
 * Created by Spacebios.
 */

namespace main\app\state;

use main\app\Elevator;

/**
 * Class StopState
 * @package main\app\state
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
        $this->elev->liftPosition = $this->elev->liftPosition + (time() - $this->elev->moveStartTime) * $this->elev->moveSpeed;
        $this->elev->setState($this->elev->stopState);
    }

    public function down()
    {
        $this->elev->liftPosition = $this->elev->liftPosition + (time() - $this->elev->moveStartTime) * $this->elev->moveSpeed;
        $this->elev->setState($this->elev->stopState);
    }

    public function stop()
    {

    }
}