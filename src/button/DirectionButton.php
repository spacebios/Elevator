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
    public function __construct(ElevatorControllerInterface $controller, string $name, float $height)
    {
        $this->controller = $controller;
        $this->name = $name;
        $this->height = $height;
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
        $this->controller->addTask($this->height);
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    public function setName($name){
        $this->name = $name;
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