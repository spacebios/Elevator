<?php
/**
 * Created by Spacebios.
 */

namespace main\app\button;

use main\app\ElevController;

/**
 * Class NumberButton
 * @package main\app\button
 */
class NumberButton implements ButtonInterface
{
    /**
     * NumberButton constructor.
     * @param int $h
     */
    public function __construct($h, $c)
    {
        $this->height = $h;
        $this->controller = $c;
    }

    /**
     * @var int
     */
    private $height;

    /**
     * @var ElevController
     */
    private $controller;

    public function press()
    {
        $this->controller->visit($this->height);
    }
}