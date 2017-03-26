<?php
/**
 * Created by Spacebios.
 */

namespace main\app\state;

use main\app\Elevator;

class DownState implements StateInterface
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
        $this->elev->setState($this->elev->downState);
        $this->elev->moveTo();
    }

    public function stop()
    {

    }
}