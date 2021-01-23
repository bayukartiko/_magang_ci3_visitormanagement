
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

				

				
				<!-- <h2 class="text-center title">Form Registrasi</h2>
				<h5 class="text-center description">Silahkan isi form berikut untuk mendapatkan tiket berupa QR Code</h5><br>
				
				<div class="row">
					<div class="offset-md-5 col-md-2">
						<button class="btn btn-block btn-primary" data-toggle="modal" data-target="#Modalregister">
							Isi form
						</button>
					</div>
				</div>

				<div class="text-center">
					<h2>Selamat datang, [user] di [nama event]</h2>
					<h5>tunjukkan qr code anda kepada petugas area untuk discan</h5>
					<img src="assets/img/qrcode/cobaqrcode.png" alt="" srcset="" class="img-thumbnail rounded mx-auto d-block">
				</div> -->

			</div>
		</div>

    </div>
  </div>
	
	<!-- Modal QR Code -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog">
			<div class="modal-dialog modal-dialog-centered" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title">Modal title</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<i class="material-icons">clear</i>
						</button>
					</div>
					<div class="modal-body">
						<p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove right at the coast of the Semantics, a large language ocean. A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.
						</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-link">Nice Button</button>
						<button type="button" class="btn btn-danger btn-link" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	<!--  End Modal -->

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
