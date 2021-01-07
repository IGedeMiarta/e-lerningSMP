<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-dark">Edit Materi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('teacher'); ?>">Materi</a></li>
                        <li class="breadcrumb-item active">Edit Materi</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <i class="fas fa-exclamation-triangle"></i> Petunjuk
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body p-1 pr-4 text-justify">
                            <ol>
                                <li>
                                    Anda hanya bisa mengakses kelas dan matapelajaran yang sudah di tetapkan oleh Administrator. Jika terdapat perubahan atau bug (eror) segera hubungi orang yang ditugaskan sebagai Administrator
                                </li>
                                <li>
                                    Jika Gambar yang anda pilih tidak tampil di halaman, berarti gambar yang ingin anda masukkan tidak cocok dengan kriteria yang seharusnya. cobalah untuk memasukkan gambar yang memiliki ukuran yang kecil
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <!-- Materi Bikin Manual -->
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header bg-white">
                            <i class="fas fa-book"></i> Edit Materi
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label for="nama_materi">Nama Materi</label>
                                    <input type="text" class="form-control" name="nama_materi" id="nama_materi" value="<?= $materi['nama_materi']; ?>" autocomplete="off">
                                    <input type="hidden" value="<?= $materi['id_materi']; ?>" name="id_materi">
                                    <?= form_error('nama_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="mapel">Mata Pelajaran</label>
                                    <select class="form-control" name="mapel" id="mapel">
                                        <option value="">Pilih Mata Pelajaran</option>
                                        <?php foreach ($guru_mapel as $m) : ?>
                                            <?php if ($m['mapel_id'] == $materi['mapel']) : ?>
                                                <option value="<?= $m['mapel_id']; ?>" selected><?= $m['mapel']; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $m['mapel_id']; ?>"><?= $m['mapel']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>

                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <select class="form-control" name="kelas" id="kelas">
                                        <option value="">Pilih Kelas</option>
                                        <?php foreach ($guru_kelas as $k) : ?>
                                            <?php if ($k['kelas_id'] == $materi['kelas']) : ?>
                                                <option value="<?= $k['kelas_id']; ?>" selected><?= $k['kelas']; ?></option>
                                            <?php else : ?>
                                                <option value="<?= $k['kelas_id']; ?>"><?= $k['kelas']; ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                    <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="">Materi</label>
                                    <textarea id="text-editor" name="bikin_manual" value="<?= $materi['bikin_manual']; ?>">
                                    </textarea>
                                </div>
                                <button type="submit" class="btn btn-primary float-right mt-3">Update Data</button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Materi Bikin Manual -->
            </div>
        </div>
    </section>
</div>