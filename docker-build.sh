#!/bin/bash
#A simple file for build dev dock

if [[ $EUID -ne 0 ]]; then
  echo "You must be a root user" 2>&1
  exit 1
fi

docker.io build -t ubuntu:simplenote .
