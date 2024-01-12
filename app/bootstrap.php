<?php
// Load Config
require_once 'config/config.php';

// Load helpers
require_once 'helpers/url_helper.php';
require_once 'helpers/session_helper.php';

// Autoload Core Libraries
function Autoloader($class) {
    $paths = [
        APPROOT."/libraries/",
        APPROOT . "/services/interfaces/",
        APPROOT . "/services/implementations/",
        APPROOT."/models/",
        APPROOT . "/controllers/"
    ];


    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
        }
    }
}

spl_autoload_register('Autoloader');