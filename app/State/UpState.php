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

/**
* @var Elevator
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