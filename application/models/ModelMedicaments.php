<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMedicaments extends CI_Model {
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
                                    ORDER BY medicament.MED_NOMCOMMERCIAL
                                    ASC;");
        return $query->result();
    }
    /**
     * Liste les informations du médicament séléctionné
     * @param nom_commercial est le nom commercial du médicament
     * @return les informations du médicament
     */
    public function informations_medicament($depot_legal){
        $query = $this->db->query("SELECT * FROM medicament, famille
                                    WHERE medicament.FAM_CODE = famille.FAM_CODE
                                    AND medicament.MED_DEPOTLEGAL = '$depot_legal';");
        return $query->result();
    }
}
?>