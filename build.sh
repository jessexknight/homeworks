#!/bin/bash

cwd="${BASH_SOURCE[0]}"
POSITIONAL=()
while [[ $# -gt 0 ]]
do
key="$1"

case $key in
    d)
    echo "Downloading Portfolio ..."
    cd $(pwd)/web
    rm -rf portfolio
    gdrive download -r -f 1E15Njd_eV2HS8Uv6pdTiCEJX88TKus7X
    shift
    ;;
    b)
    echo "Building Webpages ..."
    cd $(pwd)/src
    python build.py
    shift
    ;;
    p|--msg)
    echo "Pushing to Heroku ..."
    cd $(pwd)
    git add .
    git commit -m "${2:-automated-build}"
    git push master
    git push heroku master
    shift shift
    ;;
esac
done
