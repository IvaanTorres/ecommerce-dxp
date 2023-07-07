#!/usr/bin/env sh

PORT=$1

kill $(lsof -t -i:"${PORT}")