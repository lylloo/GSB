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
            $this->load->model('ModelMedicaments');

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
            if (isset($num_rapport)) {
                $data['informations_rapport'] = $this->ModelConsultation->informations_rapport_de_visite($num_rapport);
                $data['liste_medicaments_presentes'] = $this->ModelConsultation->liste_medicaments_presentes($num_rapport);
                $this->load->view('visiteur/consultation/affichage_rapport', $data);
            }

            //Affichage du footer
            $this->load->view('visiteur/footer');
		} else {
            //Sinon affichage du formulaire de connexion
			$this->load->view('connexion_accueil');
        }
    }
    public function praticien($num_praticien) //Affichage des informations du praticien
    {
         //Si le visiteur est connecté
         if (!empty($_SESSION['matricule'])) {         
            //Récupération des informations du praticien séléctionné
            $data['informations_praticien'] = $this->ModelConsultation->informations_praticien($num_praticien);

            //Affichage des informations du praticien
            $this->load->view('visiteur/consultation/informations_praticien', $data);
		} else {
            //Sinon affichage du formulaire de connexion
			$this->load->view('connexion_accueil');
        }
    }
    function pdf($num_rapport, $num_praticien) //Génération du PDF
    {
        //Si le visiteur est connecté
        if (!empty($_SESSION['matricule'])) {         
            $this->load->helper('dompdf');

            //Récupération des informations du rapport de visite
            $data['informations_rapport'] = $this->ModelConsultation->informations_rapport_de_visite($num_rapport);
            //Récupération de la liste des médicaments présentés
            $data['liste_medicaments_presentes'] = $this->ModelConsultation->liste_medicaments_presentes($num_rapport);
            //Récupération des informations du praticien séléctionné
            $data['informations_praticien'] = $this->ModelConsultation->informations_praticien($num_praticien);
            
            $html = $this->load->view('visiteur/consultation/v_pdf', $data, true);
            pdf_create($html, 'Rapport de visite n°'.$data['informations_rapport'][0]->RAP_NUM.' de '.$_SESSION['visiteur'][0]->VIS_NOM." ".$_SESSION['visiteur'][0]->Vis_PRENOM);
		}
    }
}
?>