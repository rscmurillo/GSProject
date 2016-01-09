<?php
class M_usuario extends CI_Model {

     public function get_all_usuarios()
    {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->order_by('usu_codigo','desc');
        $query = $this->db->get();
        return $query;
    }
    public function registrar($values)
    {
		$this->db->insert('usuario',$values);
		return "El regitro del USUARIO '".$values['usu_login']."' ha sido realizado";
    }
    public function verif_nom($nom,$ape)
    {
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('usu_nombre',$nom);
		$this->db->where('usu_apellido',$ape);
		$query=$this->db->get();
		return $query->num_rows();
    }
    public function verif_log($log)
    {
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('usu_login',$log);
		$query=$this->db->get();
		return $query->num_rows();
    }
    public function eliminar($cod)
    {
    	$this->db->where('usu_codigo',$cod);
		$this->db->delete('usuario');
		return "El registro ha sido eliminado";
    }
    public function verif($login,$cod)
    {
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('usu_login',$login);
		$query=$this->db->get();
		$c=0;
		$r=0;
		if($query->num_rows()>0)
		{
			foreach($query->result_array() as $fila)
			{
				if($fila['usu_codigo']==$cod)
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
		$this->db->where('usu_codigo',$cod);
		$this->db->update('usuario',$dat);
		return "Los datos del usuario '".$dat['usu_login']."' han sido modificados";
    }
    public function verif_bus($nom)
    {
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->like('usu_nombre',$nom,'after');
		$query=$this->db->get();
		return $query->num_rows();
    }
    public function get_bus($nom)
    {
		$this->db->select('*');
		$this->db->like('usu_nombre',$nom,'after');
		$this->db->order_by('usu_nombre','asc');
		$query=$this->db->get('usuario');
		return $query;
    }
}
