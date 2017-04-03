<?php

namespace main\app;

use main\app\elevatorState\UpState;
use main\app\elevatorState\DownState;
use main\app\elevatorState\StopState;

/**
 * Class Elevator
 * @package main\app
 */

class Elevator
{
    /**
     * Elevator constructor.
     */
    function __construct()
    {
        $this->upState = new UpState($this);
        $this->downState = new DownState($this);
        $this->stopState = new StopState($this);
        $this->state = new StopState($this); //default state
    }

    /**
     * @var StopState as default
     */
    private $state;

    /**
     * @var bool
     */
    private $isOpen = false;

    /**
     * @var int (timestamp)
     */
    private $moveStartTime;

    /**
     * @var UpState
     */
    private $upState;

    /**
     * @var DownState
     */
    private $downState;

    /**
     * @var StopState
     */
    private $stopState;

    /**
     * @var float
     ***meterts***
     */
    private $liftPosition = 0;

    /**
     * @var float
     ***m/s***
     */
    private $moveSpeed = 1;

/*----------------------------------------Public functions------------------------------------------------------------*/
    public function up()
    {
        $this->state->up();
    }

    public function down()
    {
        $this->state->down();
    }

    public function stop()
    {
        $this->state->stop();
    }

    /**
     * @param $st object
     */
    public function setState($st)
    {
        $this->state = $st;
    }

    /**
     * @return object
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @return UpState
     */
    public function getUpState()
    {
        return $this->upState;
    }

    /**
     * @return DownState
     */
    public function getDownState()
    {
        return $this->downState;
    }

    /**
     * @return StopState
     */
    public function getStopState()
    {
        return $this->stopState;
    }

    /**
     * @param $t int
     */
    public function setMoveStartTime($t)
    {
        $this->moveStartTime = $t;
    }

    /**
     * @return int (timestamp)
     */
    public function getMoveStartTime()
    {
       return $this->moveStartTime;
    }

    /**
     * @param $p float
     */
    public function setLiftPosition($p)
    {
        $this->liftPosition = $p;
    }

    /**
     * @return float
     */
    public function getLiftPosition()
    {
        return $this->liftPosition;
    }

    /**
     * @return float
     */
    public function getMoveSpeed()
    {
        return $this->moveSpeed;
    }

    /**
     * @return float
     */
    public function getPosition()
    {
        if($this->state == $this->upState){
            return $this->liftPosition + (time() - $this->moveStartTime) * $this->moveSpeed; //for UP state
        }elseif ($this->state == $this->downState){
            return $this->liftPosition - (time() - $this->moveStartTime) * $this->moveSpeed; //for DOWN state
        }else{
            return $this->liftPosition; //for STOP state
        }
    }

    public function liftLanding()
    {
        $this->makeSound(); //"ding-dong" sound when lift is already came
        sleep(0.5);
        echo "Elevator already came...\n";
        $this->runDoorsMechanism(); //open lift
        echo "Landing passangers...\n";
        sleep(3); //waiting for passengers
        $this->runDoorsMechanism(); //close lift
    }

/*----------------------------------------Private functions-----------------------------------------------------------*/
    private function makeSound()
    {
        echo "Ding-Dong \n";
    }

    private function runDoorsMechanism()
    {
        if(!$this->isOpen){
            $this->isOpen = true;
            sleep(1);
            echo "The doors are opened \n";
        }else{
            $this->isOpen = false;
            sleep(1);
            echo "The doors are closed \n";
        }
    }
}
