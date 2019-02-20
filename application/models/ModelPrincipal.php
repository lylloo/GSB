<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ModelPrincipal extends CI_Model {
    public function __construct()
    {
            // Call the CI_Model constructor
            parent::__construct();
    }
    public function recherche_visiteur($nom, $date){
        $query = $this->db->query("SELECT COUNT(VIS_NOM) as nb_occurences FROM visiteur WHERE VIS_NOM = '$nom' AND VIS_DATEEMBAUCHE = '$date 00:00:00';");
        return $query->result();
    }
}
?>