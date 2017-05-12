<?php

declare(strict_types=1);

namespace main\app;

/**
 * Class Person
 * @package main\app
 */
class Person
{
    /**
     * Person constructor.
     * @param PlaceInterface $place
     * @param string $destination
     */
    public function __construct(PlaceInterface $place, string $destination)
    {
        $this->place = $place;
        $this->destination = $destination;
    }

    /**
     * @var PlaceInterface
     */
    private $place;

    /**
     * @var string
     */
    private $destination;

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

    /**
     * @return string
     */
    public function getDestination() : string
    {
        return $this->destination;
    }

    /**
     * @param string $destination
     */
    public function setDestination(string $destination)
    {
        $this->destination = $destination;
    }
}