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
	public function index() //Accueil Consultation
	{
        //Si le visiteur est connecté
        if (!empty($_SESSION['matricule'])) {         
            //Affichage du header
            $this->load->view('visiteur/header');

            //On récupère la liste des praticiens déjà vus
            $data['liste_praticiens_deja_vus'] = $this->ModelConsultation->liste_praticiens_deja_vus($_SESSION['matricule']);
            //On récupère la liste des rapports de visite en fonction de la recherche
            $data['liste_rapports_de_visite']  = $this->ModelConsultation->liste_rapports_de_visite($_POST);
            
            //Affichage de la liste des rapports de visite
            $this->load->view('visiteur/consultation/choix_rapport', $data);

            //Affichage du footer
            $this->load->view('visiteur/footer');
		} else {
            //Sinon affichage du formulaire de connexion
			$this->load->view('connexion_accueil');
        }
    }
    public function selection($num_rapport) //Sélection d'un rapport de visite
	{
        //Si le visiteur est connecté
        if (!empty($_SESSION['matricule'])) {         
            //Affichage du header
            $this->load->view('visiteur/header');

            //On récupère la liste des praticiens déjà vus
            $data['liste_praticiens_deja_vus'] = $this->ModelConsultation->liste_praticiens_deja_vus($_SESSION['matricule']);
            //On récupère la liste des rapports de visite en fonction de la recherche
            $data['liste_rapports_de_visite']  = $this->ModelConsultation->liste_rapports_de_visite($_POST);
            
            //Affichage de la liste des rapports de visite
            $this->load->view('visiteur/consultation/choix_rapport', $data);

            //Si le visiteur a sélectionné un rapport de visite
            if (isset($selection)) {
                $data['informations_rapport'] = $this->ModelConsultation->informations_rapport_de_visite($selection);

                $this->load->view('visiteur/consultation/affichage_rapport', $data);
            }

            //Affichage du footer
            $this->load->view('visiteur/footer');
		} else {
            //Sinon affichage du formulaire de connexion
			$this->load->view('connexion_accueil');
        }
    }
}
?>