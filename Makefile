.PHONY: all
MAKEFLAGS += --silent

WORKSPACE:=$(shell pwd)
CURRENT_DIR=$(shell basename ${WORKSPACE})
DOCKER_IMAGE=php-kata-skeleton
TEST_COMMAND=./vendor/bin/phpunit --color=always

install:
	composer install

test:
	${TEST_COMMAND}

docker-build:
	docker build -t ${DOCKER_IMAGE} .

docker-ssh:
	docker exec -it ${DOCKER_IMAGE} bash

docker-run:
	docker run -it --rm -d --name ${DOCKER_IMAGE} \
	-v ${WORKSPACE}/App:/src/App/App:rw \
	${DOCKER_IMAGE}
	docker cp ${DOCKER_IMAGE}:/src/App/vendor ${WORKSPACE}/vendor

docker-stop:
	docker stop ${DOCKER_IMAGE}

docker-tests:
	docker exec -t -i ${DOCKER_IMAGE} ${TEST_COMMAND}
