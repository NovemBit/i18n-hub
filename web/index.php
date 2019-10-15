<?php

use hub\Module;

require_once __DIR__.'/../vendor/autoload.php';

$config = require_once (__DIR__.'/../config/main.php');

Module::instance($config);