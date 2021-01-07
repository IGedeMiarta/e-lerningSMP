<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Guru</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Guru</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Alert -->
    <?php if ($this->session->flashdata('berhasil')) : ?>
        <script>
            Swal.fire(
                'Success',
                'Data Berhasil <?= $this->session->flashdata("berhasil"); ?>',
                'success'
            )
        </script>
    <?php endif; ?>
    <?php if ($this->session->flashdata('gagal')) : ?>
        <script>
            Swal.fire(
                'Oops..',
                'Somethings Wrong',
                'error'
            )
        </script>
    <?php endif; ?>
    <!-- End Alert -->

    <section class="content">
        <div class="container-fluid">
            <!-- Data Kelas -->
            <div class="row pt-1">
                <div class="col-lg">
                    <!-- DIRECT Data -->
                    <div class="card direct-chat direct-chat-primary">
                        <div class="card-header bg-gradient-dark mb-2">
                            <h3 class="card-title text-white"><i class="fas fa-chalkboard-teacher text-white"></i> Data Guru</h3>
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-plus text-white"></i>
                                </button>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <!-- Conversations are loaded here -->
                            <div class="container">
                                <a href="<?= base_url('admin/addteacher'); ?>" class="btn btn-outline-info btn-sm mb-2"><i class="fas fa-plus"></i> Tambah Data</a>
                                <a href="<?= base_url('MpdfAdmin/printguru/'); ?>" class="btn btn-outline-warning btn-sm ml-2 mb-2" target="_blank"><i class="fas fa-print"></i> Export PDF</a>
                                <table id="tbl-guru" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: middle">No</th>
                                            <th style="vertical-align: middle">Informasi Guru</th>
                                            <th style="vertical-align: middle">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($guru as $g) : ?>
                                            <tr>
                                                <th><?= $no++; ?></th>
                                                <td>
                                                    <div style="float: left; padding-right: 10px;"><img src="<?= base_url('user-file/img/') . $g['gambar']; ?>" width="55px" style="box-shadow: 0 0 10px rgba(0,0,0,.5);border-radius: 50%;"></div>
                                                    <?= $g['nama']; ?>
                                                    <span style="color: #696969">
                                                        (<?= $g['no_regis']; ?>)
                                                        <?php if ($g['is_active'] == 0) : ?>
                                                            <u class="text-danger">Tidak Aktif</u>
                                                        <?php endif; ?>
                                                        <br>
                                                        <?= $g['email']; ?>
                                                    </span>
                                                </td>
                                                <td style="vertical-align: middle; text-align: center;">
                                                    <a href="<?= base_url('admin/updateteacher/') . encrypt_url($g['id']); ?>" class="btn btn-outline-primary btn-sm mr-1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="<?= base_url('admin/deleteteacher/') . encrypt_url($g['id']); ?>" class="btn btn-outline-danger btn-sm ml-1 btn-hapus">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>



                            </div>
                            <!-- /.direct-Data-pane -->
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">

                        </div>
                        <!-- /.card-footer-->
                    </div>
                    <!--/.direct-Data -->
                </div>
            </div>
            <!-- End Data Kelas -->

        </div>
    </section>

</div>