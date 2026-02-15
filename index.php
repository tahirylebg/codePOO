<?php

spl_autoload_register(function ($class) {

    $paths = [
        __DIR__ . "/Building/",
        __DIR__ . "/Monster/",
        __DIR__ . "/Hero/",
        __DIR__ . "/Items/",
        __DIR__ . "/Combat/",
        __DIR__ . "/Games/"
    ];

    foreach ($paths as $path) {
        $file = $path . $class . ".php";
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

$game = new Game();
$game->start();
