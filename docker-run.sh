#!/bin/bash
# A simple script for run dev dock with shared folder and command prompt
# Bug if absolute path to this contains sapces

if [[ $EUID -ne 0 ]]; then
  echo "You must be a root user" 2>&1
  exit 1
fi

#Because -v option need absolute path
CURRENT_FOLDER_PATH=$(dirname $(readlink -f $0))
SOURCE_FOLDER='/src'

docker.io run -i -t -p 8081:80 -v $CURRENT_FOLDER_PATH$SOURCE_FOLDER:/var/www ubuntu:simple-note bash