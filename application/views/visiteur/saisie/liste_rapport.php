<?php
	
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
            <th width="80px">Date de visite</th>
            <th width="180px"> Bilan</th>
            <th width="150px">Motif de visite</th>
            <th>Médicaments présentés</th>
            <th> Modifier le rapport </th>
        </tr>
	</thead>


	<?php
        //APPELLE DE LA FONCTION
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
                             <!-- date -->
                            <td width="79.5px"><?php echo date_format(date_create($laValeur->RAP_DATE), 'd/m/Y');?></td>
                            <!-- bilan-->
                            <td width="140.5px"><?php echo $laValeur->RAP_BILAN;?></td>
                             <!-- MOTIF DU RAPPORT -->
 							<td width="149.5px"><?php echo $laValeur->RAP_MOTIF;?></td>

                         
                             

 							 <td width="225px">
                                        <?php
                                        //PARCOURS LISTE MEDICAMENTS PRESENTS
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

                                <td width="68px"><!-- Numéro de rapport de visite -->
                                        <?php echo form_open('Saisie/choix/'.$laValeur->RAP_NUM);?>
                                       
                                        <button type="submit">Modifier<?php  $laValeur->RAP_NUM;?></button>
                                        <?php echo form_close();?>
                                    </td>
                                
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

	 
