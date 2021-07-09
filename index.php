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
	<!-- sweetalert -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
	<script src="https://kit.fontawesome.com/08186bef1d.js" crossorigin="anonymous"></script>
	<!-- end -->
	<!-- animate -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
	<!-- end -->
	<!-- <script src="https://www.gstatic.com/dialogflow-console/fast/messenger/bootstrap.js?v=1"></script>
	<df-messenger intent="WELCOME" chat-title="latdoc" agent-id="bd12c91f-1eec-4692-8fa8-10a429495a55" language-code="id"></df-messenger> -->

	<!-- aos -->
	<link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
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











	<!-- Tab Tentang -->
	<?php
	include './_partials/footer.php'
	?>

	<!--  Scripts-->
	<script>
		// let modals = document.elementById('modal9');
		// console.log('m', modals)
		setTimeout(function() {
			Swal.fire({
				imageUrl: 'http://localhost/pakar_gigi/assets/img/image1.jpeg',
				width: 500,
				imageHeight: 500,
				showClass: {
					popup: 'animate__animated animate__fadeInDown'
				},
				hideClass: {
					popup: 'animate__animated animate__fadeOutUp'
				},
				showConfirmButton: false,
				showCloseButton: true,
				html: '<b>Install Aplikasi di handphone anda</b>, ' +
					'<a href="//sweetalert2.github.io">links</a> ',
				timer: 7000
			})
		}, 1000)
	</script>
	<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
	<script>
		AOS.init({
			easing: 'ease',
			debounceDelay: 50,
		});
	</script>
	<script src="./assets/js/jquery.min.js"></script>
	<script src="./assets/js/materialize.min.js"></script>
	<script src="./assets/js/api.js"></script>
	<script src="./assets/js/custom.js"></script>
	<script src="./assets/js/jquery.easing.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.js"></script>
</body>

</html>