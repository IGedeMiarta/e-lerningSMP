<!-- Main Sidebar Container -->
<aside class="main-sidebar elevation-4 sidebar-dark-primary">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="<?= base_url('assets/'); ?>logo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SMP Negeri 2 Mlati</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3">
            <div class="info text-center" style="width: 100%">
                <?php if ($this->session->userdata('role_id') == 1) : ?>
                    <a href="<?= base_url('admin'); ?>" class="d-block">ADMIN</a>
                <?php endif; ?>
                <?php if ($this->session->userdata('role_id') == 2) : ?>
                    <a href="<?= base_url('user'); ?>" class="d-block">TEACHER</a>
                <?php endif; ?>
                <?php if ($this->session->userdata('role_id') == 3) : ?>
                    <a href="<?= base_url('user'); ?>" class="d-block">STUDENT</a>
                <?php endif; ?>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <?php if ($this->session->userdata('role_id') == 1) { ?>
                    <li class="nav-item">
                        <a href="<?= base_url('admin'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-home"></i>
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link ">
                            <i class="nav-icon fas fa-edit"></i>
                            <p>
                                Master Data
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('admin/datasiswa'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Siswa</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('admin/dataguru'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Guru</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('admin/datakelas'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Kelas</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('admin/datamapel'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data MaPel</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chalkboard-teacher"></i>
                            <p>
                                Manajemen Guru
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('admin/rgurukelas'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Relasi Kelas</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('admin/rgurumapel'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Relasi MaPel</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-header">USER</li>
                    <li class="nav-item">
                        <a href="<?= base_url('user'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Profile
                            </p>
                        </a>
                    </li>
                    <div class="mt-1" style="border-top: 1px solid rgba(255,255,255,0.2);"></div>
                    <li class="nav-item mt-2">
                        <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                <?php } elseif ($this->session->userdata('role_id') == 2) { ?>

                    <li class="nav-header" style="padding: .5rem;">TEACHER</li>
                    <li class="nav-item">
                        <a href="<?= base_url('teacher'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Materi
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('teacher/tasks/'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>
                                Tugas
                            </p>
                        </a>
                    </li>
                    <div class="mt-1" style="border-top: 1px solid rgba(255,255,255,0.2);"></div>

                    <li class="nav-header">USER</li>

                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                User
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('user'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Profile</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('user/editprofile'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Edit Profile</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('user/changepassword'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ubah Password</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <div class="mt-1" style="border-top: 1px solid rgba(255,255,255,0.2);"></div>
                    <li class="nav-item mt-2">
                        <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                <?php } elseif ($this->session->userdata('role_id') == 3) { ?>

                    <li class="nav-header" style="padding: .5rem;">STUDENTS</li>
                    <li class="nav-item">
                        <a href="<?= base_url('siswa'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-book"></i>
                            <p>
                                Materi
                                <?php if ($pemberitahuan) : ?>
                                    <?php
                                    $n = 0;
                                    foreach ($pemberitahuan as $p) {
                                        if ($p['is_tugas'] == 0) {
                                            $n++;
                                        }
                                    }
                                    ?>
                                    <?php if ($n != 0) :
                                    ?>
                                        <span class="right badge badge-danger"><?= $n; ?></span>
                                    <?php endif;
                                    ?>
                                <?php endif; ?>
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="<?= base_url('siswa/tugas'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-tasks"></i>
                            <p>
                                Tugas
                                <?php if ($pemberitahuan) : ?>
                                    <?php
                                    $n = 0;
                                    foreach ($pemberitahuan as $p) {
                                        if ($p['is_tugas'] == 1) {
                                            $n++;
                                        }
                                    }
                                    ?>
                                    <?php if ($n != 0) :
                                    ?>
                                        <span class="right badge badge-danger"><?= $n; ?></span>
                                    <?php endif;
                                    ?>
                                <?php endif; ?>
                            </p>
                        </a>
                    </li>

                    <li class="nav-header">USER</li>
                    <li class="nav-item has-treeview">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                User
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('user'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Profile</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('user/editprofile'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Edit Profile</p>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="<?= base_url('user/changepassword'); ?>" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Ubah Password</p>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <div class="mt-1" style="border-top: 1px solid rgba(255,255,255,0.2);"></div>
                    <li class="nav-item mt-2">
                        <a href="<?= base_url('auth/logout'); ?>" class="nav-link">
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>
                                Logout
                            </p>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>