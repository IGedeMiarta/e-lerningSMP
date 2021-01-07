<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-dark">Relasi Guru - Mata Pelajaran</h1>
                        <?= $this->session->flashdata('pesan'); ?>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/controlpanel'); ?>">Control Panel</a></li>
                            <li class="breadcrumb-item active">Relasi Guru - Mata Pelajaran</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-12 ml-3">

                <h5>Mata Pelajaran Untuk : <?= $guru['nama']; ?></h5>

                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th style="vertical-align: middle">No</th>
                            <th style="vertical-align: middle">Mata Pelajaran</th>
                            <th style="vertical-align: middle">Akses</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($mapel as $m) : ?>
                            <tr>
                                <th scope="row"><?= $no++; ?></th>
                                <td><?= $m['nama_mapel']; ?></td>
                                <td>
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" <?= check_mapel(encrypt_url($guru['no_regis']), $m['id']); ?> data-noregis="<?= encrypt_url($guru['no_regis']); ?>" data-mapel="<?= $m['id']; ?>">
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>