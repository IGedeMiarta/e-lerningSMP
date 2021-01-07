<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Mapel</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Mapel</li>
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
                            <h3 class="card-title text-white"><i class="fas fa-book text-white"></i> Data Mapel</h3>
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

                                <a href="<?= base_url('admin/addmapel'); ?>" class="btn btn-outline-info btn-sm mb-2"><i class="fas fa-plus"></i> Tambah Data</a>
                                <table id="tbl-mapel" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: middle">No</th>
                                            <th style="vertical-align: middle">Nama Mata Pelajaran</th>
                                            <th style="vertical-align: middle; text-align: center;">Aksi</th>
                                            <th style="vertical-align: middle; text-align: center;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($mapel as $mpl) : ?>
                                            <tr>
                                                <th><?= $no++; ?></th>
                                                <td>
                                                    <?= $mpl['nama_mapel']; ?>
                                                </td>
                                                <td style="vertical-align: middle; text-align: center;">
                                                    <a href="<?= base_url('admin/editmapel/') . encrypt_url($mpl['id']); ?>" class="btn btn-outline-primary btn-sm mr-1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="<?= base_url('admin/hapusmapel/') . encrypt_url($mpl['id']); ?>" class="btn btn-outline-danger btn-sm ml-1 btn-hapus">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                                <td style="vertical-align: middle; text-align: center;">
                                                    <?php if ($mpl['is_active'] == 1) : ?>
                                                        <a href="#" id="btn-active-mapel" class="btn-active-mapel badge badge-info ">active</a>
                                                    <?php else : ?>
                                                        <a href="#" id="btn-active-mapel" class="btn-active-mapel badge badge-danger ">deactive</a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
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