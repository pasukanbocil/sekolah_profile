<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Guru extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_guru');
        $this->load->model('m_matpel');
    }


    public function index()
    {


        $data = array(
            'guru' => $this->m_guru->lists()
        );

        $data['title1'] = 'Data Guru';
        $data['title'] = 'Guru';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/list', $data);
        $this->load->view('templates/footer');
    }

    public function tambah()
    {
        $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('tahun_perhitungan', 'Tahun Perhitungan', 'required');
        $this->form_validation->set_rules('nuptk', 'NUPTK', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('instansi_induk', 'Instansi Induk', 'required');
        $this->form_validation->set_rules('ijasah_terakhir', 'Pendidikan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tugas_tambahan', 'Tugas Tambahan', 'required');
        $this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required');
        // $this->form_validation->set_rules('foto_guru', 'Foto Guru', 'required');


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './foto_guru/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto_guru')) {


                $data = array(
                    'matpel' => $this->m_matpel->lists(),
                    'error' => $this->upload->display_errors()
                );

                $data['title1'] = 'Tambah Data Guru';
                $data['title'] = 'Guru';
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('guru/tambah', $data);
                $this->load->view('templates/footer');
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './foto_guru/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nama_guru' => $this->input->post('nama_guru'),
                    'tempat_lahir' => $this->input->post('tempat_lahir'),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                    'tahun_perhitungan' => $this->input->post('tahun_perhitungan'),
                    'nuptk' => $this->input->post('nuptk'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'instansi_induk' => $this->input->post('instansi_induk'),
                    'ijasah_terakhir' => $this->input->post('ijasah_terakhir'),
                    'alamat' => $this->input->post('alamat'),
                    'tugas_tambahan' => $this->input->post('tugas_tambahan'),
                    'id_mapel' => $this->input->post('id_mapel'),
                    'foto_guru' => $upload_data['uploads']['file_name']
                );
                $this->m_guru->tambah($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Di Tambahkan!');

                redirect('guru');
            }
        }


        $data = array(
            'matpel' => $this->m_matpel->lists()
        );

        $data['title1'] = 'Tambah Data Guru';
        $data['title'] = 'Guru';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/tambah', $data);
        $this->load->view('templates/footer');
    }
    public function edit($id_guru)
    {
        $this->form_validation->set_rules('nama_guru', 'Nama Guru', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('tahun_perhitungan', 'Tahun Perhitungan', 'required');
        $this->form_validation->set_rules('nuptk', 'NUPTK', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('instansi_induk', 'Instansi Induk', 'required');
        $this->form_validation->set_rules('ijasah_terakhir', 'Pendidikan', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        $this->form_validation->set_rules('tugas_tambahan', 'Tugas Tambahan', 'required');
        $this->form_validation->set_rules('id_mapel', 'Mata Pelajaran', 'required');
        // $this->form_validation->set_rules('foto_guru', 'Foto Guru', 'required');


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './foto_guru/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto_guru')) {


                $data = array(
                    'matpel' => $this->m_matpel->lists(),
                    'guru' => $this->m_guru->detail($id_guru),
                    'error' => $this->upload->display_errors()
                );

                $data['title1'] = 'Edit Data Guru';
                $data['title'] = 'Guru';
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('guru/edit', $data);
                $this->load->view('templates/footer');
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './foto_guru/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                //menghapus file foto lama
                $guru = $this->m_guru->detail($id_guru);
                if ($guru->foto_guru != "") {
                    unlink('./foto_guru/' . $guru->foto_guru);
                }
                // end menhapus foto lama
                $data = array(
                    'id_guru' => $id_guru,
                    'nama_guru' => $this->input->post('nama_guru'),
                    'tempat_lahir' => $this->input->post('tempat_lahir'),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                    'tahun_perhitungan' => $this->input->post('tahun_perhitungan'),
                    'nuptk' => $this->input->post('nuptk'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'instansi_induk' => $this->input->post('instansi_induk'),
                    'ijasah_terakhir' => $this->input->post('ijasah_terakhir'),
                    'alamat' => $this->input->post('alamat'),
                    'tugas_tambahan' => $this->input->post('tugas_tambahan'),
                    'id_mapel' => $this->input->post('id_mapel'),
                    'foto_guru' => $upload_data['uploads']['file_name']
                );
                $this->m_guru->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit!');

                redirect('guru');
            }
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './foto_guru/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            $data = array(
                'id_guru' => $id_guru,
                'nama_guru' => $this->input->post('nama_guru'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'tahun_perhitungan' => $this->input->post('tahun_perhitungan'),
                'nuptk' => $this->input->post('nuptk'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'instansi_induk' => $this->input->post('instansi_induk'),
                'ijasah_terakhir' => $this->input->post('ijasah_terakhir'),
                'alamat' => $this->input->post('alamat'),
                'tugas_tambahan' => $this->input->post('tugas_tambahan'),
                'id_mapel' => $this->input->post('id_mapel')
            );
            $this->m_guru->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit!');

            redirect('guru');
        }

        $data = array(
            'matpel' => $this->m_matpel->lists(),
            'guru' => $this->m_guru->detail($id_guru)
        );

        $data['title1'] = 'Edit Data Guru';
        $data['title'] = 'Guru';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('guru/edit', $data);
        $this->load->view('templates/footer');
    }

    public function hapus($id_guru)
    {
        //menghapus file foto lama
        $guru = $this->m_guru->detail($id_guru);
        if ($guru->foto_guru != "") {
            unlink('./foto_guru/' . $guru->foto_guru);
        }
        // end menhapus foto lama
        $data = array('id_guru' => $id_guru);
        $this->m_guru->hapus($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus!');

        redirect('guru');
    }
}


/* End of file Guru.php */
