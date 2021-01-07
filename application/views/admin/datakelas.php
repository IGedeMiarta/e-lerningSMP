<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Data Kelas</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Kelas</li>
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
                        <div class="card-header bg-gradient-dark">
                            <h3 class="card-title text-white"><i class="fas fa-store-alt text-white"></i> Data Kelas</h3>
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
                                <a href="<?= base_url('admin/addclass'); ?>" class="btn btn-outline-info btn-sm mb-2 mt-2"><i class="fas fa-plus"></i> Tambah Data</a>
                                <table id="tbl-kelas" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align: middle">No</th>
                                            <th style="vertical-align: middle">Nama Kelas</th>
                                            <th style="vertical-align: middle">Kode Kelas</th>
                                            <th style="vertical-align: middle; text-align: center;">Aksi</th>
                                            <th style="vertical-align: middle; text-align: center;">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($kelas as $k) : ?>
                                            <tr>
                                                <th><?= $no++; ?></th>
                                                <td>
                                                    <?= $k['nama_kelas']; ?>
                                                </td>
                                                <td><?= $k['class_code']; ?></td>
                                                <td style="vertical-align: middle; text-align: center;">
                                                    <a href="<?= base_url('admin/editkelas/') . encrypt_url($k['id']); ?>" class="btn btn-outline-primary btn-sm mr-1">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="<?= base_url('admin/hapuskelas/') . encrypt_url($k['id']); ?>" class="btn btn-outline-danger btn-sm ml-1 btn-hapus">
                                                        <i class="fas fa-trash-alt"></i>
                                                    </a>
                                                </td>
                                                <td style="vertical-align: middle; text-align: center;">
                                                    <?php if ($k['is_active'] == 1) : ?>
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