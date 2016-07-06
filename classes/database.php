<?php
class Database {

	public $connection = '';

	# Creating a connection string for MongoDB
	public static function connectionString(){
		return sprintf('mongodb://%s:%d', Config::$DB_HOST, Config::$DB_PORT);
	}


	public function __construct(){

		try {
			$connect = new MongoClient(self::connectionString(), 
										  array("username" => Config::$DB_USERNAME, "password" => Config::$DB_PASSWORD, "db" => Config::$DB_NAME) );
			$this->connection = $connect->selectDB(Config::$DB_NAME);
		} catch (Exception $e) {
		    echo $e->getMessage();
		}

	}
	

	public function getCollection($collection_name){
		try {
			$collection =  new MongoCollection($this->connection, Config::$COLLECTION_NAMES[$collection_name]);
			return $collection;
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	}

}

global $database;
$database = new Database;

