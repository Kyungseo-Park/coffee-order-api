#!/bin/bash

rm .env

docker-compose down
docker-compose build
docker-compose up -d

sudo chmod -R 777 ./storage/framework
sudo chmod -R 777 ./storage/logs
