<?php

/**
 * Created by Spacebios
 */
namespace main\app;

use main\app\state\UpState;
use main\app\state\DownState;

class Elevator
{
    function __construct()
    {
        $this->upState = new UpState();
        $this->downState = new DownState();
        $this->stopState = new StopState();
    }

    private $state;

    public $upState;
    public $downState;
    public $stopState;
    public $moveHeight;

    public function up()
    {
        $this->state->up($this);
    }

    public function down()
    {
        $this->state->down($this);
    }

    public function setState($st)
    {
        $this->state = $st;
    }

    public function moveTo()
    {

    }
}