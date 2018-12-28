<?php

declare(strict_types=1);

namespace main\app\architect\building;

/**
 * Class Building
 * @package main\app\architector
 */
class Building
{
    /**
     * Building constructor.
     * @param BuildingBuilder $builder
     */
    public function __construct(BuildingBuilder $builder)
    {
        $this->floors = $builder->getFloors();
        $this->elevator = $builder->getElevator();
        $this->controller = $builder->getController();
        $this->numberButtons = $builder->getNumberButtons();
        $this->persons = $builder->getPersons();
    }

    private $floors;

    private $elevator;

    private $controller;

    private $numberButtons;

    private $persons;
}