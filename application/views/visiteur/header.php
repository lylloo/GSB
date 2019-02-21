<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo doctype('html5');
?>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Galaxy Swiss Bourdin</title>
	<?php echo meta('Content-type', 'text/html; charset=utf-8', 'equiv'); ?>
</head>
<body>
	<div id="container">
		<?php echo heading("Espace Visiteur Galaxy Swiss Bourdin", 1); ?>
		<div id="body" style="text-align:center;">
            <?php
                $this->load->view('visiteur/menu');
            ?>
			<div align="justify">
				<!-- Contenu de la page -->	
			