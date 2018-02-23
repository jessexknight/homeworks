#!/bin/bash

cwd="$( cd "$( dirname "${BASH_SOURCE[0]}" )" && pwd )"
while [[ $# -gt 0 ]]
do
key="$1"

case $key in
    d)
    echo "Downloading Portfolio ..."
    cd $cwd/web
    rm -rf portfolio
    gdrive download -r -f 1E15Njd_eV2HS8Uv6pdTiCEJX88TKus7X
    shift
    ;;
    b)
    echo "Building Webpages ..."
    cd $cwd/src
    python build.py
    shift
    ;;
    p)
    echo "Pushing to Heroku ..."
    cd $cwd
    git add .
    git commit -m "automated-build-test"
    git push master
    git push heroku master
    shift
    ;;
esac
done
