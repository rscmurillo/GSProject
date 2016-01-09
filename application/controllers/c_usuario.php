<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_usuario extends CI_Controller {

	public function index()
	{
		$alerta= $this->m_pedido->contar();
				$sesion = array
				(
					'alerta' => $alerta
				);
		$this->session->set_userdata($sesion);
		$data['usuarios'] = $this->m_usuario->get_all_usuarios();
		$this->load->view('v_acabeza');
		$this->load->view('v_admin_1usuario',$data);
		$this->load->view('v_zpie');
	}
	public function registro()
	{
		$nom=$_POST['nom'];
		$ape=$_POST['ape'];
		$tel=$_POST['tel'];
		$dir=$_POST['dir'];
		$log=$_POST['log'];
		$pas=$_POST['pas'];
		$car=$_POST['car'];
		if($this->m_usuario->verif_nom($nom,$ape)==0)
		{
			if($this->m_usuario->verif_log($log)==0)
			{
				$values=array(
					'usu_nombre'=>$nom,
					'usu_apellido'=>$ape,
					'usu_telefono'=>$tel,
					'usu_direccion'=>$dir,
					'usu_login'=>$log,
					'usu_password'=>$pas,
					'usu_cargo'=>$car
				);
				$data['mensaje']=$this->m_usuario->registrar($values);
			}
			else
			{
				$data['error']="El nombre de USUARIO '".$log."' ya esta siendo utilizado";
			}
		}
		else
		{
			$data['error']="El USUARIO '".$nom." ".$ape."' ya esta registrado";
		}
		/*CARGAR USUARIOS*/
		$data['usuarios'] = $this->m_usuario->get_all_usuarios();
		/*CARGAR USUARIOS*/
		$this->load->view('v_acabeza');
		$this->load->view('v_admin_1usuario',$data);
		$this->load->view('v_zpie');
	}
	public function eliminar()
	{
		$data['mensaje']=$this->m_usuario->eliminar($_POST['cod']);
		/*CARGAR USUARIOS*/
		$data['usuarios'] = $this->m_usuario->get_all_usuarios();
		/*CARGAR USUARIOS*/
		$this->load->view('v_acabeza');
		$this->load->view('v_admin_1usuario',$data);
		$this->load->view('v_zpie');
	}
	public function modificar()
	{
		$cod=$_POST['cod'];
		$nom=$_POST['nom'];
		$ape=$_POST['ape'];
		$tel=$_POST['tel'];
		$dir=$_POST['dir'];
		$log=$_POST['log'];
		$pas=$_POST['pas'];
		$car=$_POST['car'];
		$dat=array(
			'usu_nombre'=>$nom,
			'usu_apellido'=>$ape,
			'usu_telefono'=>$tel,
			'usu_direccion'=>$dir,
			'usu_login'=>$log,
			'usu_password'=>$pas,
			'usu_cargo'=>$car
		);
		if($this->m_usuario->verif($log,$cod)==1)
		{
			$data['mensaje']=$this->m_usuario->modificar($cod,$dat);
		}
		else
		{
			$data['error']="El nombre de USUARIO ingresado ya esta siendo usado";
		}
		/*CARGAR USUARIOS*/
		$data['usuarios'] = $this->m_usuario->get_all_usuarios();
		/*CARGAR USUARIOS*/
		$this->load->view('v_acabeza');
		$this->load->view('v_admin_1usuario',$data);
		$this->load->view('v_zpie');
	}
	public function buscar()
	{
		$bus=$_POST['bus'];
		if($this->m_usuario->verif_bus($bus)!=0)
		{
			$data['usuarios']=$this->m_usuario->get_bus($bus);
		}
		else
		{
			$data['error']="No se ha encontrado ningun registro";
		}
		$this->load->view('v_acabeza');
		$this->load->view('v_admin_1usuario',$data);
		$this->load->view('v_zpie');
	}
}
