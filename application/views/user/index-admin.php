<div class="content-wrapper">
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="text-dark">Profile</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Profile</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="row ml-2">
            <div class="col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-header bg-light">
                        My Profile
                    </div>
                    <div class="card-body m-0 p-0">
                        <div class="table-responsive m-0">
                            <table class="table table-valign-middle table-sm m-0">
                                <tr>
                                    <td bgcolor="#f2f2f2" width="150">E-mail</td>
                                    <td><?= $admin['email']; ?></td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td bgcolor="#f2f2f2">Password</td>
                                    <td>***************</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td bgcolor="#f2f2f2">Role User</td>
                                    <td>Admin</td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer" style="border-top: 2px solid rgba(0,0,0,0.1);">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>