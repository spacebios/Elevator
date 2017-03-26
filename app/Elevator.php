<?php

/**
 * Created by Spacebios
 */
namespace main\app;

use main\app\state\UpState;
use main\app\state\DownState;
use main\app\state\StopState;

class Elevator
{
    function __construct()
    {
//        $this->upState = new UpState($this);
//        $this->downState = new DownState($this);
//        $this->stopState = new StopState($this);
//        $this->state = new StopState(); //default state
    }

    private $state = 'STOP';

    public $upState;
    public $downState;
    public $stopState;

    public $moveHeight = null; // meterts
    public $liftPosition = 0; // meterts
    public $moveDirection = null; // -1/1
    public $moveSpeed = 1; // m/s
    public $isOpen = false;
    public $moveStartTime; //timestamp
    public $moveEndTime; //timestamp

/*----------------------------------------Public functions------------------------------------------------------------*/
    public function up()
    {
//        $this->state->up();
        if($this->state == 'UP'){

        }elseif ($this->state == 'DOWN'){
            $this->setState('UP');
            $this->moveStartTime = time();
        }elseif ($this->state == 'STOP'){
            $this->setState('UP');
            $this->moveStartTime = time();
        }
    }

    public function down()
    {
//        $this->state->down();

    }

    public function stop()
    {
//        $this->state->stop();
        if($this->state == 'UP'){
            $this->liftPosition = $this->liftPosition + (time() - $this->moveStartTime) * $this->moveSpeed;
            $this->setState('STOP');
        }elseif ($this->state == 'DOWN'){
            $this->liftPosition = $this->liftPosition - (time() - $this->moveStartTime) * $this->moveSpeed;
            $this->setState('STOP');
        }elseif ($this->state == 'STOP'){

        }
    }

    function setState($st)
    {
        $this->state = $st;
    }

    public function getState()
    {
        return $this->state;
    }

    public function getPosition()
    {
        if($this->state == 'UP'){
            return $this->liftPosition + (time() - $this->moveStartTime) * $this->moveSpeed;
        }elseif ($this->state == 'DOWN'){
            return $this->liftPosition - (time() - $this->moveStartTime) * $this->moveSpeed;
        }elseif ($this->state == 'STOP'){
            return $this->liftPosition;
        }
    }

    public function forceStop()
    {
        $this->moveEndTime = time();
        $this->makeSound();
        $this->stop();
    }

    public function moveTo()
    {
        $this->moveStartTime = time();  //set move start time
        $this->moveEndTime = $this->moveStartTime + $this->moveHeight/$this->moveSpeed;  //set move end time

        sleep($this->moveEndTime-$this->moveStartTime);  //wait until the elevator moves
        $this->liftPosition = $this->liftPosition + $this->moveHeight * $this->moveDirection; //change lift position
        $this->liftLanding(); //landing passengers
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
            echo 'The doors are closed. Start moving...';
        }
    }

    private function liftLanding()
    {
        $this->makeSound(); //"ding-dong" sound when lift is already came
        $this->runDoorsMechanism(); //open lift
        sleep(5); //waiting for passengers
        $this->runDoorsMechanism(); //close lift
    }
}
