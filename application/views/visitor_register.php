<input type="hidden" id="id_event" value="<?= $id_event ?>" hidden aria-hidden="true">
<input type="hidden" id="custom_url" value="<?= $custom_url ?>" hidden aria-hidden="true">
<div id="view">
	<?php $this->load->view('registrasi/b4/view_register', ["all_data_saya" => $all_data_saya, "all_data_tracking_saya" => $all_data_tracking_saya, "all_data_tracking_saya_1" => $all_data_tracking_saya_1, "all_area" => $all_area, "data_session"=>$data_session, "event"=>$event]); ?>
</div>

	<!-- modal form register -->
		<div class="modal fade" id="Modalregister" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Daftar event</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<!-- form -->
							<div id="pesan-error"></div>
							<form class="contact-form" id="form-register" enctype="multipart/form-data" action="" method="POST">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group" id="field_nama_depan">
											<label for="nama_depan">Nama Depan <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="nama_depan" name="nama_depan" value="<?= set_value('nama_depan') ?>">
												
											<small id="error_nama_depan" class="invalid-feedback"></small>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group" id="field_nama_belakang">
											<label for="nama_belakang">Nama Belakang <span class="text-danger">*</span></label>
											<input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="<?= set_value('nama_belakang') ?>">

											<small id="error_nama_belakang" class="invalid-feedback"></small>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group" id="field_nama_perusahaan">
											<label for="nama_perusahaan">Nama Perusahaan (opsional)</label>
											<input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="<?= set_value('nama_perusahaan') ?>">

											<small id="error_nama_perusahaan" class="invalid-feedback"></small>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group" id="field_jabatan">
											<label for="jabatan">Jabatan (opsional)</label>
											<input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= set_value('jabatan') ?>">

											<small id="error_jabatan" class="invalid-feedback"></small>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group" id="field_email_pribadi">
											<label for="email_pribadi">Email Pribadi <span class="text-danger">*</span></label>
											<input type="email" class="form-control" id="email_pribadi" name="email_pribadi" value="<?= set_value('email_pribadi') ?>">

											<small id="error_email_pribadi" class="invalid-feedback"></small>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group" id="field_email_perusahaan">
											<label for="email_perusahaan">Email Perusahaan (opsional)</label>
											<input type="email" class="form-control" id="email_perusahaan" name="email_perusahaan" value="<?= set_value('email_perusahaan') ?>">

											<small id="error_email_perusahaan" class="invalid-feedback"></small>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group" id="field_notlp_pribadi">
											<label for="notlp_pribadi">No Telpon Pribadi <span class="text-danger">*</span></label>
											<input type="number" class="form-control" id="notlp_pribadi" name="notlp_pribadi" value="<?= set_value('notlp_pribadi') ?>">

											<small id="error_notlp_pribadi" class="invalid-feedback"></small>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group" id="field_notlp_perusahaan">
											<label for="notlp_perusahaan">No Telpon Perusahaan (opsional)</label>
											<input type="number" class="form-control" id="notlp_perusahaan" name="notlp_perusahaan" value="<?= set_value('notlp_perusahaan') ?>">

											<small id="error_notlp_perusahaan" class="invalid-feedback"></small>
										</div>
									</div>
								</div>
								<div class="form-group" id="field_alasan">
									<label for="alasan">Alasan Mengikuti Event (opsional)</label>
									<textarea class="form-control" rows="4" id="alasan" name="alasan"><?= set_value('alasan') ?></textarea>

									<small id="error_alasan" class="invalid-feedback"></small>
								</div>
							</form>
						<!-- end form -->
					</div>
					<div class="modal-footer">
						<span id="text-tombol-tambah"></span>
						<button type="submit" class="btn btn-primary btn-raised" id="btn-simpan">Daftar</button>
						<button type="button" class="btn btn-transparent" data-dismiss="modal">Batal</button>
					</div>
				</div>
			</div>
		</div>
	<!-- end modal form register -->


	<script>
		$(document).ready(function(){

			// window.addEventListener('beforeunload', function (e) { 
			// 	e.preventDefault(); 
			// 	e.returnValue = '';
			// });

			$('[data-toggle="tooltip"]').tooltip();

			$('#btn-simpan').click(function(e){ // Ketika tombol simpan didalam modal di klik
				e.preventDefault();
				$('#btn-simpan').html('Sedang mendaftar..'); // ganti text btn-simpan jadi sedang mendaftar
				$('#btn-simpan').attr('disabled', true); // ganti text btn-simpan jadi sedang mendaftar
				register_visitor();
			});

			function register_visitor(){
				$.ajax({
					url: '<?= base_url(); ?>visitor/register/'+$("#id_event").val()+'', // URL tujuan
					type: 'POST',
					// data: $("#form-modal form").serialize(),
					data: new FormData(document.getElementById('form-register')),
					processData:false,
					contentType:false,
					cache:false,
					async:false,
					dataType: 'JSON',
					beforeSend: function() {
						// $('#loading-simpan').show(); // Munculkan loading simpan
						$('#btn-simpan').html('Sedang mendaftar..'); // ganti text btn-simpan jadi sedang mendaftar
					},
					success: function(callback){
						// console.log('sukses');
						// console.log(callback)

						if(callback.status == "sukses"){ // Jika Statusnya = sukses

							$('#Modalregister').modal('hide');

							// window.location.reload();
							// Ganti isi dari div view dengan view yang diambil dari view_register.php
							$('#view').html(callback.html);
							// $('#pesan-sukses').html(callback.pesan).fadeIn().delay(10000).fadeOut();
							const Toast = Swal.mixin({
								toast: true,
								position: 'top-start',
								showConfirmButton: false,
								timer: 10000,
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

						}else{
							// tampil pesan validasi
								if(callback.nama_depan_error){
									$('#nama_depan').addClass('is-invalid');
									$('#error_nama_depan').html(callback.nama_depan_error);
								}else{
									$('#nama_depan').removeClass('is-invalid');
									$('#error_nama_depan').html('');
								}
								
								if(callback.nama_belakang_error){
									$('#nama_belakang').addClass('is-invalid');
									$('#error_nama_belakang').html(callback.nama_belakang_error);
								}else{
									$('#nama_belakang').removeClass('is-invalid');
									$('#error_nama_belakang').html('');
								}

								// if(callback.nama_perusahaan_error){
								// 	$('#nama_perusahaan').addClass('is-invalid');
								// 	$('#error_nama_perusahaan').html(callback.nama_perusahaan_error);
								// }else{
								// 	$('#nama_perusahaan').removeClass('is-invalid');
								// 	$('#error_nama_perusahaan').html('');
								// }

								// if(callback.jabatan_error){
								// 	$('#jabatan').addClass('is-invalid');
								// 	$('#error_jabatan').html(callback.jabatan_error);
								// }else{
								// 	$('#jabatan').removeClass('is-invalid');
								// 	$('#error_jabatan').html('');
								// }

								if(callback.email_pribadi_error){
									$('#email_pribadi').addClass('is-invalid');
									$('#error_email_pribadi').html(callback.email_pribadi_error);
								}else{
									$('#email_pribadi').removeClass('is-invalid');
									$('#error_email_pribadi').html('');
								}

								// if(callback.email_perusahaan_error){
								// 	$('#email_perusahaan').addClass('is-invalid');
								// 	$('#error_email_perusahaan').html(callback.email_perusahaan_error);
								// }else{
								// 	$('#email_perusahaan').removeClass('is-invalid');
								// 	$('#error_email_perusahaan').html('');
								// }

								if(callback.notlp_pribadi_error){
									$('#notlp_pribadi').addClass('is-invalid');
									$('#error_notlp_pribadi').html(callback.notlp_pribadi_error);
								}else{
									$('#notlp_pribadi').removeClass('is-invalid');
									$('#error_notlp_pribadi').html('');
								}

								// if(callback.notlp_perusahaan_error){
								// 	$('#notlp_perusahaan').addClass('is-invalid');
								// 	$('#error_notlp_perusahaan').html(callback.notlp_perusahaan_error);
								// }else{
								// 	$('#notlp_perusahaan').removeClass('is-invalid');
								// 	$('#error_notlp_perusahaan').html('');
								// }

								// if(callback.alasan_error){
								// 	$('#alasan').addClass('is-invalid');
								// 	$('#error_alasan').html(callback.alasan_error);
								// }else{
								// 	$('#alasan').removeClass('is-invalid');
								// 	$('#error_alasan').html('');
								// }
							
							$('#btn-simpan').html('x Terjadi kesalahan x');
							setTimeout(() => {
								$('#btn-simpan').html('Daftar');
								$('#btn-simpan').attr('disabled', false);
							}, 2000);
						}
					},
					error: function(xhr, ajaxOptions, thrownError, errorMessage, callback) {
						console.log("error :", errorMessage);
						console.log(callback)
						// alert(xhr.responseText);
						console.log(thrownError + "\r\n" + xhr.status + "\r\n"  + xhr.statusText + "\r\n" + xhr.responseText);
					}
				});
			}

			var sudah_reload = false;
			function cek_event(){
				$.ajax({
					url: '<?= base_url(); ?>visitor/cek_event_jamDitutup/'+$('#custom_url').val()+'', // URL tujuan
					type: 'POST', // Tentukan type nya POST atau GET
					dataType: 'JSON',
					success: function(callback){ // Ketika proses pengiriman berhasil

						if(callback.event_status == "not_active"){
							
							if(sudah_reload == false){
								// window.location.reload();
								$("#view").html(callback.view_register);
								sudah_reload = true;
							}
							
						}

					},
					error: function(xhr, ajaxOptions, thrownError, errorMessage, callback) {
						console.log("error :", errorMessage);
						console.log(callback)
						// alert(xhr.responseText);
						console.log(thrownError + "\r\n" + xhr.status + "\r\n"  + xhr.statusText + "\r\n" + xhr.responseText);
					}
				});
			}
			setInterval(function(){
				cek_event();
			}, 10000); // 10 detik

		});
	</script>

