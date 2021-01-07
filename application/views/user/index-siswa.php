<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-dark">Profile</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">Profile</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <?= $this->session->flashdata('pesan'); ?>
                <div class="col-lg-4">
                    <?= $this->session->flashdata('pesan'); ?>
                    <div class="card card-info card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle" src="<?= base_url('user-file/img/') . $siswa['gambar']; ?>" alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center"><?= $siswa['nama_siswa']; ?></h3>

                            <p class="text-muted text-center"><?= $siswa['email']; ?></p>

                            <ul class="list-group list-group-unbordered mb-3">
                                <li class="list-group-item">
                                    <b>No Registrasi</b> <a class="float-right"><?= $siswa['no_regis']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Kelas</b> <a class="float-right"><?= $siswa['nama_kelas']; ?></a>
                                </li>
                                <li class="list-group-item">
                                    <?php if ($siswa['is_active'] == 1) : ?>
                                        <b>Status</b> <a class="float-right badge badge-info text-white">Active</a>
                                    <?php else : ?>
                                        <b>Status</b> <a class="float-right badge badge-danger text-white">De Active</a>
                                    <?php endif; ?>
                                </li>
                                <li class="list-group-item">
                                    <b>Role</b> <a class="float-right">Student</a>
                                </li>
                            </ul>

                            <a href="<?= base_url('user/editprofile'); ?>" class="btn btn-info btn-block"><b>Edit Profile</b></a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class="card-title">
                                <i class="fas fa-exclamation-triangle"></i>
                                Info
                            </h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <?php if ($pemberitahuanMateri || $pemberitahuanTugas) : ?>
                                <p class="text-muted">Pemberitahuan ini akan hilang 1 jam kedepan</p>
                                <?php if ($pemberitahuanMateri) : ?>
                                    <?php foreach ($pemberitahuanMateri as $pm) : ?>
                                        <div class="alert alert-info alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h5><i class="icon fas fa-info"></i> New Material!</h5>
                                            <?= $pm['email_guru']; ?><br>
                                            Post New material<br>
                                            <span style="font-style: italic">"<?= $pm['pemberitahuan']; ?>"</span><br>
                                            on <?= date('l, Y-m-d H:i:s', $pm['date_created']); ?>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                                <?php if ($pemberitahuanTugas) : ?>
                                    <?php foreach ($pemberitahuanTugas as $pt) : ?>
                                        <div class="alert alert-info alert-dismissible">
                                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                            <h6><i class="icon fas fa-info"></i> New Assignment!</h6>
                                            <?= $pt['email_guru']; ?><br>
                                            Post New assignment<br>
                                            <span style="font-style: italic">"<?= $pt['pemberitahuan']; ?>"</span><br>
                                            on <?= date('l, Y-m-d H:i:s', $pt['date_created']); ?>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            <?php else : ?>
                                <h5>Tidak ada Pemberitahuan</h5>
                            <?php endif; ?>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg">
                    <div class="card direct-chat direct-chat-primary card-info card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Direct Chat</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Conversations are loaded here -->
                            <div id="isiRoomChat" class="direct-chat-messages">
                            </div>
                            <!--/.direct-chat-messages-->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <form method="post" id="f-rm">
                                <input type="hidden" id="id_kelas_rm" name="id_kelas" value="<?= $siswa['id_kelas']; ?>">
                                <input type="hidden" id="gambar_rm" name="gambar_rm" value="<?= $siswa['gambar']; ?>">
                                <input type="hidden" id="email_rm" name="email" value="<?= $siswa['email']; ?>">
                                <input type="hidden" id="nama_rm" name="nama" value="<?= $siswa['nama_siswa']; ?>">
                                <div class="input-group">
                                    <textarea wrap="hard" name="pesan" id="pesan_rm" placeholder="Type Message ..." class="form-control" autocomplete="off" required></textarea>
                                    <span class="input-group-append">
                                        <button type="button" id="btn-rm" class="btn btn-primary">Send</button>
                                    </span>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-footer-->
                    </div>
                </div>
                <div class="col-lg">
                    <div class="card card-info card-outline">
                        <div class="card-header">
                            classmate
                        </div>
                        <div class="card-body">
                            <ul class="list-group">
                                <?php foreach ($teman as $t) : ?>
                                    <?php if ($t['email'] == $this->session->userdata('email')) : ?>
                                        <li class="list-group-item"><img src="<?= base_url('user-file/img/') . $t['gambar']; ?>" style="width: 50px;" class="rounded"> <?= $t['nama_siswa']; ?> <span class="badge badge-info">You</span></li>
                                    <?php else : ?>
                                        <li class="list-group-item"><img src="<?= base_url('user-file/img/') . $t['gambar']; ?>" style="width: 50px;" class="rounded"> <?= $t['nama_siswa']; ?></li>
                                    <?php endif; ?>
                                    <hr>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>