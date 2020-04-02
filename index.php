<?php

use NovemBit\i18n\Module;

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once __DIR__ . '/vendor/autoload.php';

$config = require(__DIR__ . '/config/main.php');

Module::instance($config)->rest->start();