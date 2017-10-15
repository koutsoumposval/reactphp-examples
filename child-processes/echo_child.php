<?php

require 'vendor/autoload.php';

$loop = React\EventLoop\Factory::create();

$read = new \React\Stream\ReadableResourceStream(STDIN, $loop);
$read->on('data', function ($data) use ($loop) {
    $data = trim($data);
    if ($data == 15) {
        $loop->stop();
    }
});
$read->pipe(new \React\Stream\WritableResourceStream(STDOUT, $loop));

$loop->run();