<?php
require 'config/config.php';
require 'classes/database.php';
require 'models/shortener_url.php';


	# If form posted
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		$shortenerURL = new shortenerURL;
		$response = $shortenerURL->createShortURL($_POST['url']);
		if (is_array($response)===true) {
			$msg = "Your short url: ". 'http://localhost/'. $response['short_url'];
		}

	}
	else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		//redirect to desired url
	}

?>

<form action="" method="post">

	<input type="text" name="url">
	<input type="submit" value="Generate Short URL">

</form> 

<?php echo $msg; ?>