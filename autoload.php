<?php
spl_autoload_register(function ($className) {
    $filePath = str_replace('\\', '/', $className) . '.php';

    if (strpos($className, 'Controller')) {
        $controllerFile = 'controller/' . $filePath;
        if (file_exists($controllerFile)) {
            include $controllerFile;
        }
    } else {
        $modelFile = 'model/' . $filePath;
        if (file_exists($modelFile)) {
            include $modelFile;
        }
    }
});

session_start();

include 'config.php';
include 'controller/MainController.php';
