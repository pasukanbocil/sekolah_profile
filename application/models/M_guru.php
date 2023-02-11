<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_guru extends CI_Model
{
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->join('mata_pel', 'mata_pel.id_mapel = guru.id_mapel', 'left');
        $this->db->order_by('id_guru', 'asc');
        return $this->db->get()->result();
    }
    public function detail($id_guru)
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->join('mata_pel', 'mata_pel.id_mapel = guru.id_mapel', 'left');
        $this->db->where('id_guru', $id_guru);
        return $this->db->get()->row();
    }
    public function tambah($data)
    {
        $this->db->insert('guru', $data);
    }
    public function edit($data)
    {
        $this->db->where('id_guru', $data['id_guru']);
        $this->db->update('guru', $data);
    }
    public function hapus($data)
    {
        $this->db->where('id_guru', $data['id_guru']);
        $this->db->delete('guru', $data);
    }
}

/* End of file M_guru.php */
