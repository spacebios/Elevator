<?php

declare(strict_types=1);

namespace main\app;


use main\app\button\ButtonInterface;

class Floor implements PlaceInterface, HumanInterface
{
    /**
     * @var array
     */
    private $buttons;

    /**
     * @var array
     */
    private $buttonsNames;

    public function addButton(ButtonInterface $button)
    {
        array_push($this->buttons, $button);
        array_push($this->buttonsNames, $button->getName());
    }

    public function getButtonsNames() : array
    {
        return $this->buttonsNames;
    }
}