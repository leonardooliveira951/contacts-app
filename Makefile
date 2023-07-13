CONTAINER_NAME=contacts-app

docker-install: docker-build docker-up docker-composer-install docker-migrate

docker-build:
	docker compose build

docker-up:
	docker compose up -d

docker-down:
	docker compose down

docker-composer-install:
	docker exec -t ${CONTAINER_NAME} composer install

docker-migrate:
	docker exec -t contacts-app php bin/console doctrine:migrations:migrate --no-interaction

docker-test:
	docker exec -t ${CONTAINER_NAME} php bin/phpunit`

docker-test-filter:
	docker exec -t ${CONTAINER_NAME} php bin/phpunit --filter=$(filter)
