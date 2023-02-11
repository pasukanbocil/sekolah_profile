<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
    }

    // public function guru()
    // {
    //     $data['title1'] = 'Website||SMK-MA';
    //     $data['title'] = 'Guru';
    //     $data['user'] = $this->db->get_where('user', ['email' =>
    //     $this->session->userdata('email')])->row_array();

    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('data/guru', $data);
    //     $this->load->view('templates/footer');
    // }
    // public function pengumuman()
    // {
    //     $data['title1'] = 'Website||SMK-MA';
    //     $data['title'] = 'Pengumuman';
    //     $data['user'] = $this->db->get_where('user', ['email' =>
    //     $this->session->userdata('email')])->row_array();
    //     $this->load->model('Menu_model', 'data');

    //     $data['dataPengumuman'] = $this->data->getDataPengumuman();
    //     $data['data'] = $this->db->get('pengumuman')->result_array();


    //     $this->load->view('templates/header', $data);
    //     $this->load->view('templates/sidebar', $data);
    //     $this->load->view('templates/topbar', $data);
    //     $this->load->view('data/pengumuman', $data);
    //     $this->load->view('templates/footer');
    // }
}

/* End of file Data.php */
