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

    public function moveTo()
    {
        $this->moveStartTime = time();  //set move start time
        $this->moveEndTime = $this->moveStartTime + $this->moveHeight/$this->moveSpeed;  //set move end time

        sleep($this->moveEndTime-$this->moveStartTime);  //wait until the elevator moves
        $this->liftPosition = $this->liftPosition + $this->moveHeight * $this->moveDirection; //change lift position
        $this->liftLanding(); //landing passengers
    }
}