
  <div class="main main-raised p-3">
    <div class="section section-tabs">
		<!-- <div class="col-md-6 ml-auto mr-auto">
			<h2 class="text-center title">Let&apos;s talk event</h2>
			<h5 class="text-center description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis delectus nesciunt laborum maiores, natus necessitatibus deleniti eius quis minima, officiis numquam amet porro qui iure repellendus nobis reiciendis ipsa voluptatibus?</h5>
		</div><br><br> -->

		<div class="row">
			<div class="col-md-8 ml-auto mr-auto">

				<div id="view">
					<?php $this->load->view('registrasi/view_register'); ?>
				</div>

			</div>
		</div>

    </div>
  </div>

	<!-- modal form register -->
		<div class="modal fade" id="Modalregister" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Daftar event</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<i class="material-icons">clear</i>
						</button>
					</div>
					<div class="modal-body">
						<!-- form -->
							<div id="pesan-error"></div>
							<form class="contact-form" id="form-register" enctype="multipart/form-data" action="" method="POST">
								<!-- </?= validation_errors(); ?> -->
								<div class="row">
									<div class="col-md-6">
										<div class="form-group" id="field_nama_depan">
											<label class="bmd-label-floating" for="nama_depan">Nama Depan</label>
											<input type="text" class="form-control" id="nama_depan" name="nama_depan" value="<?= set_value('nama_depan') ?>">

											<span class="form-control-feedback">
												<i class="material-icons">clear</i>
											</span>
												
											<small id="error_nama_depan" class="form-text text-muted text-danger"></small>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group" id="field_nama_belakang">
											<label class="bmd-label-floating" for="nama_belakang">Nama Belakang</label>
											<input type="text" class="form-control" id="nama_belakang" name="nama_belakang" value="<?= set_value('nama_belakang') ?>">

											<span class="form-control-feedback">
												<i class="material-icons">clear</i>
											</span>

											<small id="error_nama_belakang" class="form-text text-muted text-danger"></small>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group" id="field_nama_perusahaan">
											<label class="bmd-label-floating" for="nama_perusahaan">Nama Perusahaan</label>
											<input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan" value="<?= set_value('nama_perusahaan') ?>">

											<span class="form-control-feedback">
												<i class="material-icons">clear</i>
											</span>

											<small id="error_nama_perusahaan" class="form-text text-muted text-danger"></small>
										</div>
									</div>
									<div class="col-md-12">
										<div class="form-group" id="field_jabatan">
											<label class="bmd-label-floating" for="jabatan">Jabatan (optional)</label>
											<input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= set_value('jabatan') ?>">

											<span class="form-control-feedback">
												<i class="material-icons">clear</i>
											</span>

											<small id="error_jabatan" class="form-text text-muted text-danger"></small>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group" id="field_email_pribadi">
											<label class="bmd-label-floating" for="email_pribadi">Email Pribadi</label>
											<input type="email" class="form-control" id="email_pribadi" name="email_pribadi" value="<?= set_value('email_pribadi') ?>">

											<span class="form-control-feedback">
												<i class="material-icons">clear</i>
											</span>

											<small id="error_email_pribadi" class="form-text text-muted text-danger"></small>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group" id="field_email_perusahaan">
											<label class="bmd-label-floating" for="email_perusahaan">Email Perusahaan</label>
											<input type="email" class="form-control" id="email_perusahaan" name="email_perusahaan" value="<?= set_value('email_perusahaan') ?>">

											<span class="form-control-feedback">
												<i class="material-icons">clear</i>
											</span>

											<small id="error_email_perusahaan" class="form-text text-muted text-danger"></small>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group" id="field_notlp_pribadi">
											<label class="bmd-label-floating" for="notlp_pribadi">No Telpon Pribadi</label>
											<input type="number" class="form-control" id="notlp_pribadi" name="notlp_pribadi" value="<?= set_value('notlp_pribadi') ?>">

											<span class="form-control-feedback">
												<i class="material-icons">clear</i>
											</span>

											<small id="error_notlp_pribadi" class="form-text text-muted text-danger"></small>
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group" id="field_notlp_perusahaan">
											<label class="bmd-label-floating" for="notlp_perusahaan">No Telpon Perusahaan</label>
											<input type="number" class="form-control" id="notlp_perusahaan" name="notlp_perusahaan" value="<?= set_value('notlp_perusahaan') ?>">

											<span class="form-control-feedback">
												<i class="material-icons">clear</i>
											</span>
											
											<small id="error_notlp_perusahaan" class="form-text text-muted text-danger"></small>
										</div>
									</div>
								</div>
								<div class="form-group" id="field_alasan">
									<label class="bmd-label-floating" for="alasan">Alasan Mengikuti Event (optional)</label>
									<textarea class="form-control" rows="4" id="alasan" name="alasan"><?= set_value('alasan') ?></textarea>

									<span class="form-control-feedback">
										<i class="material-icons">clear</i>
									</span>

									<small id="error_alasan" class="form-text text-muted text-danger"></small>
								</div>
							</form>
						<!-- end form -->
					</div>
					<div class="modal-footer">
						<span id="text-tombol-tambah"></span>
						<button type="submit" class="btn btn-primary btn-raised" id="btn-simpan">Daftar</button>
						<button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Batal</button>
					</div>
				</div>
			</div>
		</div>
	<!-- end modal form register -->


	<script>
		$(document).ready(function(){

			$('#btn-simpan').click(function(e){ // Ketika tombol simpan didalam modal di klik
				e.preventDefault();
				$('#btn-simpan').html('Sedang mendaftar..'); // ganti text btn-simpan jadi sedang mendaftar
				register_visitor();
			});

			function register_visitor(){
				$.ajax({
					url: '<?= base_url(); ?>main_controller/aksi_register_visitor', // URL tujuan
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
							// console.log('callback sukses');
							

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
							console.log('callback error');
							// tampil pesan validasi
								if(callback.nama_depan_error){
									$('#field_nama_depan').addClass('has-danger');
									$('#error_nama_depan').html(callback.nama_depan_error);
								}else{
									$('#field_nama_depan').removeClass('has-danger');
									$('#error_nama_depan').html('');
								}
								
								if(callback.nama_belakang_error){
									$('#field_nama_belakang').addClass('has-danger');
									$('#error_nama_belakang').html(callback.nama_belakang_error);
								}else{
									$('#field_nama_belakang').removeClass('has-danger');
									$('#error_nama_belakang').html('');
								}

								if(callback.nama_perusahaan_error){
									$('#field_nama_perusahaan').addClass('has-danger');
									$('#error_nama_perusahaan').html(callback.nama_perusahaan_error);
								}else{
									$('#field_nama_perusahaan').removeClass('has-danger');
									$('#error_nama_perusahaan').html('');
								}

								if(callback.jabatan_error){
									$('#field_jabatan').addClass('has-danger');
									$('#error_jabatan').html(callback.jabatan_error);
								}else{
									$('#field_jabatan').removeClass('has-danger');
									$('#error_jabatan').html('');
								}

								if(callback.email_pribadi_error){
									$('#field_email_pribadi').addClass('has-danger');
									$('#error_email_pribadi').html(callback.email_pribadi_error);
								}else{
									$('#field_email_pribadi').removeClass('has-danger');
									$('#error_email_pribadi').html('');
								}

								if(callback.email_perusahaan_error){
									$('#field_email_perusahaan').addClass('has-danger');
									$('#error_email_perusahaan').html(callback.email_perusahaan_error);
								}else{
									$('#field_email_perusahaan').removeClass('has-danger');
									$('#error_email_perusahaan').html('');
								}

								if(callback.notlp_pribadi_error){
									$('#field_notlp_pribadi').addClass('has-danger');
									$('#error_notlp_pribadi').html(callback.notlp_pribadi_error);
								}else{
									$('#field_notlp_pribadi').removeClass('has-danger');
									$('#error_notlp_pribadi').html('');
								}

								if(callback.notlp_perusahaan_error){
									$('#field_notlp_perusahaan').addClass('has-danger');
									$('#error_notlp_perusahaan').html(callback.notlp_perusahaan_error);
								}else{
									$('#field_notlp_perusahaan').removeClass('has-danger');
									$('#error_notlp_perusahaan').html('');
								}

								if(callback.alasan_error){
									$('#field_alasan').addClass('has-danger');
									$('#error_alasan').html(callback.alasan_error);
								}else{
									$('#field_alasan').removeClass('has-danger');
									$('#error_alasan').html('');
								}
							
							$('#btn-simpan').html('x Terjadi kesalahan x');
							setTimeout(() => {
								$('#btn-simpan').html('Daftar');
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

		});
	</script>
