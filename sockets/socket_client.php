<?php

require 'vendor/autoload.php';

$uri = '0.0.0.0:1337';
$loop = React\EventLoop\Factory::create();

$connector = new React\Socket\Connector($loop);
$connector->connect($uri)->then(function (React\Socket\ConnectionInterface $stream) use ($loop, $uri) {
    echo "Successfully connected to socket-server " . $uri . PHP_EOL;

    $i = 0;
    $loop->addPeriodicTimer(1, function (React\EventLoop\Timer\Timer $timer) use (&$i, $loop, $stream) {
        $stream->write(++$i . PHP_EOL);

        if ($i >= 15) {
            $loop->cancelTimer($timer);
            $stream->close();
        }

        echo $i . PHP_EOL;
    });
})->otherwise(function () use ($uri) {
    echo "Could not connect to socket-server " . $uri . PHP_EOL;
});

$loop->run();