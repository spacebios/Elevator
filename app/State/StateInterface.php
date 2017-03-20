<?php

/**
 * Created by Spacebios
 */
namespace main\app\state;

interface StateInterface
{
    public function up($elev);
    public function down($elev);
}