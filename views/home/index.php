<!DOCTYPE html>
<html lang="en">

<head>
    <?php include('views/layouts/meta.php'); ?>
</head>

<body>

	<?php
		foreach($layouts as $layout){
			echo "<!-- Start $layout Area -->";
			include("views/$layout.php");
			echo "<!-- End Header Area -->";
		}
	?>

</body>
	<?php include('views/layouts/script.php'); ?>
</html>