<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_Pedido extends CI_Controller {


	public function obtener_cli()
	{
		$c=$this->m_cliente->get_all_clientes();
		$datos['clientes']=array();
		foreach($c->result_array() as $f)
		{
			$datos['clientes'][$f['cli_nombre']]=$f['cli_nombre'];
		}
		return($datos);
	}
		
	public function detalles()
	{
		$pedidos = $this->m_pedido->get_all_pedidos();
		foreach($pedidos->result_array() as $f)
		{
			$lista[$f['ped_codigo']] = $this->m_pedido->get_pedido_productos($f['ped_codigo']);
		}

		if($pedidos->num_rows() != 0)
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
		$data['pedidos']=$this->m_pedido->get_all_pedidos();
		$data['lista']=$this->detalles();
		$this->load->view('v_acabeza');
		$this->load->view('v_admin_8pedido',$data);
		$this->load->view('v_zpie');
	}

	public function pedidonuevo()
	{
		$data['clientes']=$this->obtener_cli();
		$this->cart->destroy();
		$data['pedidos']=$this->m_pedido->get_all_pedidos();
		$data['productos']=$this->m_producto->get_all_productos();
		$data['lista']=$this->detalles();
		
		$this->load->view('v_acabeza');
		$this->load->view('v_admin_8regpedido',$data);
		$this->load->view('v_zpie');
	}


	public function addpro()
	{
		$data['clientes']=$this->obtener_cli();
		$pro = $_POST['cod'];
		$can = $_POST['can'];
		$pre = $_POST['pre'];
		$nom = $_POST['nom'];
		$carrito=array(
			'id'=> $pro,
			'qty'=> $can,
			'price'=>$pre,
			'name'=> $nom,
			'options'=> array()
		);
		$this->cart->insert($carrito);
		$data['productos']=$this->m_producto->get_all_productos();
		$this->load->view('v_acabeza');
		$this->load->view('v_admin_8regpedido',$data);
		$this->load->view('v_zpie');
	}

	public function delpro()
	{
		$data['clientes']=$this->obtener_cli();
		$pro = $_POST['rowid'];
		$carrito=array(
			'rowid'=> $pro,
			'qty'=> 0
		);
		$this->cart->update($carrito);
		$data['productos']=$this->m_producto->get_all_productos();
		$this->load->view('v_acabeza');
		$this->load->view('v_admin_8regpedido',$data);
		$this->load->view('v_zpie');
	}

	public function registro()
	{
		$cli = $_POST['cliente'];
		$ptot = $_POST['ptot'];
		$ctot = $_POST['ctot'];
		$fec = $_POST['fec'];
		$fece = $_POST['fechaentrega'];
		$cod_cli = $this->m_cliente->obtener_codigo($cli);
		$dat=array(
			'cli_codigo'=> $cod_cli,
			'ped_prec_total'=> $ptot,
			'ped_cant_total'=> $ctot,
			'ped_fecha'=> $fec,
			'ped_fecha_entrega'=> $fece,
			'ped_estado'=> 'PENDIENTE'
		);
		$s = $this->m_pedido->registrar($dat);
		$ped_codigo = $this->m_pedido->ultimo_cod_pedido();
		foreach($this->cart->contents() as $c)
		{
			$det=array(
			'ped_codigo'=> $ped_codigo,
			'pro_codigo'=> $c['id'],
			'detp_cantidad'=> $c['qty']
			);
			$s = $this->m_pedido->registrar_detalle($det);
		}
		$data['mensaje']= "Pedido Registrado Correctamente";	
		$this->cart->destroy();
		$data['pedidos']=$this->m_pedido->get_all_pedidos();
		$data['lista']=$this->detalles();
		$this->load->view('v_acabeza');
		$this->load->view('v_admin_8pedido',$data);
		$this->load->view('v_zpie');
	}

	public function produccion()
	{
		$ped_codigo = $_POST['ped_codigo'];
		$detalle = $this->m_pedido->get_pedido_productos($ped_codigo);
		$result = array();
		foreach($detalle->result_array() as $f)
		{	
			$lista[$f['pro_codigo']] = $this->m_producto->get_detalle_materia($f['pro_codigo']);
			$dato[$f['pro_codigo']] = array();
			foreach($lista[$f['pro_codigo']]->result_array() as $j)
			{
				$calculo = $this->calculo_producto($f['detp_cantidad'],$j['prm_cantidad'],$j['map_codigo'],$j['map_un_medida']);
				array_unshift($dato[$f['pro_codigo']], $calculo);
				
				array_unshift($result, $calculo);
			}
		}
		$total = array();
		foreach ($result as $arr)
		{
			if(empty($total))
			{
				$total[$arr["mat_pri"]]= array(
					'mat_pri' => $arr["mat_pri"],
					'can_mp' => 0,
					'und_me' => $arr["und_me"],
					'can_mp_t' => 0);
			}
			else
			{
				foreach ($total as $exist)
				{
					if ($exist != $arr["mat_pri"]) 
					{
						$total[$arr["mat_pri"]]= array(
								'mat_pri' => $arr["mat_pri"],
								'can_mp' => 0,
								'und_me' => $arr["und_me"],
								'can_mp_t' => 0);
					}
				}
			}
		}
		
		foreach ($total as $item)
		{
			foreach ($result as $arr)
			{
				if($item["mat_pri"] == $arr["mat_pri"])
				{
					$total[$item["mat_pri"]] = array(
					'mat_pri' => $total[$item["mat_pri"]]["mat_pri"],
					'can_mp' => $arr["can_mp"]+$total[$item["mat_pri"]]["can_mp"],
					'und_me' => $arr["und_me"],
					'can_mp_t' => $arr["can_mp_t"]+$total[$item["mat_pri"]]["can_mp_t"]);
				}
			}
		}

		$faltante = array();
		foreach ($total as $item)
		{
			$verificacion = $this->m_pedido->get_verificacion_pedido($item["mat_pri"]);
			$resto= $verificacion[0]["almm_cantidad"]-$item["can_mp_t"];
				if($resto < 0 )
				{
					$faltante[$item["mat_pri"]] = array(
						'material' => $item["mat_pri"],
						'faltante' => $resto * -1,
						'existente' => $verificacion[0]["almm_cantidad"],
						'total' => $item["can_mp_t"]	
					);

					
					$total[$item["mat_pri"]]["can_mp_t"] = $verificacion[0]["almm_cantidad"];
				}
		}
		$salida = array('smp_fecha_salida'=>date('Y-n-j'), 'ped_codigo'=>$ped_codigo);

		print_r($total);
		print_r($faltante);

		if(empty($faltante))
		{
			$verificacion = $this->m_pedido->registro_salida_materia_prima($salida,$total);
		}
		else
		{
			$verificacion = $this->m_pedido->registro_salida_materia_prima_faltante($salida,$total, $faltante);
		}

		$data['pedidos']=$this->m_pedido->get_all_pedidos();
		$data['lista']=$this->detalles();
		$alerta= $this->m_pedido->contar();
				$sesion = array
				(
					'alerta' => $alerta
				);
		$this->session->set_userdata($sesion);
		$this->load->view('v_acabeza');
		$this->load->view('v_admin_8pedido',$data);
		$this->load->view('v_zpie');
	}	

	public function reenviar()
	{
		$ped_codigo = $_POST['ped_codigo'];

		$alerta = $this->m_pedido->get_alerta($ped_codigo);

		$bandera = $alerta->num_rows();

		foreach ($alerta->result_array() as $mp)
		{
			$cantMp = $this->m_pedido->devolver_cant($mp['map_codigo']);
			if($cantMp >= $mp['ale_falta'])
			{
				$bandera = $bandera - 1;
			}
		}

		if($bandera == 0)
		{
			echo "Realizar salida";
			
		}
		else
		{
			echo "incompleto";
			
		}

















		
	}


	public function calculo_producto($can_pro, $can_mp,$mat_pri,$und_me)
	{
		return $array = array(
					'mat_pri' => $mat_pri,
					'can_mp' => $can_mp,
					'can_pr' => $can_pro,
					'und_me' => $und_me,
					'can_mp_t' => $can_pro*$can_mp);
	}

}
