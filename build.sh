echo "Downloading Porfolio ..."
cd ~/dev/web/homeworks/main/web
rm -rf portfolio
gdrive download -r -f 1E15Njd_eV2HS8Uv6pdTiCEJX88TKus7X
echo "Building Webpages ..."
cd ~/dev/web/homeworks/main/src
python build.py
cd ~/dev/web/homeworks/main/
git add .
git commit -m "${1:-automated-build}"
git push master
git push heroku master
