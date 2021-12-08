<?php


spl_autoload_register(function ($class) {
    // в переменной $class будет имя класса с пространством имен
    $root = $_SERVER['DOCUMENT_ROOT'];
    $ds = DIRECTORY_SEPARATOR;
    $dir = 'codemu' . DIRECTORY_SEPARATOR . 'classes';
    $filename = $root . DIRECTORY_SEPARATOR . $dir . DIRECTORY_SEPARATOR . $class . DIRECTORY_SEPARATOR . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';
    require ($filename);
});


$tag = new Tag('dir', 'sometext', ['class' => 'active']);
echo $tag->open() . 'asdasd' . $tag->close();
echo $tag->show();