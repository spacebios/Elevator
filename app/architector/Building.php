<?php

declare(strict_types=1);

namespace main\app\architector;


class Building
{
    public function __construct(BuildingBuilder $builder)
    {
        $this->floors = $builder->floors;
        $this->elevators = $builder->elevators;
        $this->controllers = $builder->controllers;
    }

    private $floors;

    private $elevators;

    private $controllers;
}