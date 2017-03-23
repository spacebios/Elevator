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

    public $moveHeight;
    public $liftPosition;
    public $isOpen = false;


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

    public function moveTo()
    {

    }
}