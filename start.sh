# pull and run a container named "Twink"
docker run -ti -v "$PWD/site":/usr/share/nginx/ -d -p 8080:80 --name Twink --hostname sti arubinst/sti:project2018

# run the web and PHP servers 
docker exec -u root sti_project service nginx start
docker exec -u root sti_project service php5-fpm start
