<footer class="main-footer text-center">

    <strong>Copyright &copy; 2020 <a href="">SMP Negeri 2 Mlati</a>.</strong> All rights
    reserved.
    <input type="hidden" id="emailSession" value="<?= $this->session->userdata('email'); ?>">
    <input type="hidden" id="uriSeg" value="<?= $this->uri->segment('3'); ?>">
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url('assets/'); ?>plugins/jquery/jquery-3.4.0.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?= base_url('assets/'); ?>plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?= base_url('assets/'); ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<!-- overlayScrollbars -->
<script src="<?= base_url('assets/'); ?>plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?= base_url('assets/'); ?>dist/js/adminlte.js"></script>
<!-- Summer Note -->
<script src="<?= base_url('assets/'); ?>plugins/summernote/summernote-bs4.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/summernote/summernote-ext-resized-data-image.js"></script>

<!-- DataTables -->
<script src="<?= base_url('assets/'); ?>plugins/datatables/jquery.dataTables.js"></script>
<script src="<?= base_url('assets/'); ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

<!-- myscript -->
<script src="<?= base_url('assets/'); ?>my-assets/myscript.js"></script>
<script>
    // RoomChat Kelas
    setInterval(() => {
        var emailSession = $('#emailSession').val();
        $.ajax({
            type: 'POST',
            url: "<?= base_url('komentar/getAllroomChat') ?>",
            dataType: 'json',
            success: function(data) {
                var roomChat = '';
                for (let i = 0; i < data.length; i++) {
                    if (data[i].email == emailSession) {
                        roomChat += `<div class="direct-chat-msg right">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-right">` + data[i].nama + `</span>
                                        <span class="direct-chat-timestamp float-left">` + data[i].date_send + `</span>
                                    </div>
                                    <img class="direct-chat-img" src="<?= base_url('user-file/img/') ?>` + data[i].gambar_rm + `">
                                    <div class="direct-chat-text">
                                        <p style="word-wrap: break-word">
                                            ` + data[i].pesan + `
                                        </p>
                                    </div>
                                </div>`
                    } else {
                        roomChat += `<div class="direct-chat-msg">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-left">` + data[i].nama + `</span>
                                        <span class="direct-chat-timestamp float-right">` + data[i].date_send + `</span>
                                    </div>
                                    <img class="direct-chat-img" src="<?= base_url('user-file/img/') ?>` + data[i].gambar_rm + `">
                                    <div class="direct-chat-text">
                                        <p style="word-wrap: break-word">
                                            ` + data[i].pesan + `
                                        </p>
                                    </div>
                                </div>`
                    }
                }

                $('#isiRoomChat').html(roomChat);
            }
        });
    }, 1000);
    $(document).ready(function() {
        $("#btn-rm").click(function() {
            var emailSession = $('#emailSession').val();
            var pesan_rm = $('#pesan_rm').val();
            var id_kelas_rm = $('#id_kelas_rm').val();
            var gambar_rm = $('#gambar_rm').val();
            var email_rm = $('#email_rm').val();
            var nama_rm = $('#nama_rm').val();
            $.ajax({
                type: 'POST',
                data: {
                    pesan_rm: pesan_rm,
                    id_kelas_rm: id_kelas_rm,
                    gambar_rm: gambar_rm,
                    email_rm: email_rm,
                    nama_rm: nama_rm
                },
                url: 'http://localhost/smart-students/komentar/roomchat',
                dataType: 'JSON',
                success: function(response) {
                    console.log(response.responseText);
                }
            });
            $('#pesan_rm').val('');
        });
    });
    // Eend RoomChat Kelas

    // roomchat Tugas
    setInterval(() => {
        var emailSession = $('#emailSession').val();
        var segment = $('#uriSeg').val();
        $.ajax({
            type: 'POST',
            url: "<?= base_url('komentar/getAllkomenTugas') ?>",
            data: {
                id_tugas: segment
            },
            dataType: 'json',
            success: function(data) {
                var komenTugas = '';
                for (let i = 0; i < data.length; i++) {
                    if (data[i].email == emailSession) {
                        komenTugas += `<div class="direct-chat-msg right">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-right">` + data[i].nama + `</span>
                                        <span class="direct-chat-timestamp float-left">` + data[i].date_send + `</span>
                                    </div>
                                    <img class="direct-chat-img" src="<?= base_url('user-file/img/') ?>` + data[i].gambar_chat + `">
                                    <div class="direct-chat-text">
                                        ` + data[i].pesan + `
                                    </div>
                                </div>`
                    } else {
                        komenTugas += `<div class="direct-chat-msg">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-left">` + data[i].nama + `</span>
                                        <span class="direct-chat-timestamp float-right">` + data[i].date_send + `</span>
                                    </div>
                                    <img class="direct-chat-img" src="<?= base_url('user-file/img/') ?>` + data[i].gambar_chat + `">
                                    <div class="direct-chat-text">
                                        ` + data[i].pesan + `
                                    </div>
                                </div>`
                    }
                }

                $('#isi-komen-tugas').html(komenTugas);
            }
        });
    }, 1000);
    $(document).ready(function() {
        $("#btn-chat-tgs").click(function() {
            var pesan_tugas = $('#pesan-tugas').val();
            var id_tugas = $('#id_tugas').val();
            var gambar_chat_tugas = $('#gambar_chat-tugas').val();
            var email_tugas = $('#email-tugas').val();
            var nama_tugas = $('#nama-tugas').val();
            $.ajax({
                type: 'POST',
                data: {
                    pesan_tugas: pesan_tugas,
                    id_tugas: id_tugas,
                    gambar_chat_tugas: gambar_chat_tugas,
                    email_tugas: email_tugas,
                    nama_tugas: nama_tugas
                },
                url: 'http://localhost/smart-students/komentar/tugas',
                dataType: 'JSON',
                success: function(response) {
                    console.log(response.responseText);
                }
            });
            $('#pesan-tugas').val('');
        });
    });
    // End Roomchat Tugas

    // roomchat materi
    setInterval(() => {
        var emailSession = $('#emailSession').val();
        var segment = $('#uriSeg').val();
        $.ajax({
            type: 'POST',
            url: "<?= base_url('komentar/getAllkomenMateri') ?>",
            data: {
                id_materi: segment
            },
            dataType: 'json',
            success: function(data) {
                var komenMateri = '';
                for (let i = 0; i < data.length; i++) {
                    if (data[i].email == emailSession) {
                        komenMateri += `<div class="direct-chat-msg right">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-right">` + data[i].nama + `</span>
                                        <span class="direct-chat-timestamp float-left">` + data[i].date_send + `</span>
                                    </div>
                                    <img class="direct-chat-img" src="<?= base_url('user-file/img/') ?>` + data[i].gambar_chat + `">
                                    <div class="direct-chat-text">
                                    ` + data[i].pesan + `
                                    </div>
                                </div>`
                    } else {
                        komenMateri += `<div class="direct-chat-msg">
                                    <div class="direct-chat-infos clearfix">
                                        <span class="direct-chat-name float-left">` + data[i].nama + `</span>
                                        <span class="direct-chat-timestamp float-right">` + data[i].date_send + `</span>
                                    </div>
                                    <img class="direct-chat-img" src="<?= base_url('user-file/img/') ?>` + data[i].gambar_chat + `">
                                    <div class="direct-chat-text">
                                    ` + data[i].pesan + `
                                    </div>
                                </div>`
                    }
                }

                $('#isi-chat-materi').html(komenMateri);
            }
        });
    }, 1000);
    $(document).ready(function() {
        $("#btn-chat-m").click(function() {
            var pesan_materi = $('#pesan-materi').val();
            var id_materi = $('#id_materi').val();
            var gambar_chat_materi = $('#gambar_chat-materi').val();
            var email_materi = $('#email-materi').val();
            var nama_materi = $('#nama_materi').val();
            $.ajax({
                type: 'POST',
                data: {
                    pesan_materi: pesan_materi,
                    id_materi: id_materi,
                    gambar_chat_materi: gambar_chat_materi,
                    email_materi: email_materi,
                    nama_materi: nama_materi
                },
                url: 'http://localhost/smart-students/komentar/materi',
                dataType: 'JSON',
                success: function(response) {
                    console.log(response.responseText);
                }
            });
            $('#pesan-materi').val('');
        });
    });
    // end roomchat materi
</script>
</body>

</html>