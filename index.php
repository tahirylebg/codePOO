<?php

spl_autoload_register(function ($class) {
    $directories = [
        'Hero',
        'Monster',
        'Building',
        'Items',
        'Combat',
        'Games',
    ];

    foreach ($directories as $dir) {
        $file = __DIR__ . '/' . $dir . '/' . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

$game = new Game();
$game->start();
