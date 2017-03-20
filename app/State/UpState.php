<?php

/**
 * Created by PhpStorm.
 * User: SEO-2
 * Date: 20.03.2017
 * Time: 15:12
 */
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
}