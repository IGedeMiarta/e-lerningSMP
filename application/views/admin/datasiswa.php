<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Siswa</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Siswa</li>
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
                            <h3 class="card-title text-white"><i class="fas fa-users text-white"></i> Data Siswa</h3>
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
                                <a href="<?= base_url('admin/AddStudent'); ?>" class="btn btn-outline-info btn-sm mb-2"><i class="fas fa-plus"></i> Tambah Data</a>
                                <a href="#" class="btn btn-outline-warning btn-sm mb-2 ml-2" data-toggle="modal" data-target="#PrintSiswaModal"><i class="fas fa-print"></i> Export PDF</a>
                                <table id="tbl-siswa" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: middle">No</th>
                                            <th style="vertical-align: middle">Informasi Siswa</th>
                                            <th style="vertical-align: middle; text-align: center">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($siswa as $s) : ?>
                                            <tr>
                                                <th style="vertical-align: middle; text-align: center"><?= $no++; ?></th>
                                                <td>
                                                    <div style="float: left; padding-right: 10px;"><img src="<?= base_url('user-file/img/') . $s['gambar']; ?>" width="55px" height="55px" style="box-shadow: 0 0 10px rgba(0,0,0,.5);border-radius: 50%;"></div>
                                                    <?= $s['nama_siswa']; ?>
                                                    <span style="color: #696969">
                                                        (<?= $s['no_regis']; ?>)<br>
                                                        Kelas <?= $s['nama_kelas']; ?>,
                                                        <?= $s['jenis_kelamin']; ?>
                                                    </span>
                                                </td>
                                                <td style="vertical-align: middle; text-align: center">
                                                    <a href="<?= base_url('admin/updatesiswa/') . encrypt_url($s['id']); ?>" class="btn btn-outline-primary btn-sm mr-1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="<?= base_url('admin/deletestudent/') . encrypt_url($s['id']); ?>" class="btn btn-outline-danger btn-sm btn-hapus ml-1">
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


<!-- Modal Print Siswa -->
<div class="modal fade" id="PrintSiswaModal" tabindex="-1" role="dialog" aria-labelledby="PrintSiswaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="PrintSiswaModalLabel">Cetak Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="<?= base_url('MpdfAdmin/printallsiswa'); ?>" class="btn btn-outline-warning">Semua Kelas</a>
                    </li>
                    <?php
                    $no = 1;
                    foreach ($kelas as $k) : ?>
                        <li class="list-group-item">
                            <a href="<?= base_url('MpdfAdmin/PrintByKelas/') . $k['id']; ?>" class="btn btn-outline-warning m-1 d-inline-block" target="_blank"><?= $k['nama_kelas']; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- End Modal Print Siswa -->