<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_kepsek extends CI_Model
{
    public function tampil()
    {
        $this->db->select('*');
        $this->db->from('kepsek');
        $this->db->order_by('id_kepsek', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
    public function tambah($data)
    {
        $this->db->insert('kepsek', $data);
    }
    public function detail($id_kepsek)
    {
        $this->db->select('*');
        $this->db->from('kepsek');
        $this->db->where('id_kepsek', $id_kepsek);
        return $this->db->get()->row();
    }
    public function edit($data)
    {
        $this->db->where('id_kepsek', $data['id_kepsek']);
        $this->db->update('kepsek', $data);
    }
    public function hapus($data)
    {
        $this->db->where('id_kepsek', $data['id_kepsek']);
        $this->db->delete('kepsek', $data);
    }
}

/* End of file M_kepsek.php */
