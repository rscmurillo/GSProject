<?php
class M_reportes extends CI_Model {

    public function fechas()
    {
        $query = $this->db->query("select distinct(ingreso_materia_prima.imap_fecha_ingreso)
from ingreso_materia_prima join materia_prima on ingreso_materia_prima.map_codigo = materia_prima.map_codigo");
		return $query;
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

public function get_detalles($fecha)
    {
		$this->db->select('*');
		$this->db->from('ingreso_materia_prima');
		$this->db->join('materia_prima','materia_prima.map_codigo = ingreso_materia_prima.map_codigo');
		$this->db->where('imap_fecha_ingreso',$fecha);
		$query=$this->db->get();
return $query;
    }
    
	public function get_reporte_faltante()
    {
        $query = $this->db->query("SELECT a.map_codigo, m.map_nombre, sum(a.ale_falta) as total
									FROM alerta as a join materia_prima as m on a.map_codigo = m.map_codigo
									group by a.map_codigo, m.map_nombre");
		return $query;
    }
    
}
