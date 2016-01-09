<?php
class M_categoria extends CI_Model {

    public function get_all_categorias()
    {
        $this->db->select('*');
        $this->db->from('categoria');
        $query = $this->db->get();
        return $query;
    }

    public function get_cod_for_nom($nom)
    {
        $this->db->select('*');
        $this->db->from('categoria');
        $this->db->where('cat_nombre',$nom);
        $query = $this->db->get();
        $cod=0;
		foreach($query->result_array() as $f)
		{
			$cod = $f['cat_codigo'];
		}
        return $cod;
    }
    
    public function verif($nom)
    {
        $this->db->select('*');
        $this->db->from('categoria');
        $this->db->where('cat_nombre',$nom);
        $query = $this->db->get();
        return $query->num_rows();
    }
    
    public function registro($dat)
    {
        $this->db->insert('categoria', $dat);
        return "La Categoria '".$dat['cat_nombre']."' ha sido registrada";
    }
    public function eliminar($cod)
    {
		$this->db->where('cat_codigo',$cod);
		$this->db->delete('categoria');
		return "Registro eliminado";
    }
    public function verif_nom($cod,$nom)
    {
		$this->db->select('*');
		$this->db->from('categoria');
		$this->db->where('cat_nombre',$nom);
		$query=$this->db->get();
		$c=0;
		$r=0;
		if($query->num_rows()>0)
		{
			foreach($query->result_array() as $fila)
			{
				if($fila['cat_codigo']==$cod)
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
		$this->db->where('cat_codigo',$cod);
		$this->db->update('categoria',$d);
		return "Los datos de la CATEGORIA '".$d['cat_nombre']."' han sido modificado";
    }
     public function verif_bus($nom)
    {
		$this->db->select('*');
		$this->db->from('categoria');
		$this->db->like('cat_nombre',$nom,'after');
		$query=$this->db->get();
		return $query->num_rows();
    }
    public function get_bus($nom)
    {
		$this->db->select('*');
		$this->db->like('cat_nombre',$nom,'after');
		$this->db->order_by('cat_nombre','asc');
		$query=$this->db->get('categoria');
		return $query;
    }
}
?>
