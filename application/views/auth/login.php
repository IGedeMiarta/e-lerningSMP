<section id="login" class="section">
    <div class="container">
        <div class="row md-m-25px-b m-45px-b justify-content-center text-center">
            <div class="col-lg-7">
                <h3 class="h1 m-20px-b p-20px-b theme-after after-50px">eLerning SMP Negeri 2 Mlati</h3>
                <p class="m-0px font-2">Adalah sistem yang mendukung pembelajaran daring siswa.</p>
            </div>
        </div>
        <div class="tab-style-3">
            <ul class="nav nav-fill nav-tabs box-shadow-lg">
                <li class="nav-item">
                    <a href="#tab3_sec1" data-toggle="tab" class="active">
                        <div class="icon"><i class="icon-tools"></i></div>
                        <span>Login</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#tab3_sec2" data-toggle="tab" class="">
                        <div class="icon"><i class="icon-megaphone"></i></div>
                        <span>Registration</span>
                    </a>
                </li>
            </ul>
            </ul>
            <div class="tab-content">
                <!-- start tab content -->
                <div id="tab3_sec1" class="tab-pane fade in active show">
                    <div class="row align-items-center p-25px-t md-p-15px-t">
                        <div class="col-lg-6 text-center">
                            <img src="<?= base_url('assets/index/'); ?>img/home-1-f2.svg" title="" alt="">
                        </div>
                        <div class="col-lg-6">
                            <div class="p-70px-l lg-p-0px-l lg-m-30px-t">
                                <h2 class="h1 m-25px-b"><u class="theme-color">Login</u> Form</h2>
                                <?= $this->session->flashdata('eror'); ?>
                                <form action="<?= base_url('auth/login'); ?>" method="post">
                                    <div class="form-group">
                                        <label for="email">Username</label>
                                        <input type="text" name="email" id="email" class="form-control" value="<?= set_value('email'); ?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password" id="password" class="form-control">
                                        <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="btn-bar p-15px-t">
                                        <button type="submit" class="m-btn m-btn-radius m-btn-theme">Sign In</button>
                                    </div>
                                </form>
                                <a href="<?= base_url('auth/forgotpassword/'); ?>" class="text-primary float-right" style="margin-top: -42px; outline: none; border: none; background: transparent;">Forgot Password</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end tab content -->
                <!-- start tab content -->
                <div id="tab3_sec2" class="tab-pane fade in">
                    <div class="row align-items-center p-25px-t md-p-15px-t">
                        <div class="col-lg-6">
                            <div class="p-70px-r lg-p-0px-r lg-m-30px-t">
                                <h2 class="h1 m-25px-b">Sign Up <u class="theme-color">Now!</u></h2>
                                <form action="<?= base_url('auth/registration'); ?>" method="post">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" name="name_regis" id="name" class="form-control" value="<?= set_value('name_regis'); ?>">
                                        <?= form_error('name_regis', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input" id="lk" type="radio" name="jk" value="Laki - Laki" checked>
                                            <label class="form-check-label" for="lk">Laki - Laki</label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="pr" type="radio" name="jk" value="Perempuan">
                                            <label class="form-check-label" for="pr">Perempuan</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="text" name="email_regis" id="email" class="form-control" value="<?= set_value('email_regis'); ?>">
                                        <?= form_error('email_regis', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" name="password_regis" id="password" class="form-control">
                                        <?= form_error('password_regis', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <label for="password2">Repeat Password</label>
                                        <input type="password" name="password_regis2" id="password2" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <div class="form-check">
                                            <input class="form-check-input is_student" type="checkbox" name="is_student" value="1" id="is_student">
                                            <label class="form-check-label" for="is_student">I am a Student</label>
                                        </div>
                                        <div id="class_code" class="mt-1">
                                            <label for="kode_kelas">Class Code</label>
                                            <input type="text" name="kode_kelas" id="kode_kelas" class="form-control" autocomplete="off">
                                        </div>
                                    </div>
                                    <div class="btn-bar p-15px-t">
                                        <button type="submit" class="m-btn m-btn-radius m-btn-theme">Sign Up</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 order-lg-2 order-first text-center">
                            <img src="<?= base_url('assets/index/'); ?>img/home-1-f1.svg" title="" alt="">
                        </div>
                    </div>
                </div>
                <!-- end tab content -->
            </div>
        </div>
    </div>
</section>

</main>
<!-- End Main -->
<!-- Footer-->
<footer class="dark-bg footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-12 m-15px-tb mr-auto">
                    <div class="m-20px-b">
                        <img src="<?= base_url('assets/logo.png'); ?>" title="" alt="">
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 m-15px-tb">
                    <h6 class="white-color">
                        SMP Negeri 2 Mlati
                    </h6>
                </div>
                <div class="col-lg-3 col-sm-6 m-15px-tb">
                    <h6 class="white-color">
                        Location
                    </h6>
                    <address>
                        <p class="white-color-light m-5px-b">Gg. Garuda No.33, Jombor Kidul, Sinduadi, Kec. Mlati, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55284</p>
                    </address>

                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom footer-border-light">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-center text-md-right">
                </div>
                <div class="col-md-6 text-center text-md-right">
                    <p class="m-0px font-small white-color-light">© 2020 copyright eLerning SMP Negeri 2 Mlati</p>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- End Footer -->