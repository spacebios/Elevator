<?php

declare(strict_types=1);

namespace main\app\button;

use main\app\elevatorController\ElevatorControllerInterface;

/**
 * Class NumberButton
 * @package main\app\button
 */
class NumberButton implements ButtonInterface
{
    /**
     * NumberButton constructor.
     * @param float $h
     * @param ElevatorControllerInterface $c
     */
    public function __construct(float $h, ElevatorControllerInterface $c)
    {
        $this->height = $h;
        $this->controller = $c;
    }

    /**
     * @var int
     */
    private $height;

    /**
     * @var ElevatorControllerInterface
     */
    private $controller;

    public function press()
    {
        $this->controller->visit($this->height);
    }
}