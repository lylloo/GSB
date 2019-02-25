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
                                    FROM praticien p, rapport_visite r
                                    WHERE p.PRA_NUM = r.PRA_NUM
                                    AND ETAT_ID==1
                                    AND r.VIS_MATRICULE = '".$_SESSION['matricule']."'
                                    $sql
                                    
                                    ");
    	return $query->result();
    }
}
?>