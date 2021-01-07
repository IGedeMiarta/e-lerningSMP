<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Relasi Guru-Mapel</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Relasi Guru-Mapel</li>
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
                            <h3 class="card-title">
                                <i class="fas fa-chalkboard-teacher pr-2"></i><i class="fas fa-arrows-alt-h"></i> <i class="fas fa-book pr-2"></i>
                                Relasi Guru - Mata Pelajaran
                            </h3>
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
                                <!-- Conversations are loaded here -->
                                <div class="direct-chat-messages" style="height: 340px">
                                    <table id="tbl-mapel" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="vertical-align: middle">No</th>
                                                <th style="vertical-align: middle">Nama Guru</th>
                                                <th style="vertical-align: middle">Lihat Mapel</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no = 1;
                                            foreach ($guru as $g) : ?>
                                                <tr>
                                                    <th><?= $no++; ?></th>
                                                    <td>
                                                        <?= $g['nama']; ?>
                                                    </td>
                                                    <td>
                                                        <a href="<?= base_url('admin/gurumapel/') . encrypt_url($g['no_regis']); ?>" class="btn btn-outline-warning btn-sm mr-1">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.direct-Data-pane -->


                            </div>
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