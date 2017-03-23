<?php

/**
 * Created by Spacebios
 */
namespace main\app\state;

class UpState implements StateInterface
{
    public function up($elev)
    {
        $elev->setState($downState);
        $elev->moveTo();
    }

    public function down($elev)
    {
        // Do nothing if we move DOWN again.
        $elev->moveTo();
    }

    public function stop($elev)
    {
        // Do nothing if we move UP again.
        $elev->moveTo();
    }
}