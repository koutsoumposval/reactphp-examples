<?php

require 'vendor/autoload.php';

$loop = React\EventLoop\Factory::create();

$read = new \React\Stream\ReadableResourceStream(fopen('php://stdin', 'r+'), $loop);
$write = new \React\Stream\WritableResourceStream(fopen('php://stdout', 'w+'), $loop);

$read->on('data', function ($data) use ($write, $read) {
    if (trim($data) == 'quit') {
        $write->close();
        $read->close();
    }

    $input = trim($data);
    $line = 'User ' . rand(1, 3) . ' says "' . $input . '"';
    $line .= PHP_EOL;
    $write->write($line);
});

$loop->run();