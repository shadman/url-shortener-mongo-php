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

try {

$db = $connection->selectDB('shortener-url');
$collection = new MongoCollection($db, 'shortener_url');

$cursor = $collection->find();
foreach ($cursor as $doc) {
    var_dump($doc);
}

echo '=======--------=========';
//$collection = $connection->shortener_url;
//$collection = $connection->selectCollection($connection['dbname'], 'shortener_url');
//$collection = $connection->selectDB('shortener_url')->selectCollection('shortener_url');
$collection = $connection->database->shortener_url;

$records = $collection->find();

	print_r($records);
	echo '--------<br>';
	$jokesArray = iterator_to_array($records);
	echo '============<br>';
	print_r($jokesArray);
	echo '---========---<br>';

	foreach ($records as $record) {
		print_r($record);
	}

} catch (Exception $e) {
    print_r($e);
}
