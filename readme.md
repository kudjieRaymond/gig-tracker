<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>



## About

This is a project to help freelancers to keep track of their Gigs

## How to use
 Traditional Approach
- Clone the repository with __git clone__
- Copy __.env.example__ file to __.env__ and edit database credentials there
- Run __composer install__
- Run __php artisan key:generate__

If you have Docker installed you can run this project using
- Run __docker-compose up && docker-compose up -d__
- Run  __docker-compose exec nginx  chmod -R 777 /var/www/html/storage/__
Make sure the DB credential in your .env file match the one in the Docker compose file 
So in our case
- replace DB_HOST=127.0.0.1 with the name of your mysql container DB=mysql.  Do same for DB username and password
- Run   __docker-compose exec php php /var/www/html/artisan migrate__ 

## License

Open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).
