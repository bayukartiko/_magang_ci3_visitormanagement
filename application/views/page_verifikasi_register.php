<!DOCTYPE html>
<html lang="en">

<head>

	<link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/id_card_icon.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>
		verifikasi register
	</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Mulish:wght@400;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>

	<!-- jquery  -->
	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
	
</head>

	<body class="text-center" style="font-family: 'Nunito', sans-serif; background-color: #009432;">
		<div class="container d-flex flex-column justify-content-center vh-100">
			<div class="text-center p-5" style="color: #FEFEFE;">
				<?php 
					if($error == true){ 
						echo "<i class='fas fa-times-circle fa-7x text-center'></i>"; 
					}else{ 
						echo "<i class='fas fa-fw fa-spinner fa-pulse fa-7x text-center'></i>"; 
					} 
				?>
			</div>
			<div class="row">
				<div class="col-md-12 m-2" style="color: #FEFEFE;">
					<!-- <h3>Hore! Data kamu telah berhasil dibuat! Tunjukkan barcode dibawah ke petugas ketika memasuki salah satu area didalam</h3> -->
					<h3>
						<b>
							<?php 
								if($error == true){
									echo "terjadi kesalahan";
								}else{
									echo "Memverifikasi kode pendaftaran anda";
								} 
							?>
						</b>
					</h3>
					<br>
					<h6>
						<?php 
							if($error == true){
								echo 'Mohon maaf, '.$pesan_error;
							}else{
								echo "Kode pendaftaran anda sedang kami proses, harap bersabar ya.."; 
							} 
						?></h6>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-md-4 ml-auto mr-auto">
					<?php 
						if($error == true){ ?>
							<a href="<?= base_url() ?>" class="btn btn-block btn-light rounded-pil ml-auto mr-auto" style="padding: 20px;">
								Kembali ke beranda
							</a>
						<?php } ?>
				</div>
			</div>
	
			<br><br>
		</div>
	</body>

</html>

<script>
	// var url = window.location.toString();
	// setTimeout(() => {
	// 	if (url.indexOf("/register?") > 0) {
	// 		var clean_url = url.substring(0, url.indexOf("/register?"));
	// 		window.history.replaceState({}, document.title, clean_url);
	// 	}
	// }, 5000);
</script>
