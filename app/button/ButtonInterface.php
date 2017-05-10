<?php

declare(strict_types=1);

namespace main\app\button;

/**
 * Interface ButtonInterface
 * @package main\app\button
 */
interface ButtonInterface
{
    public function press();
    public function getName();
}