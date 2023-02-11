<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Galery extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_galery');
    }


    public function index()
    {

        $data = array(
            'galery' => $this->m_galery->tampil()
        );

        $data['title1'] = 'Data Galery';
        $data['title'] = 'Galery';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('galery/galery', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $this->form_validation->set_rules('nama_galey', 'Nama Galery', 'required');


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './sampul/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('sampul')) {


                $data = array(
                    'error' => $this->upload->display_errors()
                );

                $data['title1'] = 'Tambah Galery';
                $data['title'] = 'Galery';
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('galery/tambah', $data);
                $this->load->view('templates/footer');
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './sampul/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_galey' => $this->input->post('nama_galey'),
                    'sampul' => $upload_data['uploads']['file_name']
                );
                $this->m_galery->tambah($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Di Tambahkan!');

                redirect('galery');
            }
        }
        $data['title1'] = 'Tambah Galery';
        $data['title'] = 'Galery';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('galery/tambah', $data);
        $this->load->view('templates/footer');
    }
    public function edit($id_galery)
    {
        $this->form_validation->set_rules('nama_galey', 'Nama Galery', 'required');


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './sampul/';
            $config['allowed_types']        = 'gif|jpg|png|jpeg';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('sampul')) {


                $data = array(
                    'galery' => $this->m_galery->detail($id_galery),
                    'error' => $this->upload->display_errors()
                );

                $data['title1'] = 'Edit Galery';
                $data['title'] = 'Galery';
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('galery/edit', $data);
                $this->load->view('templates/footer');
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './sampul/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                //menghapus file foto lama
                $galery = $this->m_galery->detail($id_galery);
                if ($galery->sampul != "") {
                    unlink('./sampul/' . $galery->sampul);
                }
                // end menhapus foto lama
                $data = array(
                    'id_galery' => $id_galery,
                    'nama_galey' => $this->input->post('nama_galey'),
                    'sampul' => $upload_data['uploads']['file_name']
                );
                $this->m_galery->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit!');

                redirect('galery');
            }
            $data = array(
                'id_galery' => $id_galery,
                'nama_galey' => $this->input->post('nama_galey')
            );
            $this->m_galery->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit!');

            redirect('galery');
        }
        $data = array(
            'galery' => $this->m_galery->detail($id_galery)
        );
        $data['title1'] = 'Edit Galery';
        $data['title'] = 'Galery';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('galery/edit', $data);
        $this->load->view('templates/footer');
    }
    public function hapus($id_galery)
    {
        $galery = $this->m_galery->detail($id_galery);
        if ($galery->sampul != "") {
            unlink('./sampul/' . $galery->sampul);
        }
        $data = array('id_galery' => $id_galery);
        $this->m_galery->hapus($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus!');
        redirect('galery');
    }
}

/* End of file Galery.php */
