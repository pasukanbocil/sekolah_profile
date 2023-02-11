<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Matpel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('m_matpel');
    }


    public function index()
    {
        $data = array(
            'matpel' => $this->m_matpel->lists()
        );

        $data['title1'] = 'Data Mata Pelajaran';
        $data['title'] = 'Mata Pelajaran';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('matpel/matpel', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $data = array(
            'nama_mapel' => $this->input->post('nama_mapel')
        );
        $this->m_matpel->tambah($data);
        $this->session->set_flashdata('pesan', 'Data Telah Berhasil Di Tambahkan!');
        redirect('matpel');
    }
    public function edit($id_mapel)
    {
        $data = array(
            'id_mapel' => $id_mapel,
            'nama_mapel' => $this->input->post('nama_mapel')
        );
        $this->m_matpel->edit($data);
        $this->session->set_flashdata('pesan', 'Data Telah Berhasil Di Ubah!');
        redirect('matpel');
    }
    public function hapus($id_mapel)
    {
        $data = array(
            'id_mapel' => $id_mapel,
        );
        $this->m_matpel->hapus($data);
        $this->session->set_flashdata('pesan', 'Data Telah Berhasil Di Hapus!');
        redirect('matpel');
    }
}

/* End of file Matpel.php */
