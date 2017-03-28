<?php
/**
 * Created by Spacebios.
 */

namespace main\app\btnBeh;


use main\app\Button;
use main\app\ElevController;

class NumBtnBeh implements BtnBehInterface
{
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
        $this->controller->visit($this->btn->press());
    }
}