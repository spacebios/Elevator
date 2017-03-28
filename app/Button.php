<?php
/**
 * Created by Spacebios.
 */

namespace main\app;

use main\app\btnBeh\NumBtnBeh;
use main\app\btnBeh\StopBtnBeh;

class Button
{
    public function __construct($h = false)
    {
        $this->height = $h;
        $this->stopBtnBeh = new StopBtnBeh($this);
        $this->numBtnBeh = new NumBtnBeh($this);
        $this->behavior = $this->numBtnBeh;
    }

    /**
     * @var NumBtnBeh as default
     */
    private $behavior;

    /**
     * @var int, false as default
     */
    private $height;

    /**
     * @var StopBtnBeh
     */
    public $stopBtnBeh;

    /**
     * @var NumBtnBeh
     */
    public $numBtnBeh;

    /**
     * @param object
     */
    public function setBehavior($beh)
    {
        $this->behavior = $beh;
    }

    public function press()
    {
        if($this->behavior == $this->numBtnBeh && $this->height != false){
            return $this->height;
        } elseif($this->behavior == $this->stopBtnBeh && $this->height == false){

        }

    }
}