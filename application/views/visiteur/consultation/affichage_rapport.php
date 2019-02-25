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
    #tableau-neutre{
        margin: auto;
        width: 850px;
    }
    #tableau-scroll{
        display: inline-block;
        overflow: auto;
        max-height: 200px;
        text-align: center;
    }
</style>

<table id="tableau-neutre">
    <thead>Informations du rapport de visite n°<?php echo $informations_rapport[0]->RAP_NUM;?></thead>
</table>