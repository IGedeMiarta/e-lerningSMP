<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Teacher extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_teacher();
        $this->load->model('Siswa_model', 'siswa');
        $this->load->model('Guru_model', 'guru');
        $this->load->model('Mapel_model', 'mapel');
        $this->load->model('Materi_model', 'materi');
        $this->load->model('Tugas_model', 'tugas');
        $this->load->library('form_validation');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function index()
    {
        $data['judul'] = "e-Lerning | Teacher";
        $data['materi'] = $this->materi->getAllDataMateri();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('teacher/index', $data);
        $this->load->view('templates/footer');
    }

    public function AddMateri()
    {
        $data['judul'] = "e-Lerning | Add Materi";
        $data['materi'] = $this->materi->getAllDataMateri();

        $this->form_validation->set_rules('nama_materi', 'Nama Materi', 'required');
        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('bikin_manual', 'Materi', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Data Relasi
            $data['guru_mapel'] = $this->materi->getRelasiGuruMapel();
            $data['guru_kelas'] = $this->materi->getRelasiGuruKelas();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('teacher/add-materi', $data);
            $this->load->view('templates/footer');
        } else {



            $id_kelas = $this->input->post('kelas');
            $data['kelas'] = $this->siswa->getDataSiswaBykelas($id_kelas);

            foreach ($data['kelas'] as $siswa) {

                $config = [
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_user' => 'info.smpn2mlati@gmail.com',
                    'smtp_pass' => 'adminsmp2',
                    'smtp_port' => 465,
                    'mailtype' => 'html',
                    'charset' => 'utf-8',
                    'newline' => "\r\n"
                ];

                $this->email->initialize($config);
                $this->email->set_newline("\r\n");

                $this->load->library('email', $config);

                $this->email->from('info.smpn2mlati@gmail.com', 'eLerning SMPN2MLATI');
                $this->email->to($siswa['email']);
                $this->email->subject('Material');
                $this->email->message('<div class="kotak" style=" position: relative; padding: 15px; color: #fff; font-family: comic sans ms;">
                <div class="atas"
                style="width: 100%; height: 60px; line-height: 60px; font-size: 20px ; padding-left: 10px;  color: #fff; background-color: dodgerblue;">
                Notification
                </div>
                <div class="isi" style="padding: 20px; position: relative; color:#000;">
                <center>
                    <h1>e-Lerning</h1>
                    <small style="color: #000;">eLerning SMPN 2 Mlati</small>
                </center>
                <p style="color: #000;">Hello ' . $siswa['nama_siswa'] . '</p>
                <p style="color: #000;">' . $this->session->userdata('email') . ' Post New Material for you</p>
                <p style="color: #000;">' . $this->input->post('nama_materi') . '</p>
                </div>
                <div class="bawah"
                style=" width: 100%; background-color: dodgerblue; height: 60px; line-height: 60px; text-align: center;">
               Copyright ©E-Learning SMP Negeri 2 Mlati
                </div>
                </div>');

                if (!$this->email->send()) {
                    echo $this->email->print_debugger();
                    die;
                }
            }

            $this->materi->insertDataBuatMateri();

            // Pemberitahuan
            $pemberitahuan = [
                'email_guru' => $this->session->userdata('email'),
                'pemberitahuan' => $this->input->post('nama_materi'),
                'id_kelas' => $this->input->post('kelas'),
                'is_tugas' => 0,
                'date_created' => time(),
            ];
            $this->db->insert('pemberitahuan', $pemberitahuan);

            $this->session->set_flashdata(
                'pesan',
                "<script>
                    Swal.fire(
                        'Success',
                        'Data Berhasil Ditambah',
                        'success'
                    )
                </script>"
            );
            $this->session->set_flashdata(
                'pesan',
                "<script>
                    Swal.fire(
                        'Success',
                        'Data Berhasil Ditambah',
                        'success'
                    )
                </script>"
            );
            redirect('teacher');
        }
    }

    public function hapusMateri($id_materi1)
    {
        $id_materi = decrypt_url($id_materi1);

        $data['materi'] = $this->db->get_where('materi', ['id_materi' => $id_materi])->row_array();

        unlink(FCPATH . 'materi/file-uploads/' . $data['materi']['unggah_materi']);
        unlink(FCPATH . 'materi/file-uploads/' . $data['materi']['unggah_materi2']);

        $this->db->delete('materi', ['id_materi' => $id_materi]);
        $this->db->delete('komentar', ['id_materi' => $id_materi]);

        $this->session->set_flashdata(
            'pesan',
            "<script>
                    Swal.fire(
                        'Success',
                        'Data Berhasil Dihapus',
                        'success'
                    )
                </script>"
        );
        redirect('teacher');
    }

    public function lihatMateri($id_materi1)
    {
        $id_materi = decrypt_url($id_materi1);
        $data['judul'] = "e-Lerning | Teacher";
        $data['materi'] = $this->materi->getMateriGuruById($id_materi);
        $data['komentar'] = $this->db->get_where('komentar', ['id_materi' => $id_materi])->result_array();

        $email_guru = $this->session->userdata('email');
        $data['guru'] = $this->db->get_where('guru', ['email' => $email_guru])->row_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('teacher/Lihatmateri', $data);
        $this->load->view('templates/footer');
    }
    // Function untuk Edit materi (Manual & Upload)
    public function edit($id_materi1)
    {
        $id_materi = decrypt_url($id_materi1);
        $cek = $this->db->get_where('materi', ['id_materi' => $id_materi])->row_array();
        if ($cek['unggah_materi'] == null) {
            $this->editmateri($id_materi1);
        } else {
            $this->edituploadmateri($id_materi1);
        }
    }

    private function editmateri($id_materi1)
    {
        $id_materi = decrypt_url($id_materi1);
        $this->form_validation->set_rules('nama_materi', 'Nama Materi', 'required');
        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('bikin_manual', 'Materi', 'required');
        if ($this->form_validation->run() == false) {
            $data['judul'] = "e-Lerning | Teacher";
            $data['materi'] = $this->materi->getMateriGuruById($id_materi);
            // Data Relasi
            $data['guru_mapel'] = $this->materi->getRelasiGuruMapel();
            $data['guru_kelas'] = $this->materi->getRelasiGuruKelas();

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('teacher/edit-materi', $data);
            $this->load->view('templates/footer');
        } else {
            $this->materi->updatebuatmateri($id_materi);
            $this->session->set_flashdata(
                'pesan',
                "<script>
                    Swal.fire(
                        'Success',
                        'Data Berhasil di Update',
                        'success'
                    )
                </script>"
            );
            redirect('teacher');
        }
    }

    private function edituploadmateri($id_materi1)
    {
        $id_materi = decrypt_url($id_materi1);
        $this->form_validation->set_rules('nama_materi', 'Nama Materi', 'required');
        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('catatan', 'Catatan', 'required');
        $data['judul'] = "e-Lerning | Teacher";
        $data['materi'] = $this->materi->getMateriGuruById($id_materi);
        // Data Relasi
        $data['guru_mapel'] = $this->materi->getRelasiGuruMapel();
        $data['guru_kelas'] = $this->materi->getRelasiGuruKelas();
        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('teacher/edit-upload-materi', $data);
            $this->load->view('templates/footer');
        } else {
            // Konfigurasi File
            $config['allowed_types'] = 'docx|doc|pdf|pptx|rar|zip';
            $config['max_size']     = 0;
            $config['remove_spaces'] = true;
            $config['upload_path'] = './materi/file-uploads/';
            $this->load->library('upload', $config);

            if (!empty($_FILES['unggah_materi']['name'])) {
                if ($this->upload->do_upload('unggah_materi')) {
                    $data1 = $this->upload->data();
                    $new_nama_file1 = $data1['file_name'];
                    unlink(FCPATH . 'materi/file-uploads/' . $data['materi']['unggah_materi']);
                    $this->db->set('unggah_materi', $new_nama_file1);
                } else {
                    $this->session->set_flashdata(
                        'pesan',
                        "<script>
                    Swal.fire(
                        'Oops.. ',
                        'Ekstensi File Salah',
                        'error'
                    )
                </script>"
                    );
                    redirect('teacher/edit/' . encrypt_url($id_materi));
                    die;
                }
            }

            if (!empty($_FILES['unggah_materi2']['name'])) {
                if ($this->upload->do_upload('unggah_materi2')) {
                    $data2 = $this->upload->data();
                    $new_nama_file2 = $data2['file_name'];
                    $this->db->set('unggah_materi2', $new_nama_file2);
                } else {
                    unlink(FCPATH . 'materi/file-uploads/' . $new_nama_file1);
                    $this->session->set_flashdata(
                        'pesan',
                        "<script>
                    Swal.fire(
                        'Oops..',
                        'Ekstensi File Salah',
                        'error'
                    )
                </script>"
                    );
                    redirect('teacher/edit/' . encrypt_url($id_materi));
                    die;
                }
            }

            // Data

            $this->db->set('nama_materi', $this->input->post('nama_materi'));
            $this->db->set('mapel', $this->input->post('mapel'));
            $this->db->set('kelas', $this->input->post('kelas'));
            $this->db->set('catatan', $this->input->post('catatan'));
            $this->db->where('id_materi', $this->input->post('id_materi'));
            $this->db->update('materi');

            // ===
            $this->session->set_flashdata(
                'pesan',
                "<script>
                    Swal.fire(
                        'Success',
                        'Data Berhasil di Update',
                        'success'
                    )
                </script>"
            );
            redirect('teacher');
        }
    }

    // End Function untuk Edit materi (Manual & Upload)

    // Function Untuk Upload image summernote

    function upload_image()
    {
        $this->load->library('upload');
        if (isset($_FILES["image"]["name"])) {
            $config['upload_path'] = './materi/img-uploads/';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';
            $this->upload->initialize($config);
            if (!$this->upload->do_upload('image')) {
                $this->upload->display_errors();
                return FALSE;
            } else {
                $data = $this->upload->data();
                //Compress Image
                $config['image_library'] = 'gd2';
                $config['source_image'] = './materi/img-uploads/' . $data['file_name'];
                $config['create_thumb'] = FALSE;
                $config['maintain_ratio'] = TRUE;
                $config['quality'] = '60%';
                $config['width'] = 450;
                $config['height'] = 450;
                $config['new_image'] = './materi/img-uploads/' . $data['file_name'];
                $this->load->library('image_lib', $config);
                $this->image_lib->resize();
                echo base_url() . 'materi/img-uploads/' . $data['file_name'];
            }
        }
    }

    //Delete image summernote
    function delete_image()
    {
        $src = $this->input->post('src');
        $file_name = str_replace(base_url(), '', $src);
        if (unlink($file_name)) {
            echo 'File Delete Successfully';
        }
    }

    // End Function Summernote

    public function uploadmateri()
    {
        $data['judul'] = "e-Lerning | Upload Materi";
        $data['materi'] = $this->materi->getAllDataMateri();

        // Get No regis Guru
        $email = $this->session->userdata('email');
        $data['guru'] = $this->db->get_where('guru', ['email' => $email])->row_array();
        $no_regis = $data['guru']['no_regis'];

        $this->form_validation->set_rules('nama_materi', 'Nama Materi', 'required');
        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('catatan', 'Pesan', 'required');
        // $this->form_validation->set_rules('unggah_materi', 'File 1', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data['guru_mapel'] = $this->materi->getRelasiGuruMapel();
            $data['guru_kelas'] = $this->materi->getRelasiGuruKelas();


            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('teacher/upload-materi', $data);
            $this->load->view('templates/footer');
        } else {
            // Konfigurasi File
            $config['upload_path'] = './materi/file-uploads/';
            $config['allowed_types'] = 'pptx|pdf|doc|docx|ppt|rar|zip'; //'docx|doc|pdf|pptx|rar|zip'
            $config['max_size']     = 0;
            $config['remove_spaces'] = true;
            $this->load->library('upload', $config);

            if (!empty($_FILES['unggah_materi']['name'])) {
                if ($this->upload->do_upload('unggah_materi')) {
                    $data1 = $this->upload->data();
                    $nama_file1 = $data1['file_name'];
                } else {
                    $this->session->set_flashdata(
                        'pesan',
                        "<script>
                        Swal.fire(
                            'Oops.. ',
                            'Ekstensi File Salah',
                            'error'
                         )
                </script>"
                    );
                    redirect('teacher/uploadMateri');
                    die;
                }
            }

            if (!empty($_FILES['unggah_materi2']['name'])) {
                if ($this->upload->do_upload('unggah_materi2')) {
                    $data2 = $this->upload->data();
                    $nama_file2 = $data2['file_name'];
                } else {
                    unlink(FCPATH . 'materi/file-uploads/' . $nama_file1);
                    $this->session->set_flashdata(
                        'pesan',
                        "<script>
                        Swal.fire(
                            'Oops..',
                            'Ekstensi File Salah',
                            'error'
                        )
                </script>"
                    );
                    redirect('teacher/uploadMateri');
                    die;
                }
            }

            if ($_FILES['unggah_materi2']) {

                $id_kelas = $this->input->post('kelas');
                $data['kelas'] = $this->siswa->getDataSiswaBykelas($id_kelas);

                foreach ($data['kelas'] as $siswa) {

                    $config = [
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.googlemail.com',
                        'smtp_user' => 'info.smpn2mlati@gmail.com',
                        'smtp_pass' => 'adminsmp2',
                        'smtp_port' => 465,
                        'mailtype' => 'html',
                        'charset' => 'utf-8',
                        'newline' => "\r\n"
                    ];

                    $this->email->initialize($config);
                    $this->email->set_newline("\r\n");

                    $this->load->library('email', $config);

                    $this->email->from('info.smpn2mlati@gmail.com', 'eLerning SMPN2MLATI');
                    $this->email->to($siswa['email']);
                    $this->email->subject('Material');
                    $this->email->message('<div class="kotak" style=" position: relative; padding: 15px; color: #fff; font-family: comic sans ms;">
                    <div class="atas"
                    style="width: 100%; height: 60px; line-height: 60px; font-size: 20px ; padding-left: 10px;  color: #fff; background-color: dodgerblue;">
                    Notification
                    </div>
                    <div class="isi" style="padding: 20px; position: relative; color:#000;">
                    <center>
                        <h1>Smart Students</h1>
                        <small style="color: #000;">eLerning SMPN 2 Mlati</small>
                    </center>
                    <p style="color: #000;">Hello ' . $siswa['nama_siswa'] . '</p>
                    <p style="color: #000;">' . $this->session->userdata('email') . ' Post New Material for you</p>
                    <p style="color: #000;">' . $this->input->post('nama_materi') . '</p>
                    </div>
                    <div class="bawah"
                    style=" width: 100%; background-color: dodgerblue; height: 60px; line-height: 60px; text-align: center;">
                   Copyright ©E-Learning SMP Negeri 2 Mlati
                    </div>
                    </div>');

                    if (!$this->email->send()) {
                        echo $this->email->print_debugger();
                        die;
                    }
                }

                $data = [
                    'nama_materi' => htmlspecialchars($this->input->post('nama_materi', true)),
                    'guru' => $no_regis,
                    'mapel' => htmlspecialchars($this->input->post('mapel', true)),
                    'kelas' => htmlspecialchars($this->input->post('kelas', true)),
                    'catatan' => $this->input->post('catatan', true),
                    'unggah_materi' => $nama_file1,
                    'unggah_materi2' => $nama_file2,
                    'date_created' => time()
                ];

                $this->db->insert('materi', $data);

                // Pemberitahuan
                $pemberitahuan = [
                    'email_guru' => $this->session->userdata('email'),
                    'pemberitahuan' => $this->input->post('nama_materi'),
                    'id_kelas' => $this->input->post('kelas'),
                    'is_tugas' => 0,
                    'date_created' => time(),
                ];

                $this->db->insert('pemberitahuan', $pemberitahuan);
                // ================

                $this->session->set_flashdata(
                    'pesan',
                    "<script>
                    Swal.fire(
                        'Success',
                        'Data Berhasil Ditambah',
                        'success'
                    )
                </script>"
                );
                redirect('teacher');
            } else {
                $id_kelas = $this->input->post('kelas');
                $data['kelas'] = $this->siswa->getDataSiswaBykelas($id_kelas);

                foreach ($data['kelas'] as $siswa) {

                    $config = [
                        'protocol' => 'smtp',
                        'smtp_host' => 'ssl://smtp.googlemail.com',
                        'smtp_user' => 'info.smpn2mlati@gmail.com',
                        'smtp_pass' => 'adminsmp2',
                        'smtp_port' => 465,
                        'mailtype' => 'html',
                        'charset' => 'utf-8',
                        'newline' => "\r\n"
                    ];

                    $this->email->initialize($config);
                    $this->email->set_newline("\r\n");

                    $this->load->library('email', $config);

                    $this->email->from('info.smpn2mlati@gmail.com', 'eLerning SMPN2MLATI');
                    $this->email->to($siswa['email']);
                    $this->email->subject('Material');
                    $this->email->message('<div class="kotak" style=" position: relative; padding: 15px; color: #fff; font-family: comic sans ms;">
                    <div class="atas"
                    style="width: 100%; height: 60px; line-height: 60px; font-size: 20px ; padding-left: 10px;  color: #fff; background-color: dodgerblue;">
                    Notification
                    </div>
                    <div class="isi" style="padding: 20px; position: relative; color:#000;">
                    <center>
                        <h1>Smart Students</h1>
                        <small  style="color: #000;">eLerning SMPN 2 Mlati</small>
                    </center>
                    <p  style="color: #000;">Hello ' . $siswa['nama_siswa'] . '</p>
                    <p  style="color: #000;">' . $this->session->userdata('email') . ' Post New Material for you</p>
                    <p  style="color: #000;">' . $this->input->post('nama_materi') . '</p>
                    </div>
                    <div class="bawah"
                    style=" width: 100%; background-color: dodgerblue; color: #fff; height: 60px; line-height: 60px; text-align: center;">
                    Copyright ©E-Learning SMP Negeri 2 Mlati
                    </div>
                    </div>');

                    if (!$this->email->send()) {
                        echo $this->email->print_debugger();
                        die;
                    }
                }

                $data = [
                    'nama_materi' => htmlspecialchars($this->input->post('nama_materi', true)),
                    'guru' => $no_regis,
                    'mapel' => htmlspecialchars($this->input->post('mapel', true)),
                    'kelas' => htmlspecialchars($this->input->post('kelas', true)),
                    'catatan' => $this->input->post('catatan', true),
                    'unggah_materi' => $nama_file1,
                    'date_created' => time()
                ];

                $this->db->insert('materi', $data);

                // Pemberitahuan
                $pemberitahuan = [
                    'email_guru' => $this->session->userdata('email'),
                    'pemberitahuan' => $this->input->post('nama_materi'),
                    'id_kelas' => $this->input->post('kelas'),
                    'is_tugas' => 0,
                    'date_created' => time(),
                ];

                $this->db->insert('pemberitahuan', $pemberitahuan);
                // ================

                $this->session->set_flashdata(
                    'pesan',
                    "<script>
                    Swal.fire(
                        'Success',
                        'Data Berhasil Ditambah',
                        'success'
                    )
                </script>"
                );
                redirect('teacher');
            }
        }
    }

    public function _sendEmailTugas()
    {
        // $config = [
        //     'protocol' => 'smtp',
        //     'smtp_host' => 'ssl://smtp.googlemail.com',
        //     'smtp_user' => 'info.smpn2mlati@gmail.com',
        //     'smtp_pass' => 'adminsmp2',
        //     'smtp_port' => 465,
        //     'mailtype' => 'html',
        //     'charset' => 'utf-8',
        //     'newline' => "\r\n"
        // ];

        // $this->email->initialize($config);
        // $this->email->set_newline("\r\n");

        // $this->load->library('email', $config);
        // $this->email->from('info.smpn2mlati@gmail.com', 'eLerning SMPN2MLATI');
        // $this->email->to('abdulohmalela@gmail.com');
        // $this->email->subject('Testing');
        // $this->email->message(' <div class="kotak" style=" position: relative; padding: 15px; color: #fff; font-family: comic sans ms;">
        //     <div class="atas"
        //         style="width: 100%; height: 60px; line-height: 60px; font-size: 20px ; padding-left: 10px;  color: #fff; background-color: dodgerblue;">
        //         Account Verification
        //     </div>
        //     <div class="isi" style="padding: 20px; position: relative;">
        //         <center>
        //             <h1>Smart Students</h1>
        //         </center>
        //         <p>Hello '.  .'</p>
        //     </div>
        //     <div class="bawah"
        //         style=" width: 100%; background-color: dodgerblue; height: 60px; line-height: 60px; text-align: center;">
        //        Copyright ©E-Learning SMP Negeri 2 Mlati
        //     </div>
        // </div>');

        // if ($this->email->send()) {
        //     return true;
        // } else {
        //     echo $this->email->print_debugger();
        //     die;
        // }
    }

    // Tugas
    // ===============================================================================================================
    public function tasks()
    {
        $data['judul'] = "e-Lerning | Tasks";
        $data['tugas'] = $this->tugas->getAllTugas();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('teacher/tugas', $data);
        $this->load->view('templates/footer');
    }

    public function addTugas()
    {
        $data['judul'] = "e-Lerning | Tasks";
        $data['materi'] = $this->materi->getAllDataMateri();

        // Get No regis Guru
        $email = $this->session->userdata('email');
        $data['guru'] = $this->db->get_where('guru', ['email' => $email])->row_array();
        $no_regis = $data['guru']['no_regis'];

        $data['tugas'] = $this->tugas->getAllTugas();
        $data['guru_mapel'] = $this->materi->getRelasiGuruMapel();
        $data['guru_kelas'] = $this->materi->getRelasiGuruKelas();

        $this->form_validation->set_rules('nama_tugas', 'Nama Tugas', 'required');
        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('teacher/add-tugas', $data);
            $this->load->view('templates/footer');
        } else {

            // echo $this->input->post('tgl') . ' ' . $this->input->post('jam') . '<br>';
            // echo date('Y-m-d H:i', time());
            // die;

            $id_kelas = $this->input->post('kelas');
            $data['kelas'] = $this->siswa->getDataSiswaBykelas($id_kelas);

            foreach ($data['kelas'] as $siswa) {

                $config = [
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.googlemail.com',
                    'smtp_user' => 'info.smpn2mlati@gmail.com',
                    'smtp_pass' => 'adminsmp2',
                    'smtp_port' => 465,
                    'mailtype' => 'html',
                    'charset' => 'utf-8',
                    'newline' => "\r\n"
                ];

                $this->email->initialize($config);
                $this->email->set_newline("\r\n");

                $this->load->library('email', $config);

                $this->email->from('info.smpn2mlati@gmail.com', 'eLerning SMPN 2 Mlati');
                $this->email->to($siswa['email']);
                $this->email->subject('Assignment');
                $this->email->message('<div class="kotak" style=" position: relative; padding: 15px; color: #fff; font-family: comic sans ms;">
                    <div class="atas"
                    style="width: 100%; height: 60px; line-height: 60px; font-size: 20px ; padding-left: 10px;  color: #fff; background-color: dodgerblue;">
                    Notification
                    </div>
                    <div class="isi" style="padding: 20px; position: relative; color:#000;">
                    <center>
                        <h1>Smart Students</h1>
                        <small style="color: #000;">SMP Negeri 2 Mlati</small>
                    </center>
                    <p style="color: #000;">Hello ' . $siswa['nama_siswa'] . '</p>
                    <p style="color: #000;">' . $this->session->userdata('email') . ' Post New Assignment for you</p>
                    <p style="color: #000;">' . $this->input->post('nama_tugas') . '</p>
                    </div>
                    <div class="bawah"
                    style=" width: 100%; background-color: dodgerblue; color: #fff; height: 60px; line-height: 60px; text-align: center;">
                   Copyright ©E-Learning SMP Negeri 2 Mlati
                    </div>
                    </div>');

                if (!$this->email->send()) {
                    echo $this->email->print_debugger();
                    die;
                }
            }
            if ($_FILES['nama_file']['name']) {
                $config['upload_path'] = './tugas/file/';
                $config['allowed_types'] = 'pptx|pdf|doc|docx|ppt|rar|zip'; //'docx|doc|pdf|pptx|rar|zip'
                $config['max_size']     = 0;
                $config['remove_spaces'] = true;
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('nama_file')) {
                    $data = $this->upload->data();
                    $nama_file = $data['file_name'];
                } else {
                    $this->session->set_flashdata(
                        'pesan',
                        "<script>
                        Swal.fire(
                            'Oops.. ',
                            'Ekstensi File Salah',
                            'error'
                         )
                </script>"
                    );
                    redirect('teacher/addtugas');
                    die;
                }

                $email = $this->session->userdata('email');
                $data['guru'] = $this->db->get_where('guru', ['email' => $email])->row_array();
                $no_regis = $data['guru']['no_regis'];

                $data = [
                    'nama_tugas' => $this->input->post('nama_tugas', true),
                    'guru' => $no_regis,
                    'kelas' => $this->input->post('kelas', true),
                    'mapel' => $this->input->post('mapel', true),
                    'pesan' => $this->input->post('pesan'),
                    'file' => $nama_file,
                    'is_essay' => $this->input->post('is_essay'),
                    'date_created' => time(),
                    'due_date' => $this->input->post('tgl') . ' ' . $this->input->post('jam')
                ];
                $this->db->insert('tugas', $data);
            } else {
                $this->tugas->AddTugas();
            }

            // Pemberitahuan
            $pemberitahuan = [
                'email_guru' => $this->session->userdata('email'),
                'pemberitahuan' => $this->input->post('nama_tugas'),
                'id_kelas' => $this->input->post('kelas'),
                'is_tugas' => 1,
                'date_created' => time(),
            ];

            $this->db->insert('pemberitahuan', $pemberitahuan);

            $this->session->set_flashdata(
                'pesan',
                "<script>
                    Swal.fire(
                        'Berhasi..! ',
                        'Tugas Sudah Dibuat',
                        'success'
                    )
                </script>"
            );
            redirect('teacher/tasks/');
        }
    }

    public function lihatTugas($id_tugas1)
    {
        $id_tugas = decrypt_url($id_tugas1);
        $data['judul'] = "e-Lerning | Tasks";
        $data['tugas'] = $this->tugas->getTugasById($id_tugas);
        $data['lihatTugas'] = $this->tugas->getAllTugasSiswaByGuru($id_tugas);
        $data['lihatTugasTelat'] = $this->tugas->getAllTugasSiswaTelatByGuru($id_tugas);
        $data['komentar'] = $this->db->get_where('komen_tugas', ['id_tugas' => $id_tugas])->result_array();

        $email_guru = $this->session->userdata('email');
        $data['guru'] = $this->db->get_where('guru', ['email' => $email_guru])->row_array();


        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('teacher/lihat-tugas', $data);
        $this->load->view('templates/footer');
    }

    public function tugasSiswa()
    {

        $this->form_validation->set_rules('nilai', 'Nilai', 'required|numeric|max_length[3]');

        if ($this->form_validation->run() == false) {
            $no_regis =  decrypt_url($this->input->get('no_regis_siswa'));
            $id_tugas = decrypt_url($this->input->get('id_tugas'));
            $data['judul'] = "e-Lerning | Jawaban Siswa";

            $data['tugasSiswa'] = $this->tugas->getSiswaTugasByregis($no_regis, $id_tugas);
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('teacher/tugas-siswa', $data);
            $this->load->view('templates/footer');
        } else {
            if ($this->input->post('nilai') > 100) {
                echo "Nilai Tidak Boleh Lebih Dari 100";
                die;
            } else {
                $no_regis = decrypt_url($this->input->get('no_regis_siswa'));
                $id_tugas = decrypt_url($this->input->get('id_tugas'));
                $data['judul'] = "e-Lerning | Jawaban Siswa";

                $this->db->set('nilai', $this->input->post('nilai'));
                $this->db->where('no_regis_siswa', $no_regis);
                $this->db->where('tugas_id', $id_tugas);
                $this->db->update('tugas_siswa');
                $this->session->set_flashdata(
                    'pesan',
                    "<script>
                    Swal.fire(
                        'Berhasi..! ',
                        'Tugas Sudah Dinilai',
                        'success'
                    )
                </script>"
                );
                redirect('teacher/lihattugas/' . encrypt_url($id_tugas));
            }
        }
    }

    public function hapusTugas($id_tugas1)
    {
        $id_tugas = decrypt_url($id_tugas1);

        $data['tugas_siswa'] = $this->db->get_where('tugas_siswa', ['tugas_id' => $id_tugas])->result_array();

        foreach ($data['tugas_siswa'] as $ts) {

            unlink(FCPATH . 'tugas/file/' . $ts['file']);
        }

        $this->db->delete('tugas', ['id_tugas' => $id_tugas]);
        $this->db->delete('tugas_siswa', ['tugas_id' => $id_tugas]);
        $this->db->delete('komen_tugas', ['id_tugas' => $id_tugas]);

        $this->session->set_flashdata(
            'pesan',
            "<script>
                    Swal.fire(
                        'Success',
                        'Data Berhasil Dihapus',
                        'success'
                    )
                </script>"
        );
        redirect('teacher/tasks');
    }

    public function edittugas($id_tugas1)
    {
        $id_tugas = decrypt_url($id_tugas1);
        $data['judul'] = "e-Lerning | Update Tasks";
        $data['tugas'] = $this->tugas->getTugasById($id_tugas);
        $data['guru_mapel'] = $this->materi->getRelasiGuruMapel();
        $data['guru_kelas'] = $this->materi->getRelasiGuruKelas();

        $this->form_validation->set_rules('nama_tugas', 'Nama Tugas', 'required');
        $this->form_validation->set_rules('mapel', 'Mata Pelajaran', 'required');
        $this->form_validation->set_rules('kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('pesan', 'Pesan', 'required');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('teacher/edit-tugas', $data);
            $this->load->view('templates/footer');
        } else {
            $due_date = $this->input->post('tgl') . ' ' . $this->input->post('jam');
            $this->db->set('nama_tugas', $this->input->post('nama_tugas', true));
            $this->db->set('kelas', $this->input->post('kelas'));
            $this->db->set('mapel', $this->input->post('mapel'));
            $this->db->set('pesan', $this->input->post('pesan', true));
            $this->db->set('due_date', $due_date);
            $this->db->where('id_tugas', $this->input->post('id_tugas'));
            $this->db->update('tugas');

            $this->session->set_flashdata(
                'pesan',
                "<script>
                    Swal.fire(
                        'Berhasil..! ',
                        'Tugas Sudah Di Update',
                        'success'
                    )
                </script>"
            );
            redirect('teacher/tasks/');
        }
    }
    // End Tugas
    // ======================================================================================================================
}
