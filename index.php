<?php
require 'config/config.php';
require 'classes/database.php';

require 'classes/application.php';
require 'models/shortener_url.php';

	require 'concerns/process.php';

print_r($_GET);
?>
<html>
<head>
	<link rel="stylesheet" href="styles/style.css">
	<title>Shortener URL Application</title>
</head>
<body>
<form action="" method="post">

	<input type="text" name="url" placeholder="http://example.com" class="url-box"><br />
	<input type="submit" value="Generate Short URL" class="generate-button">

</form>

	<?php if (isset($msg)) { ?>
		<div class="message-area">
			<?php echo $msg; ?>
		</div>
	<?php } ?>

</body>
</html>