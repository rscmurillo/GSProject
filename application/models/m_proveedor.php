<?php
class M_proveedor extends CI_Model {

    public function get_all_proveedors()
    {
        $this->db->select('*');
        $this->db->from('proveedor');
        $this->db->order_by('prov_codigo','desc');
        $query = $this->db->get();
        return $query;
    }

	public function get_cod_for_nom($nom)
    {
        $this->db->select('*');
        $this->db->from('proveedor');
        $this->db->where('prov_nombre',$nom);
        $query = $this->db->get();
        $cod=0;
		foreach($query->result_array() as $f)
		{
			$cod = $f['prov_codigo'];
		}
        return $cod;
    }
    public function verif_nom($nom)
    {
		$this->db->select('*');
        $this->db->from('proveedor');
        $this->db->where('prov_nombre',$nom);
        $query = $this->db->get();
        return $query->num_rows();
    }
    public function verif($nom,$cod)
    {
        $this->db->select('*');
        $this->db->from('proveedor');
        $this->db->where('prov_nombre',$nom);
        $query = $this->db->get();
        $c=0;
		$r=0;
		if($query->num_rows()>0)
		{
			foreach($query->result_array() as $fila)
			{
				if($fila['prov_codigo']==$cod)
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
    public function registro($dat)
    {
		$this->db->insert('proveedor',$dat);
		return ("El PROVEEDOR '".$dat['prov_nombre']."' ha sido registrado");
    }
    public function modificar($cod,$dat)
    {
		$this->db->where('prov_codigo',$cod);
		$this->db->update('proveedor',$dat);
		return ("Los datos del PROVEEDOR '".$dat['prov_nombre']."' han sido modificados");
    }
    public function eliminar($cod)
    {
		$this->db->where('prov_codigo',$cod);
		$this->db->delete('proveedor');
		return "El registro ha sido eliminado";
    }
    public function buscar_nom($nom)
    {
		$this->db->select('*');
		$this->db->like('prov_nombre',$nom,'after');
		$this->db->order_by('prov_nombre','asc');
		$query=$this->db->get('proveedor');
		return $query->num_rows();
    }
    public function get_bus($nom)
    {
		$this->db->select('*');
		$this->db->like('prov_nombre',$nom,'after');
		$query=$this->db->get('proveedor');
		return $query;
    }
}
?>
