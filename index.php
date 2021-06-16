<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Aplikasi Diagnosis Mandiri</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="description" content="Tanya Dokter" />


	<!-- CSS  -->
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link href="./assets/css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection" />
	<link href="./assets/css/style.css" type="text/css" rel="stylesheet" media="screen,projection" />
	<style>
		.navBT {
			background-color: transparent;
			/* opacity: 0.5; */
		}
	</style>
	<!-- <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
	<df-messenger intent="WELCOME" chat-title="latdoc" agent-id="bd12c91f-1eec-4692-8fa8-10a429495a55" language-code="id"></df-messenger> -->
</head>

<body>
	<!-- Navigasi -->
	<?php
	include './_partials/nav.php'
	?>

	<!-- hero -->
	<?php
	include './_partials/hero.php'
	?>

	<!-- sidebarmob -->
	<?php
	include './_partials/side_mob.php'
	?>

	<!-- Tab Panduan -->
	<?php
	include './_partials/panduan.php'
	?>

	<!-- Tab Artikel Kesehatan -->

	<?php
	include './_partials/custom_article.php'
	?>


	<?php
	include './_partials/article.php'
	?>








	<!-- Tab Tentang -->
	<?php
	include './_partials/footer.php'
	?>

	<!--  Scripts-->
	<script src="./assets/js/jquery.min.js"></script>
	<script src="./assets/js/materialize.min.js"></script>
	<script src="./assets/js/api.js"></script>
	<script src="./assets/js/custom.js"></script>
	<script src="./assets/js/jquery.easing.min.js"></script>
</body>

</html>