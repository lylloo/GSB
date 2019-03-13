<table>
	<tr>
		<td width="225px">
			<?php
                $tousMedicaments = $this->ModelSaisie->liste_medicaments();
 			?>
 			<!-- AFFICHE LA LISTE DES PRATICIENT -->
 			<select name="praticien" id="">
                        <option value="0">Tous les medicament</option>
                    <?php
                        if (!empty($tousMedicaments)) {
                            foreach ($tousMedicaments as $libelle => $valeur) {
                        ?>
                            <!-- <option><?php //echo $valeur->MED_DEPOTLEGAL." - ".$valeur->MED_NOMCOMMERCIAL;?></option>-->
                            <option value="<?php echo $valeur->MED_DEPOTLEGAL;?>" <?php if(!empty($_POST['medicament']) && $_POST['medicament'] == $valeur->MED_DEPOTLEGAL){echo "selected";}?>><?php echo $valeur->MED_NOMCOMMERCIAL;?></option>
                        <?php
                            }
                        }
                    ?>
            </select>
             </td>

	</tr>
</table>