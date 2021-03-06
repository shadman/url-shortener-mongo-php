
# URL Shortener Generator with Mongo and PHP


## Live URL: 
https://shortener-url-app.herokuapp.com


## Specifications:
- Developed in core PHP.
- Using MongoDB for large number of traffic.
- You can create a short URL of any long URL.
- Every short url will be unique.
- High performance can support morethan 500 million users.
- Using Free MongoDB from https://mlab.com. (Although its great but you may face some downtime due to free package).
- Added URL rewriting for shortest URL on server to experince a live taste.
- Tracking number of hits for every short URL
- Storing creation date time as well
- Can easily integrate short dedicated domain name for url

## Deployment:

### Enable Rewrite mode in PHP for .htaccess:

$  sudo a2enmod rewrite

$  sudo service apache2 restart


### Enable .htaccess rewrite on apache settings:

$  sudo vim /etc/apache2/apache2.conf

	<Directory />
		.. 
		..
		AllowOverride all
		..
	</Directory>

	<Directory /var/www/>
		..
		..
		AllowOverride all
		..
	</Directory>


### Extract PHP code:

Copy/Extract/Clone given code inside your PHP project directory

example: /var/www/shortener-url


### Run your deployed PHP code via browsers:

example: http://localhost/shortener-url/


### Database settings:

If you have your own mongoDB, then you may add your database configuration here:

vim <PROJECT_DIRECTORY>/config/config.php

If you have created different collection (table) for short url records, you may update here:

	...
	...

    # All collection names 
    static $COLLECTION_NAMES    	= array(
    										'shortener_url' => '<ADD_YOUR_SHORTENER_URL_COLLECTION_NAME_HERE>' 
    								  );

    ...
    ...


***** NOTE: If you want to make your own local mongoDB or want to create free online please follow below instructions to create and handle.

Deployment Completed. 

Cheers !

-------

## Setup MongoDB on your local machine for PHP:


### Setup MongoDB for PHP in Ubuntu 14:

$  sudo apt-get install php5-mongo


### Download Latest One (if you don't have it):

https://pecl.php.net/package/mongo

$  tar zxvf mongo-php.tar.gz
$  cd mongodb-mongodb-php-driver-<commit_id>
$  phpize
$  ./configure
$  sudo make install
$  sudo service apache2 restart



### Setup/Create MongoDB Free Account (if required):

https://mlab.com (but still mongo client required to connect mongoDB)

OR

### Deploy MongoDB Locally:

Reference: https://docs.mongodb.com/manual/tutorial/install-mongodb-on-ubuntu/

$  sudo apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv EA312927

$  echo "deb http://repo.mongodb.org/apt/ubuntu trusty/mongodb-org/3.2 multiverse" | sudo tee /etc/apt/sources.list.d/mongodb-org-3.2.list

$  sudo apt-get update

$  sudo apt-get install -y mongodb-org=3.2.7 mongodb-org-server=3.2.7 mongodb-org-shell=3.2.7 mongodb-org-mongos=3.2.7 mongodb-org-tools=3.2.7

$  sudo service mongod start

$  sudo service mongod restart / stop


Good Luck ! 
