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
     * @var Elevator
     */
    private $elev;

    /**
     * @return Elevator
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
        $this->elev->isbusy = true; //set status 'busy'

        if($this->elev->getPosition() > $h){
            $this->elev->up();
        }else{
            $this->elev->down();
        }

        $this->elev->moveEndTime = $this->elev->moveStartTime + $h * $this->elev->moveSpeed; //set move end time
            sleep($this->elev->moveEndTime - $this->elev->moveStartTime);  //wait until the elevator moves
        $this->elev->stop(); //stop lift on require height($h)
        $this->elev->liftLanding(); //landing passengers
        $this->elev->isbisy = false; //set status 'vacant'
    }

    public function stop()
    {
        $this->elev->stop();
    }
}