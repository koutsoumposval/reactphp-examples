ReactPHP sockets
==================
A simple example with a socket_server and a socket_client script

Socket server
------------------
```php
# URI = 0.0.0.0:1337

> php sockets/socket_server.php
Launched socket server at 0.0.0.0:1337
```

Socket Connections
------------------
In a new terminal connect via `telnet`
```
# client terminal window
> telnet 0.0.0.0 1337
Trying 0.0.0.0...
Connected to 0.0.0.0.
Escape character is '^]'.
> test

# server terminal window
User 1: test
```

Socket Clients
------------------
In a new terminal run `socket_client.php` script 
```
# client terminal window
> php sockets/socket_client.php
Successfully connected to socket-server 0.0.0.0:1337
1
2
...
14

# server terminal window
User 1: 1
User 1: 2
...
User 1: 14
```