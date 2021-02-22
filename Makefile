docker-build:
	docker-compose up -d --no-recreate --build
copy-envs:
	docker-compose exec php sh -c "cp .env.example .env && php artisan key:generate"
	echo "REACT_APP_ADDRESSES_API=http://localhost/api/parse-addresses" > client/.env
start-client:
	cd client && npm i && npm start
fresh-start: copy-envs start-client
fresh-start-with-build: docker-build fresh-start