<?php

declare(strict_types=1);

namespace main\app;


use main\app\button\ButtonInterface;
use main\app\button\DirectionButton;
use main\app\button\NumberButton;
use main\app\elevatorController\ElevatorControllerInterface;
class Street implements PlaceInterface
{
    public function __construct(float $height, string $name = "0")
    {
        $this->height = $height;
        $this->name = $name;
    }

    /**
     * @var float
     */
    private $height;

    /**
     * @var string
     */
    private $name;

    /**
     * @var array of ButtonInterface
     */
    private $buttons;

    /**
     * @param array $buttons
     */
    public function addButtons(array $buttons)
    {
        foreach($buttons as $button){
            array_push($this->buttons, $button);
        }
    }

    /**
     * @param ElevatorControllerInterface $controller
     * @param bool $dirUp
     * @param string $dirUpName
     * @param bool $dirDown
     * @param string $dirDownName
     */
    public function addDirectionButtons(ElevatorControllerInterface $controller, bool $dirUp = true, string $dirUpName = 'up', bool $dirDown = true, string $dirDownName = 'down')
    {
        if($dirUp){
            $buttonUp = new DirectionButton($controller, $dirUpName, $this->height);
            array_push($this->buttons, $buttonUp);

        } elseif($dirDown){
            $buttonDown = new DirectionButton($controller, $dirDownName, $this->height);
            array_push($this->buttons, $buttonDown);
        }
    }

    /**
     * @param ElevatorControllerInterface $controller
     * @return NumberButton
     */
    public function createNumberButton(ElevatorControllerInterface $controller)
    {
        return new NumberButton($controller, $addButtonToThisPlace = false, $name = $this->name, $height = $this->height);
    }

    /**
     * @return array of ButtonInterface
     */
    public function getButtons() : array
    {
        return $this->buttons;
    }

    /**
     * @return string
     */
    public function getName() : string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name)
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getHeight() : float
    {
        return $this->height;
    }

    /**
     * @param float $height
     */
    public function setHeight(float $height)
    {
        $this->height = $height;
    }
}