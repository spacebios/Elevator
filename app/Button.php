<?php
/**
 * Created by Spacebios.
 */

namespace main\app;

use main\app\btnBeh\NumBtnBeh;
use main\app\btnBeh\StopBtnBeh;

class Button
{
    /**
     * Button constructor.
     * @param int $h null as default
     */
    public function __construct($h = null)
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
     * @var int, null as default
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
        if($this->behavior == $this->numBtnBeh && $this->height != null){
            return $this->height;
        } elseif($this->behavior == $this->stopBtnBeh && $this->height == null){

        }
    }
}