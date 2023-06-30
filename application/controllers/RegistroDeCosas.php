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
			if (!$this->session->userdata('nombre_usuario')) {
				redirect('login?alert=1');
			}
			$etiquetas = $this->Cosas_model->getEtiquetas();
			$datos['tags'] = $etiquetas;
			$this->load->view('registrodecosas', $datos);
		}

		public function save(){
			$nombre =  $this->input->post("cosa", true);
			$cantidad = $this->input->post("cant");
		
			$this->form_validation->set_rules('cosa', 'Cosas', 'required|min_length[2]|max_length[20]|is_unique[cosas.cosa]');
			$this->form_validation->set_message('required', 'El campo {field} es obligatorio.');
			$this->form_validation->set_rules('cant', 'Cantidad', 'required|numeric[cosas.cant]');
			$this->form_validation->set_message('required', 'El campo {field} es obligatorio.');
		
			if (!$this->form_validation->run()){
				$etiquetas = $this->Cosas_model->getEtiquetas();
				$datos['tags'] = $etiquetas;
				$this->load->view('registrodecosas', $datos);
			}else{
				$data = array(
					"cosa" => $nombre,
					"cant" => $cantidad
				);
				$this->Cosas_model->save($data);
				$id_cosa = $this->db->insert_id();
				$id_tags = $this->input->post("etiquetas");
				$this->Cosas_model->saveCosasTags($id_cosa, $id_tags);
				redirect(base_url()."cosas");
			}
		}
		
}
