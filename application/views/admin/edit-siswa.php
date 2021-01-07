<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-dark">Edit Data Siswa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/controlpanel'); ?>">Control Panel</a></li>
                            <li class="breadcrumb-item active">Edit Data Siswa</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="row">
            <div class="col-lg-6 ml-3">
                <div class="card direct-chat direct-chat-primary">
                    <div class="card-header" style="background-color: #f7f7f7;">
                        <h3 class="card-title">Form Edit Data Siswa</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $siswa['id']; ?>">
                        <div class="card-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages">
                                <div class="form-group">
                                    <label for="nama_siswa">Nama Siswa</label>
                                    <input type="text" class="form-control" name="nama_siswa" id="nama_siswa" value="<?= $siswa['nama_siswa']; ?>" autocomplete="off">
                                    <?= form_error('nama_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="no_regis">No registrasi</label>
                                    <input type="text" class="form-control" name="no_regis" id="no_regis" value="<?= $siswa['no_regis']; ?>" readonly>
                                    <input type="hidden" class="form-control" name="no-regis" id="no-regis" value="<?= substr($siswa['no_regis'], 0, 6); ?>" readonly>
                                </div>
                                <label>Jenis Kelamin</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" name="jenis_kelamin" value="Laki - Laki" class="custom-control-input" checked>
                                    <label class="custom-control-label font-weight-normal" for="customRadioInline1">Laki - Laki</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="jenis_kelamin" value="Perempuan" class="custom-control-input">
                                    <label class="custom-control-label font-weight-normal" for="customRadioInline2">Perempuan</label>
                                </div>
                                <hr>

                                <div class="form-group">
                                    <label for="id_kelas">Kelas</label>
                                    <select class="form-control" name="id_kelas" id="id_kelas" value=" <?= $siswa['id_kelas']; ?>">
                                        <?php foreach ($kelas as $k) : ?>
                                            <?php if ($k['id'] == $siswa['id_kelas']) : ?>
                                                <option value="<?= $k['id']; ?>" selected><?= $k['nama_kelas']; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $k['id']; ?>"><?= $k['nama_kelas']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('id_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="text" class="form-control" name="email" id="email" value="<?= $siswa['email']; ?>" autocomplete="off">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Edit Data</button>
                        </div>
                    </form>
                    <!-- /.card-footer-->
                </div>
            </div>
        </div>
    </div>
</div>