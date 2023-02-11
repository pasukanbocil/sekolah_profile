<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_matpel extends CI_Model
{
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('mata_pel');
        $this->db->order_by('id_mapel', 'asc');
        return $this->db->get()->result();
    }
    public function tambah($data)
    {
        $this->db->insert('mata_pel', $data);
    }
    public function edit($data)
    {
        $this->db->where('id_mapel', $data['id_mapel']);
        $this->db->update('mata_pel', $data);
    }
    public function hapus($data)
    {
        $this->db->where('id_mapel', $data['id_mapel']);
        $this->db->delete('mata_pel', $data);
    }
}

/* End of file Matpel.php */
