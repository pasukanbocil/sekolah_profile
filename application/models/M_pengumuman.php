<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_pengumuman extends CI_Model
{
    public function tampil()
    {
        $this->db->select('*');
        $this->db->from('pengumuman');
        $this->db->order_by('id_pengumuman', 'asc');
        return $this->db->get()->result();
    }
    public function tambah($data)
    {
        $this->db->insert('pengumuman', $data);
    }
    public function edit($data)
    {
        $this->db->where('id_pengumuman', $data['id_pengumuman']);
        $this->db->update('pengumuman', $data);
    }
}

/* End of file M_pengumuman.php */
