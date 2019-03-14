<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelSaisie extends CI_Model {
    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }
    
    /**
    * Liste des rapport non valider
    *@return la liste des rapport non valider 
    */
    public function rechercheRapport(){
    	$query = $this->db->query("SELECT *
                                    FROM rapport_visite r, etat e , praticien p
                                    WHERE r.ETAT_ID = e.ETAT_ID
                                    AND p.PRA_NUM = r.PRA_NUM
                                    AND r.ETAT_ID=1
                                    AND r.VIS_MATRICULE='".$_SESSION['matricule']."'
                                    ORDER BY r.RAP_DATE ASC;
                                    ");
    	return $query->result();
    }

    

    /**
    * voir tous les praticient
    */
    public function toutPraticien(){
        $query = $this->db->query("SELECT *
                                    FROM praticien;
                                    ");
        return $query->result();
    }

    /* VOIR TOUS LES MOTIF DE LA VISITE  */
    /**
    * afficher les motif de la visite
    *@return tous les motif de la visite 
    */

    public function motif(){
        $query = $this->db->query(" SELECT RAP_MOTIF
                                    FROM rapport_visite;
                                   ");
        return $query->result();
    }

       /**
     * Liste les médicaments présentés lors de la visite
     * @return la liste des médicaments présentés
     */
    public function liste_medicaments(){
        $query = $this->db->query("SELECT *
                                    FROM  medicament m
                                    ORDER BY m.MED_NOMCOMMERCIAL
                                    ASC;");
        return $query->result();
    }

    /**
    *permet de modifier les donnee dans l base de donne
    **/
    function update($date,$bilan,$motif,$num_rapport){
        //$sql = "INSERT INTO contact (nom,prenom,email,commentaire) VALUES('".$nom."','".$prenom."','".$email ."','".$commentaire."')";
        //$query = $this->db->query($sql);
                //return $query->result();
        
        $sql = "UPDATE rapport_visite( SET RAP_DATE ='".$date."', RAP_BILAN='".$bilan."', RAP_MOTIF='".$motif."', WHERE RAP_MOTIF= '".$num_rapport."';')";
         $query = $this->db->query($sql);
         return $query->result();

    }
}


?>