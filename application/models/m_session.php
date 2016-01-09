<?php
class M_session extends CI_Model {

    public function validar($usu,$pas)
    {
        $this->db->select('*');
        $this->db->from('usuario');
        $this->db->where('usu_login',$usu);
        $this->db->where('usu_password',$pas);
        $query = $this->db->get();
        return $query;
    }
     public function get_id($usu,$pas)
    {
        $this->db->select('usu_codigo');
        $this->db->from('usuario');
        $this->db->where('usu_login',$usu);
        $this->db->where('usu_password',$pas);
        $this->db->get();
        $peticion = $this->db->last_query();
        $consulta = $this->db->query($peticion);
        $con= $consulta->result();
        $num= $consulta->num_rows();
        if($num == 0)
        {
            return "";
        }
        else
        {
            foreach($con as $c)
            {
                $tipo = $c->usu_codigo;
            }
            return $tipo;
        }
    }
}
?>
