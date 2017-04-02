<?php
/**
 * Created by Spacebios.
 */

namespace main\app\button;

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

    public function press()
    {

    }
}