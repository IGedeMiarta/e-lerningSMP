<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-dark">Edit Data guru</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/controlpanel'); ?>">Control Panel</a></li>
                            <li class="breadcrumb-item active">Edit Data Guru</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="row">
            <div class="col-lg-6 ml-3">
                <div class="card direct-chat direct-chat-primary">
                    <div class="card-header" style="background-color: #f7f7f7;">
                        <h3 class="card-title">Form Edit Data guru</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="" method="post">
                        <input type="hidden" name="id" value="<?= $guru['id']; ?>">
                        <div class="card-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages">
                                <div class="form-group">
                                    <label for="no_regis">No registrasi</label>
                                    <input type="text" class="form-control" name="no_regis" id="no_regis" value="<?= $guru['no_regis']; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Nama Guru</label>
                                    <input type="text" class="form-control" name="nama" id="nama" value="<?= $guru['nama']; ?>" autocomplete="off">
                                    <?= form_error('nama', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="text" class="form-control" name="email" id="email" value="<?= $guru['email']; ?>" autocomplete="off">
                                    <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" value="Secret Password" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="role_id">Role</label>
                                    <input type="text" class="form-control" name="role_id" id="role_id" value="<?= $guru['role_id']; ?>" autocomplete="off" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="is_active">Active</label>
                                    <select class="form-control" name="is_active" id="is_active">
                                        <option value="1">YES</option>
                                        <option value="0">No</option>
                                    </select>
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