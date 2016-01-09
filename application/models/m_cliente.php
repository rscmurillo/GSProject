<?php
class M_cliente extends CI_Model {

    public function get_all_clientes()
    {
        $this->db->select('*');
        $this->db->from('cliente');
        $query = $this->db->get();
        return $query;
    }
    public function registrar($values)
    {
		$this->db->insert('cliente',$values);
		return "El regitro del CLIENTE '".$values['cli_nombre']."' ha sido realizado";
    }
    public function verif_nom($nom)
    {
		$this->db->select('*');
		$this->db->from('cliente');
		$this->db->where('cli_nombre',$nom);
		$query=$this->db->get();
		return $query->num_rows();
    }
     public function verif($nom,$cod)
    {
		$this->db->select('*');
		$this->db->from('cliente');
		$this->db->where('cli_nombre',$nom);
		$query=$this->db->get();
		$c=0;
		$r=0;
		if($query->num_rows()>0)
		{
			foreach($query->result_array() as $fila)
			{
				if($fila['cli_codigo']==$cod)
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
    public function modificar($cod,$dat)
    {
		$this->db->where('cli_codigo',$cod);
		$this->db->update('cliente',$dat);
		return "Los datos del CLIENTE '".$dat['cli_nombre']."' han sido modificados";
    }
    public function eliminar($cod)
    {
    	$this->db->where('cli_codigo',$cod);
		$this->db->delete('cliente');
		return "El registro ha sido eliminado";
    }
     public function verif_bus($nom)
    {
		$this->db->select('*');
		$this->db->from('cliente');
		$this->db->like('cli_nombre',$nom,'after');
		$query=$this->db->get();
		return $query->num_rows();
    }
    public function get_bus($nom)
    {
		$this->db->select('*');
		$this->db->like('cli_nombre',$nom,'after');
		$this->db->order_by('cli_nombre','asc');
		$query=$this->db->get('cliente');
		return $query;
    }

	public function obtener_codigo($cli)
    {
		$this->db->select('*');
		$this->db->from('cliente');
		$this->db->where('cli_nombre', $cli);
		$query=$this->db->get();
		$cod="";
		if($query->num_rows()>0)
		{
			foreach($query->result_array() as $fila)
			{
				$cod = $fila['cli_codigo'];
			}
		}
		return $cod;
    }
    
}
?>
