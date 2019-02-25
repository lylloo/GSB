<?php
	//METTRE UN ECHO QUI FINI PAR UN POINT VIRGULE ET METTRE . POUR CHAQUE ELLEMENT
	//REMPLACER LES ; PAR DES . SAUF POUR LE DERNIER QUI EST UN ;
	/*echo
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
		*/
?>
<style>
	.tableau-neutre{
        margin: auto;
        width: 850px;
    }

</style>
<table class="tableau-neutre">
	<thead>
		 <tr>
            <td colspan="10">
                <?php 
                    echo heading('Rapport de visite non valider', '2', 'style=\'text-align:center;\'');
                ?>
            </td>
        </tr>

        <!-- tableau construction -->
         <tr>
            <th width="70px">N° rapport</th>
            <th width="80px">N° praticien</th>
            <th width="90px">Nom praticien</th>
            <th width="110px">Prénom praticien</th>
            <th width="150px">Motif de visite</th>
            <!--<th width="80px">Date de visite</th>-->
            <th>Médicaments présentés</th>
            <th> Modifier le rapport </th>
        </tr>
	</thead>
</table>