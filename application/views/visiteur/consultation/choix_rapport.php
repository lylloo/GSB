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
    #tableau-neutre{
        margin: auto;
        width: 800px;
    }
    #tableau-scroll{
        display: inline-block;
        overflow: auto;
        max-height: 200px;
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
                        form_open('Consultation/selection_fourchette').
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
                        form_close().br();
                ?>
            </td>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td colspan="2" align="center">Galaxy Swiss Bourdin</td>
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <td colspan="10"><!-- Adapter le nombre en fonction du nombre de <th> au dessus -->
                <table id="tableau-scroll" >
                    <tr>
                        <td colspan="10">Aucun rapport de visite</td>
                    </tr>
                </table>
            </td>
        </tr>
    </tbody>
</table>