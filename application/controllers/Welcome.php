<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
    }

    public function index()
    {
        if ($this->session->userdata('user_id')) {
            // El usuario ya está autenticado, redirigir a la página principal
            redirect('cosas');
        } else {
            // El usuario no está autenticado, redirigir al inicio de sesión
            redirect('login');
        }
    }
}
