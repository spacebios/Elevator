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
     * @param string $name
     * @param float $height
     * @param ElevatorControllerInterface $controller
     */
    public function __construct(string $name, float $height, ElevatorControllerInterface $controller)
    {
        $this->height = $height;
        $this->controller = $controller;
        $this->name = $name;
    }

    /**
     * @var float
     */
    private $height;

    /**
     * @var string
     */
    private $name;

    /**
     * @var ElevatorControllerInterface
     */
    private $controller;

    public function press()
    {
        $this->controller->visit($this->height);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }
}