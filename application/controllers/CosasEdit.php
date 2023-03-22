<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class CosasEdit extends CI_Controller {
	
	public function __construct()
        {
                parent::__construct();
				$this->load->model("Cosas_model");
        }

	
	public function index($id)
	{
		$data = $this->Cosas_model->getCosa($id);
		$this->load->view('cosasedit',$data);
	}

	public function update($id){
		$nombre = $this->input->post("cosa");
		$cantidad = $this->input->post("cant");

		$data = array(
			"cosa"=>$nombre,
			"cant"=>$cantidad
		);
		$this->Cosas_model->update($data, $id);
		redirect(base_url()."cosas");
	}
}
