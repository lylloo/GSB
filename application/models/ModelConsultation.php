<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelConsultation extends CI_Model {
    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }
    /**
     * Liste tous les médicaments présents dans la BDD
     * @return la liste des médicaments
     */
    public function liste_medicaments(){
        $query = $this->db->query("SELECT * FROM medicament, famille
                                    WHERE medicament.FAM_CODE = famille.FAM_CODE
                                    ORDER BY medicament.MED_NOMCOMMERCIAL;");
        return $query->result();
    }
}
?>