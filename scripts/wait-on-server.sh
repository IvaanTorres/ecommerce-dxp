#!/usr/bin/env sh

SERVER=$1

until $(curl --output /dev/null --silent --head --fail "${SERVER}"); do
    printf '.'
    sleep 1
done 