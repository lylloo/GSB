<style>
    table{
        border-collapse: collapse;
        width: 100%;
        margin:auto;
        position:relative;
        left:12px;
    }
    thead, tfoot{
        background-color: #33adff;
        text-align: center;
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
    th{
        padding: 2px 5px;
    }
    td{
        width:250px;
        padding: 2px 5px;
    }
    h3{
        padding: 5px 2px;
        margin:0;
    }
    img{
        width:100px;
        position:absolute;
        top:-30px;
        left:0;
    }
</style>
<img src="logo.jpg">
<h1 align="center">BILAN RAPPORT DE VISITE</h1>

<div style="margin-bottom: 20px;"><br></div>
<!-- Informations rapport de visite -->
<table>
    <thead>
        <tr>
            <th colspan="2"><h3>Informations du rapport de visite n°<?php echo $informations_rapport[0]->RAP_NUM;?></h3></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Créé par :</th>
            <td><?php echo $_SESSION['visiteur'][0]->VIS_NOM." ".$_SESSION['visiteur'][0]->Vis_PRENOM." (".$_SESSION['visiteur']['TRA_ROLE'].")";?></td>
        </tr>
        <tr>
            <th>Date du rapport :</th>
            <td><?php echo date_format(date_create($informations_rapport[0]->RAP_DATE), 'd/m/Y');?></td>
        </tr>
        <tr>
            <th>Praticien rencontré :</th>
            <td>
                <?php echo $informations_rapport[0]->PRA_NOM." ".$informations_rapport[0]->PRA_PRENOM;?><br>
            </td>
        </tr>
        <tr>
            <th>Motif de la visite :</th>
            <td><?php echo $informations_rapport[0]->RAP_MOTIF;?></td>
        </tr>
        <tr>
            <th>Bilan rapport :</th>
            <td><?php echo $informations_rapport[0]->RAP_BILAN;?></td>
        </tr>
        <tr>
            <th>Médicaments présentés :</th>
            <td>
                <?php
                    if ($liste_medicaments_presentes != null) {
                        foreach ($liste_medicaments_presentes as $libelle => $valeur) {
                             echo $valeur->MED_DEPOTLEGAL." - ".$valeur->MED_NOMCOMMERCIAL."<br>";
                        }
                    } else {
                        echo "Aucun";
                    }
                ?>
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr>
            <td colspan="2">Galaxy Swiss Bourdin</td>
        </tr>
    </tfoot>
</table>
<div style="margin-bottom: 20px;"><br></div>

<!--PRATICIEN-->

<style>
    #praticien{
        border-collapse: collapse;
        width: 100%;
    }
    #praticien thead, #praticien tfoot{
        background-color: #33adff;
    }
    #praticien tbody{
        background-color: #ccebff;
    }
    #praticien tbody th{
        background-color: #33adff;
        width: 180px;
    }
    #praticien tbody th, #praticien tbody td{
        border-top: 1px solid black;
        border-bottom: 1px solid black;
        padding: 5px;
        text-align: justify;
    }
</style>

<!-- Informations praticien -->
<h2 align="center">Informations du praticien :</h2>

<table id="praticien">
    <thead>
        <tr><th colspan="2">Informations du praticien</th></tr>
    </thead>
    <tbody>
        <tr>
            <th>Nom :</th>
            <td><?php echo $informations_praticien[0]->PRA_NOM;?></td>
        </tr>
        <tr>
            <th>Prénom :</th>
            <td><?php echo $informations_praticien[0]->PRA_PRENOM;?></td>
        </tr>
        <tr>
            <th>Adresse :</th>
            <td><?php echo $informations_praticien[0]->PRA_ADRESSE;?></td>
        </tr>
        <tr>
            <th>Code postal :</th>
            <td><?php echo $informations_praticien[0]->PRA_CP;?></td>
        </tr>
        <tr>
            <th>Ville :</th>
            <td><?php echo $informations_praticien[0]->PRA_VILLE;?></td>
        </tr>
        <tr>
            <th>Coefficient de notorieté :</th>
            <td><?php echo $informations_praticien[0]->PRA_COEFNOTORIETE;?></td>
        </tr>
        <tr>
            <th>Type de profession :</th>
            <td><?php echo $informations_praticien[0]->TYP_LIBELLE;?></td>
        </tr>
        <tr>
            <th>Lieu de profession :</th>
            <td><?php echo $informations_praticien[0]->TYP_LIEU;?></td>
        </tr>
    </tbody>
    <tfoot>
        <tr><td colspan="2" align="center">Galaxy Swiss Bourdin</td></tr>
    </tfoot>
</table>

<!--MEDICAMENTS-->

<style>
    .medicament{
        border-collapse: collapse;
        width:45%;
    }
    .medicament thead, .medicament tfoot{
        background-color: #33adff;
    }
    .medicament tbody{
        background-color: #ccebff;
    }
    .medicament tbody th{
        background-color: #33adff;
        width: 155px;
    }
    .medicament tbody th, .medicament tbody td{
        border-top: 1px solid black;
        border-bottom: 1px solid black;
        padding: 5px;
        text-align: justify;
    }
</style>

<!-- Médicaments présentés -->
<div style="margin-bottom: 200px;"><br></div>
<h2 align="center">Médicament(s) présenté(s) :</h2>

<?php 
    $i = 0;
    foreach ($liste_medicaments_presentes as $medicament) {
        $i = $i+1;
        $informations_medicament = $this->ModelMedicaments->informations_medicament($medicament->MED_DEPOTLEGAL);
?>
<div style="margin-bottom: 20px;"><br></div>
<table class="medicament">
    <thead>
        <tr><th colspan="2">Informations du médicament n°<?php echo $i;?></th></tr>
    </thead>
    <tbody>
        <tr>
            <th>Dépôt légal :</th>
            <td><?php echo $informations_medicament[0]->MED_DEPOTLEGAL;?></td>
        </tr>
        <tr>
            <th>Nom commercial :</th>
            <td><?php echo $informations_medicament[0]->MED_NOMCOMMERCIAL;?></td>
        </tr>
        <tr>
            <th>Famille :</th>
            <td><?php echo $informations_medicament[0]->FAM_LIBELLE;?></td>
        </tr>
        <tr>
            <th>Composition :</th>
            <td><?php echo $informations_medicament[0]->MED_COMPOSITION;?></td>
        </tr>
        <tr>
            <th>Effets :</th>
            <td><?php echo $informations_medicament[0]->MED_EFFETS;?></td>
        </tr>
        <tr>
            <th>Contre-indications :</th>
            <td><?php echo $informations_medicament[0]->FAM_LIBELLE;?></td>
        </tr>
        <tr>
            <th>Prix de l'échantillon :</th>
            <td><?php if($informations_medicament[0]->MED_PRIXECHANTILLON != null){echo $informations_medicament[0]->MED_PRIXECHANTILLON . " €";} else {echo "Indéfini";}?></td>
        </tr>
    </tbody>
    <tfoot>
        <tr><td colspan="2" align="center">Galaxy Swiss Bourdin</td></tr>
    </tfoot>
</table>
<?php
    }
?>