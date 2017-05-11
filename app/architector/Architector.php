<?php

declare(strict_types=1);

namespace main\app\architector;
use main\app\button\StopButton;

/**
 * Class Architector
 * @package main\app\architector
 */
class Architector
{
    public function construct()
    {
        $building = (new BuildingBuilder())->addElevator()->addController();                 //add Elevator, Controller
        $building->addFloor(0, 0);
        $building->addFloor(1, 2);
        $building->addFloor(2, 4);
        $building->addFloor(3, 6);
        $building->addFloor(4, 8);                                                          //add Floors

        $building->getElevator()->addButtons($building->getNumberButtons());                //add number buttons to Elevator

        $building->getElevator()->addButton(new StopButton($building->getController()));    //add stop button to Elevator

        foreach($building->getFloors() as $floor){
            if($floor->getName() === '0'){
                $floor->addDirectionButtons($building->getController(), true, 'up', false);
            }elseif($floor->getName() === '4'){
                $floor->addDirectionButtons($building->getController(), false);
            }else{
                $floor->addDirectionButtons($building->getController());                    //add direction buttons on Floors
            }
        }
    }
}