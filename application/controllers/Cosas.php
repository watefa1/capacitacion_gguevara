<?php
use Entities\Cosa;

class Cosas extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model("Cosas_model");
        $this->load->library("session");

        // Cargar la biblioteca de Doctrine
        $this->load->library('doctrine');
    }

    public function index()
{
    if (!$this->session->userdata('nombre_usuario')) {
        redirect('login?alert=1');
    }

    $data = array();
    $cosas = $this->doctrine->em->getRepository('Entities\Cosa')->findAll();

    foreach ($cosas as $cosa) {
        $cosa->tags = $cosa->getTags(); // Suponiendo que tengas una relación entre Cosa y Tag en tu entidad Cosa
        $data[] = $cosa;
    }

    if ($this->input->get('search')) {
        $termino_busqueda = $this->input->get('search');
        $data = $this->Cosas_model->buscar_cosas($termino_busqueda); // Deberás adaptar esta función a Doctrine si es necesario
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
    $usuario = $this->Cosas_model->obtenerIdPorNombreUsuario($nombreUsuario);

    // Utiliza Doctrine para eliminar la cosa y sus etiquetas asociadas
    $cosa = $this->doctrine->em->find('Entities\Cosa', $id);
    
    if ($cosa) {
        $this->doctrine->em->remove($cosa);
        $this->doctrine->em->flush();
    }

    $response = array("success" => true);
    echo json_encode($response);
}

}
