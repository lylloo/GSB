<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPrincipal extends CI_Model {
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

    /**
     * Accède aux données du visiteur via son matricule
     * @param matricule : matricule du visiteur connecté
     * @return les informations du visiteur
     */
    public function informations_visiteur($matricule){
        $query = $this->db->query("SELECT * 
                                    FROM visiteur, labo
                                    WHERE visiteur.LAB_CODE = labo.LAB_CODE 
                                    AND VIS_MATRICULE = '$matricule';");
        return $query->result();
    }

    /**
    * Accède au secteur du visiteur via son matricule
    * @param matricule : matricule du visiteur connecté
    * @return le nom du secteur du visiteur
    */
    public function secteur_visiteur($matricule){
        $query = $this->db->query("SELECT SEC_LIBELLE 
                                    FROM secteur, visiteur 
                                    WHERE visiteur.SEC_CODE = secteur.SEC_CODE 
                                    AND VIS_MATRICULE = '$matricule';");
        return $query->result();
    }
}
?>