<?php

declare(strict_types=1);

namespace main\app\button;


use main\app\elevatorController\ElevatorControllerInterface;

/**
 * Class DirectionButton
 * @package main\app\button
 */
class DirectionButton implements ButtonInterface
{
    /**
     * NumberButton constructor.
     * @param string $name
     * @param float $height
     * @param ElevatorControllerInterface $controller
     */
    public function __construct(string $name, ElevatorControllerInterface $controller)
    {
        $this->name = $name;
        $this->controller = $controller;
    }

    /**
     * @var string
     */
    private $name;

    /**
     * @var float
     */
    private $height;

    /**
     * @var ElevatorControllerInterface
     */
    private $controller;


    public function press()
    {
        // TODO: Implement press() method.
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param float $height
     */
    public function setHeight(float $height)
    {
        $this->height = $height;
    }

    /**
     * @return float
     */
    public function getHeight() : float
    {
        return $this->height;
    }

}