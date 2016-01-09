<?php
class M_producto extends CI_Model {

    public function get_all_productos()
    {
        $this->db->select('*');
        $this->db->from('producto');
        $query = $this->db->get();
        return $query;
    }
    public function verif_map($nom,$cat)
    {
		$this->db->select('*');
		$this->db->from('almacen_materia');
		$this->db->join('materia_prima','almacen_materia.map_codigo=materia_prima.map_codigo');
		$this->db->join('categoria','materia_prima.cat_codigo=categoria.cat_codigo');
		$this->db->where('categoria.cat_nombre',$cat);
		$this->db->like('materia_prima.map_nombre',$nom,'after');
		$query=$this->db->get();
		return $query->num_rows();
    }
    public function get_bus_map($nom,$cat)
    {
		$this->db->select('*');
		$this->db->from('almacen_materia');
		$this->db->join('materia_prima','almacen_materia.map_codigo=materia_prima.map_codigo');
		$this->db->join('categoria','materia_prima.cat_codigo=categoria.cat_codigo');
		$this->db->where('categoria.cat_nombre',$cat);
		$this->db->like('materia_prima.map_nombre',$nom,'after');
		$query=$this->db->get();
		return $query;
    }
    
    public function registrar($dat)
    {
		$this->db->insert('producto',$dat);
		return "a";
    }
    
    public function ret_cod()
    {
		$this->db->select('pro_codigo');
		$this->db->order_by('pro_codigo','desc');
    	$this->db->limit('1');
    	$query=$this->db->get('producto');
    	foreach($query->result_array() as $fila)
		{
			$cod=$fila['pro_codigo'];
		}
    	return ($cod);
    }
    
    public function registrar_det($pro,$map,$can)
    {
		$d=array(
			'pro_codigo'=>$pro,
			'map_codigo'=>$map,
			'prm_cantidad'=>$can
		);
		$this->db->insert('producto_materia',$d);
    }

    public function get_detalle_materia($pro_codigo)
    {
        $this->db->select('*');
        $this->db->from('producto_materia');
        $this->db->join('materia_prima','materia_prima.map_codigo = producto_materia.map_codigo');
        $this->db->where('pro_codigo', $pro_codigo);
        $query=$this->db->get();
    	return ($query);
    }
}
?>
