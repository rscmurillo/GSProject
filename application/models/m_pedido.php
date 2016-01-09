<?php
class M_pedido extends CI_Model {

    public function buscar_pro($bus)
    {
        $this->db->select('*');
        $this->db->from('producto');
        $this->db->like('pro_nombre',$bus, 'after');
        $query = $this->db->get();
        $filas=$query->num_rows();
		if($filas>0)
		{
		    return $filas;
		}
		else
		{
			return 0;
		}
    }

	public function registro_salida_materia_prima($salida,$detalle)
    {
    	$this->db->insert('salida_materia_prima',$salida);
		$smp_codigo=$this->ultimo_cod_salida();
		$ped_codigo = $salida["ped_codigo"];
		foreach($detalle as $item)
		{
			$data = array(
					'dsmp_cantidad' => $item["can_mp_t"],
					'smp-codigo' => $smp_codigo,
					'map_codigo' => $item["mat_pri"]
			);
			$this->db->insert('detalle_salida_mp',$data);
			$cant=$this->devolver_cant($item["mat_pri"]);
			$cant=$cant-$item["can_mp_t"];
			if($cant < 0)
			{
				$descontar=$this->descontar_inv($item["mat_pri"],0);
			}
			else
			{
				$descontar=$this->descontar_inv($item["mat_pri"],$cant);
			}
		}

		$guardar=array(
					'ped_estado' => "PRODUCCION"
					);
		$this->db->where('ped_codigo',$ped_codigo);
		$this->db->update('pedido',$guardar);
    		
		return "Registro de Salida de Material Completo";
    }

	public function registro_salida_materia_prima_faltante($salida,$detalle, $faltante)
    {
    	$this->db->insert('salida_materia_prima',$salida);
    	$smp_codigo=$this->ultimo_cod_salida();
    	$ped_codigo = $salida["ped_codigo"];
		foreach($detalle as $item)
		{
			$data = array(
					'dsmp_cantidad' => $item["can_mp_t"],
					'smp-codigo' => $smp_codigo,
					'map_codigo' => $item["mat_pri"]
			);
			$this->db->insert('detalle_salida_mp',$data);

			$cant=$this->devolver_cant($item["mat_pri"]);
			$cant=$cant-$item["can_mp_t"];
			if($cant < 0)
			{
				$descontar=$this->descontar_inv($item["mat_pri"],0);
			}
			else
			{
				$descontar=$this->descontar_inv($item["mat_pri"],$cant);
			}
			
		}
		foreach($faltante as $item)
		{
			$data = array(
					'ped_codigo' => $ped_codigo,
					'map_codigo' => $item["material"],
					'ale_falta' => $item["faltante"],
					'ale_existe' => $item["existente"],
					'ale_total' => $item["total"]
			);
			$this->db->insert('alerta',$data);
		}

		$guardar=array(
					'ped_estado' => "FALTA MATERIAL"
					);
		$this->db->where('ped_codigo',$ped_codigo);
		$this->db->update('pedido',$guardar);
		return "Registro de Salida de Material Completo";
    }

	public function get_verificacion_pedido($mat_pri)
    {
    	
			$this->db->select('almm_cantidad');
			$this->db->from('almacen_materia');
		    $this->db->where('map_codigo', $mat_pri);
			$query = $this->db->get();
        return $query->result_array();
    }

    public function get_alerta($ped_codigo)
    {
		$this->db->select('*');
		$this->db->from('alerta');
	    	$this->db->where('ped_codigo', $ped_codigo);
		$query = $this->db->get();
   		return $query;
    }
    
    public function get_prod($bus)
    {
		$this->db->select('*');
        $this->db->from('producto');
        $this->db->like('pro_nombre',$bus, 'after');
        $query = $this->db->get();
        return $query;
    }

    public function get_all_pedidos()
    {
		$this->db->select('*');
		$this->db->from('pedido');
		$this->db->join('cliente','cliente.cli_codigo=pedido.cli_codigo');
		$query=$this->db->get();
		return $query;
    }

	public function get_pedido_productos($ped_codigo)
    {
        $this->db->select('*');
        $this->db->from('detalle_pedido');
        $this->db->join('producto','producto.pro_codigo = detalle_pedido.pro_codigo');
        $this->db->where('ped_codigo', $ped_codigo);
        $query=$this->db->get();
    	return ($query);
    }

	public function registrar($dat)
    {
		$this->db->insert('pedido',$dat);
		return "a";
    }

    public function registrar_detalle($det)
    {
		$this->db->insert('detalle_pedido',$det);
		return "a";
    }

    public function ultimo_cod_pedido()
    {
		$this->db->select('ped_codigo');
		$this->db->order_by('ped_codigo','desc');
    	$this->db->limit('1');
    	$query=$this->db->get('pedido');
    	foreach($query->result_array() as $fila)
		{
			$cod=$fila['ped_codigo'];
		}
    	return ($cod);
    }


    public function ultimo_cod_salida()
    {
		$this->db->select('smp_codigo');
		$this->db->order_by('smp_codigo','desc');
    	$this->db->limit('1');
    	$query=$this->db->get('salida_materia_prima');
    	foreach($query->result_array() as $fila)
		{
			$cod=$fila['smp_codigo'];
		}
    	return ($cod);
    }

    public function devolver_cant($cod)
    {
		$this->db->select('*');
		$this->db->from('almacen_materia');
		$this->db->where('map_codigo',$cod);
		$query = $this->db->get();
		foreach($query->result_array() as $fila)
		{
			$can=$fila['almm_cantidad'];
		}
		return $can;
    }

    public function descontar_inv($cod,$des)
    {
    	$guardar=array(
					'almm_cantidad' => $des
					);
		$this->db->where('map_codigo',$cod);
		$this->db->update('almacen_materia',$guardar);
		return("");
    }

	public function contar()
    {
        $query = $this->db->query("SELECT *
				FROM pedido
				WHERE ped_estado = 'FALTA MATERIAL'");
		return $query->num_rows();
    }

public function get_alertas()
    {
		   $this->db->select('*');
		   $this->db->from('pedido');
		   $this->db->join('cliente','cliente.cli_codigo = pedido.cli_codigo');
		   $this->db->where('ped_estado', 'FALTA MATERIAL');
		   $query=$this->db->get();
		return $query;
    }

public function get_alertas_pedido($cod)
    {
		$this->db->select('*');
		$this->db->from('alerta');
		$this->db->join('materia_prima','materia_prima.map_codigo = alerta.map_codigo');
		$this->db->where('ped_codigo',$cod);
		$query=$this->db->get();
return $query;
    }
    
}
