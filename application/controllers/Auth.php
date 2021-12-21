<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('username')) {
            if ($this->session->userdata('role') == 1) {
                redirect('dashboard');
            } else {
                redirect('pegawai');
            }
        }

        $this->form_validation->set_rules('username', 'Username', 'required|trim');
        $this->form_validation->set_rules('password', 'Password', 'required|trim');

        if ($this->form_validation->run() == FALSE) {
            $data['judul'] = 'Login';
            $this->load->view('auth/login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['username' => $username])->row_array();
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'username' => $user['username'],
                    'role' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                $this->session->set_flashdata('pesan', 'Login Gaji-App');
                if ($user['role_id'] == 1) {
                    redirect('dashboard');
                } else {
                    redirect('pegawai');
                }
            } else {
                $this->session->set_flashdata('error', 'Password Salah');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('error', 'Username Belum Terdaftar');
            redirect('auth');
        }
    }

    public function logout()
    {
        $unset_array_items = array('bulan', 'tahun', 'pegawai', 'perusahaan', 'username');
        $this->session->unset_userdata($unset_array_items);
        $this->session->set_flashdata('pesan', 'Logout Gaji-App');
        redirect('auth');
    }
}
