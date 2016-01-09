<?php
class M_materiap extends CI_Model {

    public function get_all_materiap()
    {
        $this->db->select('*');
        $this->db->from('materia_prima');
        $this->db->join('categoria','materia_prima.cat_codigo = categoria.cat_codigo');
        $this->db->join('proveedor','materia_prima.prov_codigo = proveedor.prov_codigo');
        $this->db->order_by('map_codigo', 'desc');
        $query = $this->db->get();
        return $query;
    }
    
    public function verif($nom)
    {
        $this->db->select('*');
        $this->db->from('materia_prima');
        $this->db->where('map_nombre',$nom);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    public function registro($dat)
    {
        $this->db->insert('materia_prima', $dat);
        return "La MATERIA PRIMA '".$dat['map_nombre']."' ha sido registrada";
    }

    public function get_last_cod()
    {
        $this->db->select_max('map_codigo');
		$query = $this->db->get('materia_prima');
		foreach($query->result_array() as $f)
		{
			$ret=$f['map_codigo'];
		}
        return $ret;
    }
    public function eliminar($cod)
    {
    	$this->db->where('map_codigo',$cod);
		$this->db->delete('almacen_materia');
		$this->db->where('map_codigo',$cod);
		$this->db->delete('materia_prima');
		return "El registro ha sido eliminado";
    }
    public function verif_nom($cod,$nom)
    {
		$this->db->select('*');
		$this->db->from('materia_prima');
		$this->db->where('map_nombre',$nom);
		$query=$this->db->get();
		$c=0;
		$r=0;
		if($query->num_rows()>0)
		{
			foreach($query->result_array() as $fila)
			{
				if($fila['map_codigo']==$cod)
				{
					$c=$c+1;
				}
				else
				{
					$r=$r+1;
				}
				if($c==1 && $r==0)
				{
					return "1";
				}
				else
				{
					return "0";
				}
			}
		}
		else
		{
			return "1";
		}
    }
    public function modificar($cod,$d)
    {
		$this->db->where('map_codigo',$cod);
		$this->db->update('materia_prima',$d);
    }
    public function verif_bus($nom)
    {
		$this->db->select('*');
		$this->db->from('materia_prima');
		$this->db->like('map_nombre',$nom,'after');
		$query=$this->db->get();
		return $query->num_rows();
    }
    public function get_bus($nom)
    {
		$this->db->select('*');
        $this->db->from('materia_prima');
        $this->db->join('categoria','materia_prima.cat_codigo = categoria.cat_codigo');
        $this->db->join('proveedor','materia_prima.prov_codigo = proveedor.prov_codigo');
        $this->db->like('map_nombre',$nom,'after');
        $this->db->order_by('map_nombre', 'asc');
        $query = $this->db->get();
        return $query;
    }
}
?>
