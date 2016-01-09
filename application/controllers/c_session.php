<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_session extends CI_Controller {

	public function login()
	{
		$this->form_validation->set_rules('login','Usuario','required|max_length[10]');
		$this->form_validation->set_rules('password','Usuario','required');
		$this->form_validation->set_message('required','El Campo %s esta vacio');
		$this->form_validation->set_message('max_length','El Campo %s debe contener 10 caracteres como maximo');

			if(!isset ($_POST['login']))
			{
				if(!isset ($_POST['password']))
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
			else
				{
					if($this->form_validation->run() == FALSE)
					{
						$this->load->view('v_login');
					}
					else
					{
						$usu=$_POST['login'];
						$con=$_POST['password'];
						$this->load->model('m_session');
						
						$usuario = $this->m_session->validar($usu,$con);

							$cargo="";
						
						foreach($usuario->result_array() as $f)
						{
							$nombre=$f['usu_nombre'];
							$apellido=$f['usu_apellido'];
							$cargo=$f['usu_cargo'];
						} 
							
						if($cargo != "" )
						{
							switch($cargo)
								    {
								    case "Administrador" : $menu = 'v_menu_admin';
										break;
								    case "Encargado de Almacen" : $menu = 'v_menu_alm';
										break;
									case "Encargado de Produccion" : $menu = 'v_menu_pro';
										break;
								    }

						$alerta= $this->m_pedido->contar();
							$datos = array
							(
								'login'=>$usu,
								'cargo' => $cargo,
								'id' => $nombre." ".$apellido,
								'menu' => $menu,
								'alerta' => $alerta,
								'online' => TRUE
							);
							$this->session->set_userdata($datos);
							$this->load->view('v_acabeza');
					        $this->load->view('v_contenido');
					        $this->load->view('v_zpie');					        
						}
						else
						{
						$datos['no_usuario']=" El Usuario o Contraseña Incorrecto";
						$this->load->view('v_login', $datos);
						}
					}
				
				}
	}

	public function logout()
    {
        if($this->session->userdata("online")==TRUE)
        {
            $this->session->sess_destroy();
            $this->load->view('v_login');
        }
        else
        {
            $this->load->view('v_login');
        }
    }
}
