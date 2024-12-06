start-app:
	cp ./.env.example ./.env
	docker compose build
	docker compose up -d
	docker exec php /bin/sh -c "composer install && chmod -R 777 storage && php artisan key:generate && php artisan migrate:fresh"

test:
	docker exec php /bin/sh -c "php artisan test"

stop-app:
	docker compose down