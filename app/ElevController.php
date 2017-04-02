<?php
/**
 * Created by Spacebios.
 */

namespace main\app;

/**
 * Class ElevController
 * @package main\app
 */
class ElevController implements ElevControllerInterface
{
    /**
     * @var array of objects
     */
    private $elev;

    /**
     * @return array of objects
     */
    public function getElevator()
    {
        return $this->elev;
    }

    /**
     * @param $e Elevator
     */
    public function setElevator($e)
    {
        $this->elev = $e;
    }

    /**
     * @param $h int
     */
    public function visit($h)
    {
        foreach($this->elev as $el){

            if($el->getPosition() > $h){
                $el->up();
            }else{
                $el->down();
            }

            $el->moveEndTime = $el->moveStartTime + $h * $el->moveSpeed; //set move end time
            sleep($el->moveEndTime - $el->moveStartTime);  //wait until the elevator moves
            $el->stop(); //stop lift on require height($h)
            $el->liftLanding(); //landing passengers
        }
    }

    public function stop()
    {
        foreach($this->elev as $el){
            $el->stop();
        }
    }
}