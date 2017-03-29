<?php
/**
 * Created by Spacebios.
 */

namespace main\app\btnBeh;

use main\app\Button;
use main\app\ElevController;

/**
 * Class StopBtnBeh
 * @package main\app\btnBeh
 */
class StopBtnBeh implements BtnBehInterface
{
    /**
     * StopBtnBeh constructor.
     * @param $b Button
     */
    public function __construct($b)
    {
        $this->btn = $b;
        $this->controller = new ElevController();
    }

    /**
    * @var Button
    */
    private $btn;

    /**
     * @var ElevController
     */
    private $controller;

    public function execute()
    {

    }
}