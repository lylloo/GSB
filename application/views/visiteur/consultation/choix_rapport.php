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
    #tableau-neutre{
        margin: auto;
        width: 850px;
    }
    #tableau-scroll{
        display: inline-block;
        overflow: auto;
        max-height: 200px;
        text-align: center;
    }
</style>

<table id="tableau-neutre">
    <thead>
        <tr>
            <td colspan="10">
                <?php 
                    echo heading('Recherche de rapports de visite', '2', 'style=\'text-align:center;\'');
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="10">
                <?php
                    echo    
                        form_open('Consultation').
                        "<span style='position:relative; left:60px;'".
                        form_label('Du :', 'debut');
                ?>
                    <input type="date" name="debut" id="debut" value="<?php if(!empty($_POST['debut'])){echo $_POST['debut'];}else{echo date("Y-m-d");}?>">
                <?php
                    echo form_label('au :', 'fin', array('style' => 'margin-left:5px;'));
                ?>
                    <input type="date" name="fin" id="fin" value="<?php if(!empty($_POST['fin'])){echo $_POST['fin'];}else{echo date("Y-m-d");}?>">
                <?php
                    echo form_label(' Praticien :', 'praticien', array('style' => 'margin-left:15px;'));
                ?>
                    <select name="praticien" id="">
                        <option value="0">Tous les praticiens</option>
                    <?php
                        if (!empty($liste_praticiens_deja_vus)) {
                            foreach ($liste_praticiens_deja_vus as $libelle => $valeur) {
                        ?>
                            <option value="<?php echo $valeur->PRA_NUM;?>" <?php if(!empty($_POST['praticien']) && $_POST['praticien'] == $valeur->PRA_NUM){echo "selected";}?>><?php echo $valeur->PRA_NOM." - ".$valeur->PRA_PRENOM;?></option>
                        <?php
                            }
                        }
                    ?>
                    </select>
                <?php
                    echo 
                        form_submit('valider', 'Affiner', array('style' => 'margin-left:5px;')).
                        "</span>".
                        form_submit('tout', 'Tous les rapports', array('style' => 'position: relative; top: -50px; right:-42px;')).
                        form_close().br();
                ?>
            </td>
        </tr>
        <tr>
            <th width="70px">N° rapport</th>
            <th width="80px">N° praticien</th>
            <th width="90px">Nom praticien</th>
            <th width="110px">Prénom praticien</th>
            <th width="150px">Motif de visite</th>
            <th width="80px">Date de visite</th>
            <th>Médicaments présentés</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td colspan="7" align="center">Galaxy Swiss Bourdin</td>
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <td colspan="7"><!-- Adapter le nombre en fonction du nombre de <th> au dessus -->
                <table id="tableau-scroll" >
                    <?php
                        if ($liste_rapports_de_visite != null) {
                            foreach ($liste_rapports_de_visite as $libelle => $valeur) {
                            ?>
                                <tr>
                                   <td width="68px"><!-- Numéro de rapport de visite -->
                                        <?php echo form_open('Consultation/selection/'.$valeur->RAP_NUM);?>
                                        <input type="hidden" name="debut" value="<?php if(isset($_POST['debut'])){echo $_POST['debut'];}?>">
                                        <input type="hidden" name="fin" value="<?php if(isset($_POST['fin'])){echo $_POST['fin'];}?>">
                                        <input type="hidden" name="praticien" value="<?php if(isset($_POST['praticien'])){echo $_POST['praticien'];}?>">
                                        <?php 
                                            if (isset($_POST['tout']) || (!isset($_POST['tout']) && !isset($_POST['valider']))) {
                                        ?>
                                                <input type="hidden" name="tout" value="Tous les rapports">
                                        <?php
                                            } else {
                                        ?>
                                                <input type="hidden" name="valider" value="Affiner">
                                        <?php
                                            }   
                                        ?>
                                        <button type="submit">N°<?php echo $valeur->RAP_NUM;?></button>
                                        <?php echo form_close();?>
                                    </td> 
                                    <td width="80px">N°<?php echo $valeur->PRA_NUM;?></td> <!-- Numéro du praticien -->
                                    <td width="90px"><?php echo $valeur->PRA_NOM;?></td> <!-- Nom du praticien -->
                                    <td width="109.5px"><?php echo $valeur->PRA_PRENOM;?></td> <!-- Pénom du praticien -->
                                    <td width="149.5px"><?php echo $valeur->RAP_MOTIF;?></td> <!-- Motif de la visite -->
                                    <td width="79.5px"><?php echo date_format(date_create($valeur->RAP_DATE), 'd/m/Y');?></td> <!-- Date de la visite -->
                                    <td width="225px">
                                        <?php
                                            $liste_medicaments_presentes = $this->ModelConsultation->liste_medicaments_presentes($valeur->RAP_NUM);

                                            if ($liste_medicaments_presentes != null) {
                                        ?>
                                                <select>
                                                <?php
                                                    foreach ($liste_medicaments_presentes as $libelle => $valeur) {
                                                ?>
                                                    <option><?php echo $valeur->MED_DEPOTLEGAL." - ".$valeur->MED_NOMCOMMERCIAL;?></option>
                                                <?php
                                                    }
                                                ?>
                                                </select>
                                        <?php 
                                            } else {
                                                echo "Aucun";
                                            }
                                            
                                        ?>
                                    </td>
                                </tr>
                            <?php
                            }
                        } else {
                    ?>
                            <tr>
                                <td colspan="6">Aucun rapport de visite trouvé</td>
                            </tr>
                    <?php
                        }
                    ?>
                </table>
            </td>
        </tr>
    </tbody>
</table>