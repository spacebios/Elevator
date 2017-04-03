<?php

namespace main\app\button;

use main\app\elevatorController\ElevatorController;

/**
 * Class StopButton
 * @package main\app\button
 */
class StopButton implements ButtonInterface
{
    /**
     * StopButton constructor.
     * @param int $h, null as default
     */
    public function __construct($c)
    {
        $this->controller = $c;
    }

    /**
     * @var ElevatorController
     */
    private $controller;

    public function press()
    {
        $this->controller->stop();
    }
}