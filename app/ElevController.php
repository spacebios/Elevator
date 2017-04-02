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
        $this->elevProp->isbusy = true; //set status 'busy'

        if($this->elev->getPosition() > $h){
            $this->elev->up();
            $delta = $this->elev->getPosition() - $h;
        }else{
            $this->elev->down();
            $delta = $h - $this->elev->getPosition();
        }

        $timeout = $delta / $this->elev->moveSpeed; //set move end time
        sleep($timeout);  //wait until the elevator moves
        $this->elev->stop(); //stop lift on require height($h)
        $this->elev->liftLanding(); //landing passengers
        $this->elevProp->isbisy = false; //set status 'vacant'
    }

    public function stop()
    {
        $this->elev->stop();
    }
}