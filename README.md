# App description
In my observation when a company tests a php junior web developer for knowledge, quite often the task 
is to make a php app - without any framework, though packages can be used.
So, this app is a base to solve these tasks. It is a vanilla php app, with packages, similar to 
Laravel.

# The Docker 

This app uses 
Thiago Luna's https://github.com/thiagoluna/php-xdebug-mysql-nginx-redis-docker?search=1
as a base for the Docker.
Thiago Luna - <a href="https://www.linkedin.com/in/thiago-luna/" target="_blank">Linkedin</a>

# What this app can do



# Steps to do




# XDebug
The Xdebug base setting in this app come from beformentioned Thiago Luna's Docker settings. However
they do not work. There are two things that must be change, so the Xdebug work:

## 1. thing to change
In this path:
.docker/xdebug/docker-php-ext-xdebug.ini

You have this file:

[xdebug]
<!-- # This was the original setting -->
<!-- # zend_extension = /usr/local/lib/php/extensions/no-debug-non-zts-20190902/xdebug.so -->
<!-- # This is my setting experiment. Check this path in your container, and adjust accordingly. -->
zend_extension = /usr/local/lib/php/extensions/no-debug-non-zts-20220829/xdebug.so
xdebug.mode=debug
xdebug.client_host=host.docker.internal
xdebug.client_port=9003
xdebug.start_with_request=yes
xdebug.discover_client_host=0

## 2. thing to change

The .vscode/launch.json should look like this:
    "version": "0.2.0",
    "configurations": [
        {
            "name": "Listen for Xdebug",
            "type": "php",
            "request": "launch",
            "port": 9003,
            "pathMappings": {
                "/var/www": "${workspaceFolder}"
            },
            "hostname": "0.0.0.0",
        },




xdebug
add tinker
add one exception
seeding and faking
add testing too
add command for triggering migrations
create one mvc using twig + create header footer main navbar in twig

bottom line: have all prepared for a situation when you need to build
a vanilla php app without frameworks.


## 🚀 Tecnologies used

- [PHP 7.4](https://php.net)
- [Xdebug 3](https://xdebug.org/)
- [Nginx](https://nginx.com/)
- [MySQL 5.7](https://mysql.com)
- [Docker](https://docker.com)
- [Redis](https://redis.io/)

## ⚙️ Setup & Run
Clone this Repository, enter on its folder and start the containers.
```sh 
# docker-compose up -d
```  
Access the Frontend in the browser http://localhost:8000  
You should see phpinfo page.

