<?php
/**
 * Created by Spacebios.
 */

namespace main\app;

/**
 * Class ElevController
 * @package main\app
 */
class ElevController
{
    /**
     * @var array of objects
     */
    private static $elev = Array();

    /**
     * @var int
     */
    private $moveDirection; //-1/1

    /**
     * @return array of objects
     */
    public function getElevators()
    {
        return self::$elev;
    }

    /**
     * @param $e Elevator
     */
    public static function addElevator($e)
    {
        array_push(self::$elev, $e);
    }

    /**
     * @param $h int
     */
    public function visit($h)
    {
        foreach(self::$elev as $el){

            if($el->getPosition() > $h){
                $el->up();
            } else {
                $el->down();
            }

            $el->moveEndTime = $el->moveStartTime + $h * $el->moveSpeed; //set move end time
            sleep($el->moveEndTime - $el->moveStartTime);  //wait until the elevator moves
            $el->stop(); //stop lift on require height($h)
            $el->liftLanding(); //landing passengers
        }
    }
}