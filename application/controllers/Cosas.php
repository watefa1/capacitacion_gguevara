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
    if (!$this->session->userdata('nombre_usuario')) {
        redirect('login?alert=1');
    }

    $nombreUsuario = $this->session->userdata('nombre_usuario');
    $this->load->model("Cosas_model");
    $usuario = $this->Cosas_model->obtenerIdPorNombreUsuario($nombreUsuario);

    // Obtén la lista de tags asociados a la cosa que se va a eliminar
    $tagsAsociados = $this->Cosas_model->getTagsByCosaId($id);

    // Ahora puedes eliminar la cosa y sus etiquetas asociadas
    $this->Cosas_model->delete($id, $usuario);

    // Elimina los tags asociados a la cosa de la base de datos
    foreach ($tagsAsociados as $tag) {
        $this->Cosas_model->deleteTag($tag->id);
    }

    $response = array("success" => true);
    echo json_encode($response);
}
}
