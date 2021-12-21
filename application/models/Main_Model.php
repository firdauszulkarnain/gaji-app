<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Main_Model extends CI_Model
{
    public function get_gaji()
    {
        if ($this->session->userdata('bulan')) {
            $bulan = $this->session->userdata('bulan');
        } else {
            $bulan = date('m');
        }

        if ($this->session->userdata('tahun')) {
            $tahun = $this->session->userdata('tahun');
        } else {
            $tahun = date('Y');
        }

        $pegawai = $this->session->userdata('pegawai');
        $perusahaan = $this->session->userdata('perusahaan');

        $this->db->select('*');
        $this->db->from('gaji g');
        $this->db->join('pegawai p', 'p.id_pegawai = g.id_pegawai');
        $this->db->join('jabatan j', 'j.id_jabatan = p.id_jabatan');
        $this->db->join('perusahaan t', 't.id_perusahaan = j.id_perusahaan');
        $array = array('MONTH(g.tanggal)' => $bulan, 'YEAR(g.tanggal)' => $tahun, 'g.id_pegawai' => $pegawai, 'j.id_perusahaan' => $perusahaan);
        $array = array_filter($array);
        $this->db->where($array);
        return $this->db->get()->result_array();
    }

    public function detail_gaji($id)
    {
        $this->db->select('*');
        $this->db->from('gaji g');
        $this->db->join('pegawai p', 'p.id_pegawai = g.id_pegawai');
        $this->db->join('jabatan j', 'j.id_jabatan = p.id_jabatan');
        $this->db->join('perusahaan t', 't.id_perusahaan = j.id_perusahaan');
        $this->db->where('g.id_gaji', $id);
        return  $this->db->get()->row_array();
    }

    public function get_kehadiran($date)
    {

        $jabatan = $this->input->post('jabatan');
        $perusahaan =  $this->input->post('perusahaan');
        $this->db->select('*');
        $this->db->from('kehadiran k');
        $this->db->join('pegawai p', 'p.id_pegawai = k.id_pegawai');
        $this->db->join('jabatan j', 'j.id_jabatan = p.id_jabatan');
        $this->db->join('perusahaan t', 't.id_perusahaan = j.id_perusahaan');

        $array = array('k.tgl_kehadiran' => $date,  't.id_perusahaan' => $perusahaan, 'j.id_jabatan' => $jabatan);
        $array = array_filter($array);
        $this->db->where($array);
        return $this->db->get()->result_array();
    }

    public function get_pegawai()
    {
        return $this->db->get('pegawai')->result_array();
    }

    public function get_perusahaan()
    {
        return $this->db->get('perusahaan')->result_array();
    }
}
