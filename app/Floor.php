<?php

declare(strict_types=1);

namespace main\app;


use main\app\button\ButtonInterface;
use main\app\button\DirectionButton;
use main\app\elevatorController\ElevatorControllerInterface;

class Floor implements PlaceInterface, HumanInterface
{
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
     * @var array
     */
    private $buttons;

    /**
     * @var array
     */
    private $buttonsNames;

    /**
     * @param ButtonInterface $button
     */
    public function addButton(ButtonInterface $button)
    {
        array_push($this->buttons, $button);
        array_push($this->buttonsNames, $button->getName());
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
            $buttonUp = new DirectionButton($dirUpName, $controller);
            $buttonUp -> setHeight($this->height);
            array_push($this->buttons, $buttonUp);
            array_push($this->buttonsNames, $buttonUp->getName());

        } elseif($dirDown){
            $buttonDown = new DirectionButton($dirDownName, $controller);
            $buttonDown -> setHeight($this->height);
            array_push($this->buttons, $buttonDown);
            array_push($this->buttonsNames, $buttonDown->getName());
        }
    }

    /**
     * @return array
     */
    public function getButtonsNames() : array
    {
        return $this->buttonsNames;
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