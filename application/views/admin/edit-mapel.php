<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-dark">Edit Data Mata Pelajaran</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/controlpanel'); ?>">Control Panel</a></li>
                            <li class="breadcrumb-item active">Edit Data Mata Pelajaran</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="row">
            <div class="col-lg-6 ml-3">
                <div class="card direct-chat direct-chat-primary">
                    <div class="card-header" style="background-color: #f7f7f7;">
                        <h3 class="card-title">Form Edit Data Mata Pelajaran</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="" method="post">
                        <div class="card-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages">
                                <div class="form-group">
                                    <input type="hidden" class="form-control" name="id" id="id" value="<?= $mapel['id']; ?>" autocomplete="off">
                                    <label for="nama_mapel">Nama Mata Pelajaran</label>
                                    <input type="text" class="form-control" name="nama_mapel" id="nama_mapel" value="<?= $mapel['nama_mapel']; ?>" autocomplete="off">
                                    <?= form_error('nama_mapel', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <label>Is Active</label><br>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline1" name="is_active" value="1" class="custom-control-input" checked>
                                    <label class="custom-control-label font-weight-normal" for="customRadioInline1">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input type="radio" id="customRadioInline2" name="is_active" value="0" class="custom-control-input">
                                    <label class="custom-control-label font-weight-normal" for="customRadioInline2">No</label>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Edit Data</button>
                        </div>
                    </form>
                    <!-- /.card-footer-->
                </div>
            </div>
        </div>
    </div>
</div>