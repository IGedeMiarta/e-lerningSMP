<main>
    <?= $this->session->flashdata('pesan'); ?>
    <section>
        <div class="container">
            <div class="row align-items-center justify-content-center min-vh-100">
                <div class="col-md-6 col-xl-5 p-40px-tb">
                    <div class="p-40px white-bg box-shadow border-radius-10">
                        <div class="p-20px-b text-center">
                            <h3 class="font-w-600 dark-color m-10px-b">Reset password</h3>
                            <p class="login-box-msg">Change Password for<br><?= $this->session->userdata('reset_email'); ?></p>
                        </div>
                        <form action="<?= base_url('auth/changePasswordStudent'); ?>" method="post">
                            <div class="form-group">
                                <input type="password" class="form-control" name="password1" placeholder="Enter New Password">
                                <?= form_error('password1', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="password2" placeholder="Repeat Password">
                                <?= form_error('password2', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="p-10px-t">
                                <button type="submit" class="m-btn m-btn-theme m-btn-radius w-100">Change password</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>