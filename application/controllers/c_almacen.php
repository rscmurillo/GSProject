<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_almacen extends CI_Controller {

	public function index()
	{
		$alerta= $this->m_pedido->contar();
				$sesion = array
				(
					'alerta' => $alerta
				);
		$this->session->set_userdata($sesion);
		$data['almacen'] = $this->m_almacen->get_all_almacen();
		$this->load->view('v_acabeza');
		$this->load->view('v_admin_5almacen',$data);
		$this->load->view('v_zpie');
	}
	public function agregar()
	{
		$cod=$_POST['cod'];
		$fec=$_POST['fec'];
		$can=$_POST['can'];
		$canl=$_POST['canl'];
		$can_alm=$this->m_almacen->get_can($cod);
		$can_alm=$can_alm+($can*$canl);
		$a=$this->m_almacen->update_can($cod,$can_alm);
		$d=array(
			'map_codigo'=>$cod,
			'imap_cantidad'=>$can,
			'imap_cant_bolsa'=>$canl,
			'imap_fecha_ingreso'=>$fec
		);
		$this->m_almacen->set_ingreso($d);
		
		$data['almacen'] = $this->m_almacen->get_all_almacen();
		$this->load->view('v_acabeza');
		$this->load->view('v_admin_5almacen',$data);
		$this->load->view('v_zpie');
	}
	public function buscar()
	{
		$bus=$_POST['bus'];
		if($this->m_almacen->verif_bus($bus)!=0)
		{
			$data['almacen']=$this->m_almacen->get_bus($bus);
		}
		else
		{
			$data['error']="No se ha encontrado ningun registro";
		}
		$this->load->view('v_acabeza');
        $this->load->view('v_admin_5almacen',$data);
        $this->load->view('v_zpie');
	}
}
