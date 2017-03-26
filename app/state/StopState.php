<?php
/**
 * Created by Spacebios.
 */

namespace main\app\state;

use main\app\Elevator;

class StopState implements StateInterface
{
    public function __construct($e)
    {
        $this->elev = $e;
    }

    private $elev = null;

    public function up()
    {

    }

    public function down()
    {

    }

    public function stop()
    {
        $this->elev->setState($this->elev->stopState);
        $this->elev->moveTo();
    }
}