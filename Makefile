CONTAINER_NAME=contacts-app

docker-install: docker-build docker-up docker-composer-install

docker-build:
	docker compose build

docker-up:
	docker compose up -d

docker-down:
	docker compose down

docker-composer-install:
	docker exec -t ${CONTAINER_NAME} composer install

docker-test:
	docker exec -t ${CONTAINER_NAME} composer tests