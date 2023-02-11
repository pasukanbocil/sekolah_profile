<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Siswa extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_siswa');
    }


    public function index()
    {

        $data = array(
            'siswa' => $this->m_siswa->lists()
        );

        $data['title1'] = 'Data Siswa';
        $data['title'] = 'Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/siswa', $data);
        $this->load->view('templates/footer');
    }
    public function tambah()
    {
        $this->form_validation->set_rules('nisn', 'NISN', 'required');
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        // $this->form_validation->set_rules('foto_siswa', 'Foto siswa', 'required');


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './foto_siswa/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto_siswa')) {


                $data = array(
                    'error' => $this->upload->display_errors()
                );

                $data['title1'] = 'Tambah Data Siswa';
                $data['title'] = 'Siswa';
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('siswa/tambah', $data);
                $this->load->view('templates/footer');
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './foto_siswa/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                $data = array(
                    'nisn' => $this->input->post('nisn'),
                    'nama_siswa' => $this->input->post('nama_siswa'),
                    'tempat_lahir' => $this->input->post('tempat_lahir'),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'jurusan' => $this->input->post('jurusan'),
                    'kelas' => $this->input->post('kelas'),
                    'agama' => $this->input->post('agama'),
                    'alamat' => $this->input->post('alamat'),
                    'foto_siswa' => $upload_data['uploads']['file_name']
                );
                $this->m_siswa->tambah($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Di Tambahkan!');

                redirect('siswa');
            }
        }
        $data['title1'] = 'Tambah Data Siswa';
        $data['title'] = 'Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/tambah', $data);
        $this->load->view('templates/footer');
    }

    public function edit($id_siswa)
    {
        $this->form_validation->set_rules('nisn', 'NISN', 'required');
        $this->form_validation->set_rules('nama_siswa', 'Nama Siswa', 'required');
        $this->form_validation->set_rules('tempat_lahir', 'Tempat Lahir', 'required');
        $this->form_validation->set_rules('tanggal_lahir', 'Tanggal Lahir', 'required');
        $this->form_validation->set_rules('jenis_kelamin', 'Jenis Kelamin', 'required');
        $this->form_validation->set_rules('jurusan', 'Jurusan', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('alamat', 'Alamat', 'required');
        // $this->form_validation->set_rules('foto_siswa', 'Foto siswa', 'required');   


        if ($this->form_validation->run() == TRUE) {
            $config['upload_path'] = './foto_siswa/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 2000;
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('foto_siswa')) {


                $data = array(
                    'siswa' => $this->m_siswa->detail($id_siswa),
                    'error' => $this->upload->display_errors()
                );

                $data['title1'] = 'Edit Data siswa';
                $data['title'] = 'Siswa';
                $data['user'] = $this->db->get_where('user', ['email' =>
                $this->session->userdata('email')])->row_array();
                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('templates/topbar', $data);
                $this->load->view('siswa/edit', $data);
                $this->load->view('templates/footer');
            } else {
                $upload_data = array('uploads' => $this->upload->data());
                $config['image_library'] = 'gd2';
                $config['source_image'] = './foto_siswa/' . $upload_data['uploads']['file_name'];
                $this->load->library('image_lib', $config);
                //menghapus file foto lama
                $siswa = $this->m_siswa->detail($id_siswa);
                if ($siswa->foto_siswa != "") {
                    unlink('./foto_siswa/' . $siswa->foto_siswa);
                }
                // end menhapus foto lama
                $data = array(
                    'id_siswa' => $id_siswa,
                    'nisn' => $this->input->post('nisn'),
                    'nama_siswa' => $this->input->post('nama_siswa'),
                    'tempat_lahir' => $this->input->post('tempat_lahir'),
                    'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'jurusan' => $this->input->post('jurusan'),
                    'kelas' => $this->input->post('kelas'),
                    'agama' => $this->input->post('agama'),
                    'alamat' => $this->input->post('alamat'),
                    'foto_siswa' => $upload_data['uploads']['file_name']
                );
                $this->m_siswa->edit($data);
                $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit!');

                redirect('siswa');
            }
            $upload_data = array('uploads' => $this->upload->data());
            $config['image_library'] = 'gd2';
            $config['source_image'] = './foto_siswa/' . $upload_data['uploads']['file_name'];
            $this->load->library('image_lib', $config);
            $data = array(
                'id_siswa' => $id_siswa,
                'nisn' => $this->input->post('nisn'),
                'nama_siswa' => $this->input->post('nama_siswa'),
                'tempat_lahir' => $this->input->post('tempat_lahir'),
                'tanggal_lahir' => $this->input->post('tanggal_lahir'),
                'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                'jurusan' => $this->input->post('jurusan'),
                'kelas' => $this->input->post('kelas'),
                'agama' => $this->input->post('agama'),
                'alamat' => $this->input->post('alamat')
            );
            $this->m_siswa->edit($data);
            $this->session->set_flashdata('pesan', 'Data Berhasil Di Edit!');

            redirect('siswa');
        }

        $data = array(
            'siswa' => $this->m_siswa->detail($id_siswa)
        );

        $data['title1'] = 'Edit Data Siswa';
        $data['title'] = 'Siswa';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('siswa/edit', $data);
        $this->load->view('templates/footer');
    }
    public function hapus($id_siswa)
    {
        //menghapus file foto lama
        $siswa = $this->m_siswa->detail($id_siswa);
        if ($siswa->foto_siswa != "") {
            unlink('./foto_siswa/' . $siswa->foto_siswa);
        }
        // end menhapus foto lama
        $data = array('id_siswa' => $id_siswa);
        $this->m_siswa->hapus($data);
        $this->session->set_flashdata('pesan', 'Data Berhasil Di Hapus!');

        redirect('siswa');
    }
}

/* End of file Siswa.php */
