<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cosas extends CI_Controller {
	
	public function __construct()
        {
                parent::__construct();
				$this->load->model("Cosas_model");
        }

	
	public function index()
	{
		$this->load->view('cosas');
	}
}
