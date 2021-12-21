<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
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
        $data['title'] = 'Dashboard Pegawai';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $id_pegawai = $data['user']['id_pegawai'];
        $data['detail'] = $this->Pegawai_Model->detail_pegawai($id_pegawai);
        $this->template->load('template/template', 'pegawai/dashboard', $data);
    }

    public function kehadiran()
    {
        $data['title'] = 'Absensi Pegawai';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $id_pegawai = $data['user']['id_pegawai'];
        $data['kehadiran'] = $this->Pegawai_Model->get_kehadiran($id_pegawai);
        $this->template->load('template/template', 'pegawai/absen/kehadiran', $data);
    }

    public function tambah_kehadiran()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $id_pegawai = $data['user']['id_pegawai'];
        $data['title'] = 'Tambah Kehadiran';
        $data['detail'] = $this->Pegawai_Model->detail_pegawai($id_pegawai);

        $this->form_validation->set_rules('report', 'Report', 'required', ['required' => 'Report Harian Tidak Boleh Kosong']);

        if ($this->form_validation->run() == false) {
            $this->template->load('template/template', 'pegawai/absen/tambah_kehadiran', $data);
        } else {
            $input =  $this->Pegawai_Model->tambah_kehadiran($id_pegawai);
            if ($input == 1) {
                $this->session->set_flashdata('error', 'Simpan Kehadiran');
                redirect('pegawai/kehadiran');
            } else {
                $this->session->set_flashdata('pesan', 'Simpan Kehadiran');
                redirect('pegawai/kehadiran');
            }
        }
    }

    public function edit_kehadiran($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $id_pegawai = $data['user']['id_pegawai'];
        $data['title'] = 'Update Kehadiran';
        $data['detail'] = $this->Pegawai_Model->detail_pegawai($id_pegawai);
        $data['report'] = $this->Pegawai_Model->get_report($id);

        $this->form_validation->set_rules('report', 'Report', 'required', ['required' => 'Report Harian Tidak Boleh Kosong']);

        if ($this->form_validation->run() == false) {
            $this->template->load('template/template', 'pegawai/absen/edit_kehadiran', $data);
        } else {
            $this->Pegawai_Model->update_kehadiran($id);
            $this->session->set_flashdata('pesan', 'Update Kehadiran');
            redirect('pegawai/kehadiran');
        }
    }

    public function bayaran()
    {
        $data['title'] = 'Data Gaji';
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $id_pegawai = $data['user']['id_pegawai'];
        $data['detail'] = $this->Pegawai_Model->get_gajiPegawai($id_pegawai);
        $this->template->load('template/template', 'pegawai/gaji/index', $data);
    }

    public function detail_bayaran($idGaji)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Detail Gaji Pegawai';
        $data['detail'] = $this->Pegawai_Model->detail_gaji($idGaji);

        $this->template->load('template/template', 'pegawai/gaji/detail_gaji', $data);
    }

    public function slip_gaji($idGaji)
    {
        $this->load->library('dompdf_gen');
        $data['laporan'] = $this->Pegawai_Model->detail_gaji($idGaji);
        $data['tanggal'] = $this->Pegawai_Model->tanggal_indo(date('Y-m-d'), true);

        $this->load->view('pegawai/gaji/slip_pdf', $data);
        $paper_size = 'A4';
        $orientation = 'potrait';
        $html = $this->output->get_output();
        $this->dompdf->set_paper($paper_size, $orientation);
        $this->dompdf->load_html($html);
        $this->dompdf->render('');
        $this->dompdf->stream('slip_gaji.pdf', array('Attachment' => 0));
    }
}
