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
     * @var ElevatorProperty
     */
    private $property;

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
        $this->property = new ElevatorProperty();
    }

    /**
     * @param $h int
     */
    public function visit($h)
    {
        echo 'i`m in visit metod'."\n";
        if($this->property->getIsBusy()) {
            return;
        }

        $this->property->setIsBusy(true); //set status 'busy'

        if($this->elev->getPosition() < $h){
            $this->elev->up();
            $delta = $h - $this->elev->getPosition();
        }else{
            $this->elev->down();
            $delta = $this->elev->getPosition() - $h;
        }

        $timeout = $delta / $this->elev->getMoveSpeed(); //set move end time
        sleep($timeout);  //wait until the elevator moves
        $this->elev->stop(); //stop lift on require height($h)
        $this->elev->liftLanding(); //landing passengers
        $this->property->setIsBusy(false); //set status 'vacant'
    }

    public function stop()
    {
        $this->elev->stop();
    }
}