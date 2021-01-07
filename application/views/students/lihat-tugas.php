<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-dark">Detail</h1>
                    <?= $this->session->flashdata('pesan'); ?>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('siswa/tugas'); ?>">Tugas</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="container-fluid">
            <?php if ($tugas['is_essay'] == 0) : ?>
                <div class="row pb-3">
                    <div class="col-lg-12">
                        <!-- DIRECT DATA -->
                        <div class="card direct-chat direct-chat-primary">
                            <div class="card-header bg-white">
                                <h3 class="card-title">
                                    <i class="fas fa-tasks"></i> <?= $tugas['nama_tugas'] . ' (' . $tugas['nama_mapel'] . ')'; ?></i>
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- Conversations are loaded here -->
                                <div class="direct-chat-messages" style="height: 600px">
                                    <table style="font-weight: bold">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Penyaji
                                                </td>
                                                <td>
                                                    : <?= $tugas['nama']; ?> </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Untuk
                                                </td>
                                                <td>
                                                    : <?= $tugas['nama_kelas']; ?> </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Due Date
                                                </td>
                                                <td>
                                                    : <?= $tugas['due_date']; ?> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <p>
                                        <?= $tugas['pesan']; ?>
                                    </p>
                                    <?php if ($tugas['file']) : ?>
                                        <div class="row">
                                            <div class="col-lg-3 shadow p-3 ml-2 bg-white rounded">
                                                <div class="materi-body p-1">
                                                    <h6 class="materi-title">Here is Your File</h6>
                                                    <p class="materi-text"><?= $tugas['file']; ?></p>
                                                    <a href="<?= base_url('Download/bahantugas/') . $tugas['file']; ?>" class="btn btn-primary"><i class="fas fa-download"></i> Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <?php if ($siswa['no_regis'] == $lihatTugas['no_regis_siswa'] && $lihatTugas['tugas_id'] == $tugas['id_tugas']) : ?>
                                                <ul class="list-group mt-4">
                                                    <li class="list-group-item active">Jawabanmu</li>
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-lg-8">
                                                                <div class="col-lg-8 shadow p-3 bg-white rounded">
                                                                    <div class="materi-body p-1">
                                                                        <h6 class="materi-title">Here is Your File</h6>
                                                                        <p class="materi-text"><?= $lihatTugas['file']; ?></p>
                                                                        <a href="<?= base_url('Download/DownloadTugas/') . $lihatTugas['file']; ?>" class="btn btn-primary"><i class="fas fa-download"></i> Download</a>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <br>
                                                <?php if ($lihatTugas['nilai'] == null) : ?>
                                                    <span class="ml-1 mt-5 text-danger">Score: Belum Dinilai</span>
                                                <?php else : ?>
                                                    <?php if ($lihatTugas['telat'] == 1) : ?>
                                                        <span class="ml-1 mt-5 text-info">Score: <?= $lihatTugas['nilai']; ?>/100</span>
                                                        <span class="ml-1 mt-5 text-danger">Status: Telat Dikumpulkan</span>
                                                    <?php else : ?>
                                                        <span class="ml-1 mt-5 text-info">Score: <?= $lihatTugas['nilai']; ?>/100</span>
                                                        <span class="ml-1 mt-5 text-info">Status: Sukses</span>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php else : ?>
                                                <ul class="list-group mt-5">
                                                    <li class="list-group-item active">Upload Jawabanmu</li>
                                                    <li class="list-group-item">
                                                        <?= form_open_multipart(base_url('tugas/upload')); ?>
                                                        <input type="text" style="display: none;" name="no_regis_guru" value="<?= $tugas['guru']; ?>">
                                                        <input type="hidden" style="display: none;" name="no_regis_siswa" value="<?= $siswa['no_regis']; ?>">
                                                        <input type="hidden" style="display: none;" name="tugas_id" value="<?= encrypt_url($tugas['id_tugas']); ?>">
                                                        <input type="hidden" style="display: none;" name="kelas" value="<?= $tugas['kelas']; ?>">
                                                        <input type="hidden" style="display: none;" name="mapel" value="<?= $tugas['mapel']; ?>">
                                                        <div class="form-group">
                                                            <label for="">File</label>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input file" name="file">
                                                                <label class="custom-file-label file-label" for="file">Choose file</label>
                                                            </div>
                                                            <?= form_error('file', '<small class="text-danger pl-3">', '</small>'); ?>
                                                        </div>
                                                        <button type="submit" class="btn btn-primary">Submit</button>
                                                        </form>
                                                    </li>
                                                </ul>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.direct-Data-panel -->
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!--/.direct-Data -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card direct-chat direct-chat-primary">
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
                                <div id="isi-komen-tugas" class="direct-chat-messages" style="height: 450px;">

                                </div>
                                <!--/.direct-chat-messages-->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <form method="post">
                                    <input type="hidden" id="id_tugas" name="id_tugas" value="<?= $tugas['id_tugas']; ?>">
                                    <input type="hidden" id="gambar_chat-tugas" name="gambar_chat" value="<?= $siswa['gambar']; ?>">
                                    <input type="hidden" id="email-tugas" name="email" value="<?= $siswa['email']; ?>">
                                    <input type="hidden" id="nama-tugas" name="nama" value="<?= $siswa['nama_siswa']; ?>">
                                    <div class="input-group">
                                        <textarea name="pesan" id="pesan-tugas" placeholder="Type Message ..." class="form-control" autocomplete="off"></textarea>
                                        <span class="input-group-append">
                                            <button type="button" id="btn-chat-tgs" class="btn btn-primary">Send</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-footer-->
                        </div>
                    </div>
                </div>
            <?php else : ?>
                <div class="row pb-3">
                    <div class="col-lg-12">
                        <!-- DIRECT DATA -->
                        <div class="card direct-chat direct-chat-primary">
                            <div class="card-header bg-white">
                                <h3 class="card-title">
                                    <i class="fas fa-tasks"></i> <?= $tugas['nama_tugas'] . ' (' . $tugas['nama_mapel'] . ')'; ?></i>
                                </h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- Conversations are loaded here -->
                                <div class="direct-chat-messages" style="height: 600px">
                                    <table style="font-weight: bold">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Penyaji
                                                </td>
                                                <td>
                                                    : <?= $tugas['nama']; ?> </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Untuk
                                                </td>
                                                <td>
                                                    : <?= $tugas['nama_kelas']; ?> </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Due Date
                                                </td>
                                                <td>
                                                    : <?= $tugas['due_date']; ?> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <p>
                                        <?php
                                        $search = array(
                                            '&gt;',
                                            '&lt;',
                                            'width="640"'
                                        );

                                        $replace = array(
                                            '>',
                                            '<',
                                            'width="100%"'
                                        );
                                        ?>
                                        <?= str_replace($search, $replace, $tugas['pesan']); ?>
                                    </p>
                                    <?php if ($tugas['file'] != null) : ?>
                                        <div class="row">
                                            <div class="col-lg-3 shadow p-3 ml-2 bg-white rounded">
                                                <div class="materi-body p-1">
                                                    <h6 class="materi-title">Here is Your File</h6>
                                                    <p class="materi-text"><?= $tugas['file']; ?></p>
                                                    <a href="<?= base_url('Download/bahantugas/') . $tugas['file']; ?>" class="btn btn-primary"><i class="fas fa-download"></i> Download</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                    <br>
                                    <?php if ($siswa['no_regis'] == $lihatTugas['no_regis_siswa'] && $lihatTugas['tugas_id'] == $tugas['id_tugas']) : ?>
                                        <ul class="list-group mt-5">
                                            <li class="list-group-item active">Jawabanmu</li>
                                            <li class="list-group-item">
                                                <?= $lihatTugas['essay']; ?>
                                            </li>
                                        </ul>
                                        <br>
                                        <?php if ($lihatTugas['nilai'] == null) : ?>
                                            <span class="ml-1 mt-5 text-danger">Score: Belum Dinilai</span>
                                        <?php else : ?>
                                            <?php if ($lihatTugas['telat'] == 1) : ?>
                                                <span class="ml-1 mt-5 text-info">Score: <?= $lihatTugas['nilai']; ?>/100</span>
                                                <span class="ml-1 mt-5 text-danger">Status: Telat Dikumpulkan</span>
                                            <?php else : ?>
                                                <span class="ml-1 mt-5 text-info">Score: <?= $lihatTugas['nilai']; ?>/100</span>
                                                <span class="ml-1 mt-5 text-info">Status: Sukses</span>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <ul class="list-group mt-5">
                                            <li class="list-group-item active">Ketikkan Jawabanmu</li>
                                            <li class="list-group-item">
                                                <form action="<?= base_url('tugas/essay'); ?>" method="post">
                                                    <input type="text" style="display: none;" name="no_regis_guru" value="<?= $tugas['guru']; ?>">
                                                    <input type="hidden" style="display: none;" name="no_regis_siswa" value="<?= $siswa['no_regis']; ?>">
                                                    <input type="hidden" style="display: none;" name="tugas_id" value="<?= encrypt_url($tugas['id_tugas']); ?>">
                                                    <input type="hidden" style="display: none;" name="kelas" value="<?= $tugas['kelas']; ?>">
                                                    <input type="hidden" style="display: none;" name="mapel" value="<?= $tugas['mapel']; ?>">
                                                    <textarea name="essay" id="text-editor2"></textarea>
                                                    <button type="submit" class="btn btn-primary">Submit</button>
                                                </form>
                                            </li>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                                <!-- /.direct-Data-panel -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">

                            </div>
                            <!-- /.card-footer-->
                        </div>
                        <!--/.direct-Data -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card direct-chat direct-chat-primary">
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
                                <div id="isi-komen-tugas" class="direct-chat-messages" style="height: 450px;">

                                </div>
                                <!--/.direct-chat-messages-->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <form method="post">
                                    <input type="hidden" id="id_tugas" name="id_tugas" value="<?= $tugas['id_tugas']; ?>">
                                    <input type="hidden" id="gambar_chat-tugas" name="gambar_chat" value="<?= $siswa['gambar']; ?>">
                                    <input type="hidden" id="email-tugas" name="email" value="<?= $siswa['email']; ?>">
                                    <input type="hidden" id="nama-tugas" name="nama" value="<?= $siswa['nama_siswa']; ?>">
                                    <div class="input-group">
                                        <textarea name="pesan" id="pesan-tugas" placeholder="Type Message ..." class="form-control" autocomplete="off"></textarea>
                                        <span class="input-group-append">
                                            <button type="button" id="btn-chat-tgs" class="btn btn-primary">Send</button>
                                        </span>
                                    </div>
                                </form>
                            </div>
                            <!-- /.card-footer-->
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        </div>
    </section>
</div>