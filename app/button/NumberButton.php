<?php
/**
 * Created by Spacebios.
 */

namespace main\app\button;

/**
 * Class NumberButton
 * @package main\app\button
 */
class NumberButton implements ButtonInterface
{
    /**
     * NumBtn constructor.
     * @param int $h, default null
     */
    public function __construct($h = null)
    {
        $this->height = $h;
    }

    /**
     * @var int, null as default
     */
    private $height;

    /**
     * @var ElevController
     */
    private $controller;

    public function press()
    {

    }
}