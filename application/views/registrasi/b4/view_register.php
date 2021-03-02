<?php if($event["status"] == "active"){ ?>
	<?php if($this->session->userdata('status') == "telah_masuk_event" && $data_session["status"] == "visitor_telah_masuk_event"){ ?>

		<div class="container-fluid">
			<div class="text-center p-5 text-light">
				<i class="fas fa-check-circle fa-7x text-center"></i>
			</div>
			<div class="row">
				<div class="col-md-12 m-2 text-light">
					<h3><b>Hore! Data pendaftaran kamu telah berhasil dibuat! Tunjukkan barcode dibawah ke petugas ketika memasuki salah satu area didalam</b></h3>
					<br>
					<h6>Dipersilahkan untuk screenshot barcode dibawah</h6>
				</div>
			</div>
			<br>

			<!-- div putih -->
				<div class="row">
					<div class="col-md-10 ml-auto mr-auto">
						<div class="card">
							<div class="card-body text-center">
								<h6 class="title text-center">Nama Anda</h6>
								<h5><b><?= $this->session->userdata("nama_visitor"); ?></b></h5>
								<br>
								<h6>Kode Pendaftaran</h6>
								<h5>
									<b class="text-primary">
										<?= join("-", str_split($this->session->userdata("id_visitor"), 4)) ?>
									</b>
								</h5>
								<!-- <img src="<?= base_url() ?>assets/img/barcode/<?= $this->session->userdata("gambar_qrcode"); ?>" alt="<?= $this->session->userdata("id_visitor"); ?>" data-toggle="tooltip" data-placement="bottom" title="<?= $this->session->userdata("id_visitor"); ?>" data-container="body" class="img-thumbnail rounded mx-auto d-block shadow-sm" style="height: 60px;"> -->
								<img src="<?= base_url() ?>assets/img/qrcode/<?= $this->session->userdata("gambar_qrcode"); ?>" alt="<?= $this->session->userdata("id_visitor"); ?>" data-toggle="tooltip" data-placement="bottom" title="<?= $this->session->userdata("id_visitor"); ?>" data-container="body" class="img-thumbnail rounded mx-auto d-block shadow-sm" style="width: 250px; height: 250px;">
								<small>disarankan tingkatkan kecerahan layar anda, agar proses scanning bisa lebih cepat</small>

								<br>
								<hr>
								<br>

								<!-- tabel data tracking -->
									<h6 class="text-center">List area yang anda kunjungi</h6>

									<div class="alert alert-success ml-auto mr-auto" role="alert">
										<h6>Anda sekarang berada di area berikut:</h6>
										<?php
											if($all_data_saya["status"] == "didalam_area"){
												foreach($all_data_tracking_saya_1 as $data_tracking_saya_1){
													foreach($all_area as $data_area){
														if($data_tracking_saya_1->id_area == $data_area->id_area){
															echo "<h5><b>".$data_area->nama_area."</b></h5>";
														}
													}
												}
											}else{
												echo "<h5><b>anda sedang berada diluar area</b></h5>";
											}
										?>
									</div>
									<br>
									<table class="table table-responsive-sm table-hover table-striped" id="track-area">
										<thead>
											<tr>
												<th>Nama area</th>
												<th>Waktu masuk</th>
												<th>Waktu keluar</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												if($all_data_tracking_saya == null){
													echo "<tr><td colspan='3'>anda belum scan barcode anda ke petugas area</td></tr>";
												}else{
													foreach($all_data_tracking_saya as $data_tracking_saya){
											?>
														<tr>
															<td>
																<?php 
																	foreach($all_area as $data_area){
																		if($data_tracking_saya->id_area == $data_area->id_area){
																			echo $data_area->nama_area;
																		}
																	}
																?>
															</td>
															<td><?= $data_tracking_saya->time_in_area ?></td>
															<td>
																<?php
																	if($data_tracking_saya->time_out_area == "0000-00-00 00:00:00"){
																		echo "anda belum keluar area ini";
																	}else{
																		echo $data_tracking_saya->time_out_area;
																	}
																?>
															</td>
														</tr>
											<?php
													}
												}
											?>
										</tbody>
										<tfoot>
											<tr>
												<th>Nama area</th>
												<th>Waktu masuk</th>
												<th>Waktu keluar</th>
											</tr>
										</tfoot>
									</table>

								<script>
									$(document).ready(function(){
										$("#track-area").DataTable({
											"ordering": false,
											"searching": false
										})
									});
								</script>
							</div>
						</div>
					</div>
				</div>

			<br><br>

			<!-- pemberitahuan protokol kesehatan -->
				<h3 class="text-center text-light">Mari bersama-sama kita patuhi protokol kesehatan agar kita semua terhindar dari COVID-19</h3>
				<div class="row text-center">
					<div class="col-md-6 p-4 text-light">
						<!-- <div class="row">
							<div class="col-md-6"><i class="fas fa-head-side-mask"></i></div>
							<div class="col-md-6">Memakai masker</div>
						</div> -->
						<i class="fas fa-head-side-mask fa-5x"></i>
						<br>
						<h4>Memakai Masker</h4>
					</div>
					<div class="col-md-6 p-4 text-light">
						<!-- <div class="row">
							<div class="col-md-6"><i class="fas fa-hands-wash"></i></div>
							<div class="col-md-6">Mencuci tangan pakai sabun</div>
						</div> -->
						<i class="fas fa-hands-wash fa-5x"></i>
						<br>
						<h4>Mencuci tangan pakai sabun</h4>
					</div>
					<div class="col-md-6 p-4 text-light">
						<!-- <div class="row">
							<div class="col-md-6"><i class="fas fa-people-arrows"></i></div>
							<div class="col-md-6">Menjaga jarak</div>
						</div> -->
						<i class="fas fa-people-arrows fa-5x"></i>
						<br>
						<h4>Menjaga jarak</h4>
					</div>
					<div class="col-md-6 p-4 text-light">
						<!-- <div class="row">
							<div class="col-md-6"><i class="fas fa-handshake-slash"></i></div>
							<div class="col-md-6">Hindari kontak langsung dengan sekitar</div>
						</div> -->
						<i class="fas fa-handshake-alt-slash fa-5x"></i>
						<br>
						<h4>Hindari kontak tubuh langsung dengan orang sekitar</h4>
					</div>
				</div>

			<br><br>
		</div>

	<?php }elseif($this->session->userdata('status') == "telah_masuk_event" && $data_session["status"] == "visitor_telah_keluar_event"){ ?>

		<div class="container-fluid">
			<div class="text-center p-5" style="color: #FEFEFE;">
				<i class="fas fa-sign-out-alt fa-7x text-center"></i>
			</div>
			<div class="row">
				<div class="col-md-12 m-2" style="color: #FEFEFE;">
					<!-- <h3>Hore! Data kamu telah berhasil dibuat! Tunjukkan barcode dibawah ke petugas ketika memasuki salah satu area didalam</h3> -->
					<h3><b>Terima kasih telah mengunjungi <?= $nama_event ?>!</b></h3>
					<br>
					<h6>Periksa kembali barang bawaan anda dan pastikan tidak ada yang tertinggal di didalam</h6>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-10 ml-auto mr-auto">
					<a href="<?= base_url() ?>visitor/logout" class="btn btn-block btn-light rounded-pil ml-auto mr-auto" style="padding: 20px; width: 75%;">
						Kembali ke beranda
					</a>
				</div>
			</div>

			<br><br>
		</div>

	<?php }else{ ?>

		<div class="container-fluid">
			<div class="text-center p-5" style="color: #FEFEFE;">
				<i class="fas fa-edit fa-7x text-center"></i>
			</div>
			<div class="row">
				<div class="col-md-12 m-2" style="color: #FEFEFE;">
					<!-- <h3>Hore! Data kamu telah berhasil dibuat! Tunjukkan barcode dibawah ke petugas ketika memasuki salah satu area didalam</h3> -->
					<h3><b>Selamat datang di <?= $nama_event ?>! Silahkan isi form pendaftaran terlebih dahulu ya, agar anda bisa masuk ke event ini</b></h3>
					<br>
					<h6>Silahkan klik tombol "isi form pendaftaran" dibawah untuk menampilkan form pendaftaran</h6>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-10 ml-auto mr-auto">
					<button class="btn btn-block btn-light rounded-pil ml-auto mr-auto" style="padding: 20px; width: 75%;" data-toggle="modal" data-target="#Modalregister">
						isi form pendaftaran
					</button>
				</div>
			</div>

			<br><br>
		</div>

	<?php } ?>
<?php }elseif($event["status"] == "not_active"){ ?>
	<div class="container-fluid">
		<div class="text-center p-5" style="color: #FEFEFE;">
			<i class="fas fa-times-circle fa-7x text-center"></i>
		</div>
		<div class="row">
			<div class="col-md-12 m-2" style="color: #FEFEFE;">
				<!-- <h3>Hore! Data kamu telah berhasil dibuat! Tunjukkan barcode dibawah ke petugas ketika memasuki salah satu area didalam</h3> -->
				<h3><b>Oops, <?= $nama_event ?> sudah ditutup</b></h3>
				<br>
				<h6>Silahkan datang lagi di lain waktu ya. Terima kasih sudah berkunjung ke <?= $nama_event ?></h6>
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-md-10 ml-auto mr-auto">
				<a href="<?= base_url() ?>visitor/logout" class="btn btn-block btn-light rounded-pil ml-auto mr-auto" style="padding: 20px; width: 75%;">
					Kembali ke beranda
				</a>
			</div>
		</div>

		<br><br>
	</div>
<?php } ?>

