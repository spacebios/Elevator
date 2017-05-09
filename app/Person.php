<?php

declare(strict_types=1);

namespace main\app;


use main\app\elevatorState\StateInterface;

class Person
{
    public function __construct(PlaceInterface $place)
    {
        $this->place = $place;
    }

    /**
     * @var PlaceInterface
     */
    private $place;

    /**
     * @return PlaceInterface
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * @param PlaceInterface
     */
    public function setPlace(PlaceInterface $place)
    {
        $this->place = $place;
    }
}