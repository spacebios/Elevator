<?php

namespace main\app;

/**
 * Class ElevatorProperty
 * @package main\app
 */
class ElevatorProperty
{
    /**
     * @var bool
     */
    private $isbusy = false;

    /**
     * @param $bool
     */
    public function setIsBusy($bool)
    {
        $this->isbusy = $bool;
    }

    /**
     * @return bool
     */
    public function getIsBusy()
    {
        return $this->isbusy;
    }
}