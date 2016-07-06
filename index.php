<?php
error_reporting(E_ALL);

$config = array(
'username' => 'shadman',
'password' => 'shan0321',
'db'   => 'shortener-url',
'connection_string'=> sprintf('mongodb://%s:%d','ds015690.mlab.com','15690')
);

#mongo ds015690.mlab.com:15690/shortener-url -u shadman -p shan0321

$connection = new MongoClient($config['connection_string'], array("username" => $config['username'], "password" => $config['password'], "db" => $config['db']));

//$collection = $connection->shortener_url;
//$collection = $connection->selectCollection($connection['dbname'], 'shortener_url');
$collection = $connection->selectDB('shortener_url')->selectCollection('shortener_url');

$records = $collection->find();

//foreach ($records as $record) {
//	echo $record->url;
//}
