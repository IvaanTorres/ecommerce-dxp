#!/usr/bin/env sh

PORT=$1
FOLDER=$2

npx http-server ${FOLDER} --port ${PORT} --silent &