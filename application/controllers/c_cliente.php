<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_cliente extends CI_Controller {

	public function index()
	{
		$alerta= $this->m_pedido->contar();
		$sesion = array
		(
			'alerta' => $alerta
		);
		$this->session->set_userdata($sesion);
		$data['clientes'] = $this->m_cliente->get_all_clientes();
		$this->load->view('v_acabeza');
		$this->load->view('v_admin_7cliente',$data);
		$this->load->view('v_zpie');
	}
	public function registro()
	{
		$nom=$_POST['nom'];
		$nit=$_POST['nit'];
		$tel=$_POST['tel'];
		if($this->m_cliente->verif_nom($nom)==0)
		{
			$values=array(
					'cli_nombre'=>$nom,
					'cli_nit'=>$nit,
					'cli_telefono'=>$tel
				);
				$data['mensaje']=$this->m_cliente->registrar($values);
			
		}
		else
		{
			$data['error']="El CLIENTE '".$nom."' ya esta registrado";
		}
		/*CARGAR CLIENTES*/
		$data['clientes'] = $this->m_cliente->get_all_clientes();
		/*CARGAR CLIENTES*/
		$this->load->view('v_acabeza');
		$this->load->view('v_admin_7cliente',$data);
		$this->load->view('v_zpie');
	}
	public function modificar()
	{
		$cod=$_POST['cod'];
		$nom=$_POST['nom'];
		$nit=$_POST['nit'];
		$tel=$_POST['tel'];
		$dat=array(
			'cli_nombre'=>$nom,
			'cli_nit'=>$nit,
			'cli_telefono'=>$tel
		);
		if($this->m_cliente->verif($nom,$cod)==1)
		{
			$data['mensaje']=$this->m_cliente->modificar($cod,$dat);
		}
		else
		{
			$data['error']="El nombre de CLIENTE ingresado ya esta siendo usado";
		}
		/*CARGAR CLIENTES*/
		$data['clientes'] = $this->m_cliente->get_all_clientes();
		/*CARGAR CLIENTES*/
		$this->load->view('v_acabeza');
		$this->load->view('v_admin_7cliente',$data);
		$this->load->view('v_zpie');
	}
	public function eliminar()
	{
		$data['mensaje']=$this->m_cliente->eliminar($_POST['cod']);
		/*CARGAR CLIENTES*/
		$data['clientes'] = $this->m_cliente->get_all_clientes();
		/*CARGAR CLIENTES*/
		$this->load->view('v_acabeza');
		$this->load->view('v_admin_7cliente',$data);
		$this->load->view('v_zpie');
	}
	public function buscar()
	{
		$bus=$_POST['bus'];
		if($this->m_cliente->verif_bus($bus)!=0)
		{
			$data['clientes']=$this->m_cliente->get_bus($bus);
		}
		else
		{
			$data['error']="No se ha encontrado ningun registro";
		}
		$this->load->view('v_acabeza');
		$this->load->view('v_admin_7cliente',$data);
		$this->load->view('v_zpie');
	}
}
