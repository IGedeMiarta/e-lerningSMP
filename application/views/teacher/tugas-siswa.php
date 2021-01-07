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
                        <li class="breadcrumb-item"><a href="<?= base_url('teacher/lihattugas/') . encrypt_url($tugasSiswa['tugas_id']); ?>">Tugas</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <?= $this->session->flashdata('pesan'); ?>
    <section class="content">
        <div class="container-fluid">
            <?php if ($tugasSiswa['file'] == null) : ?>
                <div class="row pb-3">
                    <div class="col-lg-12">
                        <!-- DIRECT DATA -->
                        <div class="card direct-chat direct-chat-primary">
                            <div class="card-header bg-white">
                                <?php //if ($tugas['dilihat'] == 1) : 
                                ?>
                                <h3 class="card-title">
                                    <i class="far fa-comment-dots"></i> Jawaban <?= $tugasSiswa['nama_siswa']; ?></i>
                                </h3>
                                <?php //else : 
                                ?>
                                <!-- <h3 class="card-title">
                                    <i class="fas fa-book"></i></i>
                                </h3> -->
                                <?php //endif; 
                                ?>
                                <!-- <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-plus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div> -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- Conversations are loaded here -->
                                <div class="direct-chat-messages" style="height: 340px">
                                    <table style="font-weight: bold">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Nama
                                                </td>
                                                <td>
                                                    : <?= $tugasSiswa['nama_siswa']; ?> </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Kelas
                                                </td>
                                                <td>
                                                    : <?= $tugasSiswa['nama_kelas']; ?> </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Mapel
                                                </td>
                                                <td>
                                                    : <?= $tugasSiswa['nama_mapel']; ?> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <ul class="list-group mt-3">
                                                <li class="list-group-item active">Jawaban</li>
                                                <li class="list-group-item">
                                                    <?= $tugasSiswa['essay']; ?>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6">
                                            <ul class="list-group mt-3">
                                                <li class="list-group-item active">Form Penilain</li>
                                                <li class="list-group-item">
                                                    <form action="" method="post">
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" name="nilai" placeholder="Nilai" autocomplete="off">
                                                            <div class="input-group-append">
                                                                <button type="submit" class="btn btn-outline-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                        <?= form_error('nilai', '<span class="text-danger">', '</span>'); ?>
                                                    </form>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
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
            <?php else : ?>
                <div class="row pb-3">
                    <div class="col-lg-12">
                        <!-- DIRECT DATA -->
                        <div class="card direct-chat direct-chat-primary collapsed-card">
                            <div class="card-header bg-white">
                                <?php //if ($tugas['dilihat'] == 1) : 
                                ?>
                                <h3 class="card-title">
                                    <i class="far fa-comment-dots"></i> Jawaban <?= $tugasSiswa['nama_siswa']; ?></i>
                                </h3>
                                <?php //else : 
                                ?>
                                <!-- <h3 class="card-title">
                                <i class="fas fa-book"></i></i>
                            </h3> -->
                                <?php //endif; 
                                ?>
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
                                <div class="direct-chat-messages" style="height: 340px">
                                    <table style="font-weight: bold">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Nama
                                                </td>
                                                <td>
                                                    : <?= $tugasSiswa['nama_siswa']; ?> </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Kelas
                                                </td>
                                                <td>
                                                    : <?= $tugasSiswa['nama_kelas']; ?> </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Mapel
                                                </td>
                                                <td>
                                                    : <?= $tugasSiswa['nama_mapel']; ?> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <ul class="list-group mt-3">
                                                <li class="list-group-item active">Jawaban</li>
                                                <li class="list-group-item">
                                                    <div class="shadow p-3 bg-white rounded">
                                                        <div class="materi-body p-1">
                                                            <h6 class="materi-title">Here is Your File</h6>
                                                            <p class="materi-text"><?= $tugasSiswa['file']; ?></p>
                                                            <a href="<?= base_url('Download/DownloadTugas/') . $tugasSiswa['file']; ?>" class="btn btn-primary"><i class="fas fa-download"></i> Download</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6">
                                            <ul class="list-group mt-3">
                                                <li class="list-group-item active">Form Penilain</li>
                                                <li class="list-group-item">
                                                    <form action="" method="post">
                                                        <div class="input-group mb-3">
                                                            <input type="text" class="form-control" name="nilai" placeholder="Nilai" autocomplete="off">
                                                            <div class="input-group-append">
                                                                <button type="submit" class="btn btn-outline-primary">Submit</button>
                                                            </div>
                                                        </div>
                                                        <?= form_error('nilai', '<span class="text-danger">', '</span>'); ?>
                                                    </form>
                                                </li>
                                            </ul>
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
            <?php endif; ?>
        </div>
    </section>
</div>