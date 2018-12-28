<?php

declare(strict_types=1);

namespace main\app\button;

use main\app\elevatorController\ElevatorController;
use main\app\elevatorController\ElevatorControllerInterface;

/**
 * Class StopButton
 * @package main\app\button
 */
class StopButton implements ButtonInterface
{
    /**
     * StopButton constructor.
     * @param ElevatorControllerInterface $c
     */
    public function __construct(ElevatorControllerInterface $c, $name = 'stop')
    {
        $this->controller = $c;
        $this->name = $name;
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