<?php
	//METTRE UN ECHO QUI FINI PAR UN POINT VIRGULE ET METTRE . POUR CHAQUE ELLEMENT
	//REMPLACER LES ; PAR DES . SAUF POUR LE DERNIER QUI EST UN ;
	echo
		form_open("EspaceVisiteur/saisie").
		form_label("Numero de rapport ").
		form_input("numRapport").
		br(2).
		form_label(" Nom du praticient ").
		//REMPACER PAR UN SCROLL , menu qui descent
		form_input("nomPraticient ").
		br(2).
		form_label("date ").
		"<input type='date' name='date'>".
		br(2).
		//FIN DU FORMULAIRE
		form_label("Motif ").
		form_input("motif").
		br(2).
		//description
		form_label("description").
		br(1).
		form_textarea("description").
		br(2).
		form_submit("Valider","Ajouter").
		form_close();
?>