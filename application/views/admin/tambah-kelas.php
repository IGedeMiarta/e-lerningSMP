<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-dark">Tambah Data Kelas</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/controlpanel'); ?>">Control Panel</a></li>
                            <li class="breadcrumb-item active">Tambah Data Kelas</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="row">
            <div class="col-lg-6 ml-3">
                <div class="card direct-chat direct-chat-primary">
                    <div class="card-header" style="background-color: #f7f7f7;">
                        <h3 class="card-title">Form Tambah Data Kelas</h3>
                    </div>
                    <!-- /.card-header -->
                    <form action="" method="post">
                        <div class="card-body">
                            <!-- Conversations are loaded here -->
                            <div class="direct-chat-messages">
                                <div class="form-group">
                                    <label for="nama_kelas">Nama Kelas</label>
                                    <input type="text" class="form-control" name="nama_kelas" id="nama_kelas" autocomplete="off">
                                    <?= form_error('nama_kelas', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                                <div class="form-group">
                                    <label for="class_code">Kode Kelass</label>
                                    <input type="text" class="form-control" name="class_code" id="class_code" readonly autocomplete="off">
                                    <?= form_error('class_code', '<small class="text-danger pl-3">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary float-right">Tambah Data</button>
                        </div>
                    </form>
                    <!-- /.card-footer-->
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    // Generate Kode Kela
    getClassCode();

    function getClassCode() {
        let chars = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        let classCodeLength = 16;
        let classCode = "";

        for (let i = 0; i < classCodeLength; i++) {
            let randomNumber = Math.floor(Math.random() * chars.length);
            classCode += chars.substring(randomNumber, randomNumber + 1);

        }
        document.getElementById("class_code").value = classCode
    }
</script>