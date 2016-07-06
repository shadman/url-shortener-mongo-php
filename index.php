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
	else if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['short_code']) {
		//redirect to desired url
		$short_code = $_GET['short_code'];
		$shortenerURL = new shortenerURL;
		$record = $shortenerURL->getRecord($short_code);

		header( "Location: ".$record['url'] );
		exit;
	}

?>
<html>
<head>
</head>
<body>
<form action="" method="post">

	<input type="text" name="url" placeholder="http://example.com" class="url-box">
	<input type="submit" value="Generate Short URL">

</form> 

<?php echo $msg; ?>

</body>
</html>