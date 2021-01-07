$(document).ready(function () {
	$('.btn-hapus').click(function (e) {
		const href = $(this).attr('href');
		e.preventDefault();

		Swal.fire({
			title: 'Apakah anda Yakin?',
			text: "Data tidak akan bisa kembali!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			cancelButtonColor: '#d33',
			confirmButtonText: 'Yes, delete it!'
		}).then((result) => {
			if (result.value) {
				document.location.href = href
			}
		})
	});

	const tablesiswa = $('#tbl-siswa').DataTable({
		"lengthMenu": [
			[5, 10, 25, -1],
			[5, 10, 25, "All"]
		]
	});

	const tableGuru = $('#tbl-guru').DataTable({
		"lengthMenu": [
			[5, 10, 25, -1],
			[5, 10, 25, "All"]
		]
	});

	const tableMapel = $('#tbl-mapel').DataTable({
		"lengthMenu": [
			[5, 10, 25, -1],
			[5, 10, 25, "All"]
		]
	});

	const tableKelas = $('#tbl-kelas').DataTable({
		"lengthMenu": [
			[5, 10, 25, -1],
			[5, 10, 25, "All"]
		]
	});

	//  Tambah Siswa (Get No Registrasi)
	//  $("#id_kelas").on('change', function postinput() {
	//      const idKelas = $("#id_kelas option:selected").val();
	//      const noRegisM = $("#no-regis").val();
	//      $("#no_regis").val(noRegisM + idKelas);
	//  });

	//======================================================
	$('.unggah_materi').on('change', function () {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.unggah_materi-label').addClass("selected").html(fileName);
	});
	$('.unggah_materi2').on('change', function () {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.unggah_materi2-label').addClass("selected").html(fileName);
	});

	$('.file').on('change', function () {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.file-label').addClass("selected").html(fileName);
	});

	//  ================================
	$('#text-editor2').summernote({
		height: 350,
		toolbar: [
			// [groupName, [list of button]]
			['style', ['bold', 'italic', 'underline', 'clear']],
			['font', ['strikethrough', 'superscript', 'subscript']],
			['fontsize', ['fontsize']],
			['color', ['color']],
			['para', ['ul', 'ol', 'paragraph']],
			['height', ['height']]
		]
	});

	//  Disable Enter
	//  function stopRKey(evt) {
	//      var evt = (evt) ? evt : ((event) ? event : null);
	//      var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
	//      if ((evt.keyCode == 13) && (node.type == "text")) {
	//          return false;
	//      }
	//  }

	//  document.onkeypress = stopRKey;


	//  AJAX

	//  Ajax Relasi Guru Kelas
	$('.check-kelas').on('click', function () {
		const noRegis = $(this).data('noregis');
		const kelasId = $(this).data('kelas');

		$.ajax({
			url: "http://localhost/smart-students/admin/relasiGurukelas",
			type: 'post',
			data: {
				noRegis: noRegis,
				kelasId: kelasId
			},
			success: function () {
				document.location.href = "http://localhost/smart-students/admin/Gurukelas/" + noRegis
			}
		});
	});

	//  Ajax Relasi Guru Mata Pelajaran
	$('.form-check-input').on('click', function () {
		const noRegis = $(this).data('noregis');
		const mapelId = $(this).data('mapel');

		$.ajax({
			url: "http://localhost/smart-students/admin/relasiGuruMapel",
			type: 'post',
			data: {
				noRegis: noRegis,
				mapelId: mapelId
			},
			success: function () {
				document.location.href = "http://localhost/smart-students/admin/GuruMapel/" + noRegis
			}
		});
	});

	//Summernote
	$('#text-editor').summernote({
		height: 350,
		// toolbar: [
		// 	['insert', ['resizedDataImage', 'link']]
		// ],
		callbacks: {
			onImageUpload: function (image) {
				uploadImage(image[0]);
			},
			onMediaDelete: function (target) {
				deleteImage(target[0].src);
			}
		}
	});

	function uploadImage(image) {
		var data = new FormData();
		data.append("image", image);
		$.ajax({
			url: "http://localhost/smart-students/Teacher/upload_image",
			cache: false,
			contentType: false,
			processData: false,
			data: data,
			type: "POST",
			success: function (url) {
				$('#text-editor').summernote("insertImage", url);
			},
			error: function (data) {
				console.log(data);
			}
		});
	}

	function deleteImage(src) {
		$.ajax({
			data: {
				src: src
			},
			type: "POST",
			url: "http://localhost/smart-students/Teacher/delete_image",
			cache: false,
			success: function (response) {
				console.log(response);
			}
		});
	}

})
