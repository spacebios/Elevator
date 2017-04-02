<?php
/**
 * Created by PhpStorm.
 * User: Mashka
 * Date: 02.04.2017
 * Time: 18:47
 */

namespace main\app;


class ElevatorProperty
{
    private $isbusy = false;

    public function setIsBusy($bool)
    {
        $this->isbusy = $bool;
    }

    public function getIsBusy()
    {
        return $this->isbusy;
    }
}