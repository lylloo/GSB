<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Saisie extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        //Si le visiteur est connecté
        if (!empty($_SESSION['matricule'])) {
            //Chargement de la BDD et du modèle
            $this->load->database();
            $this->load->model('ModelPrincipal');
            $this->load->model('ModelSaisie');
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

            //Affichage de la page de saisie de compte rendu
			$this->load->view('visiteur/saisie/liste_rapport');

            //AJOUT NOUVEAU RAPPORT
            //$this->load->view('visiteur/saisie/ajoutRapport');

            $this->load->view('visiteur/footer');
		} else {
            //Sinon affichage du formulaire de connexion
			$this->load->view('connexion_accueil');
        }
    }

 

    public function ajout(){
             if (!empty($_SESSION['matricule'])) {         
            //Affichage de la liste des médicaments
            $this->load->view('visiteur/header');

            //Affichage de la page de saisie de compte rendu
            $this->load->view('visiteur/saisie/ajoutRapport');

            //AJOUT NOUVEAU RAPPORT
            //$this->load->view('visiteur/saisie/ajoutRapport');

            $this->load->view('visiteur/footer');
        } else {
            //Sinon affichage du formulaire de connexion
            $this->load->view('connexion_accueil');
        }
    }

    public function choix($num_rapport){

         if (!empty($_SESSION['matricule'])) {         
            //Affichage de la liste des médicaments
             $this->load->view('visiteur/header');

            if (isset($num_rapport)) {
                //RECUPERE LES INFO DU RAPPORT PAR RAPPORT AU NUMERO DE RAPPORT
                $data['informations_rapport'] = $this->ModelConsultation->informations_rapport_de_visite($num_rapport);
                $data['liste_medicaments_presentes'] = $this->ModelConsultation->liste_medicaments_presentes($num_rapport);
                $this->load->view('visiteur/saisie/modifierRapport', $data);
            }

            $this->load->view('visiteur/footer');
        } else {
            //Sinon affichage du formulaire de connexion
            $this->load->view('connexion_accueil');
        }
    }

     public function medicaments(){

         if (!empty($_SESSION['matricule'])) {         
            //Affichage de la liste des médicaments
             $this->load->view('visiteur/header');

                            //RECUPERE LES INFO DU RAPPORT PAR RAPPORT AU NUMERO DE RAPPORT
              
                $data['liste_medicaments'] = $this->ModelSaisie->liste_medicaments();
                $this->load->view('visiteur/saisie/medicaments');

            

            $this->load->view('visiteur/footer');
        } else {
            //Sinon affichage du formulaire de connexion
            $this->load->view('connexion_accueil');
        }
    }

    
    
}
?>