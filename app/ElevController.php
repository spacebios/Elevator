<?php

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
     * @param $h float
     */
    public function visit($h)
    {
        if($this->property->getIsBusy()) {
            return;
        }

        echo 'Elevator is on heigt: ' . $this->elev->getLiftPosition() . "\n";
        $this->property->setIsBusy(true); //set status 'busy'

        if($this->elev->getPosition() < $h){
            $this->elev->up();
            echo "Elevator moves UP to height: " . $h . "\n";
            $delta = $h - $this->elev->getPosition();
        }else{
            $this->elev->down();
            echo "Elevator moves DOWN to height: " . $h . "\n";
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