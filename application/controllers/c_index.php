<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_index extends CI_Controller {

	public function index()
	{
		if($this->session->userdata("login"))
			{
				$this->load->view('v_acabeza');
			    $this->load->view('v_contenido');
			    $this->load->view('v_zpie');	
			}
			else
			{
				$this->load->view('v_login');
			}
	}
}
