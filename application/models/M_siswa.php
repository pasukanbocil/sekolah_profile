<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_siswa extends CI_Model
{
    public function lists()
    {
        $this->db->select('*');
        $this->db->from('siswa');

        $this->db->order_by('id_siswa', 'asc');
        return $this->db->get()->result();
    }
    public function detail($id_siswa)
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->where('id_siswa', $id_siswa);
        return $this->db->get()->row();
    }
    public function tambah($data) //tambah data
    {
        $this->db->insert('siswa', $data); //nama tabel dan data
    }
    public function edit($data) //edit data
    {
        $this->db->where('id_siswa', $data['id_siswa']); //nama tabel dan data
        $this->db->update('siswa', $data); //nama tabel dan data
    }
    public function hapus($data) //hapus data
    {
        $this->db->where('id_siswa', $data['id_siswa']); //nama tabel dan data
        $this->db->delete('siswa', $data); //nama tabel dan data
    }
}

/* End of file M_siswa.php */
