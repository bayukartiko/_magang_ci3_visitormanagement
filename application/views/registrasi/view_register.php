<?php if($this->session->userdata('status') == "telah_masuk_event"){ ?>
	<div class="text-center">
		<!-- </?= $this->session->all_userdata(); ?>
		</?= $this->session->userdata('gambar_qrcode'); ?> -->
		
		<h2>Selamat datang, <?= $this->session->userdata("nama_visitor"); ?></h2>
		<h5>qr code dibawah berfungsi untuk discan saat anda ingin memasuki area tertentu.</h5>
		<h5>dipersilahkan untuk screenshot bila perlu.</h5>
		<!-- qrcode -->
		<!-- <img src="<?= base_url() ?>assets/img/qrcode/<?= $this->session->userdata("gambar_qrcode"); ?>" alt="<?= $this->session->userdata("id_visitor"); ?>" data-toggle="popover" data-placement="top" data-content="<?= $this->session->userdata("id_visitor"); ?>" data-container="body" class="img-thumbnail rounded mx-auto d-block"> -->
		<!-- <h5>tunjukkan qr code anda kepada petugas area untuk discan.</h5> -->
		<!-- barcode -->
		<img src="<?= base_url() ?>assets/img/barcode/<?= $this->session->userdata("gambar_qrcode"); ?>" alt="<?= $this->session->userdata("id_visitor"); ?>" data-toggle="popover" data-placement="top" data-content="<?= $this->session->userdata("id_visitor"); ?>" data-container="body" class="img-thumbnail rounded mx-auto d-block">
		<h5>tunjukkan barcode anda kepada petugas area untuk discan.</h5>
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
