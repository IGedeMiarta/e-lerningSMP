<?php

class Mapel_model extends CI_Model
{
    public function getAllDataMapel()
    {
        return $this->db->get('mapel')->result_array();
    }

    public function insertDataMapel()
    {

        $data = [
            'nama_mapel' => htmlspecialchars($this->input->post('nama_mapel', true)),
            'is_active' => htmlspecialchars($this->input->post('is_active', true))
        ];

        $this->db->insert('mapel', $data);
    }
}
