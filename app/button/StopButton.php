<?php
/**
 * Created by Spacebios.
 */

namespace main\app\button;

use main\app\ElevController;

/**
 * Class StopButton
 * @package main\app\button
 */
class StopButton implements ButtonInterface
{
    /**
     * StopButton constructor.
     * @param int $h, null as default
     */
    public function __construct($h = null)
    {
        $this->height = $h;
    }

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

    }
}