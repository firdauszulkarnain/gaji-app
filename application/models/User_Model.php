<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends CI_Model
{
    public function get_profile($iduser)
    {
        $this->db->select('*');
        $this->db->from('user u');
        $this->db->join('pegawai p', 'p.id_pegawai = u.id_pegawai');
        $this->db->join('jabatan j', 'j.id_jabatan = p.id_jabatan');
        $this->db->join('perusahaan t', 't.id_perusahaan = j.id_perusahaan');
        $this->db->where('u.id_user', $iduser);
        return $this->db->get()->row_array();
    }

    public function update_profil()
    {
        $idUser = $this->input->post('id_user');
        $idPegawai = $this->input->post('id_pegawai');
        $data['user'] = $this->db->get_where('user', ['id_user' => $idUser])->row_array();
        // Cek Gambar
        $image = $_FILES['image']['name'];
        if ($image) {
            $config['allowed_types'] = 'jpeg|jpg|png';
            $config['max_size']     = '2048';
            $config['upload_path'] = './assets/img/profile';
            $this->load->library('upload', $config);
            if ($this->upload->do_upload('image')) {
                $old_image = $data['user']['foto'];
                if ($old_image != 'Default.jpg') {
                    unlink(FCPATH . 'assets/img/profile/' . $old_image);
                }
                $new_image = $this->upload->data('file_name');
                $this->db->set('foto', $new_image);
                $this->db->where('id_user', $idUser);
                $this->db->update('user');
            } else {
                echo $this->upload->display_errors();
            }
        }



        $pegawai = $this->db->get_where('user', ['id_user' => $idUser])->row_array();
        $foto = $pegawai['foto'];
        $namaPegawai =  $this->input->post('nama_pegawai');
        $slug = strtolower(str_replace(' ', '-', $namaPegawai));

        $data = [
            'nama_pegawai' => $namaPegawai,
            'slug_pegawai' => $slug,
            'foto' => $foto
        ];
        $this->db->where('id_pegawai', $idPegawai);
        $this->db->update('pegawai', $data);
    }
}
