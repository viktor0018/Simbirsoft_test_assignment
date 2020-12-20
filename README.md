Get stated:

git clone https://github.com/viktor0018/simbirsoft_testassignment.git

cd simbirsoft_testassignment

alias sail='bash vendor/bin/sail'

(sail build --no-cache)
sail up -d

sail shell

composer install

npm install

cp .env.example .env

php artisan key:generate

php artisan migrate

php artisan db:seed

php artisan dusk
