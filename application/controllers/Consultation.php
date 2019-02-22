<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Consultation extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        //Si le visiteur est connecté
        if (!empty($_SESSION['matricule'])) {
            //Chargement de la BDD et du modèle
            $this->load->database();
            $this->load->model('ModelPrincipal');
            $this->load->model('ModelConsultation');

            //Informations du visiteur connecté
            $_SESSION['visiteur'] = $this->ModelPrincipal->informations_visiteur($_SESSION['matricule']);
            
            $infos_sup = $this->ModelPrincipal->region_visiteur($_SESSION['matricule']);
            
            $_SESSION['visiteur']['TRA_ROLE'] = $infos_sup[0]->TRA_ROLE;
            $_SESSION['visiteur']['REG_NOM'] = $infos_sup[0]->REG_NOM;
        }
    }
	public function index() //Accueil Médicaments
	{
        //Si le visiteur est connecté
        if (!empty($_SESSION['matricule'])) {         
            //Affichage de la liste des médicaments
            $this->load->view('visiteur/header');

            $data['liste_praticiens_deja_vus'] = $this->ModelConsultation->liste_praticiens_deja_vus($_SESSION['matricule']);
            $this->load->view('visiteur/consultation/choix_rapport', $data);

            $this->load->view('visiteur/footer');
		} else {
            //Sinon affichage du formulaire de connexion
			$this->load->view('connexion_accueil');
        }
    }
    public function selection_fourchette(){
        //Si le visiteur est connecté
        if (!empty($_SESSION['matricule'])) {         
            //Affichage de la liste des médicaments
            $this->load->view('visiteur/header');

            $data['liste_praticiens_deja_vus'] = $this->ModelConsultation->liste_praticiens_deja_vus($_SESSION['matricule']);
            $this->load->view('visiteur/consultation/choix_rapport', $data);

            $this->load->view('visiteur/footer');
		} else {
            //Sinon affichage du formulaire de connexion
			$this->load->view('connexion_accueil');
        }
    }
}
?>