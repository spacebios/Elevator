<?php

declare(strict_types=1);

namespace main\app;


class Street implements PlaceInterface
{
    public function __construct(float $height = 0)
    {
        $this->height = $height;
    }

    /**
     * @var float
     */
    private $height;

}