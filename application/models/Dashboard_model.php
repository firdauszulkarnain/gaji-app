<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard_Model extends CI_Model
{
    public function hitung_perusahaan()
    {
        return $this->db->get('perusahaan')->num_rows();
    }

    public function hitung_jabatan()
    {
        return $this->db->get('jabatan')->num_rows();
    }

    public function hitung_pegawai()
    {
        return $this->db->get('pegawai')->num_rows();
    }

    public function hitung_hadir()
    {
        return $this->db->get('kehadiran', ['date' => date('Y-m-d')])->num_rows();
    }

    public function gaji_pegawai()
    {
        $hari = date('d');
        $pegawai = $this->db->get_where('pegawai', ['DAY(tgl_masuk)' => $hari])->result_array();

        if ($pegawai != NULL) {
            foreach ($pegawai as $pg) {
                $idPegawai = $pg['id_pegawai'];
                $this->db->select('*');
                $this->db->from('pegawai p');
                $this->db->join('jabatan j', 'j.id_jabatan = p.id_jabatan');
                $this->db->where('p.id_pegawai', $idPegawai);
                $gaji = $this->db->get()->row_array();
                $gajiTotal = (int)$gaji['gaji_pokok'] + (int)$gaji['tj_makan'] + (int)$gaji['tj_transportasi'];

                $cari = $this->db->get_where('gaji', ['id_pegawai' => $idPegawai])->row_array();
                if ($cari == NULL) {
                    $pegawai = $this->db->get_where('pegawai', ['id_pegawai' => $idPegawai])->row_array();
                    $tgl_masuk = $pegawai['tgl_masuk'];
                    $tglGaji = date('Y-m-d', strtotime('+1 month', strtotime($tgl_masuk)));
                    if (date('Y-m-d') == $tglGaji) {
                        $data = [
                            'id_pegawai' => $idPegawai,
                            'tanggal' => $tglGaji,
                            'gaji_total' => $gajiTotal
                        ];
                        $this->db->insert('gaji', $data);
                    }
                } else {
                    $this->db->select('*');
                    $this->db->from('gaji');
                    $this->db->where('id_pegawai', $idPegawai);
                    $this->db->order_by('id_gaji', 'DESC');
                    $this->db->limit(1);
                    $gajiLama = $this->db->get()->row_array();
                    $tglGajiLama = $gajiLama['tanggal'];
                    $tglGaji = date('Y-m-d', strtotime('+1 month', strtotime($tglGajiLama)));
                    if ($tglGajiLama != date('Y-m-d')) {
                        $data = [
                            'id_pegawai' => $idPegawai,
                            'tanggal' => $tglGaji,
                            'gaji_total' => $gajiTotal
                        ];
                        $this->db->insert('gaji', $data);
                    }
                }
            }
        }
    }
}
