<?php
class Cosas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Cosas_model");
        $this->load->library("session");
    }

    public function index()
    {

		if (!$this->session->userdata('nombre_usuario')) {
			redirect('login?alert=1');
		}
		
        $data = array();
        $cosas = $this->Cosas_model->getCosas();

        foreach ($cosas as $cosa) {
            $cosa->tags = $this->Cosas_model->getTagsByCosaId($cosa->id);
            $data[] = $cosa;
        }

        if ($this->input->get('search')) {
            $termino_busqueda = $this->input->get('search');
            $data = $this->Cosas_model->buscar_cosas($termino_busqueda);
        }

        $nombreUsuario = $this->session->userdata('nombre_usuario');

        $this->load->view('cosas', array("data" => $data, "nombreUsuario" => $nombreUsuario));
    }

    public function delete($id)
    {
        $this->Cosas_model->delete($id);
        redirect(base_url()."cosas");
    }
}
