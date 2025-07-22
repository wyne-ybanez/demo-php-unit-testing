<?php

// bootstrap file is used to load in the required files (usually).

require dirname(__DIR__) . '/lib/functions.php';

spl_autoload_register(function ($className) {
    $file = dirname(__DIR__) . '/src/' . str_replace('\\', '/', $className) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});
