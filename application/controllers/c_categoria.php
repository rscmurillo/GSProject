<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_categoria extends CI_Controller {

	public function index()
	{
		$alerta= $this->m_pedido->contar();
				$sesion = array
				(
					'alerta' => $alerta
				);
		$this->session->set_userdata($sesion);
		$data['categorias'] = $this->m_categoria->get_all_categorias();
		$this->load->view('v_acabeza');
		$this->load->view('v_admin_3categoria',$data);
		$this->load->view('v_zpie');
	}

	public function registro()
	{
		$nom=$_POST['nom'];
		$des=$_POST['des'];
		if($this->m_categoria->verif($nom)==0)
		{
			$dat=array(
			'cat_nombre'=>$nom,
			'cat_descripcion'=>$des
			);
			$data['mensaje']=$this->m_categoria->registro($dat);
		}
		else 
		{
			$data['error']="Ya existe el CATEGORIA '".$nom."'";
		}
		/*CARGAR PROVEEDORES*/
		$data['categorias'] = $this->m_categoria->get_all_categorias();
		/*CARGAR PROVEEDORES*/
		$this->load->view('v_acabeza');
        $this->load->view('v_admin_3categoria',$data);
        $this->load->view('v_zpie');
		
	}
	public function eliminar()
	{
		$cod=$_POST['cod'];
		$data['mensaje']=$this->m_categoria->eliminar($cod);
		/*CARGAR PROVEEDORES*/
		$data['categorias'] = $this->m_categoria->get_all_categorias();
		/*CARGAR PROVEEDORES*/
		$this->load->view('v_acabeza');
        $this->load->view('v_admin_3categoria',$data);
        $this->load->view('v_zpie');
	}
	public function modificar()
	{
		$cod=$_POST['cod'];
		$nom=$_POST['nom'];
		$des=$_POST['des'];
		if($this->m_categoria->verif_nom($cod,$nom))
		{
			$d=array(
				'cat_nombre'=>$nom,
				'cat_descripcion'=>$des
			);
			$data['mensaje']=$this->m_categoria->modificar($cod,$d);
		}
		else
		{
			$data['error']="El nombre de la CATEGORIA '".$nom."' ya esta en uso";
		}
		/*CARGAR PROVEEDORES*/
		$data['categorias'] = $this->m_categoria->get_all_categorias();
		/*CARGAR PROVEEDORES*/
		$this->load->view('v_acabeza');
        $this->load->view('v_admin_3categoria',$data);
        $this->load->view('v_zpie');
	}
	public function buscar()
	{
		$bus=$_POST['bus'];
		if($this->m_categoria->verif_bus($bus)!=0)
		{
			$data['categorias']=$this->m_categoria->get_bus($bus);
		}
		else
		{
			$data['error']="No se ha encontrado ningun registro";
		}
		$this->load->view('v_acabeza');
        $this->load->view('v_admin_3categoria',$data);
        $this->load->view('v_zpie');
	}
}
