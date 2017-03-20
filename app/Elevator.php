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
    }

    private $state;

    public $upState;
    public $downState;
    public $moveHeight;

    public function up()
    {
        $this->upState->up($this);
    }

    public function down()
    {
        $this->downState->down($this);
    }

    public function setState($st)
    {
        $this->state = $st;
    }

    public function moveTo()
    {

    }


}