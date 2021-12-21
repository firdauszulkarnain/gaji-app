<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('username')) {
            redirect('auth');
        }
    }

    public function perusahaan()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Data Perusahaan';
        $data['perusahaan'] = $this->Data_Model->ambil_perusahaan();
        $this->template->load('template/template', 'admin/data/perusahaan/index', $data);
    }

    public function tambah_perusahaan()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Tambah Data Perusahaan';

        $this->form_validation->set_rules('nama_perusahaan', 'Nama_Perusahaan', 'required|trim|is_unique[perusahaan.nama_perusahaan]', ['required' => 'Nama Perusahaan/Cabang Tidak Boleh Kosong', 'is_unique' => 'Nama Perusahaan/Cabang Sudah Ada']);

        $this->form_validation->set_rules('alamat', 'Alamat Perusahaan', 'required|trim', ['required' => 'Alamat Perusahaan/Cabang Tidak Boleh Kosong']);

        $this->form_validation->set_rules('jam_masuk', 'Jam Masuk', 'required|trim', ['required' => 'Jam Masuk Perusahaan/Cabang Tidak Boleh Kosong']);

        $this->form_validation->set_rules('jam_pulang', 'Jam Pulang', 'required|trim', ['required' => 'Jam Pulang Perusahaan/Cabang Tidak Boleh Kosong']);

        if ($this->form_validation->run() == false) {
            $this->template->load('template/template', 'admin/data/perusahaan/tambah_perusahaan', $data);
        } else {
            $this->Data_Model->tambah_perusahaan();
            $this->session->set_flashdata('pesan', 'Tambah Data Perusahaan');
            redirect('data/perusahaan');
        }
    }

    public function delete_perusahaan()
    {
        $this->Data_Model->delete_perusahaan();
        $this->session->set_flashdata('pesan', 'Hapus Data Perusahaan');
        redirect('data/perusahaan');
    }


    public function update_perusahaan($slug)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['detail'] = $this->Data_Model->detail_perusahaan($slug);
        $namaPerusahaan = $data['detail']['nama_perusahaan'];
        $data['title'] = 'Detail ' . $namaPerusahaan;
        $idPerusahaan = $data['detail']['id_perusahaan'];
        $data['jabatan'] = $this->Data_Model->jabatan_Perusahaan($idPerusahaan);

        $this->form_validation->set_rules('nama_perusahaan', 'Nama_Perusahaan', 'required|trim', ['required' => 'Nama Perusahaan/Cabang Tidak Boleh Kosong']);

        $this->form_validation->set_rules('alamat', 'Alamat Perusahaan', 'required|trim', ['required' => 'Alamat Perusahaan/Cabang Tidak Boleh Kosong']);

        $this->form_validation->set_rules('jam_masuk', 'Jam Masuk', 'required|trim', ['required' => 'Jam Masuk Perusahaan/Cabang Tidak Boleh Kosong']);

        $this->form_validation->set_rules('jam_pulang', 'Jam Pulang', 'required|trim', ['required' => 'Jam Pulang Perusahaan/Cabang Tidak Boleh Kosong']);


        if ($this->form_validation->run() == false) {
            $this->template->load('template/template', 'admin/data/perusahaan/detail_perusahaan', $data);
        } else {
            $this->Data_Model->update_perusahaan($idPerusahaan);
            $this->session->set_flashdata('pesan', 'Update Data Perusahaan');
            redirect('data/perusahaan');
        }
    }
    // Jabatan
    public function jabatan()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Data Jabatan';
        $data['perusahaan'] = $this->Data_Model->ambil_perusahaan();
        $data['jabatan'] = $this->Data_Model->ambil_jabatan();

        $this->template->load('template/template', 'admin/data/jabatan/index', $data);
    }

    public function tambah_jabatan()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Tambah Data Jabatan';
        $data['perusahaan'] = $this->Data_Model->ambil_perusahaan();

        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required|trim|is_unique[jabatan.nama_jabatan]', ['required' => 'Nama Jabatan Tidak Boleh Kosong', 'is_unique' => 'Nama Jabatan Sudah Ada']);

        $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required|trim', ['required' => ' Perusahaan/Cabang Tidak Boleh Kosong']);

        $this->form_validation->set_rules('gaji_pokok', 'Gaji Pokok', 'required|trim', ['required' => 'Gaji Pokok Tidak Boleh Kosong']);

        if ($this->form_validation->run() == false) {
            $this->template->load('template/template', 'admin/data/jabatan/tambah_jabatan', $data);
        } else {
            $this->Data_Model->tambah_jabatan();
            $this->session->set_flashdata('pesan', 'Tambah Data Jabatan');
            redirect('data/jabatan');
        }
    }

    public function update_jabatan($id)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Update Jabatan';
        $data['detail'] = $this->Data_Model->detail_jabatan($id);
        $data['perusahaan'] = $this->Data_Model->ambil_perusahaan();

        $this->form_validation->set_rules('nama_jabatan', 'Nama Jabatan', 'required|trim', ['required' => 'Nama Jabatan Tidak Boleh Kosong']);

        $this->form_validation->set_rules('perusahaan', 'Perusahaan', 'required|trim', ['required' => ' Perusahaan/Cabang Tidak Boleh Kosong']);

        $this->form_validation->set_rules('gaji_pokok', 'Gaji Pokok', 'required|trim', ['required' => 'Gaji Pokok Tidak Boleh Kosong']);


        if ($this->form_validation->run() == false) {
            $this->template->load('template/template', 'admin/data/jabatan/update_jabatan', $data);
        } else {
            $this->Data_Model->update_jabatan($id);
            $this->session->set_flashdata('pesan', 'Update Data Jabatan');
            redirect('data/jabatan');
        }
    }

    public function delete_jabatan()
    {
        $this->Data_Model->delete_jabatan();
        $this->session->set_flashdata('pesan', 'Hapus Data Jabatan');
        redirect('data/jabatan');
    }

    // Pegawai
    public function pegawai()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Pegawai Perusahaan';
        $data['perusahaan'] = $this->Data_Model->ambil_perusahaan();
        $data['pegawai'] = $this->Data_Model->ambil_pegawai();
        $this->template->load('template/template', 'admin/data/pegawai/index', $data);
    }

    public function tambah_pegawai()
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Tambah Data Pegawai';
        $data['perusahaan'] = $this->Data_Model->ambil_perusahaan();

        $this->form_validation->set_rules('nik_pegawai', 'NIK Pegawai', 'required|trim|is_unique[pegawai.nik_pegawai]', ['required' => 'NIK Pegawai Tidak Boleh Kosong', 'is_unique' => 'NIK Pegawai Sudah Ada']);
        $this->form_validation->set_rules('nama_pegawai', 'Nama Pegawai', 'required|trim|is_unique[pegawai.nama_pegawai]', ['required' => 'Nama Pegawai Tidak Boleh Kosong', 'is_unique' => 'Nama Pegawai Sudah Ada']);
        $this->form_validation->set_rules('jabatan', 'jabatan', 'required|trim', ['required' => 'Jabatan Tidak Boleh Kosong']);
        // $this->form_validation->set_rules('gender', 'Jenis Kelamin', 'required|trim', ['required' => 'Jenis Kelamin Tidak Boleh Kosong']);
        $this->form_validation->set_rules('tgl_masuk', 'Tanggal Masuk', 'required|trim', ['required' => 'Tanggal Masuk Tidak Boleh Kosong']);
        $this->form_validation->set_rules('username', 'Username', 'required|trim', ['required' => 'Username Tidak Boleh Kosong']);
        $this->form_validation->set_rules('password', 'Password', 'required|trim', ['required' => 'Password Tidak Boleh Kosong']);

        if ($this->form_validation->run() == false) {
            $this->template->load('template/template', 'admin/data/pegawai/tambah_pegawai', $data);
        } else {
            $this->Data_Model->tambah_pegawai();
            $this->session->set_flashdata('pesan', 'Tambah Data Jabatan');
            redirect('data/pegawai');
        }
    }

    public function cari_jabatan()
    {
        $idPerusahaan = $this->input->post('id_perusahaan');
        $data = $this->db->get_where('jabatan', ['id_perusahaan' => $idPerusahaan])->result_array();
        foreach ($data as $jabatan) {
            echo '<option value="' . $jabatan['id_jabatan'] . '">' . $jabatan['nama_jabatan'] . '</option>';
        }
    }

    public function delete_pegawai()
    {
        $this->Data_Model->delete_pegawai();
        $this->session->set_flashdata('pesan', 'Hapus Data Pegawai');
        redirect('data/pegawai');
    }

    public function detail_pegawai($slug)
    {
        $data['user'] = $this->db->get_where('user', ['username' => $this->session->userdata('username')])->row_array();
        $data['title'] = 'Detail Pegawai';
        $data['detail'] = $this->Data_Model->detail_pegawai($slug);

        $this->template->load('template/template', 'admin/data/pegawai/detail_pegawai', $data);
    }
}
