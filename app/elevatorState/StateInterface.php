<?php

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