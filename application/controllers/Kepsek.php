<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Kepsek extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kepsek');
    }


    public function index()
    {
        $data = array(
            'kepsek' => $this->m_kepsek->tampil()
        );

        $data['title1'] = 'Data Kepala Sekolah';
        $data['title'] = 'Kepala Sekolah';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kepsek/kepsek', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $this->form_validation->set_rules('nama_kepsek', 'Nama Kepala Sekolah', 'required');
        $this->form_validation->set_rules('visi_misi', 'Visi Misi', 'required');
        // $this->form_validation->set_rules('foto_guru', 'Foto Guru', 'required');


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './foto_kepsek/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto_kepsek')) {


                $data = array(
                    'error' => $this->upload->display_errors()
                );

                $data['title1'] = 'Tambah Data Kepala Sekolah';
                $data['title'] = 'Kepala Sekolah';
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('kepsek/tambah', $data);
                $this->load->view('templates/footer');
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './foto_kepsek/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_kepsek' => $this->input->post('nama_kepsek'),
                    'visi_misi' => $this->input->post('visi_misi'),
                    'foto_kepsek' => $upload_data['uploads']['file_name']
                );
                $this->m_kepsek->tambah($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Di Tambahkan!');

                redirect('kepsek');
            }
        }
        $data['title1'] = 'Tambah Data Kepala Sekolah';
        $data['title'] = 'Kepala Sekolah';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kepsek/tambah', $data);
        $this->load->view('templates/footer');
    }
    public function edit($id_kepsek)
    {
        $this->form_validation->set_rules('nama_kepsek', 'Nama Kepala Sekolah', 'required');
        $this->form_validation->set_rules('visi_misi', 'Visi Misi', 'required');
        // $this->form_validation->set_rules('foto_siswa', 'Foto siswa', 'required');   


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './foto_kepsek/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto_kepsek')) {


                $data = array(
                    'kepsek' => $this->m_kepsek->detail($id_kepsek),
                    'error' => $this->upload->display_errors()
                );

                $data['title1'] = 'Edit Data Kepala Sekolah';
                $data['title'] = 'Kepala Sekolah';
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('kepsek/edit', $data);
                $this->load->view('templates/footer');
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './foto_kepsek/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                //menghapus file foto lama
                $kepsek = $this->m_kepsek->detail($id_kepsek);
                if ($kepsek->foto_kepsek != "") {
                    unlink('./foto_kepsek/' . $kepsek->foto_kepsek);
                }
                // end menhapus foto lama
                $data = array(
                    'id_kepsek' => $id_kepsek,
                    'nama_kepsek' => $this->input->post('nama_kepsek'),
                    'visi_misi' => $this->input->post('visi_misi'),
                    'foto_kepsek' => $upload_data['uploads']['file_name']
                );
                $this->m_kepsek->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit!');

                redirect('kepsek');
            }
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './foto_siswa/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            $data = array(
                'id_kepsek' => $id_kepsek,
                'nama_kepsek' => $this->input->post('nama_kepsek'),
                'visi_misi' => $this->input->post('visi_misi')
            );
            $this->m_kepsek->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit!');

            redirect('kepsek');
        }

        $data = array(
            'kepsek' => $this->m_kepsek->detail($id_kepsek),
        );

        $data['title1'] = 'Edit Data Kepala Sekolah';
        $data['title'] = 'Kepala Sekolah';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('kepsek/edit', $data);
        $this->load->view('templates/footer');
    }
    public function hapus($id_kepsek)
    {
        $kepsek = $this->m_kepsek->detail($id_kepsek);
        if ($kepsek->foto_kepsek != "") {
            unlink('./foto_kepsek/' . $kepsek->foto_kepsek);
        }
        $data = array('id_kepsek' => $id_kepsek);
        $this->m_kepsek->hapus($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus!');
        redirect('kepsek');
    }
}

/* End of file Kepsek.php */
