<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Matapel extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // is_logged_in();
        $this->load->model('m_matapel');
    }

    public function index()
    {
        $data = array(
            'matpel' => $this->m_matapel->tampil()
        );

        $data['title1'] = 'Data Mata Pelajaran';
        $data['title'] = 'Mata Pelajaran';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('matapel/tampil', $data);
        $this->load->view('templates/footer');
    }
}

/* End of file Matapel.php */
