<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EspaceVisiteur extends CI_Controller {
	public function index() //Accueil visiteur
	{
        //Si le visiteur est connecté
        if (!empty($_SESSION['matricule'])) {
            //Affichage de la page d'accueil de l'EspaceVisiteur
            $this->load->view('visiteur/accueil');
            echo "<script>alert('Bienvenue parmis nous !');</script>";
		} else {
            //Sinon affichage du formulaire de connexion
			$this->load->view('connexion_accueil');
        }
    }

    public function saisie() //Saisie compte rendu
    {
        //Si le visiteur est connecté
        if (!empty($_SESSION['matricule'])) {
            //Affichage de la page de saisie de compte rendu
			$this->load->view('visiteur/...');
		} else {
            //Sinon affichage du formulaire de connexion
			$this->load->view('connexion_accueil');
        }
    }

    
    public function consultation() //Consultation des comptes rendus
    {
        //Si le visiteur est connecté
        if (!empty($_SESSION['matricule'])) {
            //Affichage de la page de consultation de comptes rendus
			$this->load->view('visiteur/...');
		} else {
            //Sinon affichage du formulaire de connexion
			$this->load->view('connexion_accueil');
        }
    }
    
    public function praticiens() //Consultation des praticiens
    {
        //Si le visiteur est connecté
        if (!empty($_SESSION['matricule'])) {
            //Affichage de la page de consultation des praticiens
			$this->load->view('visiteur/...');
		} else {
            //Sinon affichage du formulaire de connexion
			$this->load->view('connexion_accueil');
        }
    }
    
    public function medicaments() //Consultation des medicaments
    {
        //Si le visiteur est connecté
        if (!empty($_SESSION['matricule'])) {
            //Affichage de la page de consultation des medicaments
			$this->load->view('visiteur/...');
		} else {
            //Sinon affichage du formulaire de connexion
			$this->load->view('connexion_accueil');
        }
    }
    
    public function deconnexion() //Saisie compte rendu
    {
        //Si le visiteur est connecté
        if (!empty($_SESSION['matricule'])) {
            //Déconnexion du visiteur
            session_destroy();

            //Affichage du formulaire de connexion
            echo heading('Vous êtes déconnecté(e) !', 3, 'style=\'text-align:center; color: green;\'');
            echo br();
			$this->load->view('connexion_accueil');
		} else {
            //Sinon affichage du formulaire de connexion
			$this->load->view('connexion_accueil');
        }
    }
}
?>