<?php

require 'vendor/autoload.php';

$loop = React\EventLoop\Factory::create();

$stream = new \React\Stream\WritableResourceStream(fopen('php://stdout', 'w'), $loop);

$i = 0;
$loop->addPeriodicTimer(1, function(React\EventLoop\Timer\Timer $timer) use (&$i, $loop, $stream) {
    $stream->write(++$i . PHP_EOL);

    if ($i >= 15) {
        $loop->cancelTimer($timer);
        $stream->end();
    }
});

$loop->run();