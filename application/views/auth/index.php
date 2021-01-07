    <!-- Preload -->
    <div id="loading">
        <div class="load-circle"><span class="one"></span></div>
    </div>
    <!-- End Preload -->
    <?= $this->session->flashdata('pesan'); ?>
    <!-- Header -->
    <header class="header-nav header-white">
        <div class="fixed-header-bar p-2">
            <div class="container container-large">
                <div class="navbar navbar-default navbar-expand-lg main-navbar">
                    <div class="navbar-brand">
                        <a href="index.html" title="Mombo" class="logo">
                            <img src="<?= base_url('assets/index/'); ?>img/logo-light.png" class="light-logo" title="">
                            <img src="<?= base_url('assets/index/'); ?>img/logo.png" class="dark-logo" title="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Header End -->
    <!-- Main -->
    <main>
        <!-- Home Banner -->
        <section id="home" class="effect-section gray-bg">
            <div class="effect theme-bg effect-skew"></div>
            <div class="particles-box" id="particles-box"></div>
            <div class="container container-large">
                <div class="row full-screen align-items-center p-100px-tb">
                    <div class="col-12 col-lg-5 col-xl-4 p-50px-tb">
                        <h1 class="white-color h1 m-15px-b">Smart Students<br>E-Learning</h1>
                        <p class="font-2 white-color-light m-20px-b">Smart Students is a website-based application that presents several interesting features, so as to make it easier for users to do online learning</p>
                        <span class="font-small white-color-light">Contact me for more information</span>
                    </div>
                    <div class="col-lg-7 col-xl-8">
                        <img class="max-width-auto" src="<?= base_url('assets/index/'); ?>img/home-banner-1.svg" title="" alt="">
                    </div>
                </div>
            </div>
        </section>
        <!-- End Home Banner -->
        <!-- Section -->
        <section id="about" class="section gray-bg">
            <div class="container">
                <div class="row md-m-25px-b m-45px-b justify-content-center text-center">
                    <div class="col-lg-8">
                        <h3 class="h1 m-20px-b p-20px-b theme-after after-50px">UI & UX ?</h3>
                        <p class="m-0px font-2">Smart Students is a HTML5 Web Application based on Sass and Bootstrap 4 with modern and
                            creative design</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col-lg-3 m-15px-tb">
                        <div class="box-shadow hover-top hover-rotate white-bg border-radius-5 p-20px-lr p-40px-tb text-center">
                            <div class="ef-2 icon-80 hr-rotate-after theme-bg dots-icon border-radius-50 theme2nd-color d-inline-block m-20px-b">
                                <i class="fab fa-html5 white-color"></i>
                                <span class="dots"><i class="dot dot1"></i><i class="dot dot2"></i><i class="dot dot3"></i></span>
                            </div>
                            <h6>HTML 5</h6>
                            <p class="m-0px">Smart Students is a HTML5 Web Application.</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 m-15px-tb">
                        <div class="box-shadow hover-top hover-rotate white-bg border-radius-5 p-20px-lr p-40px-tb text-center">
                            <div class="ef-2 icon-80 hr-rotate-after theme-bg dots-icon border-radius-50 theme2nd-color d-inline-block m-20px-b">
                                <i class="fab fa-css3 white-color"></i>
                                <span class="dots"><i class="dot dot1"></i><i class="dot dot2"></i><i class="dot dot3"></i></span>
                            </div>
                            <h6>CSS 3</h6>
                            <p class="m-0px">Suported in other browser, exept internet explorer</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 m-15px-tb">
                        <div class="box-shadow hover-top white-bg border-radius-5 theme-hover-bg p-20px-lr p-40px-tb text-center">
                            <div class="icon-80 gray-bg dots-icon border-radius-50 theme-color d-inline-block m-20px-b">
                                <i class="fab fa-bootstrap"></i>
                                <span class="dots"><i class="dot dot1"></i><i class="dot dot2"></i><i class="dot dot3"></i></span>
                            </div>
                            <h6>Bootstrap 4</h6>
                            <p class="m-0px">the most popular css framework are in here</p>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 m-15px-tb">
                        <div class="box-shadow hover-top white-bg border-radius-5 theme-hover-bg p-20px-lr p-40px-tb text-center">
                            <div class="icon-80 gray-bg dots-icon border-radius-50 theme-color d-inline-block m-20px-b">
                                <i class="fab fa-js"></i>
                                <span class="dots"><i class="dot dot1"></i><i class="dot dot2"></i><i class="dot dot3"></i></span>
                            </div>
                            <h6>Javascript</h6>
                            <p class="m-0px">javascript will make this app more dynamic</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End Section -->
        <!-- Section -->
        <section id="login" class="section">
            <div class="container">
                <div class="row md-m-25px-b m-45px-b justify-content-center text-center">
                    <div class="col-lg-7">
                        <h3 class="h1 m-20px-b p-20px-b theme-after after-50px">Here we go</h3>
                        <p class="m-0px font-2">lets sign in to make your online learning experience awesome.!</p>
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
        <!-- End Section -->
        <!-- Section -->
        <!-- <section class="section theme-bg">
            <div class="container">
                <div class="row md-m-25px-b m-45px-b justify-content-center text-center">
                    <div class="col-lg-8">
                        <h3 class="h1 white-color m-20px-b p-20px-b white-after after-50px">You deserve all time best
                        </h3>
                        <p class="m-0px font-2 white-color-light">Mombo is a HTML5 template based on Sass and Bootstrap
                            4 with modern and creative multipurpose design you can use it as a startups.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 m-15px-tb">
                        <div class="media p-40px-tb p-20px-lr box-shadow hover-top white-bg border-radius-5">
                            <div class="icon-80 gray-bg dots-icon border-radius-50 theme-color d-inline-block m-15px-b">
                                <i class="icon-desktop"></i>
                                <span class="dots"><i class="dot dot1"></i><i class="dot dot2"></i><i class="dot dot3"></i></span>
                            </div>
                            <div class="media-body p-20px-l">
                                <h6>Web Development</h6>
                                <p class="m-0px">Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum standard dummy text.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 m-15px-tb">
                        <div class="media p-40px-tb p-20px-lr box-shadow hover-top white-bg border-radius-5">
                            <div class="icon-80 gray-bg dots-icon border-radius-50 theme-color d-inline-block m-15px-b">
                                <i class="icon-tools"></i>
                                <span class="dots"><i class="dot dot1"></i><i class="dot dot2"></i><i class="dot dot3"></i></span>
                            </div>
                            <div class="media-body p-20px-l">
                                <h6>Logo & Identity</h6>
                                <p class="m-0px">Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum standard dummy text.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 m-15px-tb">
                        <div class="media p-40px-tb p-20px-lr box-shadow hover-top white-bg border-radius-5">
                            <div class="icon-80 gray-bg dots-icon border-radius-50 theme-color d-inline-block m-15px-b">
                                <i class="icon-hotairballoon"></i>
                                <span class="dots"><i class="dot dot1"></i><i class="dot dot2"></i><i class="dot dot3"></i></span>
                            </div>
                            <div class="media-body p-20px-l">
                                <h6>Graphics Design</h6>
                                <p class="m-0px">Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum standard dummy text.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 m-15px-tb">
                        <div class="media p-40px-tb p-20px-lr box-shadow hover-top white-bg border-radius-5">
                            <div class="icon-80 gray-bg dots-icon border-radius-50 theme-color d-inline-block m-15px-b">
                                <i class="icon-scissors"></i>
                                <span class="dots"><i class="dot dot1"></i><i class="dot dot2"></i><i class="dot dot3"></i></span>
                            </div>
                            <div class="media-body p-20px-l">
                                <h6>Social Marketing</h6>
                                <p class="m-0px">Lorem Ipsum is simply dummy text of the printing and typesetting
                                    industry. Lorem Ipsum standard dummy text.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- End Section -->
        <!-- Section -->
        <!-- <section class="section effect-section">
            <div class="effect effect-middle gray-bg"></div>
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-5 m-15px-tb">
                        <div class="icon-70 gray-bg dots-icon border-radius-5 border-all-1 border-color-theme theme-color d-inline-block m-25px-b">
                            <i class="icon-desktop"></i>
                            <span class="dots"><i class="dot dot1"></i><i class="dot dot2"></i><i class="dot dot3"></i></span>
                        </div>
                        <div class="h3 m-20px-b">Make smarter business decisions with data analysis</div>
                        <p class="m-0px">Mombo is a HTML5 template based on Sass and Bootstrap 4 with modern and
                            creative multipurpose design you can use it as a startups. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <div class="p-25px-t">
                            <a class="popup-youtube m-btn m-btn-theme m-btn-radius" href="#">Lear More</a>
                        </div>
                    </div>
                    <div class="col-lg-6 m-15px-tb">
                        <img src="<?= base_url('assets/index/'); ?>img/home-1-f1.svg" title="" alt="">
                    </div>
                </div>
                <div class="md-m-40px-tb lg-m-60px-tb m-80px-tb">
                    <hr>
                </div>
                <div class="row align-items-center justify-content-between flex-row-reverse">
                    <div class="col-lg-5 m-15px-tb text-lg-right">
                        <div class="icon-70 gray-bg dots-icon border-radius-5 border-all-1 border-color-theme theme-color d-inline-block m-25px-b">
                            <i class="icon-desktop"></i>
                            <span class="dots"><i class="dot dot1"></i><i class="dot dot2"></i><i class="dot dot3"></i></span>
                        </div>
                        <div class="h3 m-20px-b">Make smarter business decisions with data analysis</div>
                        <p class="m-0px">Mombo is a HTML5 template based on Sass and Bootstrap 4 with modern and
                            creative multipurpose design you can use it as a startups. Ut enim ad minim veniam, quis
                            nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                        <div class="p-25px-t">
                            <a class="popup-youtube m-btn m-btn-theme m-btn-radius" href="#">Lear More</a>
                        </div>
                    </div>
                    <div class="col-lg-6 m-15px-tb">
                        <img src="<?= base_url('assets/index/'); ?>img/home-1-f3.svg" title="" alt="">
                    </div>
                </div>
            </div>
        </section> -->
        <!-- End Section -->
        <!-- Section -->
        <!-- <section class="section theme-bg">
            <div class="container">
                <div class="row md-m-25px-b m-45px-b justify-content-center text-center">
                    <div class="col-lg-8">
                        <h3 class="h1 white-color m-20px-b p-20px-b white-after after-50px">Solutions We Provide</h3>
                        <p class="m-0px font-2 white-color-light">Mombo is a HTML5 template based on Sass and Bootstrap
                            4 with modern and creative multipurpose design you can use it as a startups.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6 m-15px-tb">
                        <div class="p-20px p-50px-r border-all-1 border-color-white arrow-hover">
                            <a class="overlay-link" href="#"></a>
                            <div class="arrow-icon white-color"></div>
                            <h5 class="font-1 font-w-600 white-color m-0px">Unique design</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 m-15px-tb">
                        <div class="p-20px p-50px-r border-all-1 border-color-white arrow-hover">
                            <a class="overlay-link" href="#"></a>
                            <div class="arrow-icon white-color"></div>
                            <h5 class="font-1 font-w-600 white-color m-0px">Different Layout</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 m-15px-tb">
                        <div class="p-20px p-50px-r border-all-1 border-color-white arrow-hover">
                            <a class="overlay-link" href="#"></a>
                            <div class="arrow-icon white-color"></div>
                            <h5 class="font-1 font-w-600 white-color m-0px">Make it Simple</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 m-15px-tb">
                        <div class="p-20px p-50px-r border-all-1 border-color-white arrow-hover">
                            <a class="overlay-link" href="#"></a>
                            <div class="arrow-icon white-color"></div>
                            <h5 class="font-1 font-w-600 white-color m-0px">Responsivenes</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 m-15px-tb">
                        <div class="p-20px p-50px-r border-all-1 border-color-white arrow-hover">
                            <a class="overlay-link" href="#"></a>
                            <div class="arrow-icon white-color"></div>
                            <h5 class="font-1 font-w-600 white-color m-0px">Perfection</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 m-15px-tb">
                        <div class="p-20px p-50px-r border-all-1 border-color-white arrow-hover">
                            <a class="overlay-link" href="#"></a>
                            <div class="arrow-icon white-color"></div>
                            <h5 class="font-1 font-w-600 white-color m-0px">Advanced</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 m-15px-tb">
                        <div class="p-20px p-50px-r border-all-1 border-color-white arrow-hover">
                            <a class="overlay-link" href="#"></a>
                            <div class="arrow-icon white-color"></div>
                            <h5 class="font-1 font-w-600 white-color m-0px">Unique Design</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 m-15px-tb">
                        <div class="p-20px p-50px-r border-all-1 border-color-white arrow-hover">
                            <a class="overlay-link" href="#"></a>
                            <div class="arrow-icon white-color"></div>
                            <h5 class="font-1 font-w-600 white-color m-0px">Different Layout</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- End Section -->
        <!-- Section -->
        <!-- <section class="section">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-lg-5 m-15px-tb">
                        <div class="h3 m-15px-b">Make smarter business decisions with data analysis</div>
                        <p class="font-1 m-40px-b">Mombo is a HTML5 template based on Sass and Bootstrap 4 with modern
                            and creative.</p>
                        <div class="media m-30px-b">
                            <div class="icon-60 gray-bg dots-icon border-radius-5 border-color-theme border-all-1 theme-color">
                                <i class="icon-desktop"></i>
                                <span class="dots"><i class="dot dot1"></i><i class="dot dot2"></i><i class="dot dot3"></i></span>
                            </div>
                            <div class="media-body p-20px-l">
                                <h6>Web Development</h6>
                                <p class="m-0px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                    eiusmod.</p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="icon-60 gray-bg dots-icon border-radius-5 border-color-theme border-all-1 theme-color">
                                <i class="icon-tools"></i>
                                <span class="dots"><i class="dot dot1"></i><i class="dot dot2"></i><i class="dot dot3"></i></span>
                            </div>
                            <div class="media-body p-20px-l">
                                <h6>Logo & Identity</h6>
                                <p class="m-0px">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do
                                    eiusmod.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 text-center m-15px-tb">
                        <img src="<?= base_url('assets/index/'); ?>img/home-1-f5.svg" title="" alt="">
                    </div>
                </div>
            </div>
        </section> -->
        <!-- End Section -->
        <!-- Section -->
        <!-- <section id="team" class="section gray-bg">
            <div class="container">
                <div class="row md-m-25px-b m-45px-b justify-content-center text-center">
                    <div class="col-lg-8">
                        <h3 class="h1 m-20px-b p-20px-b theme-after after-50px">Thanks To</h3>
                        <p class="m-0px font-2">Mombo is a HTML5 template based on Sass and Bootstrap 4 with modern and
                            creative multipurpose design you can use it as a startups.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3 col-sm-6 m-15px-tb">
                        <div class="hover-top-in">
                            <div class="overflow-hidden border-radius-5">
                                <img src="<?= base_url('assets/index/'); ?>img/team-1.jpg" title="" alt="">
                            </div>
                            <div class="m-10px-lr box-shadow border-radius-5 position-relative mt-n4 white-bg p-20px text-center hover-top--in">
                                <h6 class="font-w-700 dark-color m-5px-b">Anas Fajar Pratama</h6>
                                <small>Lecturer</small>
                                <div class="social-icon si-30 theme2nd radius nav justify-content-center p-10px-t">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 m-15px-tb">
                        <div class="hover-top-in">
                            <div class="overflow-hidden border-radius-5">
                                <img src="<?= base_url('assets/index/'); ?>img/team-2.jpg" title="" alt="">
                            </div>
                            <div class="m-10px-lr box-shadow border-radius-5 position-relative mt-n4 white-bg p-20px text-center hover-top--in">
                                <h6 class="font-w-700 dark-color m-5px-b">Nancy Bayers</h6>
                                <small>Co-Founder</small>
                                <div class="social-icon si-30 theme2nd radius nav justify-content-center p-10px-t">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 m-15px-tb">
                        <div class="hover-top-in">
                            <div class="overflow-hidden border-radius-5">
                                <img src="<?= base_url('assets/index/'); ?>img/team-3.jpg" title="" alt="">
                            </div>
                            <div class="m-10px-lr box-shadow border-radius-5 position-relative mt-n4 white-bg p-20px text-center hover-top--in">
                                <h6 class="font-w-700 dark-color m-5px-b">Nancy Bayers</h6>
                                <small>Co-Founder</small>
                                <div class="social-icon si-30 theme2nd radius nav justify-content-center p-10px-t">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 m-15px-tb">
                        <div class="hover-top-in">
                            <div class="overflow-hidden border-radius-5">
                                <img src="<?= base_url('assets/index/'); ?>img/team-4.jpg" title="" alt="">
                            </div>
                            <div class="m-10px-lr box-shadow border-radius-5 position-relative mt-n4 white-bg p-20px text-center hover-top--in">
                                <h6 class="font-w-700 dark-color m-5px-b">Nancy Bayers</h6>
                                <small>Co-Founder</small>
                                <div class="social-icon si-30 theme2nd radius nav justify-content-center p-10px-t">
                                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                                    <a href="#"><i class="fab fa-twitter"></i></a>
                                    <a href="#"><i class="fab fa-linkedin-in"></i></a>
                                    <a href="#"><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- End Section -->
        <!-- Section -->
        <!-- <section id="blog" class="section">
            <div class="container">
                <div class="row md-m-25px-b m-45px-b justify-content-center text-center">
                    <div class="col-lg-8">
                        <h3 class="h1 m-20px-b p-20px-b theme-after after-50px">Daily Updates</h3>
                        <p class="m-0px font-2">Mombo is a HTML5 template based on Sass and Bootstrap 4 with modern and
                            creative multipurpose design you can use it as a startups.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4 m-15px-tb">
                        <div class="hover-top transition blog-grid-overlay" style="background-image: url(<?= base_url('assets/index/'); ?>img/blog-1.jpg); ">
                            <div class="blog-gird-info">
                                <a class="overlay-link" href="#"></a>
                                <div class="b-meta">
                                    <span class="date">02 Mar 2019</span>
                                </div>
                                <h5>Make your Marketing website</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="border-style top light m-20px-t"></div>
                                <div class="media">
                                    <div class="avatar-40 border-radius-50">
                                        <img src="<?= base_url('assets/index/'); ?>img/team-1.jpg" title="" alt="">
                                    </div>
                                    <div class="media-body p-10px-l align-self-center">
                                        <span class="white-color">Rachel Roth</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 m-15px-tb">
                        <div class="hover-top transition blog-grid-overlay" style="background-image: url(<?= base_url('assets/index/'); ?>img/blog-2.jpg); ">
                            <div class="blog-gird-info">
                                <a class="overlay-link" href="#"></a>
                                <div class="b-meta">
                                    <span class="date">02 Mar 2019</span>
                                </div>
                                <h5>Make your Marketing website</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="border-style top light m-20px-t"></div>
                                <div class="media">
                                    <div class="avatar-40 border-radius-50">
                                        <img src="<?= base_url('assets/index/'); ?>img/team-1.jpg" title="" alt="">
                                    </div>
                                    <div class="media-body p-10px-l align-self-center">
                                        <span class="white-color">Rachel Roth</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 m-15px-tb">
                        <div class="hover-top transition blog-grid-overlay" style="background-image: url(<?= base_url('assets/index/'); ?>img/blog-3.jpg); ">
                            <div class="blog-gird-info">
                                <a class="overlay-link" href="#"></a>
                                <div class="b-meta">
                                    <span class="date">02 Mar 2019</span>
                                </div>
                                <h5>Make your Marketing website</h5>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                                <div class="border-style top light m-20px-t"></div>
                                <div class="media">
                                    <div class="avatar-40 border-radius-50">
                                        <img src="<?= base_url('assets/index/'); ?>img/team-1.jpg" title="" alt="">
                                    </div>
                                    <div class="media-body p-10px-l align-self-center">
                                        <span class="white-color">Rachel Roth</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> -->
        <!-- End Section -->
    </main>
    <!-- End Main -->
    <!-- Footer-->
    <footer class="dark-bg footer">
        <div class="footer-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-12 m-15px-tb mr-auto">
                        <div class="m-20px-b">
                            <img src="<?= base_url('assets/index/'); ?>img/logo-light.svg" title="" alt="">
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 m-15px-tb">
                        <h6 class="white-color">
                            And Thanks To
                        </h6>
                        <ul class="list-unstyled links-white footer-link-1">
                            <li>
                                <a href="https://www.codeigniter.com/" target="_blank">Codeigniter</a>
                            </li>
                            <li>
                                <a href="https://www.jquery.com/" target="_blank">Jquery</a>
                            </li>
                            <li>
                                <a href="https://www.getbootstrap.com/" target="_blank">Bootstrap</a>
                            </li>
                            <li>
                                <a href="https://www.adminlte.io/" target="_blank">Admin LTE</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-sm-6 m-15px-tb">
                        <h6 class="white-color">
                            Information
                        </h6>
                        <address>
                            <p class="white-color-light m-5px-b">Karawang Pasirjaya<br /> Jl. Nakula, Cilempung</p>
                            <p class="m-5px-b"><a class="theme2nd-color border-bottom-1 border-color-theme2nd" href="mailto:abdulohmalela10@gmail.com">abdulohmalela10@gmail.com</a></p>
                            <p class="m-5px-b"><a class="theme2nd-color border-bottom-1 border-color-theme2nd" href="tel:0856-9865-822">0856-9865-822</a></p>
                        </address>
                        <div class="social-icon si-30 theme2nd nav">
                            <a href="https://www.github.com/abdulohmalela" target="_blank"><i class="fab fa-github"></i></a>
                            <a href="https:///www.codepen.io/abdulohmalela" target="_blank"><i class="fab fa-codepen"></i></a>
                            <a href="https:///www.youtube.com/abdulohmalela" target="_blank"><i class="fab fa-youtube"></i></a>
                            <a href="https:///www.instagram.com/abdulohmalela" target="_blank"><i class="fab fa-instagram"></i></a>
                        </div>
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
                        <p class="m-0px font-small white-color-light">© 2020 copyright Smart Students By Abduloh</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->