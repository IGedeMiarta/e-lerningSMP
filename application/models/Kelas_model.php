<?php

class Kelas_model extends CI_Model
{
    public function getAllDataKelas()
    {
        // $query = " SELECT `siswa`. *, `kelas`.`nama_kelas`, `jurusan`.`nama_jurusan`, `role`.`role`
        // FROM `siswa`
        // JOIN `kelas`
        // ON `siswa`.`id_kelas`= `kelas`.`id`
        // JOIN `jurusan`
        // ON `siswa`.`id_jurusan`= `jurusan`.`id`
        // JOIN `role`
        // ON `siswa`.`role_id` = `role`.`id`
        // ";
        // return $this->db->query($query)->result_array();
    }
}
