<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai_Model extends CI_Model
{
    public function detail_pegawai($id_pegawai)
    {
        $this->db->select('*');
        $this->db->from('pegawai p');
        $this->db->join('jabatan j', 'j.id_jabatan = p.id_jabatan');
        $this->db->join('perusahaan t', 't.id_perusahaan = j.id_perusahaan');
        $this->db->where('p.id_pegawai', $id_pegawai);
        return $this->db->get()->row_array();
    }

    public function get_kehadiran($id_pegawai)
    {
        $this->db->select('*');
        $this->db->from('kehadiran k');
        $this->db->join('pegawai p', 'p.id_pegawai = k.id_pegawai');
        $this->db->join('jabatan j', 'j.id_jabatan = p.id_jabatan');
        $this->db->join('perusahaan t', 't.id_perusahaan = j.id_perusahaan');
        $this->db->where('p.id_pegawai', $id_pegawai);
        $this->db->order_by('k.id_kehadiran', 'DESC');
        return $this->db->get()->result_array();
    }

    public function tambah_kehadiran($idpegawai)
    {
        $this->db->select('*');
        $this->db->from('kehadiran');
        $this->db->where('id_pegawai', $idpegawai);
        $this->db->order_by('id_kehadiran', 'desc');
        $this->db->limit('1');
        $kehadiran = $this->db->get()->row_array();
        $tanggalAbsenLama = $kehadiran['tgl_kehadiran'];

        if ($tanggalAbsenLama == date('Y-m-d')) {
            return 1;
        }

        $report = $this->input->post('report');
        $data = [
            'id_pegawai' => $this->input->post('id_pegawai'),
            'kehadiran' => 1,
            'report' => $report,
            'tgl_kehadiran' => date('Y-m-d')
        ];

        $this->db->insert('kehadiran', $data);
    }

    public function update_kehadiran($id)
    {
        $data = [
            'report' => $this->input->post('report')
        ];
        $this->db->where('id_kehadiran', $id);
        $this->db->update('kehadiran', $data);
    }

    public function get_report($id)
    {
        return $this->db->get_where('kehadiran', ['id_kehadiran' => $id])->row_array();
    }

    public function get_gajiPegawai($idPegawai)
    {
        $this->db->select('*');
        $this->db->from('gaji g');
        $this->db->join('pegawai p', 'p.id_pegawai = g.id_pegawai');
        $this->db->join('jabatan j', 'j.id_jabatan = p.id_jabatan');
        $this->db->join('perusahaan t', 't.id_perusahaan = j.id_perusahaan');
        $this->db->where('p.id_pegawai', $idPegawai);
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

    public function tanggal_indo($tanggal, $cetak_hari = false)
    {
        $hari = array(
            1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );

        $bulan = array(
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
        );
        $split       = explode('-', $tanggal);
        $tgl_indo = $split[2] . ' ' . $bulan[(int)$split[1]] . ' ' . $split[0];

        if ($cetak_hari) {
            $num = date('N', strtotime($tanggal));
            return $hari[$num] . ', ' . $tgl_indo;
        }
        return $tgl_indo;
    }
}
