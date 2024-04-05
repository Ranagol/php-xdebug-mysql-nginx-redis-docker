# My comments
"vlucas/phpdotenv": "^5.3",
"illuminate/database": "^8.51",
"bramus/router": "~1.5",
"guzzlehttp/guzzle": "^7.0"

blade
routes
dotenv
xdebug
logging
login/logout
eloquent
phpmyadmin




## 🚀 Tecnologies

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

## 💻 For Laravel Apps
1- Just install it on root folder and change **line 4** of 
.docker/nginx/nginx.conf to `root /var/www/public;`  
  
2- Setup the .env at .docker/app/.env  
Use DB envs as example and do the same for other envs you need.
These envs should be at `docker-compose.yaml` and `.docker/app/.env` 

## 📝 Xdebug in PHPStorm
<a href="https://dev.to/thiagoluna/xdebug-3-no-phpstorm-com-php-7-4-55jm" target="_blank">Click Here</a>
to see a tutorial explaining how to setup 
Xdebug in PHPStorm.

Thiago Luna - <a href="https://www.linkedin.com/in/thiago-luna/" target="_blank">Linkedin</a>