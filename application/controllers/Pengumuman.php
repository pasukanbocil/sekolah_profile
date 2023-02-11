<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Pengumuman extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_pengumuman');
    }


    public function index()
    {
        $data = array(
            'pengumuman' => $this->m_pengumuman->tampil()
        );

        $data['title1'] = 'Data Pengumuman';
        $data['title'] = 'Pengumuman';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('pengumuman/pengumuman', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data = array(
            'judul_pengumuman' => $this->input->post('judul_pengumuman'),
            'isi_pengumuman' => $this->input->post('isi_pengumuman'),
            'tgl' => $this->input->post('tgl')
        );
        $this->m_pengumuman->tambah($data);
        $this->session->set_flashdata('pesan', 'Data Telah Berhasil Di Tambahkan!');
        redirect('pengumuman');
    }

    public function edit($id_pengumuman)
    {
        $data = array(
            'id_pengumuman' => $id_pengumuman,
            'judul_pengumuman' => $this->input->post('judul_pengumuman'),
            'isi_pengumuman' => $this->input->post('isi_pengumuman'),
            'tgl' => $this->input->post('tgl')
        );
        $this->m_pengumuman->edit($data);
        $this->session->set_flashdata('pesan', 'Data Telah Berhasil Di Ubah!');
        redirect('pengumuman');
    }
}


/* End of file Pengumuman.php */
