<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Berita extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_berita');
    }

    public function index()
    {
        $data = array(
            'berita' => $this->m_berita->tampil()
        );

        $data['title1'] = 'Data Berita';
        $data['title'] = 'Berita';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('berita/berita', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required');
        $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required');
        // $this->form_validation->set_rules('gambar_berita', 'Gambar Berita', 'required');
        $this->form_validation->set_rules('tgl_berita', 'Tanggal Berita', 'required');


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './gambar_berita/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar_berita')) {


                $data = array(
                    'error' => $this->upload->display_errors()
                );

                $data['title1'] = 'Tambah Berita';
                $data['title'] = 'Berita';
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('berita/tambah', $data);
                $this->load->view('templates/footer');
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar_berita/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'judul_berita' => $this->input->post('judul_berita'),
                    'isi_berita' => $this->input->post('isi_berita'),
                    'gambar_berita' => $upload_data['uploads']['file_name'],
                    'tgl_berita' => $this->input->post('tgl_berita')
                );
                $this->m_berita->tambah($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Di Tambahkan!');

                redirect('berita');
            }
        }
        $data['title1'] = 'Tambah Berita';
        $data['title'] = 'Berita';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('berita/tambah', $data);
        $this->load->view('templates/footer');
    }
    public function edit($id_berita)
    {
        $this->form_validation->set_rules('judul_berita', 'Judul Berita', 'required');
        $this->form_validation->set_rules('isi_berita', 'Isi Berita', 'required');
        // $this->form_validation->set_rules('gambar_berita', 'Gambar Berita', 'required');
        $this->form_validation->set_rules('tgl_berita', 'Tanggal Berita', 'required');


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './gambar_berita/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('gambar_berita')) {


                $data = array(
                    'berita' => $this->m_berita->detail($id_berita),
                    'error' => $this->upload->display_errors()
                );

                $data['title1'] = 'Edit Berita';
                $data['title'] = 'Siswa';
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('berita/edit', $data);
                $this->load->view('templates/footer');
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './gambar_berita/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                //menghapus file foto lama
                $berita = $this->m_berita->detail($id_berita);
                if ($berita->gambar_berita != "") {
                    unlink('./gambar_berita/' . $berita->gambar_berita);
                }
                // end menhapus foto lama
                $data = array(
                    'id_berita' => $id_berita,
                    'judul_berita' => $this->input->post('judul_berita'),
                    'isi_berita' => $this->input->post('isi_berita'),
                    'tgl_berita' => $this->input->post('tgl_berita'),
                    'gambar_berita' => $upload_data['uploads']['file_name']
                );
                $this->m_berita->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit!');

                redirect('berita');
            }
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './gambar_berita/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            $data = array(
                'id_berita' => $id_berita,
                'judul_berita' => $this->input->post('judul_berita'),
                'isi_berita' => $this->input->post('isi_berita'),
                'tgl_berita' => $this->input->post('tgl_berita')
            );
            $this->m_berita->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit!');

            redirect('berita');
        }

        $data = array(
            'berita' => $this->m_berita->detail($id_berita)
        );

        $data['title1'] = 'Edit Berita';
        $data['title'] = 'Berita';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('berita/edit', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id_berita)
    {
        $berita = $this->m_berita->detail($id_berita);
        if ($berita->gambar_berita != "") {
            unlink('./gambar_berita/' . $berita->gambar_berita);
        }
        $data = array('id_berita' => $id_berita);
        $this->m_berita->hapus($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus!');
        redirect('berita');
    }
}

/* End of file Berita.php */
