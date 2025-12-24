<?php

spl_autoload_register(function ($className) {

    $folders = [
        'models',
        'config',
        'view'
    ];

    foreach ($folders as $folder) {
        $file = __DIR__ . "/$folder/$className.php";

        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});
