<?php

class Siswa_model extends CI_Model
{
    public function getAllDataSiswa()
    {
        $query = " SELECT `siswa`. *, `kelas`.`nama_kelas`, `role`.`role`
        FROM `siswa`
        JOIN `kelas`
        ON `siswa`.`id_kelas`= `kelas`.`id`
        JOIN `role`
        ON `siswa`.`role_id` = `role`.`id`
        ";
        return $this->db->query($query)->result_array();
    }

    public function insertDataSiswa()
    {

        $data = [
            'nama_siswa' => htmlspecialchars($this->input->post('nama_siswa', true)),
            'no_regis'        => $this->input->post('no_regis', true),
            'jenis_kelamin'  => $this->input->post('jenis_kelamin', true),
            'id_kelas'   => $this->input->post('id_kelas', true),
            'email'   => htmlspecialchars($this->input->post('email', true)),
            'password'   => password_hash($this->input->post('no_regis'), PASSWORD_DEFAULT),
            'gambar' => 'default.png',
            'role_id'   => 3,
            'is_active'   => 1,
        ];

        $this->db->insert('siswa', $data);
    }

    public function getDataSiswaById($id)
    {
        $query = " SELECT `siswa`. *, `kelas`.`nama_kelas`, `role`.`role`
        FROM `siswa`
        JOIN `kelas`
        ON `siswa`.`id_kelas`= `kelas`.`id`
        JOIN `role`
        ON `siswa`.`role_id` = `role`.`id`
        WHERE `siswa`.`id` = $id
        ";

        return $this->db->query($query)->row_array();
    }

    public function getDataSiswaBykelas($id_kelas)
    {
        $query = " SELECT `siswa`. *, `kelas`.`nama_kelas`, `role`.`role`
        FROM `siswa`
        JOIN `kelas`
        ON `siswa`.`id_kelas`= `kelas`.`id`
        JOIN `role`
        ON `siswa`.`role_id` = `role`.`id`
        WHERE `siswa`.`id_kelas` = $id_kelas
        ";

        return $this->db->query($query)->result_array();
    }

    public function updateDataSiswa()
    {
        $data = [
            'nama_siswa' => $this->input->post('nama_siswa'),
            'no_regis'        => $this->input->post('no_regis', true),
            'jenis_kelamin'  => $this->input->post('jenis_kelamin'),
            'id_kelas'   => $this->input->post('id_kelas'),
            'email'   => $this->input->post('email')
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('siswa', $data);
    }
}
