<?php
/**
 * Created by Spacebios.
 */

namespace main\app\state;

use main\app\Elevator;

/**
 * Class UpState
 * @package main\app\state
 *
 * @property Elevator $elev
 */
class UpState implements StateInterface
{

    /**
     * UpState constructor.
     * @param $e Elevator
     */
    public function __construct($e)
    {
        $this->elev = $e;
    }

    /**
     * @var UpState
     */
    private $elev;


    public function up()
    {

    }

    public function down()
    {
        $this->elev->setState($this->elev->upState);
        $this->moveStartTime = time();
    }

    public function stop()
    {
        $this->elev->setState($this->elev->upState);
        $this->moveStartTime = time();
    }
}