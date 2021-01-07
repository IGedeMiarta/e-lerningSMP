<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        is_user();
        $this->load->model('Guru_model', 'guru');
        $this->load->model('Siswa_model', 'siswa');
        $this->load->model('Materi_model', 'materi');
        $this->load->model('Pemberitahuan_model', 'pemberitahuan');
        date_default_timezone_set('Asia/Jakarta');

        // Data Pemberitahuan
        $data['pemberitahuan'] = $this->pemberitahuan->getAllPemberitahuan();
        foreach ($data['pemberitahuan'] as $p) {
            $waktu =  time();
            $batas = ($p['date_created'] + (60 * 60));

            // var_dump(date('H:i:s', $waktu)  . '<br>');
            // var_dump(date('H:i:s', $batas)  . '<br>');
            if ($waktu > $batas) {
                // $where = 'date_created' < $batas;
                $query = "DELETE FROM `pemberitahuan` WHERE `pemberitahuan`.`date_created` < $batas";
                $this->db->query($query);
            }
        }
    }

    public function index()
    {
        // data user by role
        $role_id = $this->session->userdata('role_id');
        // data user by email
        $email = $this->session->userdata('email');
        // Judul
        $data['judul'] = "e-Lerning | My Profile";

        if ($role_id == 1) {
            $data['admin'] = $this->db->get_where('admin', ['role_id' => $role_id])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('user/index-admin', $data);
            $this->load->view('templates/footer');
        } elseif ($role_id == 2) {
            $data['guru'] = $this->db->get_where('guru', ['email' => $email])->row_array();
            // Mengambil ID Guru
            $id = $data['guru']['id'];
            // Query Data Berdasarkan Id
            $data['guru'] = $this->guru->getDataGuruById($id);
            $data['guruKelas'] = $this->materi->getRelasiGuruKelas();
            $data['guruMapel'] = $this->materi->getRelasiGuruMapel();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('user/index-guru', $data);
            $this->load->view('templates/footer');
        } elseif ($role_id == 3) {

            $data['siswa'] = $this->db->get_where('siswa', ['email' => $email])->row_array();
            $data['roomchat'] = $this->db->get_where('room_chat', ['id_kelas' => $data['siswa']['id_kelas']])->result_array();

            $data['teman'] = $this->db->get_where('siswa', ['id_kelas' => $data['siswa']['id_kelas']])->result_array();

            // Mengambil ID Siswa
            $id = $data['siswa']['id'];
            // var_dump($id);
            // die();
            $data['siswa'] = $this->siswa->getDataSiswaById($id);

            // Pemberitahuan
            $data['pemberitahuan'] = $this->pemberitahuan->getAllPemberitahuan();
            $data['pemberitahuanMateri'] = $this->pemberitahuan->getAllPemberitahuanMateri();
            $data['pemberitahuanTugas'] = $this->pemberitahuan->getAllPemberitahuanTugas();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('user/index-siswa', $data);
            $this->load->view('templates/footer');
        }
    }

    public function editprofile()
    {
        // data user by role
        $role_id = $this->session->userdata('role_id');
        // data user by email
        $email = $this->session->userdata('email');
        // Judul
        $data['judul'] = "e-Lerning | Edit Profile";

        if ($role_id == 2) {

            $data['guru'] = $this->db->get_where('guru', ['email' => $email])->row_array();
            // Mengambil ID Guru
            $id = $data['guru']['id'];
            // Query Data Berdasarkan Id
            $data['guru'] = $this->guru->getDataGuruById($id);

            $this->form_validation->set_rules('nama', 'Nama', 'required');

            if ($this->form_validation->run() == false) {

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('user/edit-guru', $data);
                $this->load->view('templates/footer');
            } else {
                $nama = $this->input->post('nama');
                $email = $this->input->post('email');

                // Cek Jika ada Gambar
                $uploadImage = $_FILES['gambar']['name'];

                if ($uploadImage) {

                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']     = '5048';
                    $config['upload_path'] = './user-file/img/';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('gambar')) {
                        $old_image = $data['guru']['gambar'];
                        if ($old_image != 'default.png') {
                            unlink(FCPATH . 'user-file/img/' . $old_image);
                        }

                        $new_image = $this->upload->data('file_name');
                        $this->db->set('gambar', $new_image);
                    } else {
                        echo $this->upload->display_errors();
                    }
                }

                $this->db->set('nama', $nama);
                $this->db->where('email', $email);
                $this->db->update('guru');

                $this->session->set_flashdata(
                    'pesan',
                    "<script>Swal.fire(
                    'Success',
                    'Profile anda sudah di update!',
                    'success'
                    )</script>"
                );
                redirect('user');
            }
        } elseif ($role_id == 3) {

            $data['siswa'] = $this->db->get_where('siswa', ['email' => $email])->row_array();
            // Mengambil ID Siswa
            $id = $data['siswa']['id'];
            $data['siswa'] = $this->siswa->getDataSiswaById($id);

            // Pemberitahuan
            $data['pemberitahuan'] = $this->pemberitahuan->getAllPemberitahuan();
            $data['pemberitahuanMateri'] = $this->pemberitahuan->getAllPemberitahuanMateri();
            $data['pemberitahuanTugas'] = $this->pemberitahuan->getAllPemberitahuanTugas();

            date_default_timezone_set('Asia/Jakarta');
            foreach ($data['pemberitahuan'] as $p) {
                $waktu =  time();
                $batas = ($p['date_created'] + (60 * 60));

                // var_dump(date('H:i:s', $waktu)  . '<br>');
                // var_dump(date('H:i:s', $batas)  . '<br>');
                if ($waktu > $batas) {
                    // $where = 'date_created' < $batas;
                    $query = "DELETE FROM `pemberitahuan` WHERE `pemberitahuan`.`date_created` < $batas";
                    $this->db->query($query);
                }
            }


            $this->form_validation->set_rules('nama', 'Nama', 'required');

            if ($this->form_validation->run() == false) {

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('user/edit-siswa', $data);
                $this->load->view('templates/footer');
            } else {
                $nama = $this->input->post('nama');
                $email = $this->input->post('email');

                // Cek Jika ada Gambar
                $uploadImage = $_FILES['gambar']['name'];

                if ($uploadImage) {

                    $config['allowed_types'] = 'gif|jpg|png';
                    $config['max_size']     = '5048';
                    $config['upload_path'] = './user-file/img/';

                    $this->load->library('upload', $config);

                    if ($this->upload->do_upload('gambar')) {
                        $old_image = $data['guru']['gambar'];
                        if ($old_image != 'default.png') {
                            unlink(FCPATH . 'user-file/img/' . $old_image);
                        }

                        $new_image = $this->upload->data('file_name');
                        $this->db->set('gambar', $new_image);
                    } else {
                        echo $this->upload->display_errors();
                    }
                }

                $this->db->set('nama_siswa', $nama);
                $this->db->where('email', $email);
                $this->db->update('siswa');

                $this->session->set_flashdata(
                    'pesan',
                    "<script>Swal.fire(
                    'Success',
                    'Profile anda sudah di update!',
                    'success'
                    )</script>"
                );
                redirect('user');
            }
        }
    }

    public function changepassword()
    {
        // data user by role
        $role_id = $this->session->userdata('role_id');
        // data user by email
        $email = $this->session->userdata('email');
        // Judul
        $data['judul'] = "e-Lerning | Change Password";

        if ($role_id == 1) {
            $data['admin'] = $this->db->get_where('admin', ['role_id' => $role_id])->row_array();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('user/password-admin', $data);
            $this->load->view('templates/footer');
        } elseif ($role_id == 2) {


            $data['guru'] = $this->db->get_where('guru', ['email' => $email])->row_array();
            // Mengambil ID Guru
            $id = $data['guru']['id'];
            // Query Data Berdasarkan Id
            $data['guru'] = $this->guru->getDataGuruById($id);

            $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
            $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|matches[new_password2]');
            $this->form_validation->set_rules('new_password2', 'Confirm Password', 'required|trim|matches[new_password1]');

            if ($this->form_validation->run() == false) {

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('user/password-guru', $data);
                $this->load->view('templates/footer');
            } else {
                $current_password = $this->input->post('current_password');
                $new_password = $this->input->post('new_password1');
                if (!password_verify($current_password, $data['guru']['password'])) {
                    $this->session->set_flashdata(
                        'pesan',
                        "<script>Swal.fire(
                        'Oops..',
                        'Password salah!',
                        'error'
                        )</script>"
                    );
                    redirect('user/changepassword');
                } else {
                    if ($current_password == $new_password) {
                        $this->session->set_flashdata(
                            'pesan',
                            "<script>Swal.fire(
                            'Oops..',
                            'Password Baru!<br>Tidak boleh sama dengan password sebelumnya',
                            'error'
                            )</script>"
                        );
                        redirect('user/changepassword');
                    } else {
                        // Password Sudah Oke
                        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                        $this->db->set('password', $password_hash);
                        $this->db->where('email', $this->session->userdata('email'));
                        $this->db->update('guru');

                        $this->session->set_flashdata(
                            'pesan',
                            "<script>Swal.fire(
                                'Success',
                                'Password changed!',
                                'success'
                                )</script>"
                        );
                        redirect('user');
                    }
                }
            }
        } elseif ($role_id == 3) {
            $data['siswa'] = $this->db->get_where('siswa', ['email' => $email])->row_array();
            // Mengambil ID Siswa
            $id = $data['siswa']['id'];
            // var_dump($id);
            // die();
            $data['siswa'] = $this->siswa->getDataSiswaById($id);

            // Pemberitahuan
            $data['pemberitahuan'] = $this->pemberitahuan->getAllPemberitahuan();
            $data['pemberitahuanMateri'] = $this->pemberitahuan->getAllPemberitahuanMateri();
            $data['pemberitahuanTugas'] = $this->pemberitahuan->getAllPemberitahuanTugas();

            date_default_timezone_set('Asia/Jakarta');
            foreach ($data['pemberitahuan'] as $p) {
                $waktu =  time();
                $batas = ($p['date_created'] + (60 * 60));

                // var_dump(date('H:i:s', $waktu)  . '<br>');
                // var_dump(date('H:i:s', $batas)  . '<br>');
                if ($waktu > $batas) {
                    // $where = 'date_created' < $batas;
                    $query = "DELETE FROM `pemberitahuan` WHERE `pemberitahuan`.`date_created` < $batas";
                    $this->db->query($query);
                }
            }

            $this->form_validation->set_rules('current_password', 'Current Password', 'required|trim');
            $this->form_validation->set_rules('new_password1', 'New Password', 'required|trim|matches[new_password2]');
            $this->form_validation->set_rules('new_password2', 'Confirm Password', 'required|trim|matches[new_password1]');

            if ($this->form_validation->run() == false) {

                $this->load->view('templates/header', $data);
                $this->load->view('templates/sidebar', $data);
                $this->load->view('user/password-guru', $data);
                $this->load->view('templates/footer');
            } else {
                $current_password = $this->input->post('current_password');
                $new_password = $this->input->post('new_password1');
                if (!password_verify($current_password, $data['siswa']['password'])) {
                    $this->session->set_flashdata(
                        'pesan',
                        "<script>Swal.fire(
                        'Oops..',
                        'Password salah!',
                        'error'
                        )</script>"
                    );
                    redirect('user/changepassword');
                } else {
                    if ($current_password == $new_password) {
                        $this->session->set_flashdata(
                            'pesan',
                            "<script>Swal.fire(
                            'Oops..',
                            'Password Baru!<br>Tidak boleh sama dengan password sebelumnya',
                            'error'
                            )</script>"
                        );
                        redirect('user/changepassword');
                    } else {
                        // Password Sudah Oke
                        $password_hash = password_hash($new_password, PASSWORD_DEFAULT);

                        $this->db->set('password', $password_hash);
                        $this->db->where('email', $this->session->userdata('email'));
                        $this->db->update('siswa');

                        $this->session->set_flashdata(
                            'pesan',
                            "<script>Swal.fire(
                                'Success',
                                'Password changed!',
                                'success'
                                )</script>"
                        );
                        redirect('user');
                    }
                }
            }
        }
    }
}
