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
        $this->upState = new UpState($this);
        $this->downState = new DownState($this);
        $this->stopState = new StopState($this);
        $this->state = new StopState($this); //default state
    }

    private $state;

    public $upState;
    public $downState;
    public $stopState;

    public $moveHeight; //meterts
    public $moveDirection = null; //-1/1
    public $isOpen = false;

    public $liftPosition = 0; //meterts
    public $moveSpeed = 1; // m/s
    public $moveStartTime; //timestamp
    public $moveEndTime; //timestamp

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
        if($this->state == $this->upState){
            return $this->liftPosition + (time() - $this->moveStartTime) * $this->moveSpeed; //for UP state
        }elseif ($this->state == $this->downState){
            return $this->liftPosition - (time() - $this->moveStartTime) * $this->moveSpeed; //for DOWN state
        }else{
            return $this->liftPosition; //for STOP state
        }
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
            echo 'The doors are closed.';
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
