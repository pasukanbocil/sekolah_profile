<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_modul extends CI_Model
{
    public function tampil()   //tampil data
    {
        $this->db->select('*');
        $this->db->from('file');
        $this->db->order_by('id_file', 'asc');
        return $this->db->get()->result();
    }
    public function tambah($data)   //tambah data
    {
        $this->db->insert('file', $data);
    }
    public function edit($data)   //edit data
    {
        $this->db->where('id_file', $data['id_file']);
        $this->db->update('file', $data);
    }
    public function hapus($data)    //hapus data
    {
        $this->db->where('id_file', $data['id_file']);
        $this->db->delete('file', $data);
    }
    public function detail($id_file)    //detail data   
    {
        $this->db->select('*');
        $this->db->from('file');
        $this->db->where('id_file', $id_file);
        return $this->db->get()->row();
    }
}

/* End of file M_modul.php */
