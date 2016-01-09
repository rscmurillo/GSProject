<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_proveedor extends CI_Controller {

	public function index()
	{
		$alerta= $this->m_pedido->contar();
				$sesion = array
				(
					'alerta' => $alerta
				);
		$this->session->set_userdata($sesion);
		$data['proveedors'] = $this->m_proveedor->get_all_proveedors();
		$this->load->view('v_acabeza');
		$this->load->view('v_admin_2proveedor',$data);
		$this->load->view('v_zpie');
	}

	public function registro()
	{
		$nom=$_POST['nom'];
		$pai=$_POST['pai'];
		$des=$_POST['des'];
		if($this->m_proveedor->verif_nom($nom)==0)
		{
			$dat=array(
			'prov_nombre'=>$nom,
			'prov_pais'=>$pai,
			'prov_descripcion'=>$des
			);
			$data['mensaje']=$this->m_proveedor->registro($dat);
		}
		else 
		{
			$data['error']="Ya existe el PROVEEDOR '".$nom."'";
		}
		/*CARGAR PROVEEDORES*/
		$data['proveedors'] = $this->m_proveedor->get_all_proveedors();
		/*CARGAR PROVEEDORES*/
		$this->load->view('v_acabeza');
        $this->load->view('v_admin_2proveedor',$data);
        $this->load->view('v_zpie');
		
	}
	public function eliminar()
	{
		$cod=$_POST['cod'];
		$data['mensaje']=$this->m_proveedor->eliminar($cod);
		/*CARGAR PROVEEDORES*/
		$data['proveedors'] = $this->m_proveedor->get_all_proveedors();
		/*CARGAR PROVEEDORES*/
		$this->load->view('v_acabeza');
        $this->load->view('v_admin_2proveedor',$data);
        $this->load->view('v_zpie');
	}
	public function modificar()
	{
		$cod=$_POST['cod'];
		$dat=array(
			'prov_nombre'=>$_POST['nom'],
			'prov_pais'=>$_POST['pai'],
			'prov_descripcion'=>$_POST['des']
		);
		if($this->m_proveedor->verif($dat['prov_nombre'],$cod)==1)
		{
			$data['mensaje']=$this->m_proveedor->modificar($cod,$dat);
		}
		else
		{
			$data['error']="El nombre de PROVEEDOR ingresado ya esta siendo usado";
		}
		/*CARGAR PROVEEDORES*/
		$data['proveedors'] = $this->m_proveedor->get_all_proveedors();
		/*CARGAR PROVEEDORES*/
		$this->load->view('v_acabeza');
        $this->load->view('v_admin_2proveedor',$data);
        $this->load->view('v_zpie');
	}
	public function buscar()
	{
		$nom=$_POST['bus'];
		if($this->m_proveedor->buscar_nom($nom)==0)
		{
			$data['error']="No se ha encontrado ningún registro";
		}
		else
		{
			$data['proveedors']=$this->m_proveedor->get_bus($nom);
		}
		
		$this->load->view('v_acabeza');
        $this->load->view('v_admin_2proveedor',$data);
        $this->load->view('v_zpie');
		
	}
}
