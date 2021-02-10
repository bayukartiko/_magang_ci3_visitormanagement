<?php if($this->session->userdata('status') == "telah_masuk_event"){ ?>
	<div class="text-center">
		<h2>Selamat datang, <?= $this->session->userdata("nama_visitor"); ?></h2>
		<h5>qr code dibawah berfungsi untuk discan saat anda ingin memasuki area tertentu.</h5>
		<h5>dipersilahkan untuk screenshot bila perlu.</h5>
		<!-- qrcode -->
		<!-- <img src="<?= base_url() ?>assets/img/qrcode/<?= $this->session->userdata("gambar_qrcode"); ?>" alt="<?= $this->session->userdata("id_visitor"); ?>" data-toggle="popover" data-placement="top" data-content="<?= $this->session->userdata("id_visitor"); ?>" data-container="body" class="img-thumbnail rounded mx-auto d-block"> -->
		<!-- <h5>tunjukkan qr code anda kepada petugas area untuk discan.</h5> -->
		<!-- barcode -->
		<img src="<?= base_url() ?>assets/img/barcode/<?= $this->session->userdata("gambar_qrcode"); ?>" alt="<?= $this->session->userdata("id_visitor"); ?>" data-toggle="popover" data-placement="top" data-content="<?= $this->session->userdata("id_visitor"); ?>" data-container="body" class="img-thumbnail rounded mx-auto d-block">
		<h5>tunjukkan barcode anda kepada petugas area untuk discan.</h5>

		<br>
		<hr>
		<br>

		<!-- tabel data tracking -->
			<h3 class="text-center">Data tracking area anda</h3>

			<div class="alert alert-success" role="alert">
				<h6>Anda sekarang berada di area:</h6>
				<?php
					if($all_data_saya["status"] == "didalam_area"){
						foreach($all_data_tracking_saya_1 as $data_tracking_saya_1){
							foreach($all_area as $data_area){
								if($data_tracking_saya_1->id_area == $data_area->id_area){
									echo $data_area->nama_area;
								}
							}
						}
					}else{
						echo "<h4>anda belum masuk di area manapun</h4>";
					}
				?>
			</div>

			<table class="table table-responsive-sm table-hover table-striped" id="track-area">
				<thead>
					<tr>
						<th>Nama area</th>
						<th>Waktu masuk area</th>
						<th>Waktu keluar area</th>
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
						<th>Waktu masuk area</th>
						<th>Waktu keluar area</th>
					</tr>
				</tfoot>
			</table>

		<br>
		<hr>
		<br>

		<!-- pemberitahuan protokol kesehatan -->
			<h3 class="text-center">Mari bersama-sama kita patuhi protokol kesehatan agar terhindar dari COVID-19</h3>
			<div class="row">
				<div class="col-md-6 p-4" onMouseOver="this.style.backgroundColor='grey'" onMouseOut="this.style.backgroundColor='#FFFFFF'">
					<!-- <div class="row">
						<div class="col-md-6"><i class="fas fa-head-side-mask"></i></div>
						<div class="col-md-6">Memakai masker</div>
					</div> -->
					<i class="fas fa-head-side-mask fa-5x"></i>
					<br>
					<h4>Memakai Masker</h4>
				</div>
				<div class="col-md-6 p-4" onMouseOver="this.style.backgroundColor='grey'" onMouseOut="this.style.backgroundColor='#FFFFFF'">
					<!-- <div class="row">
						<div class="col-md-6"><i class="fas fa-hands-wash"></i></div>
						<div class="col-md-6">Mencuci tangan pakai sabun</div>
					</div> -->
					<i class="fas fa-hands-wash fa-5x"></i>
					<br>
					<h4>Mencuci tangan pakai sabun</h4>
				</div>
				<div class="col-md-6 p-4" onMouseOver="this.style.backgroundColor='grey'" onMouseOut="this.style.backgroundColor='#FFFFFF'">
					<!-- <div class="row">
						<div class="col-md-6"><i class="fas fa-people-arrows"></i></div>
						<div class="col-md-6">Menjaga jarak</div>
					</div> -->
					<i class="fas fa-people-arrows fa-5x"></i>
					<br>
					<h4>Menjaga jarak</h4>
				</div>
				<div class="col-md-6 p-4" onMouseOver="this.style.backgroundColor='grey'" onMouseOut="this.style.backgroundColor='#FFFFFF'">
					<!-- <div class="row">
						<div class="col-md-6"><i class="fas fa-handshake-slash"></i></div>
						<div class="col-md-6">Hindari kontak langsung dengan sekitar</div>
					</div> -->
					<i class="fas fa-handshake-alt-slash fa-5x"></i>
					<br>
					<h4>Hindari kontak langsung dengan sekitar</h4>
				</div>
			</div>

		<script>
			$(document).ready(function(){
				$("#track-area").DataTable({
					"ordering": false
				})
			});
		</script>

	</div>
<?php }else{ ?>
	<h2 class="text-center title">Form Pendaftaran</h2>
	<h5 class="text-center description">Silahkan isi form berikut untuk mendapatkan tiket berupa QR Code</h5><br>

	<div class="row">
		<div class="offset-md-5 col-md-2">
			<button class="btn btn-block btn-primary" data-toggle="modal" data-target="#Modalregister">
				Isi form
			</button>
		</div>
	</div>
<?php } ?>
