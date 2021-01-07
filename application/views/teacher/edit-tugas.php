<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-dark">Edit Tugas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('teacher/tasks'); ?>">Tugas</a></li>
                        <li class="breadcrumb-item active">Edit Tugas</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-white">
                            <i class="fas fa-book"></i> Edit Tugas
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="nama_tugas">Nama Tugas</label>
                                    <input type="text" class="form-control" name="nama_tugas" value="<?= $tugas['nama_tugas']; ?>" id="nama_tugas" autocomplete="off">
                                    <input type="hidden" name="id_tugas" value="<?= $tugas['id_tugas']; ?>">
                                    <?= form_error('nama_tugas', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="mapel">Mata Pelajaran</label>
                                    <select class="form-control" name="mapel" id="mapel">
                                        <option value="">Pilih Mata Pelajaran</option>
                                        <?php foreach ($guru_mapel as $m) : ?>
                                            <?php if ($m['mapel_id'] == $tugas['mapel']) : ?>
                                                <option value="<?= $m['mapel_id']; ?>" selected><?= $m['mapel']; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $m['mapel_id']; ?>"><?= $m['mapel']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <select class="form-control" name="kelas" id="kelas">
                                        <option value="">Pilih Kelas</option>
                                        <?php foreach ($guru_kelas as $k) : ?>
                                            <?php if ($k['kelas_id'] == $tugas['kelas']) : ?>
                                                <option value="<?= $k['kelas_id']; ?>" selected><?= $k['kelas']; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $k['kelas_id']; ?>"><?= $k['kelas']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Pesan / Catatan</label>
                                    <textarea id="text-editor2" name="pesan"><?= $tugas['pesan']; ?></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="">Batas Waktu</label>
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <input type="date" value="<?= substr($tugas['due_date'], 0, 10); ?>" class="form-control" name="tgl" id="tgl">
                                        </div>
                                        <div class="col-sm-3">
                                            <input type="time" value="<?= substr($tugas['due_date'], 11, 5); ?>" class="form-control" name="jam" id="jam">
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary float-right mt-3">Update Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>