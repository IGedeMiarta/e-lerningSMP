<?php

use Mpdf\Tag\Input;

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Guru_model', 'guru');
        $this->load->model('Siswa_model', 'siswa');
        $admin = $this->db->get('admin')->row_array();
        if (!$admin) {
            redirect('Install');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata(
            'pesan',
            '<script>
                        Swal.fire(
                        "Success",
                        "You have been logged out",
                        "success"
                        )
                     </script>'
        );

        // Kembalikan ke halaman login
        redirect('auth');
    }

    public function index()
    {
        // Judul
        is_logged_in();
        $data['judul'] = "SMP Negeri 2 Mlati";
        $this->load->view('templates/auth-header');
        $this->load->view('auth/login', $data);
        $this->load->view('templates/auth-footer');
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            is_logged_in();
            $data['judul'] = "SMP Negeri 2 Mlati";
            $this->load->view('templates/auth-header');
            $this->load->view('auth/login', $data);
            $this->load->view('templates/auth-footer');
        } else {
            // Jika Lolos Validasi
            $email = $this->input->post('email');
            $password = $this->input->post('password');

            // Ambil Data user berdasarkan data diatas
            $user = $this->db->get_where('admin', ['email' => $email])->row_array();
            if ($user) {
                $this->_loginAdmin();
            } else {
                $user = $this->db->get_where('guru', ['email' => $email])->row_array();
                if ($user) {
                    $this->_LoginGuru();
                } else {
                    $user = $this->db->get_where('siswa', ['email' => $email])->row_array();
                    if ($user) {
                        $this->_loginSiswa();
                    }
                }
            }
        }
        $this->session->set_flashdata(
            'eror',
            '<script>
                        Swal.fire(
                        "Oops..",
                        "Email tidak terdaftar",
                        "error"
                        )
                     </script>'
        );
        redirect('auth');
    }

    private function _loginAdmin()
    {
        // Jika Lolos Validasi
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Ambil Data user berdasarkan data diatas
        $user = $this->db->get_where('admin', ['email' => $email])->row_array();

        // Cek apakah Ada user dengan email yg di inputkan
        if ($user) {
            // Jika usernya ada
            // Cek Password
            if (password_verify($password, $user['password'])) {
                // Jika Password Benar
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                // Arahkan Ke halaman admin
                $this->session->set_flashdata('login', 'berhasil');
                redirect('admin');
            } else {
                $this->session->set_flashdata(
                    'eror',
                    '<script>
                            Swal.fire(
                            "Oops..",
                            "Wrong Password!",
                            "error"
                            )
                        </script>'
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                'eror',
                '<script>
                        Swal.fire(
                        "Oops..",
                        "Email tidak terdaftar",
                        "error"
                        )
                     </script>'
            );
            redirect('auth');
        }
    }

    private function _loginGuru()
    {

        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Ambil Data user berdasarkan data diatas
        $user = $this->db->get_where('guru', ['email' => $email])->row_array();

        // Cek apakah Ada user dengan email yg di inputkan
        if ($user) {
            // Jika usernya ada
            if ($user['is_active'] == 0) {
                $this->session->set_flashdata(
                    'eror',
                    '<script>
                            Swal.fire(
                            "Oops..",
                            "Your Account is not Activated!",
                            "error"
                            )
                        </script>'
                );
                redirect('auth');
            } else {
                if (password_verify($password, $user['password'])) {
                    // Jika Password Benar
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);
                    redirect('user');
                } else {
                    $this->session->set_flashdata(
                        'eror',
                        '<script>
                            Swal.fire(
                            "Oops..",
                            "Wrong Password!",
                            "error"
                            )
                        </script>'
                    );
                    redirect('auth');
                }
            }
        } else {
            $this->session->set_flashdata(
                'eror',
                '<script>
                        Swal.fire(
                        "Oops..",
                        "Email tidak terdaftar",
                        "error"
                        )
                     </script>'
            );
            redirect('auth');
        }
    }

    private function _loginSiswa()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        // Ambil Data user berdasarkan data diatas
        $user = $this->db->get_where('siswa', ['email' => $email])->row_array();

        // Cek apakah Ada user dengan email yg di inputkan
        if ($user) {
            // Jika usernya ada
            // Cek Password
            if ($user['is_active'] == 0) {
                $this->session->set_flashdata(
                    'eror',
                    '<script>
                            Swal.fire(
                            "Oops..",
                            "Your Account is not Activated!",
                            "error"
                            )
                        </script>'
                );
                redirect('auth');
            } else {
                if (password_verify($password, $user['password'])) {
                    // Jika Password Benar
                    $data = [
                        'email' => $user['email'],
                        'role_id' => $user['role_id']
                    ];
                    $this->session->set_userdata($data);

                    redirect('user');
                } else {
                    $this->session->set_flashdata(
                        'eror',
                        '<script>
                            Swal.fire(
                            "Oops..",
                            "Wrong Password!",
                            "error"
                            )
                        </script>'
                    );
                    redirect('auth');
                }
            }
        } else {
            $this->session->set_flashdata(
                'eror',
                '<script>
                        Swal.fire(
                        "Oops..",
                        "Email tidak terdaftar",
                        "error"
                        )
                     </script>'
            );
            redirect('auth');
        }
    }

    public function forgotpassword()
    {

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/auth-header');
            $this->load->view('auth/forgot-password');
            $this->load->view('templates/auth-footer');
        } else {
            $email = $this->input->post('email');

            $user = $this->db->get_where('siswa', ['email' => $email])->row_array();

            if ($user) {
                $this->_forgotpasswordstudent();
            } else {
                $user = $this->db->get_where('guru', ['email' => $email])->row_array();
                if ($user) {
                    $this->_forgotpasswordteacher();
                } else {
                    $user = $this->db->get_where('admin', ['email' => $email])->row_array();
                    if ($user) {
                        // $this->_forgotpasswordadmin();
                        echo "Admin";
                    }
                }
            }

            $this->session->set_flashdata(
                'pesan',
                "<script>
                            Swal.fire(
                            'Error..! ',
                            'Email is not Registered!',
                            'error'
                            )
                        </script>"
            );
            redirect('auth/forgotpassword');
        }
    }

    private function _forgotpasswordstudent()
    {
        $email = $this->input->post('email');
        $user = $this->db->get_where('siswa', ['email' => $email])->row_array();

        if ($user) {

            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user_token', $user_token);
            $this->_sendEmail($token);

            $this->session->set_flashdata(
                'pesan',
                "<script>
                        Swal.fire(
                            'Success..! ',
                            'Please check your email to reset password',
                            'success'
                        )
                </script>"
            );
            redirect('auth');
        }
    }

    private function _forgotpasswordteacher()
    {
        $email = $this->input->post('email');

        $user = $this->db->get_where('guru', ['email' => $email])->row_array();

        if ($user) {

            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email' => $email,
                'token' => $token,
                'date_created' => time()
            ];

            $this->db->insert('user_token', $user_token);
            $this->_sendEmailGuru($token);

            $this->session->set_flashdata(
                'pesan',
                "<script>
                        Swal.fire(
                            'Success..! ',
                            'Please check your email to reset password',
                            'success'
                        )
                </script>"
            );
            redirect('auth');
        }
    }

    private function _sendEmail($token)
    {
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
        $this->email->to($this->input->post('email'));

        $this->email->subject('Reset Password');
        $this->email->message(' <div class="kotak" style=" position: relative; padding: 15px; color: #fff; font-family: comic sans ms;">
            <div class="atas"
                style="width: 100%; height: 60px; line-height: 60px; font-size: 20px ; padding-left: 10px;  color: #fff; background-color: dodgerblue;">
                Reset Password
            </div>
            <div class="isi" style="padding: 20px; position: relative; color: #000">
                <center>
                    <h1>SMP Negeri 2 Mlati</h1>
                        <small style="color: #000;">eLerning SMPN 2 Mlati</small>
                </center>
                <p style="color: #000;">Click the button to reset your password</p>
                <a href="' . base_url() . 'auth/resetpasswordstudent?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"
                    style="display: block; width: 200px;height: 50px; background-color: dodgerblue; border-radius: 30px; text-align: center; line-height: 50px; text-decoration: none; color: #fff; margin: 20px auto;">reset my password</a>
            </div>
            <div class="bawah"
                style=" width: 100%; background-color: dodgerblue; height: 60px; line-height: 60px; text-align: center;">
                Copyright ©E-Learning SMP Negeri 2 Mlati
            </div>
        </div>');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die();
        }
    }

    public function resetpasswordstudent()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('siswa', ['email' => $email])->row_array();

        if ($user) {

            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {

                $this->session->set_userdata('reset_email', $email);
                $this->changePasswordStudent();
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    "<script>
                        Swal.fire(
                        'Error ',
                        'Reset password failed!, Wrong Token',
                        'error'
                        )
                </script>"
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                'pesan',
                "<script>
                        Swal.fire(
                        'Error ',
                        'Reset password failed!, Wrong Email',
                        'error'
                        )
                </script>"
            );
            redirect('auth');
        }
    }

    public function changePasswordStudent()
    {

        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/auth-header');
            $this->load->view('auth/change-password-siswa');
            $this->load->view('templates/auth-footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('siswa');

            $this->session->set_flashdata(
                'pesan',
                "<script>
                        Swal.fire(
                        'Success..! ',
                        'Your password Has been changed!<br>Please Login',
                        'success'
                        )
                </script>"
            );

            $this->session->unset_userdata('reset_email');
            redirect('auth');
        }
    }


    public function forgotpasswordteacher()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/auth-header');
            $this->load->view('auth/forgot-password-guru');
            $this->load->view('templates/auth-footer');
        } else {


            $email = $this->input->post('email');

            $user = $this->db->get_where('guru', ['email' => $email])->row_array();

            if ($user) {

                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmailGuru($token);

                $this->session->set_flashdata(
                    'pesan',
                    "<script>
                        Swal.fire(
                            'Success..! ',
                            'Please check your email to reset password',
                            'success'
                        )
                </script>"
                );
                redirect('auth');
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    "<script>
                        Swal.fire(
                        'Error..! ',
                        'Email is not Registered!',
                        'error'
                        )
                    </script>"
                );
                redirect('auth/forgotpasswordteacher');
            }
        }
    }

    private function _sendEmailGuru($token)
    {
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
        $this->email->to($this->input->post('email'));

        $this->email->subject('Reset Password');
        $this->email->message(' <div class="kotak" style=" position: relative; padding: 15px; color: #fff; font-family: comic sans ms;">
            <div class="atas"
                style="width: 100%; height: 60px; line-height: 60px; font-size: 20px ; padding-left: 10px;  color: #fff; background-color: dodgerblue;">
                Reset Password
            </div>
            <div class="isi" style="padding: 20px; position: relative; color: #000">
                <center>
                    <h1>SMP Negeri 2 Mlati</h1>
                        <small style="color: #000;">eLerning SMPN 2 Mlati</small>
                </center>
                <p style="color: #000;">Click the button to reset your password</p>
                <a href="' . base_url() . 'auth/resetpasswordteacher?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '"
                    style="display: block; width: 200px;height: 50px; background-color: dodgerblue; border-radius: 30px; text-align: center; line-height: 50px; text-decoration: none; color: #fff; margin: 20px auto;">reset my password</a>
            </div>
            <div class="bawah"
                style=" width: 100%; background-color: dodgerblue; height: 60px; line-height: 60px; text-align: center;">
                Copyright ©E-Learning SMP Negeri 2 Mlati
            </div>
        </div>');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die();
        }
    }

    public function resetpasswordteacher()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('guru', ['email' => $email])->row_array();

        if ($user) {

            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {

                $this->session->set_userdata('reset_email', $email);
                $this->changePasswordteacher();
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    "<script>
                        Swal.fire(
                        'Error ',
                        'Reset password failed!, Wrong Token',
                        'error'
                        )
                </script>"
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                'pesan',
                "<script>
                        Swal.fire(
                        'Error ',
                        'Reset password failed!, Wrong Email',
                        'error'
                        )
                </script>"
            );
            redirect('auth');
        }
    }

    public function changePasswordteacher()
    {
        if (!$this->session->userdata('reset_email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]');
        $this->form_validation->set_rules('password2', 'Repeat Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {

            $this->load->view('templates/auth-header');
            $this->load->view('auth/change-password-guru');
            $this->load->view('templates/auth-footer');
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');


            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('guru');

            $this->session->set_flashdata(
                'pesan',
                "<script>
                        Swal.fire(
                        'Success..! ',
                        'Your password Has been changed!<br>Please Login',
                        'success'
                        )
                </script>"
            );

            $this->session->unset_userdata('reset_email');
            redirect('auth');
        }
    }

    public function registration()
    {
        $data['last_row_teacher'] = $this->db->get('guru')->last_row();
        $data['last_row_students'] = $this->db->get('siswa')->last_row();

        $this->form_validation->set_rules('name_regis', 'Name', 'required');
        $this->form_validation->set_rules('email_regis', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password_regis', 'Password', 'required|matches[password_regis2]', [
            'matches' => 'Password not match'
        ]);
        $this->form_validation->set_rules('password_regis2', 'Repeat Password', 'required|matches[password_regis]');

        if ($this->form_validation->run() == false) {
            $data['judul'] = "SMP Negeri 2 Mlati";
            $this->load->view('templates/auth-header');
            $this->load->view('auth/index', $data);
            $this->load->view('templates/auth-footer');
        } else {
            if ($this->input->post('is_student')) {
                $siswa = $this->db->get('siswa')->last_row();
                if ($siswa) {
                    $no_regis = $siswa->no_regis + 1;
                } else {
                    $no_regis = "18078100";
                }

                $kelas = $this->db->get_where('kelas', ['class_code' => $this->input->post('kode_kelas')])->row_array();
                $email_siswa = $this->db->get_where('siswa', ['email' => $this->input->post(('email_regis'))])->row_array();

                if ($email_siswa) {
                    $this->session->set_flashdata(
                        'pesan',
                        "<script>
                                    Swal.fire(
                                    'Error',
                                    'Oops, email is already registered',
                                    'error'
                                    )
                            </script>"
                    );
                    redirect('auth/registration');
                } else {
                    if ($kelas) {
                        $data = [
                            'nama_siswa' => htmlspecialchars($this->input->post('name_regis', true)),
                            'no_regis' => $no_regis,
                            'jenis_kelamin' => $this->input->post('jk'),
                            'id_kelas' => $kelas['id'],
                            'email' => htmlspecialchars($this->input->post('email_regis', true)),
                            'password' => password_hash($this->input->post('password_regis'), PASSWORD_DEFAULT),
                            'gambar' => 'default.png',
                            'role_id' => 3,
                            'is_active' => 0

                        ];
                        // Siapkan token
                        $email = $this->input->post('email_regis');
                        $token = base64_encode(random_bytes(32));
                        $user_token = [
                            'email' => $email,
                            'token' => $token,
                            'date_created' => time()
                        ];
                        $this->db->insert('user_token', $user_token);
                        $this->db->insert('siswa', $data);

                        $this->_sendEmailActivate($token, 'verify');

                        $this->session->set_flashdata(
                            'pesan',
                            "<script>
                                    Swal.fire(
                                    'Success..! ',
                                    'Your Account Has been Created!<br>Please Check your email to verify',
                                    'success'
                                    )
                                </script>"
                        );
                        redirect('auth');
                    } else {
                        $this->session->set_flashdata(
                            'pesan',
                            "<script>
                                    Swal.fire(
                                    'Error',
                                    'Wrong class code!',
                                    'error'
                                    )
                            </script>"
                        );
                        redirect('auth/registration');
                    }
                }
            } else {
                $guru = $this->db->get('guru')->last_row();
                if ($guru) {
                    $no_regis = $guru->no_regis + 1;
                } else {
                    $no_regis = "19079100";
                }

                $email_guru = $this->db->get_where('guru', ['email' => $this->input->post('email_regis')])->row_array();

                if ($email_guru) {
                    $this->session->set_flashdata(
                        'pesan',
                        "<script>
                                Swal.fire(
                                'Error',
                                'Oops, email is already registered',
                                'error'
                                )
                            </script>"
                    );
                    redirect('auth/registration');
                } else {
                    $data = [
                        'no_regis' => $no_regis,
                        'nama' => htmlspecialchars($this->input->post('name_regis', true)),
                        'email' => htmlspecialchars($this->input->post('email_regis', true)),
                        'password' => password_hash($this->input->post('password_regis'), PASSWORD_DEFAULT),
                        'gambar' => 'default.png',
                        'role_id' => 2,
                        'is_active' => 0
                    ];
                    $this->db->insert('guru', $data);
                    $this->session->set_flashdata(
                        'pesan',
                        "<script>
                            Swal.fire(
                            'Success..! ',
                            'Your Account Has been Created!<br>Wait until administrator verify your account',
                            'success'
                            )
                        </script>"
                    );
                    redirect('auth');
                }
            }
        }
    }

    private function _sendEmailActivate($token, $type)
    {
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
        $this->email->to($this->input->post('email_regis'));

        $this->email->subject('Account Verification');
        $this->email->message('<div class="kotak" style=" position: relative; padding: 15px; color: #fff; font-family: comic sans ms;">
            <div class="atas"
                style="width: 100%; height: 60px; line-height: 60px; font-size: 20px ; padding-left: 10px;  color: #fff; background-color: dodgerblue;">
                Activate your Account
            </div>
            <div class="isi" style="padding: 20px; position: relative; color: #000">
                <center>
                    <h1>SMP Negeri 2 Mlati</h1>
                        <small style="color: #000;">eLerning SMPN 2 Mlati</small>
                </center>
                <p style="color: #000;">Click the button to verify your account</p>
                <a href="' . base_url() . 'auth/verify?email=' . $this->input->post('email_regis') . '&token=' . urlencode($token) . '"
                    style="display: block; color:#fff; width: 200px;height: 50px; background-color: dodgerblue; border-radius: 30px; text-align: center; line-height: 50px; text-decoration: none; color: #fff; margin: 20px auto;">Activate</a>
            </div>
            <div class="bawah"
                style="color: #fff; width: 100%; background-color: dodgerblue; height: 60px; line-height: 60px; text-align: center;">
                Copyright ©E-Learning SMP Negeri 2 Mlati
            </div>
        </div>');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die();
        }
    }

    public function verify()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $akun = $this->db->get_where('siswa', ['email' => $email])->row_array();

        if ($akun) {
            $user = $this->db->get_where('siswa', ['email' => $email])->row_array();
        } else {
            $user = $this->db->get_where('guru', ['email' => $email])->row_array();
        }


        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();
            if ($user_token) {
                if (time() - $user_token['date_created'] < (60 * 60 * 24)) {
                    if ($user['role_id'] == 3) {
                        $this->db->set('is_active', 1);
                        $this->db->where('email', $email);
                        $this->db->update('siswa');
                        $this->db->delete('user_token', ['email' => $email]);
                        $this->session->set_flashdata(
                            'pesan',
                            "<script>
                            Swal.fire(
                            'success!',
                            '" . $email . " has been activated!',
                            'success'
                            )
                            </script>"
                        );
                        redirect('auth');
                    } else {
                        $this->db->set('is_active', 1);
                        $this->db->where('email', $email);
                        $this->db->update('guru');
                        $this->db->delete('user_token', ['email' => $email]);
                        $this->session->set_flashdata(
                            'pesan',
                            "<script>
                            Swal.fire(
                            'success!',
                            '" . $email . " has been activated!',
                            'success'
                            )
                            </script>"
                        );
                        redirect('auth');
                    }
                } else {

                    if ($user['role_id'] == 3) {
                        $this->db->delete('siswa', ['email' => $email]);
                    } else {
                        $this->db->delete('guru', ['email' => $email]);
                    }
                    $this->db->delete('user_token', ['email' => $email]);
                    $this->session->set_flashdata(
                        'pesan',
                        "<script>
                        Swal.fire(
                        'Error',
                        'Account Activation failed!<br>Token Expired',
                        'error'
                        )
                        </script>"
                    );
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata(
                    'pesan',
                    "<script>
                    Swal.fire(
                    'Error',
                    'Account Activation failed!<br>Invalid Token',
                    'error'
                    )
                    </script>"
                );
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata(
                'pesan',
                "<script>
                Swal.fire(
                'Error',
                'Account Activation failed!<br>Wrong email',
                'error'
                 )
                </script>"
            );
            redirect('auth');
        }

        // $this->session->set_flashdata(
        //     'pesan',
        //     "<script>
        //         Swal.fire(
        //         'Error',
        //         'Account Activation failed!<br>wrong email',
        //         'error'
        //          )
        //         </script>"
        // );
        // redirect('auth');
    }
}
