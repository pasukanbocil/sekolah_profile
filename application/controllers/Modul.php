<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Modul extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_modul');
    }

    public function index()
    {

        $data = array(
            'modul' => $this->m_modul->tampil()
        );

        $data['title1'] = 'Data Modul';
        $data['title'] = 'Modul';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('modul/modul', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $this->form_validation->set_rules('nama_file', 'Nama File', 'required');
        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './file/';
            $config['allowed_types']        = 'doc|docx|ppt|pptx|pdf|xls|xlsx|txt';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('file')) {


                $data = array(
                    'error' => $this->upload->display_errors()
                );

                $data['title1'] = 'Tambah Data Modul';
                $data['title'] = 'Modul';
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('modul/tambah', $data);
                $this->load->view('templates/footer');
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './file/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_file' => $this->input->post('nama_file'),
                    'file' => $upload_data['uploads']['file_name']
                );
                $this->m_modul->tambah($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Di Tambahkan!');

                redirect('modul');
            }
        }
        $data['title1'] = 'Tambah Data Modul';
        $data['title'] = 'Modul';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('modul/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id_file)
    {
        $this->form_validation->set_rules('nama_file', 'Nama File', 'required');



        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './file/';
            $config['allowed_types']        = 'doc|docx|ppt|pptx|pdf|xls|xlsx|txt';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('file')) {


                $data = array(
                    'modul' => $this->m_modul->detail($id_file),
                    'error' => $this->upload->display_errors()
                );

                $data['title1'] = 'Edit Data siswa';
                $data['title'] = 'Siswa';
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('modul/edit', $data);
                $this->load->view('templates/footer');
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './file/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                //menghapus file foto lama
                $modul = $this->m_modul->detail($id_file);
                if ($modul->file != "") {
                    unlink('./file/' . $modul->file);
                }
                // end menhapus foto lama
                $data = array(
                    'id_file' => $id_file,
                    'nama_file' => $this->input->post('nama_file'),
                    'file' => $upload_data['uploads']['file_name']
                );
                $this->m_modul->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit!');

                redirect('modul');
            }
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './file/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            $data = array(
                'id_file' => $id_file,
                'nama_file' => $this->input->post('nama_file'),
            );
            $this->m_modul->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit!');

            redirect('modul');
        }

        $data = array(
            'modul' => $this->m_modul->detail($id_file)
        );

        $data['title1'] = 'Edit Data Modul';
        $data['title'] = 'Modul';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('modul/edit', $data);
        $this->load->view('templates/footer');
    }
    public function hapus($id_file)
    {
        //menghapus file foto lama
        $modul = $this->m_modul->detail($id_file);  //mengambil data foto lama dari database
        if ($modul->file != "") {
            unlink('./file/' . $modul->file);   //menghapus file foto lama
        }
        // end menhapus foto lama
        $data = array('id_file' => $id_file); //membuat array untuk di kirim ke model
        $this->m_modul->hapus($data);   //kirim data ke model
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus!');  //pesan yang muncul jika berhasil di hapus pada session flashdata

        redirect('modul'); //redirect page ke halaman utama controller modul
    }
}

/* End of file Modul.php */
