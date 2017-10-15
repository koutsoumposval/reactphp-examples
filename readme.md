ReactPHP examples
==================
Simple reactPHP examples for learning purposes.

Topics
------------------
The topics of the examples will be:

* Timers
* Promises
* Ticks
* Streams
* Sockets (server/client)
* Child Process
* Filesystem

Install Dependencies
------------------
Run composer install
```
# localy
/usr/local/bin/composer install
    
# through docker container
docker run --rm -v $(pwd):/app composer/composer install
```

Run PHP scripts
------------------
Running scripts from root folder
```
# localy
# requires php ^7.*
/usr/local/bin/php timers/1-periodic.php
    
# through docker container
docker run -it --rm --name my-running-script -v "$PWD":/usr/src/myapp -w /usr/src/myapp php:7.0-cli php timers/1-periodic.php
```

Credits
-------------------
Based on `Cees-Jan Kiewiet` <a href="https://blog.wyrihaximus.net/2015/01/reactphp-introduction/">ReactPHP tutorial</a>

Fixed & Improved all broken code examples.



