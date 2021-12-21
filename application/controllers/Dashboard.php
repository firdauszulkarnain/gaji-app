<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Dashboard';
        $data['perusahaan'] = $this->Dashboard_Model->hitung_perusahaan();
        $data['jabatan'] = $this->Dashboard_Model->hitung_jabatan();
        $data['pegawai'] = $this->Dashboard_Model->hitung_pegawai();
        $data['hadir'] = $this->Dashboard_Model->hitung_hadir();


        $this->Dashboard_Model->gaji_pegawai();


        $this->template->load('template/template', 'admin/dashboard', $data);
    }
}
