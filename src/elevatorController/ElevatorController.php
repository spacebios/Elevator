<?php

declare(strict_types=1);

namespace main\app\elevatorController;


use main\app\Elevator;
/**
 * Class ElevatorController
 * @package main\app\elevatorController
 */
class ElevatorController implements ElevatorControllerInterface
{
    /**
     * @var Elevator
     */
    private $elev;

    /**
     * @var ElevatorControllerProperty
     */
    private $property;

    /*
     * @var array
     */
    private $tasks;

    /**
     * @return Elevator
     */
    public function getElevator() : Elevator
    {
        return $this->elev;
    }

    /**
     * @param Elevator $e
     */
    public function setElevator(Elevator $e)
    {
        $this->elev = $e;
        $this->property = new ElevatorControllerProperty();
    }

    /**
     * @param $h float
     */
    public function visit(float $h)
    {
        if($this->property->getIsBusy()) {
            return;
        }

        echo 'Elevator is on height: ' . $this->elev->getLiftPosition() . "\n";
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
        sleep((int)$timeout);  //wait until the elevator moves
        $this->elev->stop(); //stop lift on require height($h)
        $this->elev->liftLanding(); //landing passengers
        $this->property->setIsBusy(false); //set status 'vacant'
    }

    public function stop()
    {
        $this->elev->stop();
    }

    public function addTask(float $task)
    {
        array_push($this->tasks, $task);
    }
}