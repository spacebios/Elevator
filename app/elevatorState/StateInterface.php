<?php

declare(strict_types=1);

namespace main\app\elevatorState;

/**
 * Interface StateInterface
 * @package main\app\elevatorState
 */
interface StateInterface
{
    public function up();
    public function down();
    public function stop();
}