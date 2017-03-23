<?php
/**
 * Created by Spacebios.
 */

namespace main\app\state;


class StopState implements StateInterface
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

    public function stop($elev)
    {
        // Do nothing if we move UP again.
        $elev->moveTo();
    }
}