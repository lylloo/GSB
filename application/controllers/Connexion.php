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
		$this->form_validation->set_rules('nom', 'nom de famille', 'required');
		$this->form_validation->set_rules('date', 'date d\'embauche', 'required');

		//Si la validation du formulaire est OK
		if ($this->form_validation->run() == TRUE){
			//On recherche si le visiteur est présent dans la BDD
			$this->load->database();
			$this->load->model('ModelPrincipal');

			$testeur_visiteur = $this->ModelPrincipal->recherche_visiteur($_POST['nom'], $_POST['date']);

			if($testeur_visiteur[0]->nb_occurences == '1'){
				//Si le visiteur est trouvé
				$_SESSION['matricule'] = $testeur_visiteur[0]->matricule;

				//Redirection vers le controlleur EspaceClient
				redirect('EspaceVisiteur');
			} else {
				//Si le visiteur n'est pas trouvé
				$data['visiteur_introuvable'] = 0;
				$this->load->view('connexion_accueil', $data);
			}
		} else {
			//Sinon on réaffiche le formulaire de contact avec les erreurs
			$data['validation'] = 0;
			$this->load->view('connexion_accueil', $data);
        }
	}
}
?>