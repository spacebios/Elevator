<?php
/**
 * Created by Spacebios.
 */

namespace main\app\state;

use main\app\Elevator;

/**
 * Class DownState
 * @package main\app\state
 */
class DownState implements StateInterface
{
    /**
     * DownState constructor.
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
        $this->elev->setState($this->elev->downState);
        $this->moveStartTime = time();
    }

    public function down()
    {

    }

    public function stop()
    {
        $this->elev->setState($this->elev->downState);
        $this->moveStartTime = time();
    }
}