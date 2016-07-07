<?php
class shortenerURL {


	function createShortURL($url){

		$shortURL = $this->generateShortURL($url);
		if ($shortURL == false) return false;

		if ( $this->isRecordExists($shortURL) == false ){
			// Creating short url
			return $this->insertShortURL($shortURL, $url);
		} else {
			// Try again
			return $this->createShortURL($url);
		}

	}

	# Generate random short code for url
	function generateShortURL($url, $max=8) {

		# Return short code for url
		return substr(base_convert(microtime(false), 10, 36), 0, $max);

	}


	# Retrive record if exists
	function isRecordExists($short_url){
		global $database;

		try {
			$collection = $database->getCollection('shortener_url');

			$where = array( 'short_url' => $short_url );
			$records = $collection->find($where)->limit(1);
			
			if ($records->count()==0) return false;

			return true;

		} catch (Exception $e) {
			return $e->getMessage();
		}

	}

	# Retrive url
	function getRecordByShortCode($short_code){
		global $database;

		try {
			$collection = $database->getCollection('shortener_url');

			$where = array( 'short_url' => $short_code );
			$fields = array( 'url' => 1 );
			$data = $collection->findOne($where, $fields);
			return $data;

		} catch (Exception $e) {
			echo 2;
			return $e->getMessage();
		}

	}

	
	# Retrive url
	function getRecordById($id){
		global $database;

		try {
			$collection = $database->getCollection('shortener_url');

			$where = array( '_id' => new MongoId($id) );
			$fields = array( 'short_url' => 1 );
			$data = $collection->findOne($where, $fields);
			return $data;

		} catch (Exception $e) {
			return $e->getMessage();
		}

	}


	# Create a record in database collection
	function insertShortURL($shortURL, $url){
		global $database;
		
		try {
			$collection = $database->getCollection('shortener_url');

			$data = array( 'short_url' => $shortURL, 'url' => $url, 'views' => 0 );
			$collection->insert($data);
			return $data;
		} catch (Exception $e) {
			return $e->getMessage();
		}

	}


	function validateURL($url) {

		if (!isset($url))
		  return 202;
		else if (!filter_var($url, FILTER_VALIDATE_URL) === true) 
		  return 203;

		return true;
	}

}