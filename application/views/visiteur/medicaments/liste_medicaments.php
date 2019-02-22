<style>
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
        width:500px;
    }
    #tableau-scroll{
        display: inline-block;
        overflow: auto;
        height: 200px;
    }
</style>	

<table id="tableau-neutre">
    <thead>
        <tr>
            <td colspan="2" align="center">Liste des médicaments</td>
        </tr>
        <tr>
            <th align="center" style="width:125px;border: 1px solid black;">Nom commercial</th>
            <th align="center">Famille de médicament</th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <td colspan="2" align="center">Galaxy Swiss Bourdin</td>
        </tr>
    </tfoot>
    <tbody>
        <tr>
            <td colspan="2"><!-- Adapter le nombre en fonction du nombre de <th> au dessus -->
                <table id="tableau-scroll" >
                    <?php
                        if ($liste_medicaments != null) {
                            foreach ($liste_medicaments as $libelle => $valeur) {
                        ?>
                                <tr style="border: 1px solid black;">
                                    <td style="border-right: 1px solid black; text-align: center;"><a href="Medicaments/selection/<?php echo $valeur->MED_DEPOTLEGAL;?>" target="wclose" onclick="window.open('Medicaments/selection/<?php echo $valeur->MED_DEPOTLEGAL;?>','wclose', 'width=500,height=400,toolbar=no,status=no,left=60,top=110')"><?php echo $valeur->MED_NOMCOMMERCIAL;?></a></td>
                                    <td style="text-align: center;"><?php echo $valeur->FAM_LIBELLE;?></td>
                                </tr>
                        <?php
                            }
                        } else {
                        ?>
                            <tr>
                                <td>Aucun médicament trouvé</td>
                            </tr>
                        <?php
                        }
                    ?>
                </table>
            </td>
        </tr>
    </tbody>
</table>