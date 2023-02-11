<?php


defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Menu_model', 'menu');
    }

    public function index()
    {
        $data['title1'] = 'Menu Management';
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('user_menu')->result_array();
        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Menu Berhasil Ditambahkan!
             </div>');

            redirect('menu');
        }
    }
    public function submenu()
    {
        $data['title1'] = 'Submenu Management';
        $data['title'] = 'Submenu Management';
        $data['user'] = $this->db->get_where('user', ['email' =>
        $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');



        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules('titile', 'Titile', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URl', 'required');
        $this->form_validation->set_rules('icon', 'icon', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'titile' => $this->input->post('titile'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
            Sub Menu Berhasil Ditambahkan!
             </div>');

            redirect('menu/submenu');
        }
    }
    public function editMenu($id)
    {
        $this->db->update('user_menu', ['menu' => $this->input->post('menu')], ['id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu telah diedit!</div>');
        redirect('menu');
    }

    public function deleteMenu($id)
    {
        $this->db->delete('user_menu', ['id' => $id]);
        $this->db->delete('user_sub_menu', ['menu_id' => $id]);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Menu telah dihapus!</div>');
        redirect('menu');
    }
    public function editSubMenu($id)
    {
        $this->menu->saveSubMenu($id);

        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Menu Telah Di Edit!</div>');
        redirect('menu/submenu');
    }

    public function deleteSubMenu($id)
    {
        $this->menu->deleteSubMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Menu Telah Di Hapus!</div>');
        redirect('menu/submenu');
    }

    // public function pengumuman()
    // {
    //     $data['title1'] = 'Website||SMK-MA';
    //     $data['title'] = 'Pengumuman';
    //     $data['user'] = $this->db->get_where('user', ['email' =>
    //     $this->session->userdata('email')])->row_array();
    //     $data['pengumuman'] = $this->db->get('tbl_pengumuman')->result_array();

    //     $this->form_validation->set_rules('judul_pengumuman', 'Judul Pengumuman', 'required');
    //     $this->form_validation->set_rules('isi_pengumuman', 'Isi Pengumuman', 'required');
    //     $this->form_validation->set_rules('tgl', 'Tanggal', 'required');
    //     if ($this->form_validation->run() == false) {

    //         $this->load->view('templates/header', $data);
    //         $this->load->view('templates/sidebar', $data);
    //         $this->load->view('templates/topbar', $data);
    //         $this->load->view('admin/pengumuman', $data);
    //         $this->load->view('templates/footer');
    //     } else {
    //         $data = [
    //             'judul_pengumuman' => $this->input->post('judul_pengumuman'),
    //             'isi_pengumuman' => $this->input->post('isi_pengumuman'),
    //             'tgl' => $this->input->post('tgl')

    //         ];
    //         $this->db->insert('tbl_pengumuman', $data);
    //         $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">
    //     Pengumuman Berhasil Ditambahkan!
    //      </div>');

    //         redirect('menu/pengumuman');
    //     }
    // }
    // public function editPengumuman($id_pengumuman)
    // {
    //     $data = array(
    //         'judul_pengumuman' => $this->input->post('judul_pengumuman'),
    //         'isi_pengumuman' => $this->input->post('isi_pengumuman'),
    //         'tgl' => $this->input->post('tgl')
    //     );
    //     $this->db->where('id_pengumuman', $id_pengumuman);
    //     $this->db->update('tbl_pengumuman', $data);
    //     $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Pengumuman Telah Di Edit!</div>');
    //     redirect('menu/pengumuman');
    // }
}

/* End of file Menu.php */
