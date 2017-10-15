<?php

require 'vendor/autoload.php';

$uri = '0.0.0.0:1337';
$loop = React\EventLoop\Factory::create();
$socket = new React\Socket\Server($uri, $loop);
echo 'Launched socket server at ' .  $uri . PHP_EOL;

$connections = 0;

// This event triggers every time a new connection comes in
$socket->on('connection', function ($conn) use (&$connections) {
    $connections++;
    $current_connection = $connections;

    // Event listener for incoming data
    $conn->on('data', function ($data) use ($conn, $current_connection) {

        // Echo the data into our terminal window
        echo 'User ' . $current_connection . ': ' . $data;
    });
});

$loop->run();