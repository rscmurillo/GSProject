<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_producto extends CI_Controller {

	public function obtener_cat()
	{
		$c=$this->m_categoria->get_all_categorias();
		$datos['categorias']=array();
		foreach($c->result_array() as $f)
		{
			$datos['categorias'][$f['cat_nombre']]=$f['cat_nombre'];
		}
		return($datos);
	}

	public function detalles()
	{
		$producto = $this->m_producto->get_all_productos();
		foreach($producto->result_array() as $f)
		{
			$lista[$f['pro_codigo']] = $this->m_producto->get_detalle_materia($f['pro_codigo']);
		}
		if(!empty($producto))
		{
			return $lista;
		}
		else
		{
			$lista=array();
			return $lista;
		}
	}

	public function index()
	{
		$alerta= $this->m_pedido->contar();
				$sesion = array
				(
					'alerta' => $alerta
				);
		$this->session->set_userdata($sesion);
		$this->cart->destroy();
		/*CARGAR CATEGORIA*/
		$data['categorias'] = $this->obtener_cat();
		$data['productos'] = $this->m_producto->get_all_productos();
		$data['lista']=$this->detalles();
		/*CARGAR CATEGORIA*/
		$this->load->view('v_acabeza');
		$this->load->view('v_admin_6producto',$data);
		$this->load->view('v_zpie');
	}

	public function registro()
	{
		$dat=array(
			'pro_nombre'=>$_POST['nom'],
			'pro_precio'=>$_POST['pre'],
			'pro_descripcion'=>$_POST['des']
		);
		$a=$this->m_producto->registrar($dat);
		$codp=$this->m_producto->ret_cod();
		foreach($this->cart->contents() as $c)
		{
			$o=$this->cart->product_options($c['rowid']);
			$b=$this->m_producto->registrar_det($codp, $o['map'],$c['qty']);
		}
		
		$this->cart->destroy();
		$data['mensaje']="El rpoducto ha sido registrado correctamente";
		/*CARGAR CATEGORIA*/
		$data['categorias'] = $this->obtener_cat();
		$data['productos'] = $this->m_producto->get_all_productos();
		$data['lista']=$this->detalles();
		/*CARGAR CATEGORIA*/
		$this->load->view('v_acabeza');
		$this->load->view('v_admin_6producto',$data);
		$this->load->view('v_zpie');
	}
	public function eliminar()
	{
		echo $_POST['cod'];
	}
	public function modificar()
	{
		echo $_POST['cod'];
		echo $_POST['nom'];
		echo $_POST['pai'];
		echo $_POST['des'];
	}
	public function buscar()
	{
		$cat=$_POST['categoria'];
		$nom=$_POST['bus'];
		$a=$this->m_producto->verif_map($nom,$cat);
		if($a==0)
		{
			$data['error']="No se ha encontrado ningun registro";
		}
		else
		{
			$data['materiap']=$this->m_producto->get_bus_map($nom,$cat);
		}
		/*CARGAR CATEGORIA*/
		$datas['categorias'] = $this->obtener_cat();
		$data['productos'] = $this->m_producto->get_all_productos();
		$data['lista']=$this->detalles();
		/*CARGAR CATEGORIA*/
		$this->load->view('v_acabeza',$datas);
		$this->load->view('v_admin_6producto',$data);
		$this->load->view('v_zpie');
	}
	public function agregar_car()
	{
		$nom=$_POST['map_nombre'];
		$med=$_POST['map_un_medida'];
		$can=$_POST['cantidad'];
		$cod=$_POST['almm_codigo'];
		$cmap=$_POST['map_codigo'];
		$carrito=array(
			'id'=> $cod,
			'qty'=> $can,
			'price'=>100,
			'name'=> $nom,
			'options'=> array('med'=> $med,'map'=> $cmap)
		);
		$this->cart->insert($carrito);
		/*CARGAR CATEGORIA*/
		$datas['categorias'] = $this->obtener_cat();
		$datas['productos'] = $this->m_producto->get_all_productos();
		$datas['lista']=$this->detalles();
		/*CARGAR CATEGORIAS*/
		$this->load->view('v_acabeza',$datas);
		$this->load->view('v_admin_6producto');
		$this->load->view('v_zpie');
	}

	public function quitar_car()
	{
		$cod=$_POST['rowid'];
		$carrito=array(
			'rowid'=> $cod,
			'qty'=> 0
		);
		$this->cart->update($carrito);
		/*CARGAR CATEGORIA*/
		$datas['categorias'] = $this->obtener_cat();
		$datas['productos'] = $this->m_producto->get_all_productos();
		$datas['lista']=$this->detalles();
		/*CARGAR CATEGORIAS*/
		$this->load->view('v_acabeza',$datas);
		$this->load->view('v_admin_6producto');
		$this->load->view('v_zpie');
	}
}
