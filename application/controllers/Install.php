<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Install extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $admin = $this->db->get('admin')->row_array();
        if ($admin) {
            redirect('auth');
        }
    }
    public function index()
    {
        $this->load->library('form_validation');

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[8]|matches[passconf]');
        $this->form_validation->set_rules('passconf', 'confirm password', 'required|min_length[8]|matches[password]');

        if ($this->form_validation->run() == False) {
            $this->load->view('templates/auth-header');
            $this->load->view('instalasi/index');
            $this->load->view('templates/auth-footer');
        } else {
            $data = [
                'email' => $this->input->post('email', true),
                'password' => password_hash($this->input->post('password', true), PASSWORD_DEFAULT),
                'role_id' => 1
            ];

            $this->db->insert('admin', $data);

            $this->session->set_flashdata('pesan', "
            <script>
                Swal.fire(
                    'Success',
                    'Installation success',
                    'success'
                )
            </script>
            ");

            redirect('auth');
        }
    }
}
