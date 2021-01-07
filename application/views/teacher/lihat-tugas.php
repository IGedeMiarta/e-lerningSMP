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
                        <li class="breadcrumb-item"><a href="<?= base_url('teacher/tasks'); ?>">Tugas</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <?= $this->session->flashdata('pesan'); ?>
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
                                <div class="direct-chat-messages" style="height: 340px">
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
                                                    Batas Waktu
                                                </td>
                                                <td>
                                                    : <?= $tugas['due_date']; ?></td>
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
                                        <div class="col-lg-6">
                                            <ul class="list-group">
                                                <li class="list-group-item active">Siswa yang mengumpulkan</li>
                                                <?php foreach ($lihatTugas as $lt) : ?>
                                                    <li class="list-group-item">
                                                        <a href="<?= base_url('teacher/tugasSiswa/') . '?no_regis_siswa=' . encrypt_url($lt['no_regis_siswa']) . '&id_tugas=' . encrypt_url($tugas['id_tugas']); ?>">
                                                            <?= $lt['nama_siswa']; ?>
                                                            <span class="float-right badge badge-danger"><?= $lt['nilai']; ?> / 100</span>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6">
                                            <ul class="list-group nilai-siswa-telat" id="nilai-siswa-telat">
                                                <li class="list-group-item bg-danger">Siswa yang Telat mengumpulkan</li>
                                                <?php foreach ($lihatTugasTelat as $lt) : ?>
                                                    <li class="list-group-item">
                                                        <a href="<?= base_url('teacher/tugasSiswa/') . '?no_regis_siswa=' . encrypt_url($lt['no_regis_siswa']) . '&id_tugas=' . encrypt_url($tugas['id_tugas']); ?>">
                                                            <?= $lt['nama_siswa']; ?>
                                                            <span class="float-right badge badge-danger"><?= $lt['nilai']; ?> / 100</span>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
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
                                <div id="isi-komen-tugas" class="direct-chat-messages">

                                </div>
                                <!--/.direct-chat-messages-->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <form method="post">
                                    <input type="hidden" id="id_tugas" name="id_tugas" value="<?= $tugas['id_tugas']; ?>">
                                    <input type="hidden" id="gambar_chat-tugas" name="gambar_chat" value="<?= $guru['gambar']; ?>">
                                    <input type="hidden" id="email-tugas" name="email" value="<?= $guru['email']; ?>">
                                    <input type="hidden" id="nama-tugas" name="nama" value="<?= $guru['nama']; ?>">
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
                                <div class="direct-chat-messages" style="height: 340px">
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
                                                    Batas Waktu
                                                </td>
                                                <td>
                                                    : <?= $tugas['due_date']; ?></td>
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
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <ul class="list-group">
                                                <li class="list-group-item active">Siswa yang mengumpulkan</li>
                                                <?php foreach ($lihatTugas as $lt) : ?>
                                                    <li class="list-group-item">
                                                        <a href="<?= base_url('teacher/tugassiswa/') . '?no_regis_siswa=' . encrypt_url($lt['no_regis_siswa']) . '&id_tugas=' . encrypt_url($tugas['id_tugas']); ?>">
                                                            <?= $lt['nama_siswa']; ?>
                                                            <span class="float-right badge badge-danger"><?= $lt['nilai']; ?> / 100</span>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                        <div class="col-lg-6">
                                            <ul class="list-group" id="nilai-siswa-telat">
                                                <li class="list-group-item bg-danger">Siswa yang Telat mengumpulkan</li>
                                                <?php foreach ($lihatTugasTelat as $lt) : ?>
                                                    <li class="list-group-item">
                                                        <a href="<?= base_url('teacher/tugassiswa/') . '?no_regis_siswa=' . encrypt_url($lt['no_regis_siswa']) . '&id_tugas=' . encrypt_url($tugas['id_tugas']); ?>">
                                                            <?= $lt['nama_siswa']; ?>
                                                            <span class="float-right badge badge-danger"><?= $lt['nilai']; ?> / 100</span>
                                                        </a>
                                                    </li>
                                                <?php endforeach; ?>
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
                                <div id="isi-komen-tugas" class="direct-chat-messages">

                                </div>
                                <!--/.direct-chat-messages-->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <form method="post">
                                    <input type="hidden" id="id_tugas" name="id_tugas" value="<?= $tugas['id_tugas']; ?>">
                                    <input type="hidden" id="gambar_chat-tugas" name="gambar_chat" value="<?= $guru['gambar']; ?>">
                                    <input type="hidden" id="email-tugas" name="email" value="<?= $guru['email']; ?>">
                                    <input type="hidden" id="nama-tugas" name="nama" value="<?= $guru['nama']; ?>">
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