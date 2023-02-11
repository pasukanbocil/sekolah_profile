<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_galery extends CI_Model
{
    public function tampil()
    {
        $this->db->select('*');
        $this->db->from('galery');

        $this->db->order_by('id_galery', 'asc');
        return $this->db->get()->result();
    }
    public function detail($id_galery)
    {
        $this->db->select('*');
        $this->db->from('galery');
        $this->db->where('id_galery', $id_galery);
        return $this->db->get()->row();
    }
    public function tambah($data) //tambah data
    {
        $this->db->insert('galery', $data); //nama tabel dan data
    }
    public function edit($data) //edit data
    {
        $this->db->where('id_galery', $data['id_galery']); //nama tabel dan data
        $this->db->update('galery', $data); //nama tabel dan data
    }
    public function hapus($data)
    {
        $this->db->where('id_galery', $data['id_galery']); //nama tabel dan data
        $this->db->delete('galery', $data); //nama tabel dan data
    }
}

/* End of file M_galery.php */
