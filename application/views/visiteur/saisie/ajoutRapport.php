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
 			$toutPraticient = $this->ModelSaisie->toutPraticien();
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
            </select>
                    
             <?php
             	echo
             	br(1).
             	form_label("Date de la visite").
             	br(1).
             	"<input type='date' name='dateVisite'>".
             	br(1).
             	form_label("Motif de la visite");	
 			//FERME LE FORMULAIRE
 			form_close();

 		?>
 	
 </div>