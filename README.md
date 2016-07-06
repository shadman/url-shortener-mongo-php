# URL Shortener; with Mongo and PHP


# Deployment




-------

# Setup MongoDB on your local machine for PHP


## Setup MongoDB for PHP in Ubuntu 14

$  sudo apt-get install php5-mongo


### Download Latest One (if you don't have it)

https://pecl.php.net/package/mongo

$  tar zxvf mongo-php.tar.gz
$  cd mongodb-mongodb-php-driver-<commit_id>
$  phpize
$  ./configure
$  sudo make install
$  sudo service apache2 restart



## Setup/Create MongoDB Free Account (if required)

https://mlab.com (but still mongo client required to connect mongoDB)

OR

## Deploy MongoDB Locally

Reference: https://docs.mongodb.com/manual/tutorial/install-mongodb-on-ubuntu/

$  sudo apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv EA312927

$  echo "deb http://repo.mongodb.org/apt/ubuntu trusty/mongodb-org/3.2 multiverse" | sudo tee /etc/apt/sources.list.d/mongodb-org-3.2.list

$  sudo apt-get update

$  sudo apt-get install -y mongodb-org=3.2.7 mongodb-org-server=3.2.7 mongodb-org-shell=3.2.7 mongodb-org-mongos=3.2.7 mongodb-org-tools=3.2.7

$  sudo service mongod start

$  sudo service mongod restart / stop

