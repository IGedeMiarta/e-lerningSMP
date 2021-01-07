    <div class="container">
        <div class="row justify-content-center align-items-center mt-5">
            <div class="col-sm-8 col-lg-6 col-xl-5 order-lg-2">
                <div class="card box-shadow-lg">
                    <div class="card-body">
                        <h3 class="font-w-600 dark-color text-center">Installation</h3>
                        <p>create administrator account</p>
                        <form action="" method="POST">
                            <div class="form-group">
                                <label class="form-control-label small font-w-600 dark-color m-0px">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email" value="<?= set_value('email'); ?>" placeholder="name@example.com" autocomplete="off">
                                <?= form_error('email', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label small font-w-600 dark-color m-0px">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="********">
                                <?= form_error('password', '<small class="text-danger pl-1">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label small font-w-600 dark-color m-0px">Confirm Password</label>
                                <input type="password" class="form-control" id="passconf" name="passconf" placeholder="********">
                            </div>
                            <div class="p-5px-t">
                                <div class="d-flex justify-content-between align-items-center">
                                    <button class="m-btn m-btn-radius m-btn-theme">Get Started</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        Swal.fire(
            'Installation',
            'Enter school or Administrator email<br>the email will use as Administrator in Smart Students<br><br>Please enter a valid email',
            'warning'
        )
    </script>
    <!-- End Footer -->