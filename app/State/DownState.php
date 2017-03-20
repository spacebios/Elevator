<?php

/**
 * Created by Spacebios
 */
namespace main\app\state;

use main\app\Elevator;

class DownState implements StateInterface
{
    public function up($elev)
    {
        // Do nothing if we move UP again.
        $elev->moveTo();
    }

    public function down($elev)
    {
        $elev->setState($upState);
        $elev->moveTo();
    }
}