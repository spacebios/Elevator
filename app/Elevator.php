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
        $this->upState = new UpState();
        $this->downState = new DownState();
        $this->stopState = new StopState();
        $this->state = new StopState(); //default state
    }

    private $state;

    public $upState;
    public $downState;
    public $stopState;

    public $moveHeight = null; // meterts
    public $liftPosition = null; // meterts
    public $moveDirection = null; // -1/1
    public $moveSpeed = 1; // m/s
    public $isOpen = false;

    public $moveStartTime;
    public $moveEndTime;

//Public functions
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

    public function setState($st)
    {
        $this->state = $st;
    }

    public function getState()
    {
        return $this->state;
    }

    public function runDoorsMechanism()
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

    public function forceStop()
    {
        $this->moveEndTime = time();
        $this->makeSound();

    }

    public function moveTo()
    {
        $this->moveStartTime = time();
        $this->moveEndTime = $this->moveStartTime + $this->moveHeight/$this->moveSpeed;

        sleep($this->moveEndTime-$this->moveStartTime);

        $this->liftPosition = $this->liftPosition + $this->moveHeight * $this->moveDirection;
    }

    private function makeSound()
    {
        echo 'Ding-Dong';
    }
}