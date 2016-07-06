<?php
error_reporting(E_ALL);

$config = array(
'username' => 'shadman',
'password' => 'shan0321',
'db'   => 'shortener-url',
'connection_string'=> sprintf('mongodb://%s:%d','ds015690.mlab.com','15690')
);

try {
	$connection = new MongoClient($config['connection_string'], 
								  array("username" => $config['username'], "password" => $config['password'], "db" => $config['db']) );
	$db = $connection->selectDB($config['db']);
} catch (Exception $e) {
    print_r($e);
}


try {

	$collection = new MongoCollection($db, 'shortener_url');

	$cursor = $collection->find();
	foreach ($cursor as $doc) {
	    var_dump($doc);
	}

} catch (Exception $e) {
    print_r($e);
}
