Get stated:

git clone https://github.com/viktor0018/simbirsoft_testassignment.git

cd simbirsoft_testassignment

cp .env.example .env
composer require laravel/sail --dev
php artisan sail:install

alias sail='bash vendor/bin/sail'

(sail build --no-cache)
sail up -d

sail shell

composer install

npm install

php artisan key:generate

php artisan migrate

php artisan db:seed

php artisan dusk
