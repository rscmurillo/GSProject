<?php
class M_almacen extends CI_Model {


	public function get_all_almacen()
	{
		$this->db->select('*');
		$this->db->from('almacen_materia');
		$this->db->join('materia_prima','materia_prima.map_codigo = almacen_materia.map_codigo');
        $this->db->order_by('almm_codigo', 'desc');
        $query = $this->db->get();
        return $query;
	}

    public function crear($cod)
    {
    	$dat=array(
			'almm_cantidad'=>0,
			'map_codigo'=>$cod
			);
        $this->db->insert('almacen_materia', $dat);
        return " y la cantidad se inicializo en '0'";
    }
    
    public function agregar($cod)
    {

    
    	$dat=array(
			'almm_cantidad'=>0,
			'map_codigo'=>$cod
			);
        $this->db->insert('almacen_materia', $dat);
        return " y la cantidad se inicializo en '0'";
    }
    public function get_can($cod)
    {
		$this->db->select('almm_cantidad');
		$this->db->from('almacen_materia');
		$this->db->where('almm_codigo',$cod);
		$query=$this->db->get();
		$can=0;
		foreach($query->result_array() as $fila)
		{
			$can=$fila['almm_cantidad'];
		}
		return $can;
    }
    public function update_can($cod,$can)
    {
		$dat=array(
			'almm_cantidad'=>$can
		);
		$this->db->where('almm_codigo',$cod);
		$this->db->update('almacen_materia',$dat);
		return "1";
    }
    public function set_ingreso($d)
    {
		$this->db->insert('ingreso_materia_prima',$d);
		return "registro relizado";
    }
     public function verif_bus($nom)
    {
		$this->db->select('*');
		$this->db->from('almacen_materia');
		$this->db->join('materia_prima','materia_prima.map_codigo = almacen_materia.map_codigo');
		$this->db->like('map_nombre',$nom,'after');
		$query=$this->db->get();
		return $query->num_rows();
    }
    public function get_bus($nom)
    {
		$this->db->select('*');
       $this->db->from('almacen_materia');
		$this->db->join('materia_prima','materia_prima.map_codigo = almacen_materia.map_codigo');
		$this->db->like('map_nombre',$nom,'after');
        $this->db->order_by('map_nombre', 'asc');
        $query = $this->db->get();
        return $query;
    }

}
?>
