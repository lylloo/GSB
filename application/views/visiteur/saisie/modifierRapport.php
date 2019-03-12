
<table>    
        <tr>
        	<!-- Titre du rapport par rapport au numero -->
            <th colspan="2"><h3>Modifier le rapport de visite n°<?php echo $informations_rapport[0]->RAP_NUM;?></h3></th>
        </tr>
        <tr>
        	<!--AFFICHE LE BON PRATICIEENT CODE A MODIFIER AFIN QUOND PUISSENT LE MODIFIER -->
        	<td><?php echo "Praticient : ".$informations_rapport[0]->PRA_NOM." ".$informations_rapport[0]->PRA_PRENOM;?></td><br>
        </tr>

        <!-- MOTIF -->
        <tr>
        	<th>Motif de la visite :</th>
        </tr>
        <tr>
        	<td><input type="text" placeholder=<?php echo $informations_rapport[0]->RAP_MOTIF;?>></td>
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
   		
 </table>