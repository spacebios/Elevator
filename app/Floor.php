<?php

declare(strict_types=1);

namespace main\app;


use main\app\button\ButtonInterface;

class Floor implements PlaceInterface, HumanInterface
{
    public function __construct(float $height)
    {
        $this->height = $height;
    }

    /**
     * @var float
     */
    private $height;

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
     * @return array
     */
    public function getButtonsNames() : array
    {
        return $this->buttonsNames;
    }

    /**
     * @return float
     */
    public function getHeight() : float
    {
        return $this->height;
    }

}