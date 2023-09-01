<?php

use config\Env;
use core\Database\Model;


$env = new Env();
Model::initMysqlConnection(
    $env->get('DB_HOST'),
    $env->get('DB_NAME'),
    $env->get('DB_USER'),
    $env->get('DB_PASS')
);
