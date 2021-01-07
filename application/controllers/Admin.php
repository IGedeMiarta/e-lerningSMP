<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        is_admin();
        $this->load->model('Siswa_model', 'siswa');
        $this->load->model('Guru_model', 'guru');
        $this->load->model('Mapel_model', 'mapel');
        $this->load->model('Pemberitahuan_model', 'pemberitahuan');
        $this->load->library('form_validation');

        // Pemberitahuan
        $data['pemberitahuan'] = $this->pemberitahuan->getAllPemberitahuan();
        $data['pemberitahuanMateri'] = $this->pemberitahuan->getAllPemberitahuanMateri();
        $data['pemberitahuanTugas'] = $this->pemberitahuan->getAllPemberitahuanTugas();

        date_default_timezone_set('Asia/Jakarta');
        foreach ($data['pemberitahuan'] as $p) {
            $waktu =  time();
            $batas = ($p['date_created'] + (60 * 60));
            if ($waktu >= $batas) {
                $where = 'date_created' < $batas;
                $this->db->delete('pemberitahuan', $where);
            }
        }
    }

    public function index()
    {
        // Mengambil Session
        $data['user'] = $this->db->get_where('admin', ['email' => $this->session->userdata('email')])->row_array();

        // Membuat Judul Halaman
        $data['judul'] = "eLerning | Admin";
        // =================================================

        // Mengambil url ke 1
        $data['url_ke'] = $this->uri->segment(2);

        // Mengambil jumlah siswa, guru
        $data['totalSiswa'] = $this->db->get('siswa')->num_rows();
        $data['totalGuru'] = $this->db->get('guru')->num_rows();

        // Mengambil data guru yang tidak aktif
        $data['guruNotActive'] = $this->db->get_where('guru', ['is_active' => 0])->result_array();

        // Load View Templates dan Halaman Utama Admin
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('templates/footer');
    }

    public function ControlPanel()
    {
        // Mengambil url ke 1
        $data['url_ke'] = $this->uri->segment(2);

        $data['judul'] = "eLerning | Control Panel";
        $data['siswa'] = $this->siswa->getAllDataSiswa();
        $data['guru'] = $this->guru->getAllDataGuru();
        $data['mapel'] = $this->mapel->getAllDataMapel();
        $data['kelas'] = $this->db->get('kelas')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/control-panel', $data);
        $this->load->view('templates/footer');
    }
    public function datasiswa()
    {
        // Mengambil url ke 1
        $data['url_ke'] = $this->uri->segment(2);

        $data['judul'] = "eLerning | Data Siswa";
        $data['siswa'] = $this->siswa->getAllDataSiswa();
        $data['guru'] = $this->guru->getAllDataGuru();
        $data['mapel'] = $this->mapel->getAllDataMapel();
        $data['kelas'] = $this->db->get('kelas')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/datasiswa', $data);
        $this->load->view('templates/footer');
    }
    public function datakelas()
    {
        // Mengambil url ke 1
        $data['url_ke'] = $this->uri->segment(2);

        $data['judul'] = "eLerning | Data Kelas";
        $data['siswa'] = $this->siswa->getAllDataSiswa();
        $data['guru'] = $this->guru->getAllDataGuru();
        $data['mapel'] = $this->mapel->getAllDataMapel();
        $data['kelas'] = $this->db->get('kelas')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/datakelas', $data);
        $this->load->view('templates/footer');
    }
    public function dataguru()
    {
        // Mengambil url ke 1
        $data['url_ke'] = $this->uri->segment(2);

        $data['judul'] = "eLerning | Data Guru";
        $data['siswa'] = $this->siswa->getAllDataSiswa();
        $data['guru'] = $this->guru->getAllDataGuru();
        $data['mapel'] = $this->mapel->getAllDataMapel();
        $data['kelas'] = $this->db->get('kelas')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/dataguru', $data);
        $this->load->view('templates/footer');
    }
    public function datamapel()
    {
        // Mengambil url ke 1
        $data['url_ke'] = $this->uri->segment(2);

        $data['judul'] = "eLerning | Data Mapel";
        $data['siswa'] = $this->siswa->getAllDataSiswa();
        $data['guru'] = $this->guru->getAllDataGuru();
        $data['mapel'] = $this->mapel->getAllDataMapel();
        $data['kelas'] = $this->db->get('kelas')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/datamapel', $data);
        $this->load->view('templates/footer');
    }
    public function rgurukelas()
    {
        // Mengambil url ke 1
        $data['url_ke'] = $this->uri->segment(2);

        $data['judul'] = "eLerning | Relasi Guru-kelas";
        $data['siswa'] = $this->siswa->getAllDataSiswa();
        $data['guru'] = $this->guru->getAllDataGuru();
        $data['mapel'] = $this->mapel->getAllDataMapel();
        $data['kelas'] = $this->db->get('kelas')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/rgurukelas', $data);
        $this->load->view('templates/footer');
    }
    public function rgurumapel()
    {
        // Mengambil url ke 1
        $data['url_ke'] = $this->uri->segment(2);

        $data['judul'] = "eLerning | Relasi Guru-kelas";
        $data['siswa'] = $this->siswa->getAllDataSiswa();
        $data['guru'] = $this->guru->getAllDataGuru();
        $data['mapel'] = $this->mapel->getAllDataMapel();
        $data['kelas'] = $this->db->get('kelas')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/rgurumapel', $data);
        $this->load->view('templates/footer');
    }

    // Method For Students

    public function AddStudent()
    {
        $this->form_validation->set_rules('nama_siswa', 'Nama', 'required');
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim|is_unique[siswa.email]');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'siswa' => $this->siswa->getAllDataSiswa(),
                'kelas' => $this->db->get('kelas')->result_array(),
                'row_akhir' => $this->db->get('siswa')->last_row('array')
            ];
            // Mengambil url ke 1
            $data['url_ke'] = $this->uri->segment(2);

            $data['judul'] = "eLerning | Add Students";

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/tambah-siswa', $data);
            $this->load->view('templates/footer');
        } else {
            $this->siswa->insertDataSiswa();
            $siswa = $this->db->get('siswa')->last_row();
            $data_siswa = $this->siswa->getDataSiswaById($siswa->id);

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
            $this->email->to($this->input->post('email', true));

            $this->email->subject('Account');
            $this->email->message('<div class="kotak" style=" position: relative; padding: 15px; color: #fff; font-family: comic sans ms;">
                <div class="atas"
                    style="width: 100%; height: 60px; line-height: 60px; font-size: 20px ; padding-left: 10px;  color: #fff; background-color: dodgerblue;">
                    Your Account
                </div>
                <div class="isi" style="padding: 20px; position: relative; color: #000">
                    <center>
                        <h1>eLernings</h1>
                            <small style="color: #000;">SMP Negeri 2 Mlati</small>
                    </center>
                    <p style="color: #000;">Hallo ' . $this->input->post('nama_siswa', true) . ' Here Is Your Account</p>
                    <ul>
                        <li>Name     : ' . $this->input->post('nama_siswa', true) . '</li>
                        <li>Email    : ' . $this->input->post('email', true) . '</li>
                        <li>Kelas    : ' . $data_siswa['nama_kelas'] . '</li>
                        <li>Password : ' . $this->input->post('no_regis', true) . '</li>
                    </ul>
                </div>
                <div class="bawah"
                    style="color: #fff; width: 100%; background-color: dodgerblue; height: 60px; line-height: 60px; text-align: center;">
                    Copyright ©E-Learning SMP Negeri 2 Mlati
                </div>
            </div>');

            if ($this->email->send()) {
                $this->session->set_flashdata('berhasil', 'Ditambahkan');
                redirect('admin/datasiswa');
            } else {
                echo $this->email->print_debugger();
                die();
            }
        }
    }

    public function deleteStudent($id1)
    {
        $id = decrypt_url($id1);
        $this->db->where('id', $id);
        $this->db->delete('siswa');

        $this->session->set_flashdata('berhasil', 'Dihapus');
        redirect('admin/datasiswa');
    }

    public function updateSiswa($id1 = '')
    {
        $id = decrypt_url($id1);

        $this->form_validation->set_rules('nama_siswa', 'Nama', 'required');
        $this->form_validation->set_rules('id_kelas', 'Kelas', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');

        if ($this->form_validation->run() == FALSE) {

            $data['kelas'] = $this->db->get('kelas')->result_array();

            $data['siswa'] = $this->siswa->getDataSiswaById($id);
            $data['jk'] = ['Laki - Laki', 'Perempuan'];

            // Mengambil url ke 1
            $data['url_ke'] = $this->uri->segment(2);

            $data['judul'] = "eLerning | Add Students";

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/edit-siswa', $data);
            $this->load->view('templates/footer');
        } else {
            $this->siswa->updateDataSiswa();
            $this->session->set_flashdata('berhasil', 'Diedit');
            redirect('admin/datasiswa');
        }
    }
    // End Method for Students


    // Method For Teachers
    public function AddTeacher()
    {

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');

        if ($this->form_validation->run() == FALSE) {

            $data = [
                'guru' => $this->guru->getAllDataGuru(),
                'row_akhir' => $this->db->get('guru')->last_row('array')
            ];

            // Mengambil url ke 1
            $data['url_ke'] = $this->uri->segment(2);

            $data['judul'] = "eLerning | Add Teachers";

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/tambah-guru', $data);
            $this->load->view('templates/footer');
        } else {
            $this->guru->insertDataGuru();
            $this->session->set_flashdata('berhasil', 'Ditambahkan');
            redirect('admin/dataguru');
        }
    }

    public function deleteTeacher($id1)
    {
        $id = decrypt_url($id1);
        // Mengambil Data Guru By ID
        $data['guru'] = $this->guru->getDataGuruById($id);

        // Mengambil No Regis Guru
        $no_regis = $data['guru'][0]['no_regis'];

        // Menghapus data relasi guru-mapel & guru-kelas by no_regis
        $this->db->delete('guru-mapel', ['no_regis' => $no_regis]);
        $this->db->delete('guru-kelas', ['no_regis' => $no_regis]);

        // Menghapus Data Guru Dari Tabel Guru
        $this->db->delete('guru', ['id' => $id]);

        $this->session->set_flashdata('berhasil', 'Dihapus');
        redirect('admin/dataguru');
    }

    public function updateTeacher($id1)
    {
        $id = decrypt_url($id1);

        $this->form_validation->set_rules('nama', 'Nama', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|trim');

        if ($this->form_validation->run() == FALSE) {

            $data['guru'] = $this->guru->getDataGuruById($id);
            $data['judul'] = "eLerning | Update Teachers";
            // Mengambil url ke 1
            $data['url_ke'] = $this->uri->segment(2);

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/edit-guru', $data);
            $this->load->view('templates/footer');
        } else {
            $this->guru->updateDataGuru();
            $this->session->set_flashdata('berhasil', 'Diedit');
            redirect('admin/dataguru');
        }
    }

    // Method for Mapel

    public function AddMapel()
    {

        $this->form_validation->set_rules('nama_mapel', 'Nama Matakuliah', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data['guru'] = $this->guru->getAllDataGuru();

            // Mengambil url ke 1
            $data['url_ke'] = $this->uri->segment(2);

            $data['judul'] = "eLerning | Add Mapel";

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/tambah-mapel', $data);
            $this->load->view('templates/footer');
        } else {
            $this->mapel->insertDataMapel();
            $this->session->set_flashdata('berhasil', 'Ditambahkan');
            redirect('admin/datamapel');
        }
    }

    public function editmapel($id_mapel1)
    {
        $id_mapel = decrypt_url($id_mapel1);
        $this->form_validation->set_rules('nama_mapel', 'Nama Matakuliah', 'required');

        if ($this->form_validation->run() == FALSE) {

            $data['mapel'] = $this->db->get_where('mapel', ['id' => $id_mapel])->row_array();

            $data['judul'] = "eLerning | Edit Mapel";

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('admin/edit-mapel', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_mapel' => $this->input->post('nama_mapel', true),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('mapel', $data);

            $this->session->set_flashdata('berhasil', 'Di edit');
            redirect('admin/datamapel');
        }
    }

    public function hapusmapel($id_mapel1)
    {
        $id_mapel = decrypt_url($id_mapel1);
        $this->db->delete('mapel', ['id' => $id_mapel]);

        $this->session->set_flashdata('berhasil', 'Dihapus');
        redirect('admin/datamapel');
    }

    // End Method for Mapel

    //Method for Kelas 

    public function addclass()
    {
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');
        $this->form_validation->set_rules('class_code', 'Kode Kelas', 'required');

        if ($this->form_validation->run() == FALSE) {


            $data['judul'] = "eLerning | Add Mapel";

            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('admin/tambah-kelas');
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_kelas' => $this->input->post('nama_kelas'),
                'class_code' => $this->input->post('class_code'),
                'is_active' => 1
            ];
            $this->db->insert('kelas', $data);
            $this->session->set_flashdata('berhasil', 'Ditambahkan');
            redirect('admin/datakelas');
        }
    }

    public function editkelas($id_kelas1)
    {
        $id_kelas = decrypt_url($id_kelas1);
        $this->form_validation->set_rules('nama_kelas', 'Nama Kelas', 'required');

        $data['judul'] = "eLerning | Add Mapel";
        $data['kelas'] = $this->db->get_where('kelas', ['id' => $id_kelas])->row_array();

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar');
            $this->load->view('admin/edit-kelas', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'nama_kelas' => $this->input->post('nama_kelas', true),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->where('id', $this->input->post('id'));
            $this->db->update('kelas', $data);

            $this->session->set_flashdata('berhasil', 'Di edit');
            redirect('admin/datakelas');
        }
    }

    public function hapuskelas($id_kelas1)
    {
        $id_kelas = decrypt_url($id_kelas1);
        $this->db->delete('kelas', ['id' => $id_kelas]);

        $this->session->set_flashdata('berhasil', 'Dihapus');
        redirect('admin/datakelas');
    }

    // End method for kelas

    // =========================================================================
    // Relasiii

    public function guruMapel($no_regis1)
    {
        $no_regis = decrypt_url($no_regis1);
        $data['guru'] = $this->db->get_where('guru', ['no_regis' => $no_regis])->row_array();

        $data['mapel'] = $this->db->get_where('mapel', ['is_active' => 1])->result_array();

        $data['judul'] = "eLerning | Guru Mapel";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/guru-mapel', $data);
        $this->load->view('templates/footer');
    }

    public function relasiGuruMapel()
    {
        $noregis = decrypt_url($this->input->post('noRegis'));
        $mapelid = $this->input->post('mapelId');

        $mapels = $this->db->get_where('mapel', ['id' => $mapelid])->row_array();
        $mapel = $mapels['nama_mapel'];

        $data = [
            'no_regis' => $noregis,
            'mapel_id' => $mapelid,
            'mapel' => $mapel
        ];

        $result = $this->db->get_where('guru-mapel', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('guru-mapel', $data);
        } else {
            $this->db->delete('guru-mapel', $data);
        }

        $this->session->set_flashdata(
            'pesan',
            "<script>
                    Swal.fire(
                        'Success',
                        'Data Berhasil Diubah',
                        'success'
                    )
                </script>"
        );
    }
    public function guruKelas($no_regis1)
    {
        $no_regis = decrypt_url($no_regis1);

        $data['guru'] = $this->db->get_where('guru', ['no_regis' => $no_regis])->row_array();

        $data['kelas'] = $this->db->get_where('kelas', ['is_active' => 1])->result_array();

        $data['judul'] = "eLerning | Guru Mapel";

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/guru-kelas', $data);
        $this->load->view('templates/footer');
    }

    public function relasiGuruKelas()
    {
        $noregis = decrypt_url($this->input->post('noRegis'));
        $kelasid = $this->input->post('kelasId');

        $kelass = $this->db->get_where('kelas', ['id' => $kelasid])->row_array();
        $kelas = $kelass['nama_kelas'];


        $data = [
            'no_regis' => $noregis,
            'kelas_id' => $kelasid,
            'kelas' => $kelas
        ];

        $result = $this->db->get_where('guru-kelas', $data);

        if ($result->num_rows() < 1) {
            $this->db->insert('guru-kelas', $data);
        } else {
            $this->db->delete('guru-kelas', $data);
        }

        $this->session->set_flashdata(
            'pesan',
            "<script>
                    Swal.fire(
                        'Success',
                        'Data Berhasil Diubah',
                        'success'
                    )
                </script>"
        );
    }
}
