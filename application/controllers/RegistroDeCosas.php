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

		$this->form_validation->set_rules('cosa', 'Cosas', 'required|min_length[2]|max_length[20]|is_unique[cosas.cosa]');
		$this->form_validation->set_message('required', 'El campo {field} es obligatorio.');
		$this->form_validation->set_rules('cant', 'Cantidad', 'required|numeric[cosas.cant]');
		$this->form_validation->set_message('required', 'El campo {field} es obligatorio.');
		

		if ($this->form_validation->run() == FALSE){
			$this->load->view('registrodecosas');
		}else{
			$data = array(
				"cosa"=>$nombre,
				"cant"=>$cantidad
			);
			$this->Cosas_model->save($data);
			redirect(base_url()."cosas");
		}
	}
}
