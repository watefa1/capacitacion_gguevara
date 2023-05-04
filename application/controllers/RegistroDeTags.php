<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegistroDeTags extends CI_Controller {
	
	public function __construct()
    {
        parent::__construct();
		$this->load->model("Cosas_model");
    }

	public function index()
	{
		$data['tags'] = $this->Cosas_model->getEtiquetasBD(); // Obtener la lista de tags desde el modelo
		$this->load->view('registrodetags', $data);
	}

	public function save(){
		$tag = htmlspecialchars($_POST['tag']);
		$this->Cosas_model->saveEtiquetasDB($tag);
		redirect(base_url()."RegistroDeTags");
	}

	public function delete($id)
	{
		$this->Cosas_model->deleteEtiquetasBD($id);
		redirect(base_url()."RegistroDeTags");
	}
}
