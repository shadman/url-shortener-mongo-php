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
			$records = $collection->findOne($where);
			
			if ($records->count()==0) return false;

			return true;

		} catch (Exception $e) {
			return $e->getMessage();
		}

	}

	# Retrive url
	function getRecord($short_code){
		global $database;

		try {
			$collection = $database->getCollection('shortener_url');

			$where = array( 'short_url' => $short_code );
			$data = $collection->findOne($where);
			//$record = iterator_to_array($data); 
			return $data;

		} catch (Exception $e) {
			echo 2;
			return $e->getMessage();
		}

	}


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


}