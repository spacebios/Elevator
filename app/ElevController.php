<?php
/**
 * Created by Spacebios.
 */

namespace main\app;


class ElevController
{
    public function __construct()
    {

    }

    private static $elev = Array();

    public function getElevators()
    {
        return self::$elev;
    }

    public static function addElevator($e)
    {
        array_push(self::$elev, $e);
    }
}