<?php

/**
 * Created by PhpStorm.
 * User: SEO-2
 * Date: 20.03.2017
 * Time: 15:11
 */
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