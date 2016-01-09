<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_alertas extends CI_Controller {

	public function ver_alertas()
	{
		$alerta= $this->m_pedido->contar();
				$sesion = array
				(
					'alerta' => $alerta
				);
		$this->session->set_userdata($sesion);
		$data['alertas'] = $this->m_pedido->get_alertas();
		$alertas = array();
		foreach($data['alertas']->result_array() as $pedido)
		{
			$query = $this->m_pedido->get_alertas_pedido($pedido["ped_codigo"]);
			$alertas[$pedido["ped_codigo"]]=$query;
		}
		$data['detalles'] = $alertas;
		$this->load->view('v_acabeza');
		$this->load->view('v_admin_9alertas',$data);
		$this->load->view('v_zpie');
	}
}
