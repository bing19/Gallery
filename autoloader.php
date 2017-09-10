<?php

define ('APP_ROOT', __DIR__);
define ('DS', DIRECTORY_SEPARATOR);

error_reporting(E_ALL);
ini_set("display_errors", 1);

function getClass ($className) {
    $path = APP_ROOT . DS . str_replace('\\', '/', $className);
    spl_autoload($path);
}

spl_autoload_register('getClass');




