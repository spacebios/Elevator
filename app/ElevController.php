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
    private $moveDirection; //-1/1

    public function getElevators()
    {
        return self::$elev;
    }

    public static function addElevator($e)
    {
        array_push(self::$elev, $e);
    }

    public function visit($h)
    {
        foreach(self::$elev as $el){

            if($el->liftPosition > $h){
                $this->moveDirection = 1;
            } else {
                $this->moveDirection = -1;
            }

            $el->moveStartTime = time(); //set move start time
            $el->moveEndTime = $el->moveStartTime + $el->moveHeight * $el->moveSpeed; //set move end time
            sleep($el->moveEndTime - $el->moveStartTime);  //wait until the elevator moves
            $el->liftPosition = $el->liftPosition + $h * $this->moveDirection; //change lift position
            $el->liftLanding(); //landing passengers
        }
    }
}