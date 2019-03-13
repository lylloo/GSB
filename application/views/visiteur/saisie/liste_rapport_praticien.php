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

</table>