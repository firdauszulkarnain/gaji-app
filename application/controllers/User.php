<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function profile()
    {
        $data['title'] = 'Profil User';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $id_user = $data['user']['id_user'];
        $data['profile'] = $this->User_Model->get_profile($id_user);
        $this->template->load('template/template', 'user/profil', $data);
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $this->User_Model->update_profil();
        $this->session->set_flashdata('pesan', 'Update Profile');
        redirect('user/profile');
    }
}
