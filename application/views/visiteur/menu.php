<div id="menu">
    <style>
        ::selection { background-color: #E13300; color: white; }
        ::-moz-selection { background-color: #E13300; color: white; }
        body {
            background-color: #fff;
            margin: 40px;
            font: 13px/20px normal Helvetica, Arial, sans-serif;
            color: #4F5155;
        }
        a {
            color: #003399;
            background-color: transparent;
            font-weight: normal;
        }
        h1 {
            color: #444;
            background-color: transparent;
            border-bottom: 1px solid #D0D0D0;
            font-size: 19px;
            font-weight: normal;
            margin: 0 0 14px 0;
            padding: 14px 15px 10px 15px;
        }
        code {
            font-family: Consolas, Monaco, Courier New, Courier, monospace;
            font-size: 12px;
            background-color: #f9f9f9;
            border: 1px solid #D0D0D0;
            color: #002166;
            display: block;
            margin: 14px 0 14px 0;
            padding: 12px 10px 12px 10px;
        }
        #body {
            margin: 0 15px 0 15px;
            min-height: 250px;
        }
        p.footer {
            text-align: right;
            font-size: 11px;
            border-top: 1px solid #D0D0D0;
            line-height: 32px;
            padding: 0 10px 0 10px;
            margin: 20px 0 0 0;
        }
        #container {
            margin: 10px;
            border: 1px solid #D0D0D0;
            box-shadow: 0 0 8px #D0D0D0;
        }
        #menu{
            background-color: #DDD;
            border-radius: 10px;
            margin-right: 15px;
            float: left;
        }
        #liste-menu{
            text-align: left;
            list-style-type: none;
            padding: 5px 15px;
        }
    </style>
    <?php
        $liste = array(
            "Type de compte : ".$_SESSION['visiteur']['TRA_ROLE'],
            "Utilisateur : ".$_SESSION['visiteur'][0]->VIS_NOM." ".$_SESSION['visiteur'][0]->Vis_PRENOM,
            "Laboratoire : ".$_SESSION['visiteur'][0]->LAB_NOM,
            "Région rattachée : ".$_SESSION['visiteur']['REG_NOM'],
            "<hr>",
            anchor('EspaceVisiteur', 'Accueil'),
            anchor('EspaceVisiteur/saisie', 'Saisie rapport de visite'),
            anchor('EspaceVisiteur/consultation', 'Consulter rapports de visite'),
            anchor('EspaceVisiteur/praticiens', 'Consulter praticiens'),
            anchor('EspaceVisiteur/medicaments', 'Consulter médicaments'),
            anchor('EspaceVisiteur/deconnexion', 'Se déconnecter')
        );
        $attributs = array(
            'id' => 'liste-menu'
        );
        
        echo ul($liste, $attributs);
    ?>
</div>