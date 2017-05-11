<?php

declare(strict_types=1);

namespace main\app\architector;

/**
 * Class Building
 * @package main\app\architector
 */
class Building
{
    public function __construct(BuildingBuilder $builder)
    {
        $this->floors = $builder->floors;
        $this->elevator = $builder->elevator;
        $this->controller = $builder->controller;
        $this->numberButtons = $builder->numberButtons;
    }

    private $floors;

    private $elevator;

    private $controller;

    private $numberButtons;
}