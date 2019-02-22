<style>
    form{
        text-align:center;
    }
</style>

<?php 
    echo
        heading('Recherche de comptes-rendus', '2', 'style=\'text-align:center;\'').
        form_open('Consultation/selection_fourchette').
        form_label(' Début :', 'debut');
?>
    <input type="date" name="debut" id="debut" value="<?php if(!empty($_POST['debut'])){echo $_POST['debut'];}else{echo date("Y-m-d");}?>">
<?php
    echo form_label(' Fin :', 'fin', array('style' => 'margin-left:15px;'));
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
        form_submit('valider', 'Rechercher', array('style' => 'margin-left:5px;')).
        form_close();
?>