<?php

/**
 * Created by PhpStorm.
 * User: SEO-2
 * Date: 20.03.2017
 * Time: 15:12
 */
interface StateInterface
{
    public function up($elev);
    public function down($elev);
}