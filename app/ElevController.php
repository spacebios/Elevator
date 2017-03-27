<?php
/**
 * Created by Spacebios.
 */

namespace main\app;


class ElevController
{
    public static $elev = Array();

    public function getElevators()
    {
        return self::$elev;
    }

    public static function addElevator($e)
    {
        array_push(self::$elev, $e);
    }
}