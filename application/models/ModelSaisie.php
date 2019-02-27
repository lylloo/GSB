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
                                    ORDER BY r.RAP_DATE DESC;
                                    ");
    	return $query->result();
    }

    /**
    * Recupere id d'un rapport
    */
    public function idRapport(){
        $query = $this->db->query("SELECT RAP_NUM
                                    FROM rapport_visite;
                                    ");
        return $query->result();
    }
}
?>