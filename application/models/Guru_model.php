<?php

class Guru_model extends CI_Model
{
    public function getAllDataGuru()
    {
        $query = " SELECT `guru`. *, `role`.`role`
        FROM `guru`
        JOIN `role`
        ON `guru`.`role_id` = `role`.`id`
        ";
        return $this->db->query($query)->result_array();
    }

    public function insertDataGuru()
    {

        $data = [
            'no_regis'       => $this->input->post('no_regis'),
            'nama'      => htmlspecialchars($this->input->post('nama')),
            'email'    => htmlspecialchars($this->input->post('email')),
            'password'    => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'gambar'    => "default.png",
            'role_id'    => $this->input->post('role_id')
        ];

        $this->db->insert('guru', $data);
    }

    public function getDataGuruById($id)
    {
        $query = "SELECT `guru`. *, `role`.`role`
        FROM `guru`
        JOIN `role`
        ON `guru`.`role_id` = `role`.`id`
        WHERE `guru`.`id` = $id
        ";
        return $this->db->query($query)->row_array();
        // return $this->db->get_where('guru', ['id' => $id])->row_array();
    }

    public function updateDataGuru()
    {
        $data = [
            "nama" => $this->input->post('nama', true),
            "email" => $this->input->post('email', true),
            "is_active" => $this->input->post('is_active', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('guru', $data);
    }
}
