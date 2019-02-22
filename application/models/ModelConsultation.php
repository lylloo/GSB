<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelConsultation extends CI_Model {
    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }
    /**
     * Liste tous les praticiens déjà vus
     * @param matricule est le matricule du visiteur
     * @return la liste des praticiens déjà vus
     */
    public function liste_praticiens_deja_vus($matricule){
        $query = $this->db->query("SELECT p.PRA_NUM, p.PRA_NOM, p.PRA_PRENOM 
                                    FROM praticien p, rapport_visite r
                                    WHERE p.PRA_NUM = r.PRA_NUM
                                    AND r.VIS_MATRICULE = '$matricule' 
                                    ORDER BY p.PRA_NOM, p.PRA_PRENOM
                                    ASC;");
        return $query->result();
    }
}
?>