# echo "Building Webpages ..."
# cd ~/dev/web/homeworks/main/src
# python build.py
# cd ~/dev/web/homeworks/main/
# git add .
# git commit -m "${1:-automated-build}"
# git push master
# git push heroku master


#!/bin/bash

cwd=$(pwd)
POSITIONAL=()
while [[ $# -gt 0 ]]
do
key="$1"

case $key in
    d)
    echo "Downloading Portfolio ..."
    cd $PATH:$(pwd)+web
    rm -rf portfolio
    gdrive download -r -f 1E15Njd_eV2HS8Uv6pdTiCEJX88TKus7X
    shift;;
    b)
    echo "Building Webpages ..."
    cd $PATH:$(pwd)+src
    python build.py
    shift;;
    p|--msg)
    echo "Pushing to Heroku ..."
    cd ~/dev/web/homeworks/main/
    git add .
    git commit -m "${2:-automated-build}"
    git push master
    git push heroku master
    shift shift;;
esac
done
