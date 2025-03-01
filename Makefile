setup:
	docker compose up --build -d
	cp .env.example .env
	composer install
	php artisan key:generate
	php artisan migrate --seed

run:
	php artisan serve &
	npm i && npm run dev
