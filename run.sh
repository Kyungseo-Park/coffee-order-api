#!/bin/bash

rm .env

docker-compose down
docker-compose build
docker-compose up -d
