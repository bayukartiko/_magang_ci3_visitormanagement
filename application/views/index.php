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
		Visitor Management
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
	
	<!-- Google Maps API -->
	<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?= $_ENV["GoogleMapsAPI"] ?>&libraries=places" type="text/javascript"></script>
	
		<style>
			body{
				/* font-family: 'Mulish', sans-serif; */
				font-family: 'Nunito', sans-serif;
				background-color: #F0F2F9;
				position: relative;
			}
			.jumbotron{
				/* background-image: url('./assets/img/checking-her-messages.jpg');
				background-repeat: no-repeat;
				background-size: cover; */
				/* background-color: #28903B; */
				color: #ffffff;
				/* height: 100vh; */
				vertical-align: middle;
			}
			.jumbotron h1{
				font-weight: bold;
				font-size: 10vh;
			}
			.jumbotron p{
				font-size: 3vh;
			}
			.jumbotron button{
				width: 25vw;
			}
			.card{
				border: none;
			}
			.nav-link.active{
				border-bottom: 2px solid white;
				font-weight: bold;
			}

			@media screen and (max-width: 780px) {
				.jumbotron{
					text-align: center;
				}
				.jumbotron h1{
					font-size: 7vh;
				}
				.jumbotron button{
					width: 50vw;
				}
				.navbar-brand img{
					display: none;
					/* background-image: none;	 */
				}
				.navbar-brand:after {
					content: 'VM';
				}
				.nav-link.active{
					border-left: 2px solid white;
					border-bottom: none;
					padding-left: 5px;
				}
			}
			@media screen and (max-width: 600px) {
				.jumbotron{
					text-align: center;
				}
				.jumbotron h1{
					font-size: 7vh;
				}
				.jumbotron button{
					width: 50vw;
				}
				.jumbotron img{
					display: none;
				}
				.navbar-brand img{
					display: none;
					/* background-image: none;	 */
				}
				.navbar-brand:after {
					content: 'VM';
				}
				.nav-link.active{
					border-left: 2px solid white;
					border-bottom: none;
					padding-left: 5px;
				}
			}
		</style>
	
</head>

<body data-spy="scroll" data-target="#navbar" data-offset="0">

	<section id="topbar">
		<nav class="navbar topbar navbar-expand-lg navbar-light fixed-top" id="navbar" style="background-color: #009432; transition: 0.3s;">
			<div class="container">
				<a class="navbar-brand text-light" href="#">
					<img src="./assets/img/id_card_img.png" style="width: 30px; height: 55px;" alt="" srcset="">
				</a>

				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				
				<div class="navbar-collapse collapse" id="navbarNavAltMarkup">
					<div class="navbar-nav m-2">
						<a class="nav-link text-light mr-3" href="#home">Home</a>
						<a class="nav-link text-light mr-3" href="#semua-event">Semua Event</a>
					</div>
				</div>
			</div>
		</nav>
	</section>

	<section id="home" class="">
		<div class="jumbotron jumbotron-fluid my-auto" style="background-color: #009432; padding-top: 100px; border-bottom-left-radius: 50px; border-bottom-right-radius: 50px;">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-8">
						<h1>Visitor Management</h1>
						<p>Website untuk mempermudah pendataan pada partisipasi anda dalam event / festival yang anda ikuti.</p>
						<div class="pt-5 position-relative">
							<button class="btn btn-danger rounded-circle m-1"  style="width: 50px; height: 50px;"><i class="fab fa-fw fa-youtube"></i></button>
							<button class="btn btn-light rounded-circle  m-1" style="width: 50px; height: 50px;"><i class="fab fa-fw fa-instagram"></i></button>
							<button class="btn btn-info rounded-circle  m-1" style="width: 50px; height: 50px;"><i class="fab fa-fw fa-twitter"></i></button>
							<button class="btn btn-primary rounded-circle  m-1" style="width: 50px; height: 50px;"><i class="fab fa-fw fa-facebook-f"></i></button>
						</div>
					</div>
					<div class="col-md-4 p-3 text-center">
						<img src="./assets/img/id_card_img.png" alt="" srcset="">
					</div>
				</div>
				<br>
				<a href="#semua-event" class="btn btn-light p-3 mb-3 px-5 rounded-pill">Lihat Event</a>
			</div>
		</div>
	</section>

	<section id="semua-event" class="" style="padding-top: 55px;">
		<hr class="mx-3" style="border-top: 1px dashed gray;">
		<div class="container text-center my-3">
			<h1 class="font-weight-light">Semua Event</h1>
			<p class="font-weight-light">Pilih event untuk menampilkan detail</p>
			<div class="row">
				<?php foreach($all_event as $data_event){ ?>
					<div class="col-md-4 mb-3 kolom mx-auto">
						<div class="card kartu mb-4 shadow-sm text-decoration-none text-body w-100 h-100 btn-detail-event" data-toggle="modal" data-target="#exampleModal" style="cursor: pointer">
							<img src="<?= base_url() ?>assets/img/event_image/<?= $data_event->gambar_event ?>" height="180" class="card-img-top" alt="...">
							
							<div class="card-body">
								<?php if($data_event->status == "not_active"){ ?>
									<?php if($data_event->tanggal_dibuka.' '.$data_event->jam_dibuka > date('Y-m-d H:i:s')){ ?>
										<button class="btn btn-outline-success rounded-pill text-center">Pendaftaran Dibuka</button>
									<?php }else{ ?>
										<button class="btn btn-outline-danger rounded-pill text-center">Closed</button>
									<?php } ?>
								<?php }else{ ?>
									<button class="btn btn-outline-primary rounded-pill text-center">Open</button>
								<?php } ?>
								<hr>
								<h4><?= $data_event->nama_event ?></h4>
							</div>

							<!-- data-event -->
								<input type="hidden" class="id_event-value_data" value="<?= $data_event->id_event; ?>">
								<input type="hidden" class="src_qrcode_event-value_data" value="<?= base_url() ?>assets/img/qrcode/<?= $data_event->gambar_qrcode ?>">
								<input type="hidden" class="alt_qrcode_event-value_data" value="<?= base_url() ?><?= $data_event->custom_url ?>">
								<input type="hidden" class="download_qrcode_event-value_data" value="<?= base_url() ?><?= $data_event->custom_url ?>.png">
								<input type="hidden" class="src_gambar_event-value_data" value="<?= base_url() ?>assets/img/event_image/<?= $data_event->gambar_event; ?>">
								<input type="hidden" class="alt_gambar_event-value_data" value="<?= $data_event->nama_event ?> image">
								<input type="hidden" class="link_akses_event-value_data" value="<?= base_url() ?><?= $data_event->custom_url ?>">
								<input type="hidden" class="btn_status_event-value_data" value="<?php if($data_event->status == "not_active"){ ?><?php if($data_event->tanggal_dibuka.' '.$data_event->jam_dibuka > date('Y-m-d H:i:s')){ ?><button class='btn btn-outline-danger rounded-pill text-center'>Pendaftaran Dibuka</button><?php }else{ ?><button class='btn btn-outline-danger rounded-pill text-center'>Closed</button><?php } ?><?php }else{ ?><button class='btn btn-outline-primary rounded text-center'>Open</button><?php } ?>">
								<input type="hidden" class="nama_event-value_data" value="<?= $data_event->nama_event; ?>">
								<input type="hidden" class="detail_event-value_data" value='<?= str_replace("'", '&apos;', $data_event->detail_event); ?>'>
								<input type="hidden" class="custom_url-value_data" value="<?= base_url().$data_event->custom_url; ?>">
								<input type="hidden" class="alamat_event-value_data" value="<?= $data_event->alamat_event; ?>">
								<input type="hidden" class="btn_alamat_event-value_data" value="https://maps.google.com/?q=<?= $data_event->alamat_event; ?>">
								<input type="hidden" class="latitude-value_data" value="<?= $data_event->latitude; ?>">
								<input type="hidden" class="longitude-value_data" value="<?= $data_event->longitude; ?>">
								<input type="hidden" class="gambar_qrcode-value_data" value="<?= $data_event->gambar_qrcode; ?>">
								<input type="hidden" class="tanggal_dibuka-value_data" value="<?= date('D, d-M-Y', strtotime($data_event->tanggal_dibuka)) ?>">
								<input type="hidden" class="tanggal_ditutup-value_data" value="<?= date('D, d-M-Y', strtotime($data_event->tanggal_ditutup)) ?>">
								<input type="hidden" class="jam_dibuka-value_data" value="<?= date('H:i A', strtotime($data_event->jam_dibuka)) ?>">
								<input type="hidden" class="jam_ditutup-value_data" value="<?= date('H:i A', strtotime($data_event->jam_ditutup)) ?>">
								<input type="hidden" class="status-value_data" value="<?= $data_event->status; ?>">

						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>

	<section id="footer" style="padding-top: 55px;">
		<div class="bg-dark" style="border-top-left-radius: 30px; border-top-right-radius: 30px;">
			<div class="container d-flex text-light" style="height: 10vh;">
				<div class="row justify-content-center align-self-center mx-auto">
					&copy;<?= date("Y", now()) ?> VM
				</div>
			</div>
		</div>
	</section>

	<!-- Modal -->
	<style>
		.modal {
			padding: 0 !important;
		}
		.modal .modal-dialog {
			width: 100%;
			max-width: none;
			height: 100%;
			margin: 0;
		}
		.modal .modal-content {
			height: 100%;
			border: 0;
			border-radius: 0;
		}
		.modal .modal-body {
			overflow-y: auto;
		}
		
	</style>
	<div class="modal fade" id="exampleModal"tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content" style="background-color: #FFFFFF;">
				<div class="modal-body" style="padding: 0; padding-bottom: 100px;">
					<!-- </?php foreach($all_event as $data_event){?> -->
						<div class="card kartuInModal">
							<div class="row no-gutters">
								<div class="col-md-8">
									<button type="button" class="close rounded-circle" data-dismiss="modal" aria-label="Close" style="position: absolute; padding: 15px; backdrop-filter: blur(25px); left: 0;">
										<span aria-hidden="true">&times;</span>
									</button>
									<img id="gambar_event-kartuInModal" src="" class="card-img rounded-0" alt="">
								</div>
								
								<div class="col-md-4" style="background-color: #ECECEC;">
									<div class="card-body">
										<div id="btn_status_event-kartuInModal"></div>
										<br><br>
										<p id="nama_event-kartuInModal" class="card-text h3"></p>
										<br>
										<div class="text-center">
											<img id="gambar_qrcode-kartuInModal" src="" alt="" class="img-thumbnail shadow" style="width: 200px; height: 200px;">
										</div>
									</div>
								</div>

								<div class="main" style="width: 100%;">
									<nav class="navbar topbarInModal sticky-top p-2 shadow text-center" style="width: 100%; border-bottom: 2px solid #ECECEC; background-color: #FFFFFF;">
										<div style="width: 100%;">
											<p>Gratis</p>
											<a id="btn_daftar_event-InModal" class="btn btn-success text-light text-center" style="width: 150px;" href="">Daftar</a>
										</div>
									</nav>
									<div class="container-fluid py-3">
										<div class="row">
											<div class="col-md-7" id="detail-event">
												<hr>
												Tentang Event ini:
												<br>
												<hr>
												<br>
												<div id="detail_event-InModal"></div>
											</div>
											<div class="col-md-5">
												<hr>
												Informasi lebih lanjut:
												<br>
												<hr>
												<br>
												<b>Tanggal dan Waktu :</b><br>
												<table class="table text-center table-borderless table-responsive-sm">
													<tr>
														<th>Tanggal Dimulai</th>
														<th>Tanggal Berakhir</th>
													</tr>
													<tr>
														<td id="tgl_dibuka-InModal"></td>
														<td id="tgl_ditutup-InModal"></td>
													</tr>
													<tr><td><br></td></tr>
													<tr>
														<th>Jam Dibuka</th>
														<th>Jam Ditutup</th>
													</tr>
													<tr>
														<td id="jam_dibuka-InModal"></td>
														<td id="jam_ditutup-InModal"></td>
													</tr>
												</table>
												
												<br>

												<b>Lokasi :</b><br>
												<div id="alamat_event-InModal"></div>
												<br>
												<a id="btn_alamat_event-InModal" href="" class="btn btn-primary" target="_blank">Buka di Google Maps <i class="fas fa-external-link-alt"></i></a>
												<br><br>
												<div id="map" class="embed-responsive embed-responsive-16by9"></div>
											</div>
										</div>
									</div>
								</div>
							</div>
							
							<nav class="navbar fixed-bottom p-1 shadow text-right bg-transparent" style="width: 100%;">
								<div style="width: 100%;">
									<button type="button" class="btn btn-danger text-center" data-dismiss="modal" style="width: 150px;"  aria-label="Close">
										Tutup
									</button>
								</div>
							</nav>

						</div>
					<!-- </?php } ?> -->
				</div>
			</div>
		</div>
	</div>

	<script>
		$("body").css('overflow', 'hidden');
		$("body").append('<div id="overlay" style="color:black;font-size:25px;cursor: not-allowed;backdrop-filter: blur(15px);position:absolute;top:0;left:0;height:100%;width:100%;z-index:9999999999999999;overflow:hidden;" class="text-center p-5 fixed-top"><i class="fas fa-fw fa-hand-paper fa-2x"></i><br><b>Harap tunggu hingga page selesai dimuat</b></div>');
		$(window).on('load', function(){
			$("body").css('overflow', 'visible');
			$("#overlay").remove();
		});
		$(window).bind('beforeunload',function(){
			$("body").css('overflow', 'hidden');
			$("body").append('<div id="overlay" style="color:black;font-size:25px;cursor: not-allowed;backdrop-filter: blur(15px);position:absolute;top:0;left:0;height:100%;width:100%;z-index:9999999999999999;overflow:hidden;" class="text-center p-5 fixed-top"><i class="fas fa-fw fa-hand-paper fa-2x"></i><br><b>Harap tunggu hingga page selesai dimuat</b></div>');
		});

		
		$(document).ready(function(){
			
			// hapus # tag dari url a href
				$("a").click(function(){
					setTimeout(()=>{
						// call removeHash function after set timeout
						removeHash();
					}, 5); // 5 millisecond timeout in this case
					function removeHash(){
						history.replaceState('', document.title, window.location.origin + window.location.pathname + window.location.search);
					}
				});

			// mengatasi body width yang selalu berkurang ketika modal dibuka
				$('#exampleModal').on('show.bs.modal', function (e) {
					$("body").css("overflow", "hidden");
				});
				$('#exampleModal').on('hidden.bs.modal', function (e) {
					$("body").css("overflow", "visible");
				});
	
			// scrollspy bootstrap
				$('body').scrollspy({ target: '#navbar' });

			// efek shadow card event ketika di hover
				$( ".kartu" ).hover(
					function() {
						$(this).addClass('shadow-lg').css('transition', '0.3s'); 
					}, function() {
						$(this).removeClass('shadow-lg');
					}
				);

			// efek shadow navbar body
				$(window).scroll(function() {
					if ($(window).scrollTop() >= 50) {
						$('.topbar').addClass('shadow');
					} else {
						$('.topbar').removeClass('shadow');
					}
				});

			// btn detail event ketika card event diklik
				$(".btn-detail-event").click(function(){
					var kartu = $(this).parent().closest(".kolom");
					// console.log(kartu.find('.id_event-value_data').val());

					$("#gambar_event-kartuInModal").attr("src", kartu.find('.src_gambar_event-value_data').val());
					$("#gambar_event-kartuInModal").attr("alt", kartu.find('.alt_gambar_event-value_data').val());
					$("#btn_status_event-kartuInModal").html(kartu.find('.btn_status_event-value_data').val());
					$("#nama_event-kartuInModal").html(kartu.find('.nama_event-value_data').val());
					$("#gambar_qrcode-kartuInModal").attr("src", kartu.find('.src_qrcode_event-value_data').val());
					$("#detail_event-InModal").html(kartu.find('.detail_event-value_data').val());
					$('#detail_event-InModal img').addClass("img-thumbnail");
					$('#detail_event-InModal iframe').addClass("embed-responsive embed-responsive-16by9");
					$("#tgl_dibuka-InModal").html(kartu.find('.tanggal_dibuka-value_data').val());
					$("#tgl_ditutup-InModal").html(kartu.find('.tanggal_ditutup-value_data').val());
					$("#jam_dibuka-InModal").html(kartu.find('.jam_dibuka-value_data').val());
					$("#jam_ditutup-InModal").html(kartu.find('.jam_ditutup-value_data').val());
					$("#alamat_event-InModal").html(kartu.find('.alamat_event-value_data').val());
					$("#btn_alamat_event-InModal").attr("href", kartu.find('.btn_alamat_event-value_data').val());
					$("#btn_daftar_event-InModal").attr("href", kartu.find('.custom_url-value_data').val());

					var LatLng = { lat: Number(kartu.find('.latitude-value_data').val()), lng: Number(kartu.find('.longitude-value_data').val()) };

					var map = new google.maps.Map(document.getElementById("map"), {
						zoom: 15,
						center: LatLng,
						mapTypeId: "roadmap",
					});

					new google.maps.Marker({
						position: LatLng, 
						map: map,
						animation: google.maps.Animation.BOUNCE,
					});
				});
		})
	</script>

</body>

</html>
