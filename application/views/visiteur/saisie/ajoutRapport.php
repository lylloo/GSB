<meta charset="utf-8">
<style>
	.principale{
		
		margin:0 auto;
	}

	
</style>

<?php 
   echo heading('Nouveau rapport', '2', 'style=\'text-align:center;\'');
 ?>

 <div class="principale">
 	
 		<?php
 			form_open("Saisie/ajout");
 			echo 
 			//NUMERO DE RAPPORT
 			form_label("Numero du rapport").
 			br(1).
 			"<input type='number' name='numRapport'>".
 			br(1).
 			form_label("praticien").
 			br(1);
 			
 			
 			//APPELLE LA FONCTION POUR AFFICHER LES PARCTICIENT
 			/*$toutPraticient = $this->ModelSaisie->toutPraticien();
 			?>
 			<!-- AFFICHE LA LISTE DES PRATICIENT -->
 			<select name="praticien" id="">
                        <option value="0">Tous les praticiens</option>
                    <?php
                        if (!empty($toutPraticient)) {
                            foreach ($toutPraticient as $libelle => $valeur) {
                        ?>
                            <option value="<?php echo $valeur->PRA_NUM;?>" <?php if(!empty($_POST['praticien']) && $_POST['praticien'] == $valeur->PRA_NUM){echo "selected";}?>><?php echo $valeur->PRA_NOM." - ".$valeur->PRA_PRENOM;?></option>
                        <?php
                            }
                        }
                    ?>
            </select>*/
                    
            
             //<?php
             	echo
             	br(1).
             	form_label("Date de la visite").
             	br(1).
             	"<input type='date' name='dateVisite'>".
             	br(1).
                form_label("bilan","bilan").
                br(1).
                form_input("Bilan").
                br(1).
             	form_label("Motif de la visite").
                br(1).
                form_input("motif","motif").
                br(1).
                form_label("liste des medicaments").
             	br(1);

             	 
              /*  $tousMedicaments = $this->ModelSaisie->liste_medicaments();
            ?>
            <!-- AFFICHE LA LISTE DES PRATICIENT -->
            <select name="praticien" id="">
                        <option value="0">Tous les medicament</option>
                    <?php
                        if (!empty($tousMedicaments)) {
                            foreach ($tousMedicaments as $libelle => $valeur) {
                        ?>
                            <!-- <option><?php //echo $valeur->MED_DEPOTLEGAL." - ".$valeur->MED_NOMCOMMERCIAL;?></option>-->
                            <option  value="<?php echo $valeur->MED_DEPOTLEGAL;?>" <?php if(!empty($_POST['medicament']) && $_POST['medicament'] == $valeur->MED_DEPOTLEGAL){echo "selected";}?>><?php echo $valeur->MED_NOMCOMMERCIAL;?></option>
                        <?php
                            }
                        }
                    ?>
            </select>*/
            //<?php
              
                 echo
                 br().
                 /*form_label("Niveau de confiance").
                 br().
                 "<input type='number' name='numRapport'>".
                 br().*/
                 form_submit("valider","valider");
             	?>
            <?php
 			//FERME LE FORMULAIRE
 			form_close();

 		?>
 	
 </div>