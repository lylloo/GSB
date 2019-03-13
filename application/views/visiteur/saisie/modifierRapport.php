
<table>    
        <?php
            form_open("Saisie/choix");
        ?>
        <tr>
        	<!-- Titre du rapport par rapport au numero -->
            <th colspan="2"><h3>Modifier le rapport de visite n°<?php echo $informations_rapport[0]->RAP_NUM;?></h3></th>
        </tr>
        <tr>
            <th>Praticien : </th>
        </tr>
        <tr>
        	<!--AFFICHE LE BON PRATICIENT -->
        	<td><?php echo $informations_rapport[0]->PRA_NOM." ".$informations_rapport[0]->PRA_PRENOM;?></td><br>
            <td>
                <?php
                    //APPELLE LA FONCTION POUR AFFICHER LES PARCTICIENT
 			        $toutPraticient = $this->ModelSaisie->toutPraticien();
                ?>
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
            </td>

        </tr>

        <!-- DATE -->
        <tr>
        	<th>Date du rapport :</th>
        	<th> Modifier la date </th>
        </tr>
        <tr>
        	 <td><?php echo date_format(date_create($informations_rapport[0]->RAP_DATE), 'd/m/Y');?></td>
        	 
        	 <td><input type="date" id="date"> </td>
        </tr>

        <!--  Bilan-->
        <tr>
            <th>Bilan de la visite :</th>
        </tr>
        <tr>
            <td><?php echo form_input("bilan",$informations_rapport[0]->RAP_BILAN);  ?></td>
        </tr>

        <!-- MOTIF -->
        <tr>
        	<th>Motif de la visite :</th>
        </tr>
        <tr>
        	<!--<td> <input type="text" placeholder=<?php //echo $informations_rapport[0]->RAP_MOTIF;?>></td>-->
            <!-- motif de la visite -->
            <!--  MOOTIF DE LA VISITE-->
            <td><?php echo form_input("motif",$informations_rapport[0]->RAP_MOTIF); ?></td>
        </tr>

        <!-- Medicament -->
        <tr>
            <th>Medicaments : </th>
            <th> Médicaments pour modifier</th>
        </tr>
        <tr>
            <td width="225px">
                <?php
                 //PARCOURS LISTE MEDICAMENTS PRESENTS
                //LISTE DES MEDICAMENTS PRESENTER
                $liste_medicaments_presentes = $this->ModelConsultation->liste_medicaments_presentes($informations_rapport[0]->RAP_NUM);

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

        </tr>
        <?php
            form_close();
        ?>
        <tr>
             <td width="68px"><!-- Numéro de rapport de visite -->
                                        <?php echo form_open('Saisie/medicaments');?>
                                       <!-- <input type="hidden" name="debut" value="<?php //if(isset($_POST['debut'])){echo $_POST['debut'];}?>">-->
                                       <!-- <input type="hidden" name="fin" value="<?php //if(isset($_POST['fin'])){echo $_POST['fin'];}?>">-->
                                        <!--<input type="hidden" name="praticien" value="<?php //if(isset($_POST['praticien'])){echo $_POST['praticien'];}?>">-->
                                        <?php 
                                            //if (isset($_POST['tout']) || (!isset($_POST['tout']) && !isset($_POST['valider']))) {
                                        ?>
                                              <!--  <input type="hidden" name="tout" value="Tous les rapports">-->
                                        <?php
                                            //} else {
                                        ?>
                                              <!--  <input type="hidden" name="valider" value="Affiner">-->
                                        <?php
                                            //}   
                                        ?>
                                        <button type="submit">ajouter medicaments</button>
                                        <?php echo form_close();?>
                                    </td>
        </tr>
 </table>