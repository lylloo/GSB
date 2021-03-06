<?php
defined('BASEPATH') OR exit('No direct script access allowed');

echo doctype('html5');
?>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<title>Galaxy Swiss Bourdin</title>
	<?php echo meta('Content-type', 'text/html; charset=utf-8', 'equiv'); ?>
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>
	<div id="container">
		<?php echo heading("Espace connexion Galaxy Swiss Bourdin", 1); ?>
		<div id="body" style="text-align:center;">
		<?php
			echo //Affichage du formulaire
				form_open("Connexion/validation_informations").
				form_label("Nom de famille: ").
				form_input("nom").
				br(2).
				form_label("Date d'embauche : ").
				"<input type='date' name='date'>".
				br(2).
				form_submit("valider", "Se connecter").
				form_reset("reset", "Effacer").
				form_close();
			
			//Si il manque une ou plusieurs informations du formulaire
			if (isset($validation))
				echo validation_errors(); //On affiche les erreurs de validation
			if (isset($visiteur_introuvable))
				echo "<p><center>Visiteur introuvable !</center></p>";
		?>
		</div>
		<p class="footer">Page rendue en <strong>{elapsed_time}</strong> secondes. <?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
	</div>
</body>
</html>