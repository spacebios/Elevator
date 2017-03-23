<?php
/**
 * Created by Spacebios.
 */

namespace main\app\state;

use main\app\Elevator;

class UpState implements StateInterface
{
    public function __construct()
    {
        $this->elev = new Elevator();
    }

    private $elev = null;

    public function up()
    {
        $this->elev->setState($this->elev->upState);
        $this->elev->moveTo();
    }

    public function down()
    {

    }

    public function stop()
    {

    }
}