<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPrincipal extends CI_Model {
    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }
    public function recherche_visiteur($nom, $date){
        $query = $this->db->get("SELECT COUNT(VIS_NOM) FROM visiteur WHERE VIS_NOM = $nom AND VIS_DATEEMBAUCHE = $date;");
        return $query->result();
    }
}
?>