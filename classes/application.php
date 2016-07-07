<?php
class Application {
	
	public function getLinkToDisplay($link) {

		$success_message = "Your shortener URL: <a href='".$link."' target='_blank' class='short-link'>". $link."</a>";
		return $success_message;
	}

	public function redirectToURL($url) {
		header( "Location: ".$url );
	}

	public function convertObjecttoString($obj) {
		$value = (string) $obj;
		return $value;
	}

	public function errorMessage($code){

		switch($code) {
			case 200:
				$message = "Please enter a valid short URL.";
				return $message;
				break;
			case 203:
				$message = "Please enter a valid URL.";
				return $message;
				break;
			default:
				$message = "Sorry, Invalid error found.";
				return $message;
				break;

		}
	}

	function getHost() {
	  $host = $this->getProtocol().$_SERVER['SERVER_NAME'].$_SERVER['SCRIPT_NAME'];
	  return $host;
	}

	function getProjectPath() {
		$temp_url = ( str_replace('index.php', '', $this->getHost()) ) ;
		return $temp_url;
	}

	function getTempShortURL($short_url) {
		$temp_url = ( str_replace('index.php', '', $this->getHost()) ) . $short_url;
		return $temp_url;
	}

	function getProtocol() {
		echo $_SERVER['HTTP_X_FORWARDED_PROTO'];
		echo '===';
		echo $_SERVR['FORWARDED_PROTO'];
		echo '--';
		$protocol = ( stripos($_SERVER['SERVER_PROTOCOL'],'https') === true || stripos($_SERVER['HTTP_X_FORWARDED_PROTO'],'https') === true ) ? 'https://' : 'http://';
		return $protocol;
	}

}


global $application;
$application = new Application;