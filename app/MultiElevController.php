<?php

namespace main\app;


class MultiElevController implements ElevControllerInterface
{
    /**
     * @var array of objects
     */
    private $controller = Array();

    /**
     * @param $e object
     */
    public function addController($e)
    {
        array_push($this->controller, $e);
    }

    /**
     * @return array of objects
     */
    public function getElevator()
    {

    }

    /**
     * @param $h float
     */
    public function visit($h)
    {

    }

    public function stop()
    {

    }
}