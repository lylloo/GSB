
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
    .tableau-neutre{
        margin: auto;
        width: 850px;
    }
    .tableau-scroll{
        display: inline-block;
        overflow: auto;
        max-height: 200px;
        text-align: center;
    }
</style>

<table class="tableau-neutre">

    <thead>
        <tr>
            <td colspan="10">
                <?php 
                    echo heading('Liste des praticien', '2', 'style=\'text-align:center;\'');
                ?>
            </td>
        </tr>

        <!-- tableau construction -->
         <tr>
            
            
            <th width="90px">prenom  </th>
            <th width="110px">Nom  </th>
            <th width="80px">Adresse </th>
            <th width="180px"> Cp</th>
            <th width="150px">Ville</th>
           
        </tr>
    </thead>

    <?php
        $toutPraticient = $this->ModelSaisie->toutPraticien();
    ?>
    <tbody>

        <td colspan="7">
            <?php
            if($toutPraticient!=null){

                foreach($toutPraticient as $libelle =>$laValeur){
            

            ?>

            <tr>
                             <!-- PRENOM DU PRATICIENT -->
                            <td width="109.5px"><?php echo $laValeur->PRA_PRENOM; ?> </td>
                             <!-- NOM DU PRATICIENT -->
                            <td width="90px"> <?php echo $laValeur->PRA_NOM; ?> </td>
                        
                            
                            <!-- bilan-->
                            <td width="140.5px"><?php echo $laValeur->PRA_ADRESSE;?></td>
                             <!-- MOTIF DU RAPPORT -->
                            <td width="149.5px"><?php echo $laValeur->PRA_CP;?></td>
                            <td width="149.5px"><?php echo $laValeur->PRA_VILLE;?></td>
        </td>
        <?php
    }
            }
        ?>
    </tbody>

</table>

