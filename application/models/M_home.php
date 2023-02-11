<?php

defined('BASEPATH') or exit('No direct script access allowed');

class M_home extends CI_Model
{
    public function modul()
    {
        $this->db->select('*');
        $this->db->from('file');
        $this->db->order_by('id_file', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function guru()
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->order_by('id_guru', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
    public function berita()
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->order_by('id_berita', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
    public function galery()
    {
        $this->db->select('*');
        $this->db->from('galery');
        // $this->db->limit(3);
        $this->db->order_by('id_galery', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
    public function kepsek()
    {
        $this->db->select('*');
        $this->db->from('kepsek');
        $this->db->order_by('id_kepsek', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
    public function pengumuman()
    {
        $this->db->select('*');
        $this->db->from('pengumuman');
        $this->db->order_by('id_pengumuman', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
    public function beritahome()
    {
        $this->db->select('*');
        $this->db->from('berita');
        $this->db->limit(2);
        $this->db->order_by('id_berita', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
    public function guruhome()
    {
        $this->db->select('*');
        $this->db->from('guru');
        $this->db->limit(4);
        $this->db->order_by('id_guru', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
    public function pengumumanhome()
    {
        $this->db->select('*');
        $this->db->from('pengumuman');
        $this->db->limit(3);
        $this->db->order_by('id_pengumuman', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
    public function galeryhome()
    {
        $this->db->select('*');
        $this->db->from('galery');
        $this->db->limit(3);
        $this->db->order_by('id_galery', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
    public function siswa()
    {
        $this->db->select('*');
        $this->db->from('siswa');
        $this->db->order_by('id_siswa', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
}

/* End of file M_home php */
