<?php

/**
 * Created by Spacebios
 */
namespace main\app\state;

interface StateInterface
{
    public function up();
    public function down();
    public function stop();
}