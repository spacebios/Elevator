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
    public function __construct($c)
    {
        $this->controller = $c;
    }

    /**
     * @var ElevController
     */
    private $controller;

    public function press()
    {
        $this->controller->stop();
    }
}