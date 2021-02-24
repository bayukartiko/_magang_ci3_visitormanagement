<div class="container-fluid">
	<div class="text-center p-5" style="color: #FEFEFE;">
		<i class="fas fa-question-circle fa-7x text-center"></i>
	</div>
	<div class="row">
		<div class="col-md-12 m-2" style="color: #FEFEFE;">
			<!-- <h3>Hore! Data kamu telah berhasil dibuat! Tunjukkan barcode dibawah ke petugas ketika memasuki salah satu area didalam</h3> -->
			<h3><b>Oops, Sepertinya kamu tersesat nih</b></h3>
			<br>
			<h6>Kembali lagi yuk, agar kamu tidak semakin jauh tersesatnya.</h6>
		</div>
	</div>
	<br>
	<div class="row">
		<div class="col-md-10 ml-auto mr-auto">
			<?php if($this->session->userdata('role_id') == '1'){ ?>
				<a href="<?= base_url() ?>staff_only/admin/home" class="btn btn-block btn-light rounded-pil ml-auto mr-auto" style="padding: 20px; width: 75%;">Kembali</a>
			<?php }elseif($this->session->userdata('role_id') == '2'){ ?>
				<a href="<?= base_url() ?>staff_only/petugas/scan" class="btn btn-block btn-light rounded-pil ml-auto mr-auto" style="padding: 20px; width: 75%;">Kembali</a>
			<?php }else{ ?>
				<a href="javascript:history.back()" class="btn btn-block btn-light rounded-pil ml-auto mr-auto" style="padding: 20px; width: 75%;">Kembali</a>
			<?php } ?>
		</div>
	</div>

	<br><br>
</div>
