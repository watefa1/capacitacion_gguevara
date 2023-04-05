<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cosas extends CI_Controller {
	
	public function __construct()
        {
                parent::__construct();
				$this->load->model("Cosas_model");
        }

	
		public function index()
		{
			$data = array("data" => $this->Cosas_model->getCosas());
			$data['tags'] = $this->Cosas_model->getTags();
		
			if ($this->input->get('search')) {
				$termino_busqueda = $this->input->get('search');
				$data['data'] = $this->Cosas_model->buscar_cosas($termino_busqueda);
			}
		
			$this->load->view('cosas', $data);
		}

	public function delete($id){
		$this->Cosas_model->delete($id);
		redirect(base_url()."cosas");

	}
}
