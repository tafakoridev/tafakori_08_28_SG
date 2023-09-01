<?php

spl_autoload_register(function ($className) {
    $basePath = __DIR__; 
    $classFile = str_replace('\\', '/', $className) . '.php';
    $classPath = "{$basePath}/{$classFile}";

    if (file_exists($classPath)) {
        require_once $classPath;
    }
});