<?php

declare(strict_types=1);

namespace main\app\elevatorController;

/**
 * Class ElevatorControllerProperty
 * @package main\app\elevatorController
 */
class ElevatorControllerProperty
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