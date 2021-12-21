<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Data_Model extends CI_Model
{
    // PERUSAHAAN
    public function ambil_perusahaan()
    {
        return $this->db->get('perusahaan')->result_array();
    }
    public function tambah_perusahaan()
    {
        $namaPerusahan = htmlspecialchars(trim($this->input->post('nama_perusahaan')));
        $data = [
            'nama_perusahaan' => $namaPerusahan,
            'slug' => strtolower(str_replace(' ', '-', $namaPerusahan)),
            'alamat' => htmlspecialchars(trim($this->input->post('alamat'))),
            'jam_masuk' => $this->input->post('jam_masuk'),
            'jam_pulang' => $this->input->post('jam_pulang')
        ];

        $this->db->insert('perusahaan', $data);
    }

    public function delete_perusahaan()
    {
        $id_perusahaan = $this->input->post('id_perusahaan');
        $this->db->delete('jabatan', array('id_perusahaan' => $id_perusahaan));
        $this->db->delete('perusahaan', array('id_perusahaan' => $id_perusahaan));
    }

    public function update_perusahaan($idPerusahaan)
    {
        $namaPerusahan = htmlspecialchars(trim($this->input->post('nama_perusahaan')));
        $data = [
            'nama_perusahaan' => $namaPerusahan,
            'slug' => strtolower(str_replace(' ', '-', $namaPerusahan)),
            'alamat' => htmlspecialchars(trim($this->input->post('alamat'))),
            'jam_masuk' => $this->input->post('jam_masuk'),
            'jam_pulang' => $this->input->post('jam_pulang')
        ];

        $this->db->where('id_perusahaan', $idPerusahaan);
        $this->db->update('perusahaan', $data);
    }

    public function detail_perusahaan($slug)
    {
        return $this->db->get_where('perusahaan', ['slug' => $slug])->row_array();
    }

    public function jabatan_Perusahaan($idPerusahaan)
    {
        $query = "SELECT count(*) as jumlah, nama_jabatan 
                FROM pegawai JOIN jabatan ON pegawai.id_jabatan = jabatan.id_jabatan
                WHERE jabatan.id_perusahaan = $idPerusahaan 
                GROUP BY nama_jabatan";
        return $this->db->query($query)->result_array();
    }

    // Jabatan
    public function ambil_jabatan()
    {
        $perusahaan = $this->input->post('perusahaan');
        $this->db->select('*');
        $this->db->from('jabatan j');
        $this->db->join('perusahaan p', 'p.id_perusahaan = j.id_perusahaan');
        if ($perusahaan) {
            $this->db->where('p.id_perusahaan', $perusahaan);
        }
        return $this->db->get()->result_array();
    }

    public function tambah_jabatan()
    {
        $tj_makan = htmlspecialchars(trim(str_replace(".", "", $this->input->post('tj_makan'))));
        if ($tj_makan == NULL) {
            $tj_makan = 0;
        }

        $tj_transport = htmlspecialchars(trim(str_replace(".", "", $this->input->post('tj_transportasi'))));
        if ($tj_transport == NULL) {
            $tj_transport = 0;
        }
        $data = [
            'nama_jabatan' => htmlspecialchars(trim($this->input->post('nama_jabatan'))),
            'id_perusahaan' => $this->input->post('perusahaan'),
            'gaji_pokok' => htmlspecialchars(trim(str_replace(".", "", $this->input->post('gaji_pokok')))),
            'tj_makan' => $tj_makan,
            'tj_transportasi' => $tj_transport
        ];

        $this->db->insert('jabatan', $data);
    }

    public function update_jabatan($id)
    {
        $tj_makan = htmlspecialchars(trim(str_replace(".", "", $this->input->post('tj_makan'))));
        if ($tj_makan == NULL) {
            $tj_makan = 0;
        }

        $tj_transport = htmlspecialchars(trim(str_replace(".", "", $this->input->post('tj_transportasi'))));
        if ($tj_transport == NULL) {
            $tj_transport = 0;
        }
        $data = [
            'nama_jabatan' => htmlspecialchars(trim($this->input->post('nama_jabatan'))),
            'id_perusahaan' => $this->input->post('perusahaan'),
            'gaji_pokok' => htmlspecialchars(trim(str_replace(".", "", $this->input->post('gaji_pokok')))),
            'tj_makan' => $tj_makan,
            'tj_transportasi' => $tj_transport
        ];

        $this->db->where('id_jabatan', $id);
        $this->db->update('jabatan', $data);
    }

    public function delete_jabatan()
    {
        $id_jabatan = $this->input->post('id_jabatan');
        $this->db->delete('jabatan', array('id_jabatan' => $id_jabatan));
    }

    public function detail_jabatan($id)
    {
        $this->db->select('*');
        $this->db->from('jabatan j');
        $this->db->join('perusahaan p', 'p.id_perusahaan = p.id_perusahaan');
        $this->db->where('id_jabatan', $id);
        return $this->db->get()->row_array();
    }


    // Pegawai
    public function ambil_pegawai()
    {
        $perusahaan = $this->input->post('perusahaan');
        $jabatan = $this->input->post('jabatan');
        $this->db->select('*');
        $this->db->from('pegawai p');
        $this->db->join('jabatan j', 'j.id_jabatan = p.id_jabatan');
        $this->db->join('perusahaan t', 't.id_perusahaan = j.id_perusahaan');
        $array = [
            't.id_perusahaan' => $perusahaan,
            'j.id_jabatan' =>  $jabatan
        ];
        $array = array_filter($array);
        if ($array != NULL) {
            $this->db->where($array);
        }
        return $this->db->get()->result_array();
    }

    public function tambah_pegawai()
    {
        $namaPegawai = htmlspecialchars(trim($this->input->post('nama_pegawai')));
        $slug = strtolower(str_replace(' ', '-', $namaPegawai));
        $data = [
            'nik_pegawai' => htmlspecialchars(trim($this->input->post('nik_pegawai'))),
            'id_jabatan' => $this->input->post('jabatan'),
            'id_perusahaan' => $this->input->post('perusahaan'),
            'nama_pegawai' => $namaPegawai,
            'slug_pegawai' => $slug,
            'tgl_masuk' => htmlspecialchars(trim($this->input->post('tgl_masuk'))),
            'foto' => 'default.jpg',
            'role_id' => $this->input->post('role')
        ];

        $this->db->insert('pegawai', $data);

        $pegawai = $this->db->get_where('pegawai', ['slug_pegawai' => $slug])->row_array();
        $id_pegawai = $pegawai['id_pegawai'];

        $user = [
            'username' => htmlspecialchars(trim($this->input->post('username'))),
            'password' => htmlspecialchars(trim(password_hash($this->input->post('password'), PASSWORD_DEFAULT))),
            'id_pegawai' => $id_pegawai,
            'foto' => 'default.jpg',
            'role_id' => $this->input->post('role')
        ];
        $this->db->insert('user', $user);
    }

    public function delete_pegawai()
    {
        $id_pegawai = $this->input->post('id_pegawai');
        $this->db->delete('user', ['id_pegawai' => $id_pegawai]);
        $this->db->delete('pegawai', ['id_pegawai' => $id_pegawai]);
    }

    public function detail_pegawai($slug)
    {
        $this->db->select('*');
        $this->db->from('pegawai p');
        $this->db->join('jabatan j', 'j.id_jabatan = p.id_jabatan');
        $this->db->join('perusahaan t', 't.id_perusahaan = j.id_perusahaan');
        $this->db->where('slug_pegawai', $slug);

        return $this->db->get()->row_array();
    }
}
