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
	if (!$this->session->userdata('nombre_usuario')) {
		redirect('login?alert=1');
	}
    $this->load->model("Cosas_model");

    $data['cosa'] = $this->Cosas_model->getCosa($id);

    $data['selectedTags'] = array();
    if ($data['cosa']) {
        $selectedTags = $this->Cosas_model->getTagsByCosaId($id);
        foreach ($selectedTags as $tag) {
            $data['selectedTags'][] = $tag->id;
        }
    }

    $data['tags'] = $this->Cosas_model->getTags();

    $data['id'] = $id;

    $this->load->view('cosasedit', $data);
}





public function update($id)
{
    $nombre = htmlspecialchars($this->input->post('cosa'));
    $cantidad = $this->input->post('cant');
    $etiquetas = $this->input->post('etiquetas');

    $this->load->model("Usuarios_model");
    $usuario = $this->Usuarios_model->getUserByUsername($this->session->userdata('nombre_usuario'));

    $data = array(
        'cosa' => $nombre,
        'cant' => $cantidad,
        'modificado_en' => date('Y-m-d H:i:s'),
        'modificado_por' => $usuario->id
    );

    $this->Cosas_model->update($data, $id);
    $this->Cosas_model->clearTags($id);

    if (!empty($etiquetas)) {
        foreach ($etiquetas as $tagId) {
            $this->Cosas_model->addTag($id, $tagId);
        }
    }

    redirect(base_url() . 'cosas');
}

}
