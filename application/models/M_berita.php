<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_berita extends CI_Model
{
    public function tampil()
    {
        $this->db->select('*');
        $this->db->from('berita');

        $this->db->order_by('id_berita', 'asc');
        return $this->db->get()->result();
    }
    public function detail($id_berita)
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->where('id_berita', $id_berita);
        return $this->db->get()->row();
    }
    public function tambah($data) //tambah data
    {
        $this->db->insert('berita', $data); //nama tabel dan data
    }
    public function edit($data) //edit data
    {
        $this->db->where('id_berita', $data['id_berita']); //nama tabel dan data
        $this->db->update('berita', $data); //nama tabel dan data
    }
    public function hapus($data)
    {
        $this->db->where('id_berita', $data['id_berita']); //nama tabel dan data
        $this->db->delete('berita', $data); //nama tabel dan data
    }
}

/* End of file M_berita.php */
