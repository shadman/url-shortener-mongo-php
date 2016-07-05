<?php
error_reporting(E_ALL);

$config = array(
'username' => 'shadman',
'password' => 'shan0321',
'dbname'   => 'shortener-url',
'connection_string'=> sprintf('mongodb://%s:%d/%s','mongo ds015690.mlab.com','15690','shortener-url')
);


$connection = new Mongo($config['connection_string']);

$collection = $connection->shortener_url;

$records = $collection->find();

foreach ($records as $record) {
	echo $record->url;
}
