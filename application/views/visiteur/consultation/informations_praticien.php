<style>
    body{
        margin:0;
    }
    table{
        border-collapse: collapse;
        width: 100%;
    }
    thead, tfoot{
        background-color: #33adff;
    }
    tbody{
        background-color: #ccebff;
    }
    tbody th{
        background-color: #33adff;
        width: 180px;
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
<form method="post">
    <p align="center">
        <input type="button" value="Fermer la fenêtre" onClick="window.close()">
    </p>
</form>	