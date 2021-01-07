<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-dark">Detail</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('teacher'); ?>">Materi</a></li>
                        <li class="breadcrumb-item active">Detail</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <?= $this->session->flashdata('pesan'); ?>
    <section class="content">
        <div class="container-fluid">
            <?php if ($materi['bikin_manual'] == null) : ?>
                <div class="row pb-3">
                    <div class="col-lg-12">
                        <!-- DIRECT DATA -->
                        <div class="card direct-chat direct-chat-primary">
                            <div class="card-header bg-white">
                                <h3 class="card-title">
                                    <i class="fas fa-book"></i> <?= $materi['nama_materi'] . ' (' . $materi['nama_mapel'] . ')'; ?></i> - <small><?= date('Y-m-d H:i:s', $materi['date_created']); ?></small>
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
                                <div class="direct-chat-messages" style="height: 340px">
                                    <table style="font-weight: bold">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Penyaji
                                                </td>
                                                <td>
                                                    : <?= $materi['nama']; ?> </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Untuk
                                                </td>
                                                <td>
                                                    : <?= $materi['nama_kelas']; ?> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <br>
                                    <p>
                                        <?= $materi['catatan']; ?>
                                    </p><br>
                                    <div class="row">
                                        <div class="col-lg-3 shadow p-3 ml-2 bg-white rounded">
                                            <div class="materi-body p-1">
                                                <h6 class="materi-title">Here is Your File</h6>
                                                <p class="materi-text"><?= $materi['unggah_materi']; ?></p>
                                                <a href="<?= base_url('Download/DownloadMateri/') . $materi['unggah_materi']; ?>" class="btn btn-primary"><i class="fas fa-download"></i> Download</a>
                                            </div>
                                        </div>
                                        <?php if ($materi['unggah_materi2']) : ?>
                                            <div class="col-lg-3 shadow p-3 ml-2 bg-white rounded">
                                                <div class="materi-body p-1">
                                                    <h6 class="materi-title">Here is Your File</h6>
                                                    <p class="materi-text"><?= $materi['unggah_materi2']; ?></p>
                                                    <a href="<?= base_url('Download/DownloadMateri/') . $materi['unggah_materi2']; ?>" class="btn btn-primary"><i class="fas fa-download"></i> Download</a>
                                                </div>
                                            </div>
                                        <?php endif; ?>
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
                                <div id="isi-chat-materi" class="direct-chat-messages">

                                </div>
                                <!--/.direct-chat-messages-->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <form>
                                    <input type="hidden" id="id_materi" name="id_materi" value="<?= $materi['id_materi']; ?>">
                                    <input type="hidden" id="gambar_chat-materi" name="gambar_chat" value="<?= $guru['gambar']; ?>">
                                    <input type="hidden" id="email-materi" name="email" value="<?= $guru['email']; ?>">
                                    <input type="hidden" id="nama_materi" name="nama" value="<?= $guru['nama']; ?>">
                                    <div class="input-group">
                                        <textarea name="pesan" id="pesan-materi" placeholder="Type Message ..." class="form-control" autocomplete="off"></textarea>
                                        <span class="input-group-append">
                                            <button type="button" id="btn-chat-m" class="btn btn-primary">Send</button>
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
                                    <i class="fas fa-book"></i> <?= $materi['nama_materi'] . ' (' . $materi['nama_mapel'] . ')'; ?></i> - <small><?= date('Y-m-d H:i:s', $materi['date_created']); ?></small>
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
                                <div class="direct-chat-messages" style="height: 340px">
                                    <table style="font-weight: bold">
                                        <tbody>
                                            <tr>
                                                <td>
                                                    Penyaji
                                                </td>
                                                <td>
                                                    : <?= $materi['nama']; ?> </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Untuk
                                                </td>
                                                <td>
                                                    : <?= $materi['nama_kelas']; ?> </td>
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
                                        <?= str_replace($search, $replace, $materi['bikin_manual']); ?>
                                    </p>
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
                                <div id="isi-chat-materi" class="direct-chat-messages">

                                </div>
                                <!--/.direct-chat-messages-->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <form method="post">
                                    <input type="hidden" id="id_materi" name="id_materi" value="<?= $materi['id_materi']; ?>">
                                    <input type="hidden" id="gambar_chat-materi" name="gambar_chat" value="<?= $guru['gambar']; ?>">
                                    <input type="hidden" id="email-materi" name="email" value="<?= $guru['email']; ?>">
                                    <input type="hidden" id="nama_materi" name="nama" value="<?= $guru['nama']; ?>">
                                    <div class="input-group">
                                        <textarea name="pesan" id="pesan-materi" placeholder="Type Message ..." class="form-control" autocomplete="off"></textarea>
                                        <span class="input-group-append">
                                            <button type="button" id="btn-chat-m" class="btn btn-primary">Send</button>
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