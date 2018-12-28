<?php

declare(strict_types=1);

namespace main\app;


use main\app\button\{DirectionButton, NumberButton};
use main\app\button\ButtonInterface;
use main\app\elevatorController\ElevatorControllerInterface;

/**
 * Class Floor
 * @package main\app
 */
class Floor implements PlaceInterface, HumanInterface
{
    /**
     * Floor constructor.
     * @param string $name
     * @param float $height
     */
    public function __construct(string $name, float $height)
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
            if ($button instanceof ButtonInterface){
                if(!isset($this->buttons[$button->getName()])){
                    $this->buttons[$button->getName()] = $button;
                }
            }
        }
    }

    /**
     * @param ButtonInterface $button
     */
    public function addButton(ButtonInterface $button)
    {
        if(!isset($this->buttons[$button->getName()])){
            $this->buttons[$button->getName()] = $button;
        }
    }

    /**
     * @param ElevatorControllerInterface $controller
     * @param bool $dirUp
     * @param string $dirUpName
     * @param bool $dirDown
     * @param string $dirDownName
     * @return $this
     */
    public function addDirectionButtons(ElevatorControllerInterface $controller, bool $dirUp = true, string $dirUpName = 'up', bool $dirDown = true, string $dirDownName = 'down')
    {
        if($dirUp){
            $buttonUp = new DirectionButton($controller, $dirUpName, $this->height);
            if(!isset($this->buttons[$dirUpName])) {
                $this->buttons[$dirUpName] = $buttonUp;
            }
        } elseif($dirDown){
            $buttonDown = new DirectionButton($controller, $dirDownName, $this->height);
            if(!isset($this->buttons[$dirDownName])) {
                $this->buttons[$dirDownName] = $buttonDown;
            }
        }
        return $this;
    }

    /**
     * @param ElevatorControllerInterface $controller
     * @return NumberButton
     */
    public function createNumberButton(ElevatorControllerInterface $controller)
    {
        return new NumberButton($controller, $name = $this->name, $height = $this->height);
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