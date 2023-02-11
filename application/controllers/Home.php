<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_home');
        is_logged_in();
    }

    public function index()
    {
        $data = array(
            'title' => 'SMK MATHLA’UL ANWAR',
            'guru' => $this->m_home->guruhome(),
            'berita' => $this->m_home->beritahome(),
            'galery' => $this->m_home->galeryhome(),
            'pengumuman' => $this->m_home->pengumumanhome(),
            'isi' => 'v_home'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    }

    public function modul()
    {
        $data = array(
            'title' => 'SMK MATHLA’UL ANWAR',
            'modul' => $this->m_home->modul(),
            'isi' => 'v_modul'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    }

    public function guru()
    {
        $data = array(
            'title' => 'SMK MATHLA’UL ANWAR',
            'guru' => $this->m_home->guru(),
            'isi' => 'v_guru'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    }

    public function berita()
    {
        $data = array(
            'title' => 'SMK MATHLA’UL ANWAR',
            'berita' => $this->m_home->berita(),
            'isi' => 'v_berita'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    }
    public function galery()
    {
        $data = array(
            'title' => 'SMK MATHLA’UL ANWAR',
            'galery' => $this->m_home->galery(),
            'isi' => 'v_galery'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    }
    public function kepsek()
    {
        $data = array(
            'title' => 'SMK MATHLA’UL ANWAR',
            'kepsek' => $this->m_home->kepsek(),
            'isi' => 'v_kepsek'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    }
    public function about()
    {
        $data = array(
            'title' => 'SMK MATHLA’UL ANWAR',
            'isi' => 'v_about'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    }

    public function pengumuman()
    {
        $data = array(
            'title' => 'SMK MATHLA’UL ANWAR',
            'pengumuman' => $this->m_home->pengumuman(),
            'isi' => 'v_pengumuman'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    }
    public function siswa()
    {
        $data = array(
            'title' => 'SMK MATHLA’UL ANWAR',
            'siswa' => $this->m_home->siswa(),
            'isi' => 'v_siswa'
        );
        $this->load->view('layout/v_wrapper', $data, FALSE);
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
    }
}


/* End of file Home.php */
