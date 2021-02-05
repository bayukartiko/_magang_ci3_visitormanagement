<style>
	html, body {
		height: 100%;
	}

	body {
		display: -ms-flexbox;
		display: flex;
		-ms-flex-align: center;
		align-items: center;
		padding-top: 40px;
		padding-bottom: 40px;
		background-color: #DFE6E9;
	}

	.div-login {
		width: 100%;
		padding: 15px;
		margin: auto;
	}
	
</style>

<body class="bg-gradient-primary">
	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center div-login">

			<div class="col-xl-8 col-lg-12 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<div class="card-img-top p-2" style="background-color: aqua;">
						<?php
							if($this->session->userdata('id_event') != null){
								echo "Petugas pintu keluar <br>";
								// foreach($petugas_pintu_keluar as $data_petugas_pintu_keluar){
								// 	echo $data_petugas_pintu_keluar->nama_event;
								// }
								echo $petugas_pintu_keluar->nama_event;
							}elseif($this->session->userdata('id_area') != null){
								echo "Petugas pintu area <br>";
								// foreach($petugas_pintu_keluar as $data_petugas_pintu_keluar){
								// 	echo $data_petugas_pintu_keluar->nama_event;
								// }
								echo $petugas_pintu_keluar->nama_event;
								echo $petugas_pintu_area->nama_area;
							}
						?>

						<a href="javascript:void()" data-toggle="modal" data-target="#logoutModal" class="float-right">logout</a>
					</div>
					<div class="card-body p-3">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="offset-lg-1 col-lg-10">
								<!-- <div class="pt-5 pb-5"> -->
								<div class="pt-5 pb-5">
									<form id="form-scan-visitor-keluar" enctype="multipart/form-data" action="" class="" method="POST">
										<div class="form-group">
											<label class="bmd-label-floating" for="field_scan_id_visitor">Scan ID Visitor</label>
											<input type="text" class="form-control" id="field_scan_id_visitor" name="field_scan_id_visitor" placeholder="masukkan id visitor hasil scan barcode disini" autofocus>

											<small id="error_field_scan_id_visitor" class="form-text text-muted invalid-feedback"></small>
										</div>
										<!-- <button type="submit" class="btn btn-primary">Submit</button> -->
									</form><br>

									<div class="table-responsive">
										<div id="view_tabel_data_visitor_keluar">
											<?php $this->load->view('tabel/tabel_data_visitor_keluar', ['visitor_scan_keluar' => $visitor_scan_keluar, 'hitung_visitor_scan_keluar' => $hitung_visitor_scan_keluar]); ?>
										</div>
									</div>
									
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>

	<!-- Logout Modal-->
		<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
						<a class="btn btn-primary" href="<?= base_url('staff_only/petugas/logout') ?>">Logout</a>
					</div>
				</div>
			</div>
		</div>
</body>

<script>
	$(document).ready(function(){
		var visitor_id = "";

		$('#field_scan_id_visitor').on('input', function(){
			// console.log($('#field_scan_id_visitor').val());
			visitor_id = $(this).val();

			// if($(this).val() == '' || $(this).val().indexOf(' ')>=0){
			if($(this).val() == ''){
				$('#field_scan_id_visitor').addClass('is-invalid');
				$('#error_field_scan_id_visitor').html('Harap isi field ini !');
			}else{
				scan_keluar_visitor();
			}
		});

		function scan_keluar_visitor(){
			$.ajax({
				url: '<?= base_url(); ?>staff_only/petugas/scan/keluar/'+visitor_id.trim()+'', // URL tujuan
				type: 'POST',
				// data: $("#form-modal form").serialize(),
				data: new FormData(document.getElementById('form-scan-visitor-keluar')),
				processData:false,
				contentType:false,
				cache:false,
				async:false,
				dataType: 'JSON',
				// beforeSend: function() {
				// 	// $('#loading-simpan').show(); // Munculkan loading simpan
				// 	// $('#btn-simpan').html('Sedang menambahkan..'); // ganti text btn-simpan jadi sedang menambahkan
				// 	// $('#btn-simpan').attr('disabled', true);
				// },
				success: function(callback){
					// console.log('sukses');
					// console.log(callback)

					if(callback.status == "sukses"){ // Jika Statusnya = sukses
						// console.log('callback sukses');

						// $('#modal_tambah_event').modal('hide');

						// $('#total_staff').html(callback.total_staff)
						// $('#total_staff_admin').html(callback.total_staff_admin)
						// $('#total_staff_petugas').html(callback.total_staff_petugas)

						// window.location.reload();
						// Ganti isi dari div view dengan view yang diambil dari view_register.php
						$('#view_tabel_data_visitor_keluar').html(callback.view_tabel_data_visitor_keluar);
						// $('#view_chart_status_staff').html(callback.view_chart_status_staff);
						// $('#view_chart_total_staff').html(callback.view_chart_total_staff);
						// $('#pesan-sukses').html(callback.pesan).fadeIn().delay(10000).fadeOut();
						const Toast = Swal.mixin({
							toast: true,
							position: 'top-start',
							showConfirmButton: false,
							timer: 5000,
							timerProgressBar: true,
							didOpen: (toast) => {
								toast.addEventListener('mouseenter', Swal.stopTimer)
								toast.addEventListener('mouseleave', Swal.resumeTimer)
							}
						});
						Toast.fire({
							icon: 'success',
							title: callback.pesan
						});

						$('#field_scan_id_visitor').val('');

						$('#field_scan_id_visitor').removeClass('is-invalid');
						$('#error_field_scan_id_visitor').html('');
						
						$('#field_scan_id_visitor').focus();
						
						// $('#btn-simpan').html('Simpan'); // ganti text btn-simpan jadi sedang menambahkan
						// $('#btn-simpan').attr('disabled', false);

						// setTimeout(() => {
						// 	window.location.reload();
						// }, 2000);

					}else{
						// console.log('callback error');
						// tampil pesan validasi
							if(callback.field_scan_id_visitor_error){
								$('#field_scan_id_visitor').addClass('is-invalid');
								$('#error_field_scan_id_visitor').html(callback.field_scan_id_visitor_error);
							}else{
								$('#field_scan_id_visitor').removeClass('is-invalid');
								$('#error_field_scan_id_visitor').html('');
							}
						
						// $('#btn-simpan').html('x Terjadi kesalahan x');
						// setTimeout(() => {
						// 	$('#btn-simpan').html('Simpan');
						// 	$('#btn-simpan').attr('disabled', false);
						// }, 2000);
					}
				},
				error: function(xhr, ajaxOptions, thrownError, errorMessage, callback) {
					// console.log("error :", errorMessage);
					// console.log(callback)
					// alert(xhr.responseText);
					// console.log(thrownError + "\r\n" + xhr.status + "\r\n"  + xhr.statusText + "\r\n" + xhr.responseText);
				}
			});
		};
	});
</script>
