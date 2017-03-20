<?php

/**
 * Created by PhpStorm.
 * User: SEO-2
 * Date: 20.03.2017
 * Time: 11:00
 */
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