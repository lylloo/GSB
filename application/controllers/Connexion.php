<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Connexion extends CI_Controller {
	public function index()
	{
		$this->load->view('connexion_accueil');
	}
	public function validation_informations()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('nom', 'Nom de famille', 'required');
		$this->form_validation->set_rules('date', 'Date d\'embauche', 'required');
		if ($this->form_validation->run() == TRUE)
        {
			$this->load->model('ModelPrincipal');
			$this->ModelPrincipal->recherche_visiteur($post);
        }
    	else
        {
			$data['validation'] = 0;
			$this->load->view('connexion_accueil', $data);
        }
	}
}
