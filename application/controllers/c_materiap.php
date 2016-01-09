<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_materiap extends CI_Controller {

	public function obtener_c_p()
	{
		$c=$this->m_categoria->get_all_categorias();
    	$p=$this->m_proveedor->get_all_proveedors();
		$datos['categorias']=array();
		$datos['proveedores']=array();
		foreach($c->result_array() as $f)
		{
			$datos['categorias'][$f['cat_nombre']]=$f['cat_nombre'];
		}

		foreach($p->result_array() as $f)
		{
			$datos['proveedores'][$f['prov_nombre']]=$f['prov_nombre'];
		}
		$datos['unidades']=array(
				'Metros'=>'Metros',
				'Unidades'=>'Unidades'
			);
		return($datos);
	}
	
	public function index()
	{
		$alerta= $this->m_pedido->contar();
				$sesion = array
				(
					'alerta' => $alerta
				);
		$this->session->set_userdata($sesion);
		$data = $this->obtener_c_p();
		$data['materiap'] = $this->m_materiap->get_all_materiap();
		$this->load->view('v_acabeza');
		$this->load->view('v_admin_4materiap',$data);
		$this->load->view('v_zpie');
	}

	public function registro()
	{
		$nom = $_POST['nom'];
		$cat = $_POST['categoria'];
		$prov = $_POST['proveedor'];
		$pre = $_POST['pre'];
		$und = $_POST['und'];
		
		if($this->m_materiap->verif($nom)==0)
		{
			$cod_prov = $this->m_proveedor->get_cod_for_nom($prov);
			$cod_cat = $this->m_categoria->get_cod_for_nom($cat);
			$dat=array(
			'cat_codigo'=>$cod_cat,
			'prov_codigo'=>$cod_prov,
			'map_nombre'=>$nom,
			'map_precio'=>$pre,
			'map_un_medida'=>$und
			);
			$data['mensaje']=$this->m_materiap->registro($dat);
			$last_cod = $this->m_materiap->get_last_cod();
			$data['mensaje']=$data['mensaje']." ".$this->m_almacen->crear($last_cod);
		}
		else 
		{
			$data['error']="Ya existe la MATERIA PRIMA '".$nom."'";
		}
		/*OBTENER CATEGORIAS Y PROVEDORES*/
		$datas = $this->obtener_c_p();
		/*OBTENER CATEGORIAS Y PROVEDORES*/
		/*OBTENER MATERIA PRIMA*/
		$data['materiap'] = $this->m_materiap->get_all_materiap();
		/*OBTENER MATERIA PRIMA*/
		$this->load->view('v_acabeza',$datas);
        $this->load->view('v_admin_4materiap',$data);
        $this->load->view('v_zpie');
	}
	public function eliminar()
	{
		$cod=$_POST['cod'];
		$data['mensaje']=$this->m_materiap->eliminar($cod);
		/*OBTENER CATEGORIAS Y PROVEDORES*/
		$datas = $this->obtener_c_p();
		/*OBTENER CATEGORIAS Y PROVEDORES*/
		/*OBTENER MATERIA PRIMA*/
		$data['materiap'] = $this->m_materiap->get_all_materiap();
		/*OBTENER MATERIA PRIMA*/
		$this->load->view('v_acabeza',$datas);
        $this->load->view('v_admin_4materiap',$data);
        $this->load->view('v_zpie');
	}
	public function modificar()
	{
		$cod=$_POST['cod'];
		$nom=$_POST['nom'];
		$pre=$_POST['pre'];
		$uni=$_POST['uni'];
		if($this->m_materiap->verif_nom($cod,$nom)==1)
		{
			$dat=array(
			'map_nombre'=>$nom,
			'map_precio'=>$pre,
			'map_un_medida'=>$uni
		);
			$data['mensaje']=$this->m_materiap->modificar($cod,$dat);
		}
		else
		{
			$data['error']="El nombre de MATERIA PRIMA ingresado ya esta siendo usado";
		}
		/*OBTENER CATEGORIAS Y PROVEDORES*/
		$datas = $this->obtener_c_p();
		/*OBTENER CATEGORIAS Y PROVEDORES*/
		/*OBTENER MATERIA PRIMA*/
		$data['materiap'] = $this->m_materiap->get_all_materiap();
		/*OBTENER MATERIA PRIMA*/
		$this->load->view('v_acabeza',$datas);
        $this->load->view('v_admin_4materiap',$data);
        $this->load->view('v_zpie');
	}
	public function buscar()
	{
		$bus=$_POST['bus'];
		if($this->m_materiap->verif_bus($bus)!=0)
		{
			$data['materiap']=$this->m_materiap->get_bus($bus);
		}
		else
		{
			$data['error']="No se ha encontrado ningun registro";
		}
		/*OBTENER CATEGORIAS Y PROVEDORES*/
		$datas = $this->obtener_c_p();
		/*OBTENER CATEGORIAS Y PROVEDORES*/
		$this->load->view('v_acabeza',$datas);
        $this->load->view('v_admin_4materiap',$data);
        $this->load->view('v_zpie');
	}
	
}
