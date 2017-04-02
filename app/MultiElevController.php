<?php
/**
 * Created by PhpStorm.
 * User: Mashka
 * Date: 02.04.2017
 * Time: 15:13
 */

namespace main\app;


class MultiElevController implements ElevControllerInterface
{
    /**
     * @var array of objects
     */
    private $controller = Array();

    public function addController($e)
    {
        array_push($this->controller, $e);
    }

    /**
     * @return array of objects
     */
    public function getElevator()
    {
        return $this->elev;
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

    }
}