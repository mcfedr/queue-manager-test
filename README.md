Queue Manager Testing
======

A project that combines all the queue manager drivers and tests them all together

Using docker to make all the services available

    docker-compose up
    
To create the doctrine schema

    docker-compose run create /srv/bin/console doctrine:database:create
    docker-compose run create /srv/bin/console doctrine:schema:create
