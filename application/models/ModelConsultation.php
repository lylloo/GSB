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
    /**
     * Liste tous les rapports de visite
     * @param parametres est une array de paramètres en fonction du formulaire
     * @return la liste des rapports de visite
     */
    public function liste_rapports_de_visite($parametres){
        if (isset($parametres['tout'])) {
            if ($parametres['praticien'] == 0){
                $sql = "";
            } else {
                $sql = "AND r.PRA_NUM = '".$parametres['praticien']."'";
            }
        } else {
            if (isset($parametres['praticien'])){ 
                if ($parametres['praticien'] == 0){
                    $sql = "AND r.RAP_DATE BETWEEN '".$parametres['debut']." 00:00:00' AND '".$parametres['fin']." 00:00:00'";
                } else {
                    $sql = "AND r.RAP_DATE BETWEEN '".$parametres['debut']." 00:00:00' AND '".$parametres['fin']." 00:00:00' AND r.PRA_NUM = '".$parametres['praticien']."'";
                }
            } else {
                $sql = "";
            }
        }
        
        $query = $this->db->query("SELECT *
                                    FROM praticien p, rapport_visite r
                                    WHERE p.PRA_NUM = r.PRA_NUM
                                    AND r.VIS_MATRICULE = '".$_SESSION['matricule']."'
                                    $sql
                                    ORDER BY r.RAP_DATE
                                    DESC;");
        return $query->result();
    }
    /**
     * Liste les médicaments présentés lors de la visite
     * @param num_rapport est le numéro du rapport de visite
     * @return la liste des médicaments présentés
     */
    public function liste_medicaments_presentes($num_rapport){
        $query = $this->db->query("SELECT *
                                    FROM offrir o, medicament m
                                    WHERE o.MED_DEPOTLEGAL = m.MED_DEPOTLEGAL
                                    AND o.RAP_NUM = '4'
                                    ORDER BY m.MED_NOMCOMMERCIAL
                                    ASC;");
        return $query->result();
    }
}
?>