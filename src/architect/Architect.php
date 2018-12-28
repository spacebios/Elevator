<?php

declare(strict_types=1);

namespace main\app\architect;


use main\app\button\StopButton;
use main\app\architect\building\BuildingBuilder;
use main\app\Floor;

/**
 * Class Architect
 * @package main\app\architect
 */
class Architect
{
    public function construct()
    {
        try{
            $building = new BuildingBuilder();
            $building->addElevator();                                                           //add Elevator
            $building->addController();                                                         //add Controller
            $building->addFloor('0', 0);
            $building->addFloor('1', 2);
            $building->addFloor('2', 4);
            $building->addFloor('3', 6);
            $building->addFloor('4', 8);                                                        //add Floors

            $building->getElevator()->addButton(new StopButton($building->getController()));    //add stop button to Elevator

            foreach($building->getFloors() as $floor){
                if($floor instanceof Floor){
                    $floor->addButtons($building->getNumberButtons());                          //add number buttons on Floors
                }
            }

//            $building->getElevator()->addButtons($building->getNumberButtons());                //add number buttons to Elevator

//            foreach($building->getFloors() as $floor){
//                if($floor instanceof Floor){
//                    if($floor->getName() === '0'){
//                        $floor->addDirectionButtons($building->getController(), true, 'up', false);
//                    }elseif($floor->getName() === '4'){
//                        $floor->addDirectionButtons($building->getController(), false);
//                    }else{
//                        $floor->addDirectionButtons($building->getController());                //add direction buttons on Floors
//                    }
//                }
//            }

        } catch(\Exception $e){
            echo $e->getMessage();
        }
    }
}