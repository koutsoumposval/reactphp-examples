<?php

require 'vendor/autoload.php';

$loop = React\EventLoop\Factory::create();

$loop->addTimer(0.1, function () use ($loop) {
    $loop->stop();
});

function fooBar($loop)
{
    return function () use ($loop) {
        echo 'a';
        $loop->nextTick(fooBar($loop));
    };
}

$loop->nextTick(fooBar($loop));
$loop->run();