    <!-- jquery -->
    <script src="<?= base_url('assets/'); ?>plugins/jquery/jquery.min.js"></script>
    <!-- end jquery -->
    <!--bootstrap-->
    <script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!--end bootstrap-->
    <!-- End -->
    <!-- Particle js -->
    <script src="<?= base_url('assets/'); ?>index/particles/particles.min.js"></script>
    <script src="<?= base_url('assets/'); ?>index/particles/particles-app.js"></script>
    <!-- end -->

    <!-- custom js -->
    <script src="<?= base_url('assets/'); ?>index/custom.js"></script>

    <!-- Myscript -->
    <script src="<?= base_url('assets/'); ?>my-assets/myscript.js"></script>

    <script>
        $(document).ready(function() {
            const form = $('#myForm'),
                is_student = $('.is_student'),
                classCode = $('#class_code');

            classCode.hide();

            is_student.on('click', function() {
                if ($(this).is(':checked')) {
                    classCode.show();
                    classCode.find('input').attr('required', true);
                } else {
                    classCode.hide();
                    classCode.find('input').attr('required', false);
                }
            });
        });
    </script>

    <!-- end -->
    </body>
    <!-- end body -->

    </html>