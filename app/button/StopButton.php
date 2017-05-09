<?php

declare(strict_types=1);

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

    /**
     * @var string
     */
    private $name;

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    public function press()
    {
        $this->controller->stop();
    }
}