<?php

/**
 * Created by Spacebios
 */
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
     * @var bool
     */
    public $isbusy = false;

    /**
     * @var UpState
     */
    public $upState;

    /**
     * @var DownState
     */
    public $downState;

    /**
     * @var StopState
     */
    public $stopState;

    /**
     * @var int
     ***meterts***
     */
    public $liftPosition = 0;

    /**
     * @var int
     ***m/s***
     */
    public $moveSpeed = 1;

    /**
     * @var int
     ***timestamp***
     */
    public $moveStartTime;

    /**
     * @var int
     ***timestamp***
     */
    public $moveEndTime;

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
     * @return int
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
        $this->runDoorsMechanism(); //open lift
        sleep(3); //waiting for passengers
        $this->runDoorsMechanism(); //close lift
    }

/*----------------------------------------Private functions-----------------------------------------------------------*/
    private function makeSound()
    {
        echo 'Ding-Dong';
    }

    private function runDoorsMechanism()
    {
        if(!$this->isOpen){
            $this->isOpen = true;
            sleep(1);
            echo 'The doors are opened';
        }else{
            $this->isOpen = false;
            sleep(1);
            echo 'The doors are closed.';
        }
    }
}
