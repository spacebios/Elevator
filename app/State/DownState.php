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