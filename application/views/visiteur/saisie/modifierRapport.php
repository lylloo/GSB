
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
            
        </tr>
        <?php
            form_close();
        ?>
 </table>