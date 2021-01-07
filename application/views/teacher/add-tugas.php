<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-dark">Buat Tugas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('teacher/tasks'); ?>">Tugas</a></li>
                        <li class="breadcrumb-item active">Buat Tugas</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <?= $this->session->flashdata('pesan'); ?>
                    <div class="card">
                        <div class="card-header bg-white">
                            <i class="fas fa-tasks"></i> Buat Tugas
                        </div>
                        <div class="card-body">
                            <?= form_open_multipart(); ?>
                            <div class="form-group">
                                <label for="nama_tugas">Nama Tugas</label>
                                <input type="text" class="form-control" name="nama_tugas" id="nama_tugas" autocomplete="off">
                                <?= form_error('nama_tugas', '<small class="text-danger pl-3">', '</small>'); ?>
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
                                <label for="">Tugas Essay</label><br>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="is_essay" id="inlineRadio1" value="1" checked>
                                    <label class="form-check-label" for="inlineRadio1"> Ya</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="radio" name="is_essay" id="inlineRadio2" value="0">
                                    <label class="form-check-label" for="inlineRadio2"> Upload File</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="">Pesan</label>
                                <textarea id="text-editor2" name="pesan"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="">File</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input unggah_materi" id="nama_file" name="nama_file">
                                    <label class="custom-file-label unggah_materi-label" for="unggah_materi">Choose file</label>
                                </div>
                                <?= form_error('unggah_materi', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>

                            <div class="form-group">
                                <label for="">Batas Waktu</label>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <input type="date" class="form-control" name="tgl" id="tgl" required>
                                    </div>
                                    <div class="col-sm-3">
                                        <input type="time" class="form-control" name="jam" id="jam" required>
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