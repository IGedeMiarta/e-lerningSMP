<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tugas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Tugas_model', 'Tugas');
        date_default_timezone_set('Asia/Jakarta');
    }

    public function essay()
    {
        $id_tugas = decrypt_url($this->input->post('tugas_id'));

        $data['tugas'] = $this->Tugas->getSiswaTugasById($id_tugas);


        $waktu =  date('Y-m-d H:i', $data['tugas']['date_created']);
        $batas = date($data['tugas']['due_date']);
        if (!(strtotime($waktu) <= time() and time() >= strtotime($batas))) {
            echo "<b>Masih dalam jangka waktu</b><br>";
            $telat = 0;
        } else {
            echo "<b>Batas waktu sudah berakhir</b><br>";
            $telat = 1;
        }

        $data = [
            'no_regis_guru' => $this->input->post('no_regis_guru'),
            'no_regis_siswa' => $this->input->post('no_regis_siswa'),
            'tugas_id' => $id_tugas,
            'kelas_id' => $this->input->post('kelas'),
            'mapel_id' => $this->input->post('mapel'),
            'essay' => $this->input->post('essay'),
            'telat' => $telat
        ];

        $this->db->insert('tugas_siswa', $data);

        $this->session->set_flashdata(
            'pesan',
            "<script>
                    Swal.fire(
                        'Berhasil..!',
                        'jawaban anda sudah terkirim',
                        'success'
                    )
                </script>"
        );
        redirect('siswa/lihattugas/' . $this->input->post('tugas_id'));
    }

    public function upload()
    {
        $id_tugas = decrypt_url($this->input->post('tugas_id'));

        $data['tugas'] = $this->Tugas->getSiswaTugasById($id_tugas);
        $waktu =  date('Y-m-d H:i', $data['tugas']['date_created']);
        $batas = date($data['tugas']['due_date']);
        if (!(strtotime($waktu) <= time() and time() >= strtotime($batas))) {
            echo "<b>Masih dalam jangka waktu</b><br>";
            $telat = 0;
        } else {
            echo "<b>Batas waktu sudah berakhir</b><br>";
            $telat = 1;
        }

        $config['allowed_types'] = 'pptx|pdf|doc|docx|ppt|rar|zip';
        $config['max_size']     = 0;
        $config['remove_spaces'] = true;
        $config['upload_path'] = './tugas/file/';
        $this->load->library('upload', $config);

        if (!empty($_FILES['file']['name'])) {
            if ($this->upload->do_upload('file')) {
                $data = $this->upload->data();
                $nama_file = $data['file_name'];

                $data = [
                    'no_regis_guru' => $this->input->post('no_regis_guru'),
                    'no_regis_siswa' => $this->input->post('no_regis_siswa'),
                    'tugas_id' => $id_tugas,
                    'kelas_id' => $this->input->post('kelas'),
                    'mapel_id' => $this->input->post('mapel'),
                    'file' => $nama_file,
                    'telat' => $telat
                ];

                $this->db->insert('tugas_siswa', $data);

                $this->session->set_flashdata(
                    'pesan',
                    "<script>
                            Swal.fire(
                                'Berhasil..!',
                                'jawaban anda sudah terkirim',
                                'success'
                            )
                        </script>"
                );
                redirect('siswa/lihattugas/' . $this->input->post('tugas_id'));
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
                redirect('siswa/lihattugas/' . $this->input->post('tugas_id'));
            }
        }
    }
}
