<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelMedicaments extends CI_Model {
    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }
    /**
     * Recherche si un visiteur est présent dans la BDD
     * @param nom : nom du visiteur
     * @param date : date d'embauche du visiteur
     * @return le nombre d'occurences
     */
    public function recherche_visiteur($nom, $date){
        $query = $this->db->query("SELECT COUNT(VIS_NOM) as nb_occurences, VIS_MATRICULE as matricule
                                    FROM visiteur 
                                    WHERE VIS_NOM = '$nom' 
                                    AND VIS_DATEEMBAUCHE = '$date 00:00:00';");
        return $query->result();
    }
}
?>