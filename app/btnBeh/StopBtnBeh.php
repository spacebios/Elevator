<?php
/**
 * Created by Spacebios.
 */

namespace main\app\btnBeh;


use main\app\Button;

class StopBtnBeh implements BtnBehInterface
{
    public function __construct($b)
    {
        $this->btn = $b;
    }

/**
* @var Button
*/
    private $btn;

    public function execute()
    {
        // TODO: Implement execute() method.
    }
}