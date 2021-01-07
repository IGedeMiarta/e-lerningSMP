<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-dark">Upload Materi</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('teacher'); ?>">Materi</a></li>
                        <li class="breadcrumb-item active">Upload Materi</li>
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
                                    Pastikan file yang ingin di upload adalah <span class="badge badge-primary">Word</span> <span class="badge badge-danger">PDF</span> <span class="badge badge-warning">PPT</span> <span class="badge badge-secondary">RAR</span> atau <span class="badge badge-secondary">ZIP</span>
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <?= $this->session->flashdata('pesan'); ?>
                    <div class="card">
                        <div class="card-header bg-white">
                            <i class="fas fa-book"></i> Upload Materi
                        </div>
                        <div class="card-body">
                            <?= form_open_multipart(); ?>
                            <div class="form-group">
                                <label for="nama_materi">Nama Materi</label>
                                <input type="text" class="form-control" name="nama_materi" id="nama_materi" autocomplete="off">
                                <?= form_error('nama_siswa', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="mapel">Mata Pelajaran</label>
                                <select class="form-control" name="mapel" id="mapel">
                                    <option value="">Pilih Mata Pelajaran</option>
                                    <?php foreach ($guru_mapel as $m) : ?>
                                        <option value="<?= $m['mapel_id']; ?>"><?= $m['mapel']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <select class="form-control" name="kelas" id="kelas">
                                    <option value="">Pilih Kelas</option>
                                    <?php foreach ($guru_kelas as $k) : ?>
                                        <option value="<?= $k['kelas_id']; ?>"><?= $k['kelas']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <?= form_error('kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="">Pesan</label>
                                <textarea id="text-editor" name="catatan"></textarea>
                            </div>

                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">File 1</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input unggah_materi" id="unggah_materi" name="unggah_materi" required>
                                            <label class="custom-file-label unggah_materi-label" for="unggah_materi">Choose file</label>
                                        </div>
                                        <?= form_error('unggah_materi', '<small class="text-danger pl-3">', '</small>'); ?>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">File 2</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input unggah_materi2" id="unggah_materi2" name="unggah_materi2">
                                            <label class="custom-file-label unggah_materi2-label" for="unggah_materi2">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary float-right mt-3">Tambah Data</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>