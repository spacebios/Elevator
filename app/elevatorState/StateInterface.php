<?php
/**
 * Created by Spacebios
 */

namespace main\app\elevatorState;


interface StateInterface
{
    public function up();
    public function down();
    public function stop();
}