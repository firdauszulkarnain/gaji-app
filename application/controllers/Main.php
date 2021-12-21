<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function bayaran()
    {

        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Gaji Pegawai';
        $this->Dashboard_Model->gaji_pegawai();
        $data['pegawai'] = $this->Main_Model->get_pegawai();
        $data['perusahaan'] = $this->Main_Model->get_perusahaan();
        $data['gaji'] = $this->Main_Model->get_gaji();
        if ($this->session->userdata('pegawai')) {
            $data['det_pegawai'] = $this->db->get_where('pegawai', ['id_pegawai' => $this->session->userdata('pegawai')])->row_array();
        }
        if ($this->session->userdata('perusahaan')) {
            $data['det_perusahaan'] = $this->db->get_where('perusahaan', ['id_perusahaan' => $this->session->userdata('perusahaan')])->row_array();
        }
        $this->template->load('template/template', 'admin/main/gaji/gaji', $data);
    }

    public function detail_bayaran($idGaji)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Detail Gaji Pegawai';
        $data['detail'] = $this->Main_Model->detail_gaji($idGaji);

        $this->template->load('template/template', 'admin/main/gaji/detail_gaji', $data);
    }

    public function cari_gaji()
    {
        $pegawai = $this->input->post('pegawai');
        $perusahaan = $this->input->post('perusahaan');
        $bulan = $this->input->post('bulan');
        $tahun = $this->input->post('tahun');

        $data = [
            'pegawai' =>  $pegawai,
            'perusahaan' =>  $perusahaan,
            'bulan' =>  $bulan,
            'tahun' =>  $tahun,
        ];
        $this->session->set_userdata($data);

        redirect('main/bayaran');
    }

    public function absensi()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Data Kehadiran Pegawai';
        if ($this->input->post('tanggal')) {
            $tanggal = $this->input->post('tanggal');
        } else {
            $tanggal = date('Y-m-d');
        }
        $data['perusahaan'] = $this->Main_Model->get_perusahaan();
        $data['kehadiran'] = $this->Main_Model->get_kehadiran($tanggal);
        if ($this->input->post('perusahaan')) {
            $isi = $this->db->get_where('perusahaan', ['id_perusahaan' => $this->input->post('perusahaan')])->row_array();
            $perusahaan = $isi['nama_perusahaan'];
        } else {
            $perusahaan = 'Semua Perusahaan';
        }

        if ($this->input->post('jabatan')) {
            $isi = $this->db->get_where('jabatan', ['id_jabatan' => $this->input->post('jabatan')])->row_array();
            $jabatan = $isi['nama_jabatan'];
        } else {
            $jabatan = 'Semua Jabatan';
        }
        $data['detail'] = ['tanggal' => $tanggal, 'perusahaan' => $perusahaan, 'jabatan' => $jabatan];
        $data['detail'] = array_filter($data['detail']);


        $this->template->load('template/template', 'admin/main/kehadiran/kehadiran', $data);
    }
}
