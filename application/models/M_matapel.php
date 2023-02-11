<?php


defined('BASEPATH') or exit('No direct script access allowed');

class M_matapel extends CI_Model
{

    public function tampil()
    {
        $this->db->select('*');
        $this->db->from('mata_pel');
        $this->db->order_by('id_mapel', 'asc');
        return $this->db->get()->result();
    }
}

/* End of file M_matapel.php */
