<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Download extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Materi_model', 'materi');
    }

    function DownloadMateri($nama_materi)
    {
        // $data['materi'] = $this->materi->getMateriById($id_materi);

        force_download('./materi/file-uploads/' . $nama_materi, NULL);
    }

    function DownloadTugas($file)
    {
        // $data['materi'] = $this->materi->getMateriById($id_materi);

        force_download('./tugas/file/' . $file, NULL);
    }

    function bahantugas($file)
    {
        // $data['materi'] = $this->materi->getMateriById($id_materi);

        force_download('./tugas/file/' . $file, NULL);
    }
}
