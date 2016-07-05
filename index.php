<?php
error_reporting(E_ALL);

$config = array(
'username' => 'shadman',
'password' => 'shan0321',
'dbname'   => 'shortener-url',
'connection_string'=> sprintf('mongodb://%s:%d/%s -u %s -p %s','mongo ds015690.mlab.com','15690','shortener-url','shadman','shan0321')
);

#mongo ds015690.mlab.com:15690/shortener-url -u shadman -p shan0321

$connection = new MongoClient($config['connection_string']);

$collection = $connection->shortener_url;

$records = $collection->find();

foreach ($records as $record) {
	echo $record->url;
}
