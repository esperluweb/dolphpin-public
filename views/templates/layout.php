<?php
    
	use App\Configuration\Configuration as Configuration;
	
	?>

<!DOCTYPE html>
<html lang="fr">

<head>
	<title>Boisseau Informatique - <?= $this->title ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="Site de Boisseau Informatique, bas&eacute;e à Auxerre dans l'Yonne, qui propose la conception de votre site web et de la formation en informatique.">
	<meta name="author" content="Grégoire Boisseau" />
	<meta name="copyright" content="© Boisseau Informatique" />

	<!-- OpenGraph -->

	<meta property="og:image:width" content="279">
	<meta property="og:image:height" content="279">
	<meta property="og:title" content="Boisseau Informatique">
	<meta property="og:description" content="Site de Boisseau Informatique. Conception web et formation">
	<meta property="og:url" content="https://boisseau-informatique.fr">
	<meta property="og:image" content="https://boisseau-informatique.fr/assets/img/og-image.jpg">
	<meta property="og:type" content="website" />
	<meta property="og:site_name" content="Boisseau Informatique" />

	<!-- Twitter card -->

	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@BoisseauInfo" />
	<meta name="twitter:title" content="Accueil" />
	<meta name="twitter:url" content="https://boisseau-informatique.fr/" />
	<meta name="twitter:creator" content="@BoisseauInfo">
	<meta name="twitter:image" content="https://boisseau-informatique.fr/assets/img/og-image.jpg">
	<meta name="twitter:description" content="Site de Boisseau Informatique. Conception web et formation">

	<!-- CSS -->
	<link rel="stylesheet" href="https://unpkg.com/bootstrap-material-design@4.1.1/dist/css/bootstrap-material-design.min.css" integrity="sha384-wXznGJNEXNG1NFsbm0ugrLFMQPWswR3lds2VeinahP8N0zJw9VWSopbjv2x7WCvX" crossorigin="anonymous">
	<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Comfortaa|Material+Icons&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/d48cf5cf5b.js"></script>
	<link rel="stylesheet" href="/public/css/main.css">
	<link rel="stylesheet" href="/public/css/mobile.css">

	<!-- Favicons -->
	<link rel="apple-touch-icon" sizes="57x57" href="assets/img/favicon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="assets/img/favicon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="assets/img/favicon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/favicon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="assets/img/favicon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="assets/img/favicon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="assets/img/favicon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="assets/img/favicon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="assets/img/favicon/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192" href="assets/img/favicon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon/favicon-16x16.png">
	<link rel="manifest" href="assets/img/favicon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="assets/img/favicon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
</head>

<body>
	<?php require(Configuration::get('chemin_parts').'nav.php'); ?>
	<main class="container p-5">
		<?= $content ?>
	</main>
	<?php require(Configuration::get('chemin_parts').'foot.php'); ?>
	<!-- Scripts JS -->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/popper.js@1.12.6/dist/umd/popper.js" integrity="sha384-fA23ZRQ3G/J53mElWqVJEGJzU0sTs+SvzG8fXVWP+kJQ1lwFAOkcUOysnlKJC33U" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/bootstrap-material-design@4.1.1/dist/js/bootstrap-material-design.js" integrity="sha384-CauSuKpEqAFajSpkdjv3z9t8E7RlpJ1UP0lKM/+NdtSarroVKu069AlsRPKkFBz9" crossorigin="anonymous"></script>
	<script>
		$(document).ready(function() {
			$('body').bootstrapMaterialDesign();
		});
	</script>
	<script src="/public/js/script.js"></script>
	<?= $this->scripts ?>
	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=UA-88793287-1"></script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'UA-88793287-1');
	</script>

</body>

</html>