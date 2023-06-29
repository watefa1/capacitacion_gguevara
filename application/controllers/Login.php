<?php
class Login extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Usuarios_model');
    }

    public function index()
    {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            
            $user = $this->Usuarios_model->login($username, $password);

			if ($user) {
				$this->session->set_userdata('nombre_usuario', $user->username); // Almacenar el nombre de usuario en la sesión
				redirect('cosas');
            } else {
                $data['error'] = 'Hay errores en el usuario y/o contraseña. Inténtalo de nuevo.';
                $this->load->view('login', $data);
            }
        } else {
            $this->load->view('login');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('nombre_usuario'); // Eliminar el nombre de usuario de la sesión
        $this->session->sess_destroy();
        redirect('login');
    }
}

