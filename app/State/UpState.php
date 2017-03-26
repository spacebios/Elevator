<?php
/**
 * Created by Spacebios.
 */

namespace main\app\state;

use main\app\Elevator;

class UpState implements StateInterface
{
    public function __construct($e)
    {
        $this->elev = $e;
    }

    private $elev = null;

    public function up()
    {
        $this->elev->setState($this->elev->upState);
    }

    public function down()
    {

    }

    public function stop()
    {

    }
}