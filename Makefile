setup:
	docker compose up --build -d
	cp .env.example .env
	composer install
	npm i
	php artisan key:generate
	php artisan migrate --seed

run:
	npm run dev &
	php artisan serve
