<?php
defined('BASEPATH') or exit('No direct script access allowed');

class MpdfAdmin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_admin();
        $this->load->model('Siswa_model', 'siswa');
        $this->load->model('Guru_model', 'guru');
        $this->load->model('Mapel_model', 'mapel');
        $this->load->library('form_validation');
    }

    public function printbykelas($id_kelas)
    {
        $data['siswa'] = $this->siswa->getDataSiswaBykelas($id_kelas);
        $siswa = $data['siswa'];
        $nama_file = $siswa[0]['nama_kelas'];
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $mpdf->SetHTMLHeader('<div style="text-align: left; margin-left: 20px; font-weight: bold;">
        <img src="' . base_url('assets/') . 'logo.png" width="80px" alt="">
        </div>', 'O');
        $mpdf->SetHTMLHeader('<div style="text-align: left; margin-left: 20px; font-weight: bold;">
        <img src="' . base_url('assets/') . 'logo.png" width="80px" alt="">
        </div>', 'E');

        $mpdf->SetHTMLFooter('
        <table border="0" width="100%" style="vertical-align: bottom; font-family: serif; 
            font-size: 8pt; color: #000000; font-weight: bold; font-style: italic; border: none;">
            <tr border="0">
                <td width="33%" style="text-align: left; border: none;">{DATE j-m-Y}</td>
                <td width="33%" align="center" style="border: none;">{PAGENO}/{nbpg}</td>
                <td width="33%" style="text-align: right; border: none;">Smart Students By Abduloh</td>
            </tr>
        </table>');  // Note that the second parameter is optional : default = 'O' for ODD

        $mpdf->SetHTMLFooter('
        <table border="0" width="100%" style="vertical-align: bottom; font-family: serif; 
            font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;">
            <tr border="0">
                <td width="33%"><span style="font-weight: bold; font-style: italic;">Smart Students By Abduloh</span></td>
                <td width="33%" align="center" style="font-weight: bold; font-style: italic;">{PAGENO}/{nbpg}</td>
                <td width="33%" style="text-align: left; ">{DATE j-m-Y}</td>
            </tr>
        </table>', 'E');
        // $html = $this->load->view('print/print-by-kelas', [], true);
        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Data Mahasiswa</title>
            <style>
                body{
                    font-family: sans-serif;
                }
                table{
                    border: 0.1px solid #708090;
                }
                tr:nth-child(event){
                    background-color: #ddd;
                }
                tr td{
                    text-align: center;
                    border: 0.1px solid #708090;
                    font-weight: 20;
                }
            </style>
        </head>
        <body>
            <h3 align="center">
            SMP Negeri 2 Mlati<br>
            <small>Sekolah Menengah Pertama</small><br>
            <small>Negeri 2 Mlati</small><br>
            <small>Gg. Garuda No.33, Jombor Kidul, Sinduadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta, 55284</small><br>
            <hr>
        </h3>
        <p>Data Siswa Kelas <strong>' . $siswa[0]["nama_kelas"] . '</strong></p>
            <table cellpadding="5" cellspacing="0" width="100%">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nomor Registrasi</th>
                            <th>Gender</th>
                        </tr>
                    </thead>
                    <tbody>';
        $i = 1;
        foreach ($siswa as $row) {
            $html .= '<tr align="center">
                            <td>' . $i++ . '</td>
                            <td>' . $row["nama_siswa"] . '</td>
                            <td>' . $row["no_regis"] . '</td>
                            <td>' . $row["jenis_kelamin"] . '</td>
                        </tr>';
        }
        $html .=    '</tbody>
                </table>
            </body>
            </html>
            ';

        $mpdf->WriteHTML($html);
        $mpdf->Output("$nama_file.pdf", \Mpdf\Output\Destination::INLINE);
    }

    public function printallsiswa()
    {
        $siswa = $this->db->get('siswa')->result_array();
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $mpdf->SetHTMLHeader('<div style="text-align: left; margin-left: 20px; font-weight: bold;">
        <img src="' . base_url('assets/') . 'logo.png" width="80px" alt="">
        </div>', 'O');
        $mpdf->SetHTMLHeader('<div style="text-align: left; margin-left: 20px; font-weight: bold;">
        <img src="' . base_url('assets/') . 'logo.png" width="80px" alt="">
        </div>', 'E');

        $mpdf->SetHTMLFooter('
        <table border="0" width="100%" style="vertical-align: bottom; font-family: serif; 
            font-size: 8pt; color: #000000; font-weight: bold; font-style: italic; border: none;">
            <tr border="0">
                <td width="33%" style="text-align: left; border: none;">{DATE j-m-Y}</td>
                <td width="33%" align="center" style="border: none;">{PAGENO}/{nbpg}</td>
                <td width="33%" style="text-align: right; border: none;">Smart Students By Abduloh</td>
            </tr>
        </table>');  // Note that the second parameter is optional : default = 'O' for ODD

        $mpdf->SetHTMLFooter('
        <table border="0" width="100%" style="vertical-align: bottom; font-family: serif; 
            font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;">
            <tr border="0">
                <td width="33%"><span style="font-weight: bold; font-style: italic;">Smart Students By Abduloh</span></td>
                <td width="33%" align="center" style="font-weight: bold; font-style: italic;">{PAGENO}/{nbpg}</td>
                <td width="33%" style="text-align: left; ">{DATE j-m-Y}</td>
            </tr>
        </table>', 'E');
        // $html = $this->load->view('print/print-by-kelas', [], true);
        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Data Mahasiswa</title>
            <style>
                body{
                    font-family: sans-serif;
                }
                table{
                    border: 0.1px solid #708090;
                }
                tr:nth-child(event){
                    background-color: #ddd;
                }
                tr td{
                    text-align: center;
                    border: 0.1px solid #708090;
                    font-weight: 20;
                }
            </style>
        </head>
        <body>
            <h3 align="center">
            SMP Negeri 2 Mlati<br>
            <small>Sekolah Menengah Pertama</small><br>
            <small>Negeri 2 Mlati</small><br>
            <small>Gg. Garuda No.33, Jombor Kidul, Sinduadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta, 55284</small><br>
            <hr>
        </h3>
        <p>Data Siswa Semua Kelas</p>
            <table cellpadding="5" cellspacing="0" width="100%">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nomor Registrasi</th>
                            <th>Gender</th>
                        </tr>
                    </thead>
                    <tbody>';
        $i = 1;
        foreach ($siswa as $row) {
            $html .= '<tr align="center">
                            <td>' . $i++ . '</td>
                            <td>' . $row["nama_siswa"] . '</td>
                            <td>' . $row["no_regis"] . '</td>
                            <td>' . $row["jenis_kelamin"] . '</td>
                        </tr>';
        }
        $html .=    '</tbody>
                </table>
            </body>
            </html>
            ';

        $mpdf->WriteHTML($html);
        $mpdf->Output("data-siswa.pdf", \Mpdf\Output\Destination::INLINE);
    }


    public function printguru()
    {
        $guru = $this->db->get('guru')->result_array();
        $mpdf = new \Mpdf\Mpdf(['mode' => 'utf-8', 'format' => 'A4-P']);
        $mpdf->SetHTMLHeader('<div style="text-align: left; margin-left: 20px; font-weight: bold;">
        <img src="' . base_url('assets/') . 'logo.png" width="80px" alt="">
        </div>', 'O');
        $mpdf->SetHTMLHeader('<div style="text-align: left; margin-left: 20px; font-weight: bold;">
        <img src="' . base_url('assets/') . 'logo.png" width="80px" alt="">
        </div>', 'E');

        $mpdf->SetHTMLFooter('
        <table border="0" width="100%" style="vertical-align: bottom; font-family: serif; 
            font-size: 8pt; color: #000000; font-weight: bold; font-style: italic; border: none;">
            <tr border="0">
                <td width="33%" style="text-align: left; border: none;">{DATE j-m-Y}</td>
                <td width="33%" align="center" style="border: none;">{PAGENO}/{nbpg}</td>
                <td width="33%" style="text-align: right; border: none;">Smart Students By Abduloh</td>
            </tr>
        </table>');  // Note that the second parameter is optional : default = 'O' for ODD

        $mpdf->SetHTMLFooter('
        <table border="0" width="100%" style="vertical-align: bottom; font-family: serif; 
            font-size: 8pt; color: #000000; font-weight: bold; font-style: italic;">
            <tr border="0">
                <td width="33%"><span style="font-weight: bold; font-style: italic;">Smart Students By Abduloh</span></td>
                <td width="33%" align="center" style="font-weight: bold; font-style: italic;">{PAGENO}/{nbpg}</td>
                <td width="33%" style="text-align: left; ">{DATE j-m-Y}</td>
            </tr>
        </table>', 'E');
        // $html = $this->load->view('print/print-by-kelas', [], true);
        $html = '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Data Guru</title>
            <style>
                body{
                    font-family: sans-serif;
                }
                table{
                    border: 0.1px solid #708090;
                }
                tr:nth-child(event){
                    background-color: #ddd;
                }
                tr td{
                    text-align: center;
                    border: 0.1px solid #708090;
                    font-weight: 20;
                }
            </style>
        </head>
        <body>
            <h3 align="center">
            SMP Negeri 2 Mlati<br>
            <small>Sekolah Menengah Pertama</small><br>
            <small>Negeri 2 Mlati</small><br>
            <small>Gg. Garuda No.33, Jombor Kidul, Sinduadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta, 55284</small><br>
            <hr>
        </h3>
        </h3>
        <p>Data Guru</p>
            <table cellpadding="5" cellspacing="0" width="100%">
                    <thead>
                        <tr align="center">
                            <th>No</th>
                            <th>Nama</th>
                            <th>Nomor Registrasi</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>';
        $i = 1;
        foreach ($guru as $row) {
            $html .= '<tr align="center">
                            <td>' . $i++ . '</td>
                            <td>' . $row["nama"] . '</td>
                            <td>' . $row["no_regis"] . '</td>
                            <td>' . $row["email"] . '</td>
                        </tr>';
        }
        $html .=    '</tbody>
                </table>
            </body>
            </html>
            ';

        $mpdf->WriteHTML($html);
        $mpdf->Output("data-guru.pdf", \Mpdf\Output\Destination::INLINE);
    }
}
