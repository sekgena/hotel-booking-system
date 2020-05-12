
composer install
npm install

Go to the project root in your terminal and run the following command:
- cp .env.example .env

Create mysql/mariadb database and then open .env file and change mysql database configs.

Go to the project root in your terminal again and run the following commands:
- php artisan migrate:install
- php artisan migrate
- php artisan key:generate
- php artisan serve

Open http://127.0.0.1:8000 in your browser.

Voila! You good to go.


Admin login details:

Email: admin@domain.com
Password: admin