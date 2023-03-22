<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class RegistroDeCosas extends CI_Controller {
	
	public function __construct()
        {
                parent::__construct();
				$this->load->model("Cosas_model");
        }

	
	public function index()
	{
		$this->load->view('registrodecosas');
	}

	public function save(){
		$nombre = $this->input->post("cosa");
		$cantidad = $this->input->post("cant");

		$data = array(
			"cosa"=>$nombre,
			"cant"=>$cantidad
		);
		$this->Cosas_model->save($data);
		redirect(base_url()."cosas");
	}
}
