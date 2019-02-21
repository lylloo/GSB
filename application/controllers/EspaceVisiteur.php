<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EspaceVisiteur extends CI_Controller {
	public function index()
	{
        //Si le visiteur est connecté
        if (!empty($_SESSION['matricule'])) {
            //Affichage de la page d'accueil de l'EspaceVisiteur
			$this->load->view('accueil');
		} else {
			$this->load->view('connexion_accueil');
        }
    }
}
?>