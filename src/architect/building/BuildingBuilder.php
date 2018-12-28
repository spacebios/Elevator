<?php

declare(strict_types=1);

namespace main\app\architect\building;

use main\app\button\ButtonInterface;
use main\app\Elevator;
use main\app\elevatorController\ElevatorController;
use main\app\elevatorController\ElevatorControllerInterface;
use main\app\Floor;
use main\app\Person;

class BuildingBuilder
{
    private $floors;

    private $elevator;

    private $controller;

    private $numberButtons;

    private $persons;

    public function addFloor(string $name, float $height)
    {
        if(!$this->controller instanceof ElevatorController) {
            throw new \Exception("You should add controller first");
        }

        $floor = (new Floor($name, $height))->addDirectionButtons($this->controller);
        array_push($this->floors, $floor);
        array_push($this->numberButtons, $floor->createNumberButton($this->controller));

        return $this;
    }

    public function addPerson(string $floor, string $destination)
    {
        $floorExist = false;
        $destinationCanBeReached = false;

        foreach($this->floors as $f){
            if($f instanceof Floor){
                if($floor === $f->getName()){

                    $person = new Person($f, $destination);

                    foreach($person->getAvailableButtons() as $button){
                        if($button instanceof ButtonInterface){
                            if($destination === $button->getName()){
                                $button->press();
                                $destinationCanBeReached = true;
                                break;
                            }
                        }
                    }

                    if (!$destinationCanBeReached){
                        throw new \Exception('Destination ' . $destination . ' can`t be rached, such floor does not exist');
                    }

                    array_push($this->persons, new Person($f, $destination));
                    $floorExist = true;
                    break;
                }
            }
        }

        if (!$floorExist){
            throw new \Exception('Floor ' . $floor . ' does not exist');
        }

        return $this;
    }

    public function addController()
    {
        $this->controller = new ElevatorController();
        if($this->elevator instanceof Elevator) $this->controller->setElevator($this->elevator);
        return $this;
    }

    public function addElevator()
    {
        $this->elevator = new Elevator();
        if($this->controller instanceof ElevatorController) $this->controller->setElevator($this->elevator);
        return $this;
    }

    /**
     * @return Building
     */
    public function build() : Building
    {
        return new Building($this);
    }

    /**
     * @return array
     */
    public function getFloors() : array
    {
        return $this->floors;
    }

    /**
     * @return Elevator
     */
    public function getElevator() : Elevator
    {
        return $this->elevator;
    }

    /**
     * @return ElevatorControllerInterface
     */
    public function getController() : ElevatorControllerInterface
    {
        return $this->controller;
    }

    /**
     * @return array
     */
    public function getNumberButtons() : array
    {
        return $this->numberButtons;
    }

    public function getPersons() : array
    {
        return $this->persons;
    }
}