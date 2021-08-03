
        composer install
        cp .env.example .env
            
        in .env connect DB
        php artisan migrate
        php artisan migrate:fresh --seed

        php artisan serve 

