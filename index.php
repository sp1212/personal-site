<?php

// Register the autoloader
spl_autoload_register(function($classname) {
    include "$classname.php";
});

// Parse the url for the command
$command = $_SERVER['REQUEST_URI'];

// Instantiate the controller and run
$controller = new SiteController($command);
$controller->run();