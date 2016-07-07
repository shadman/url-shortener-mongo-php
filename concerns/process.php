<?php

	// Creating short URL by POST request
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

		$shortenerURL = new shortenerURL;
		$validate_request = $shortenerURL->validateURL($_POST['url']);
		
		if ( $validate_request === true ) {
			$response = $shortenerURL->createShortURL($_POST['url']);
			if (is_array($response)===true) {
				$id = Application::convertObjecttoString($response['_id']);

				Application::redirectToURL('?id='.$id);
				exit;
			}
		} else {
			$msg = Application::errorMessage($validate_request);
		}


	// Dispaying posted url results, to avoid resubmission
	} else if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['id']) {

		
		$id = $_GET['id'];
		$shortenerURL = new shortenerURL;
		$response = $shortenerURL->getRecordById($id);
		if (is_array($response)===true) {
			$complete_url = Application::getTempShortURL($response['short_url']);
			$msg = Application::getLinkToDisplay($complete_url);
		} else {
			$msg = Application::errorMessage(200);
		}


	// Redirect to desired short URL destination
	} else if ($_SERVER['REQUEST_METHOD'] === 'GET' && $_GET['short_code']) {
		
		$short_code = $_GET['short_code'];
		$shortenerURL = new shortenerURL;
		$record = $shortenerURL->getRecordByShortCode($short_code);

		Application::redirectToURL($record['url']);
		exit;

	} 
