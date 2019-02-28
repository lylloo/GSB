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
        $this->load->helper('url');
?>
<style>
	form{
        text-align:center;
    }
    table{
        border-collapse: collapse;
    }
    thead, tfoot{
        background-color: #33adff;
    }
    tbody{
        background-color: #ccebff;
    }
    thead th{
        border: 1px solid black;
        text-align: center;
    }
    tbody td{
        border: 1px solid black;
    }
	.tableau-neutre{
        margin: auto;
        width: 850px;
    }
    .tableau-scroll{
    	display: inline-block;
        overflow: auto;
        max-height: 200px;
        text-align: center;
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
            <th width="80px">Date de visite</th>
            <th>Médicaments présentés</th>
            <th> Modifier le rapport </th>
        </tr>
	</thead>

	<?php
		$liste_rapport_pas_valider = $this->ModelSaisie->rechercheRapport();
	?>
	<tbody>
		<td colspan="7">
			<?php
				if($liste_rapport_pas_valider!=null){
					foreach($liste_rapport_pas_valider as $libelle =>$laValeur){
			?>
						<tr>
 							<td width="80px">N'<?php echo $laValeur->RAP_NUM;?></td>
                            <!-- NUMERO DU PRATICIENT -->
 							<td width="80px"> <?php echo $laValeur->PRA_NUM;?></td>
                             <!-- NOM DU PRATICIENT -->
 							<td width="90px"> <?php echo $laValeur->PRA_NOM; ?> </td>
                             <!-- PRENOM DU PRATICIENT -->
 							<td width="109.5px"><?php echo $laValeur->PRA_PRENOM; ?> </td>
                             <!-- MOTIF DU RAPPORT -->
 							<td width="149.5px"><?php echo $laValeur->RAP_MOTIF;?></td>
                             <!-- DATE RAPPORT-->
 							<td width="79.5px"><?php echo $laValeur->RAP_DATE;?></td>
 							 <td width="225px">
                                        <?php
                                            $liste_medicaments_presentes = $this->ModelConsultation->liste_medicaments_presentes($laValeur->RAP_NUM);

                                            if ($liste_medicaments_presentes != null) {
                                        ?>
                                                <select>
                                                <?php
                                                    foreach ($liste_medicaments_presentes as $libelle => $laValeur) {
                                                ?>
                                                    <option><?php echo $laValeur->MED_DEPOTLEGAL." - ".$laValeur->MED_NOMCOMMERCIAL;?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>

                                        <?php 
                                            } 
                                            else {
                                                echo "Aucun";
                                            }

                                            
                                        ?>
                                </td>

                                <!-- BOUTON POUR MODIFIER LE RAPPORT OU LE VALIDER-->
                                <td> <?php   echo anchor('Saisie/modifier', 'modifier');?></td>
 						</tr>
 						<?php
					}
				}
				else{
					?>
					<tr>
							<td>
								<?php echo "Aucun rapport en cours";?>
							</td>
					</tr>
					<?php
				}
                // echo form_open("EspaceVisiteur/saisie").form_submit("Nouveau","Nouveau rapport");
                echo anchor('Saisie/ajout', 'nouveau rapport ');
			?>
		</td>
	</tbody>

</table>

	 
