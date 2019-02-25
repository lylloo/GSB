<style>
    body{
        margin:0;
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
    tbody th{
        background-color: #33adff;
        width: 155px;
    }
    tbody th, tbody td{
        border-top: 1px solid black;
        border-bottom: 1px solid black;
        padding: 5px;
        text-align: justify;
    }
</style>

<table>
    <thead>
        <tr><th colspan="2">Informations du médicament</th></tr>
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
<form method="post">
    <p align="center">
        <input type="button" value="Fermer la fenêtre" onClick="window.close()">
    </p>
</form>	