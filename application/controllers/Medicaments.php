<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Medicaments extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        //Si le visiteur est connecté
        if (!empty($_SESSION['matricule'])) {
            //Chargement de la BDD et du modèle
            $this->load->database();
            $this->load->model('ModelPrincipal');
            $this->load->model('ModelMedicaments');

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

            //Récupération de tous les médicaments
            $data['liste_medicaments'] = $this->ModelMedicaments->liste_medicaments();

            //Affichage de la liste des médicaments
            $this->load->view('visiteur/medicaments/liste_medicaments', $data);

            $this->load->view('visiteur/footer');
		} else {
            //Sinon affichage du formulaire de connexion
			$this->load->view('connexion_accueil');
        }
    }
    public function selection($depot_legal) //Lors de la séléction d'un médicament
    {
         //Si le visiteur est connecté
         if (!empty($_SESSION['matricule'])) {         
            //Récupération des informations du médicament séléctionné
            $data['informations_medicament'] = $this->ModelMedicaments->informations_medicament($depot_legal);

            //Affichage de la liste des médicaments
            $this->load->view('visiteur/medicaments/informations_medicament', $data);
		} else {
            //Sinon affichage du formulaire de connexion
			$this->load->view('connexion_accueil');
        }
    }
}
?>