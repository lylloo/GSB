
<br><style>
    .table-details th{
        width: 180px;
        padding: 2px 5px;
    }
    .table-details td{
        padding: 2px 5px;
    }
    .table-details tfoot{
        text-align: center;
    }
    thead th{
        border-top: 1px solid black;
        border-left: 1px solid black;
        border-right: 1px solid black;
        border-bottom: 0;
    }
    thead h3{
        margin:0;
        position:relative;
        top:13px;
    }
    #pdf{
        text-align:right;
        border-top: 0;
        border-bottom: 1px solid black;
        border-left: 1px solid black;
        border-right: 1px solid black;
    }
    #pdf button{
        position:relative;
        bottom:11px;
    }
</style>
<table id="tableau-neutre" class="table-details">
    <thead>
        <tr>
            <th colspan="2"><h3>Informations du rapport de visite n°<?php echo $informations_rapport[0]->RAP_NUM;?></h3></th>
        </tr>
        <tr id="pdf">
            <td colspan="2"><a href="../../Consultation/pdf/<?php echo $informations_rapport[0]->RAP_NUM;?>/<?php echo $informations_rapport[0]->PRA_NUM;?>" target="_BLANK"><button>Générer PDF</button></a></td>
        </tr>
    </thead>
    <tbody>
        <tr>
            <th>Date du rapport :</th>
            <td><?php echo date_format(date_create($informations_rapport[0]->RAP_DATE), 'd/m/Y');?></td>
        </tr>
        <tr>
            <th>Praticien rencontré :</th>
            <td>
            ► <a href="../../Consultation/praticien/<?php echo $informations_rapport[0]->PRA_NUM;?>" target="wclose" onclick="window.open('../../Consultation/praticien/<?php echo $informations_rapport[0]->PRA_NUM;?>','wclose', 'width=500,height=300,toolbar=no,status=no,left=60,top=110')"><?php echo $informations_rapport[0]->PRA_NOM." ".$informations_rapport[0]->PRA_PRENOM;?></a><br>
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
                    ?>
                       ► <a href="../../Medicaments/selection/<?php echo $valeur->MED_DEPOTLEGAL;?>" target="wclose" onclick="window.open('../../Medicaments/selection/<?php echo $valeur->MED_DEPOTLEGAL;?>','wclose', 'width=500,height=400,toolbar=no,status=no,left=60,top=110')"><?php echo $valeur->MED_DEPOTLEGAL." - ".$valeur->MED_NOMCOMMERCIAL;?></a><br>
                    <?php
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