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
    public function __construct($h)
    {
        $this->height = $h;
    }

    /**
     * @var int
     */
    private $height;

    /**
     * @var ElevController
     */
    private $controller;

    /**
     * @param $e object
     */
    public function setController($e)
    {
        $this->controller = $e;
    }

    public function press()
    {
        $this->controller->getElevator()->stop();
    }
}