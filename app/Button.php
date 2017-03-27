<?php
/**
 * Created by Spacebios.
 */

namespace main\app;

use main\app\btnBeh\NumBtnBeh;
use main\app\btnBeh\StopBtnBeh;

class Button
{
    public function __construct()
    {
        $this->stopBtnBeh = new StopBtnBeh($this);
        $this->numBtnBeh = new NumBtnBeh($this);
    }

    private $behavior;

    public $stopBtnBeh;
    public $numBtnBeh;

    public function setBehavior($beh)
    {
        $this->behavior = $beh;
    }

    public function press()
    {

    }
}