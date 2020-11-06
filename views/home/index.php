<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('views/layouts/meta.php'); ?>
</head>

<body>

	<?php
		foreach($layouts as $layout){
			echo "<!-- Start $layout Area -->";
			include_once("views/$layout.php");
			echo "<!-- End Header Area -->";
		}
	?>

</body>

</html>