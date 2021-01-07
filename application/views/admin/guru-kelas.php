<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-dark">Relasi Guru - Kelas</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/controlpanel'); ?>">Control Panel</a></li>
                            <li class="breadcrumb-item active">Relasi Guru - Kelas</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 ml-3">

                <h5>Kelas Untuk : <?= $guru['nama']; ?></h5>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="vertical-align: middle">No</th>
                            <th style="vertical-align: middle">Kelas</th>
                            <th style="vertical-align: middle">Akses</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($kelas as $k) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $k['nama_kelas']; ?></td>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input check-kelas" <?= check_kelas(encrypt_url($guru['no_regis']), $k['id']); ?> data-noregis="<?= encrypt_url($guru['no_regis']); ?>" data-kelas="<?= $k['id']; ?>">
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <?= $this->session->flashdata('pesan'); ?>
    </div>
</div>