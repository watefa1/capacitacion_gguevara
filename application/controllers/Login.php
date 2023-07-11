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
		
	        $user = $this->Usuarios_model->getUserByUsername($username);
		
	        if ($user && password_verify($password, $user->password)) {
	            $this->session->set_userdata('nombre_usuario', $user->username);
	            redirect('cosas');
	        } else {
	            $data['error'] = 'Hay errores en el usuario y/o contraseña. Inténtalo de nuevo.';
	            $this->load->view('login', $data);
	        }
	    } else {
	        $this->load->view('login');
	    }
	}


	public function register()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $newUser = array(
            'username' => $username,
            'password' => $hashedPassword
        );

        $this->Usuarios_model->crearUsuario($newUser);

        $response = array('success' => true);
        echo json_encode($response);
    }


	
    public function logout()
    {
        $this->session->unset_userdata('nombre_usuario');
        $this->session->sess_destroy();
        redirect('login');
    }
}
