<!DOCTYPE html>
<html lang="en">

<head>

	<link rel="icon" type="image/png" href="<?= base_url() ?>assets/img/id_card_icon.png">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

  <title>SB Admin 2 - Blank</title>

	<!-- Custom fonts for this template-->
	<link href="<?= base_url() ?>assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
	<link href="<?= base_url() ?>assets/sba2/css/sb-admin-2.min.css" rel="stylesheet">
	
	<!-- Bootstrap core JavaScript-->
    <script src="<?= base_url() ?>assets/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url() ?>assets/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
	<script src="<?= base_url() ?>assets/sba2/js/sb-admin-2.min.js"></script>
	
	<!-- datatables -->
	<link rel="stylesheet" type="text/css" href="<?= base_url() ?>assets/DataTables/datatables.min.css"/>
	<script type="text/javascript" src="<?= base_url() ?>assets/DataTables/datatables.min.js"></script>

	<!-- highcharts -->
	<script src="<?= base_url() ?>assets/Highcharts/code/highcharts.js"></script>
	<script src="<?= base_url() ?>assets/Highcharts/code/modules/exporting.js"></script>
	<script src="<?= base_url() ?>assets/Highcharts/code/modules/export-data.js"></script>
	<script src="<?= base_url() ?>assets/Highcharts/code/modules/accessibility.js"></script>

	<!-- select2 -->
	<link href="<?= base_url() ?>vendor/select2/dist/css/select2-bootstrap4.css" rel="stylesheet" />
	<link href="<?= base_url() ?>vendor/ttskch/select2-bootstrap4-theme/dist/select2-bootstrap4.min.css" rel="stylesheet" />
	<script src="<?= base_url() ?>vendor/select2/dist/js/select2.min.js"></script>

	<!-- bootstrap-select
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script> -->


		<!-- sweetalert -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.3.5/sweetalert2.all.min.js" integrity="sha512-rQGS49+CfE3nYVbZ4JFwdUrwZwHMnvNz611lVFevMeKN8HG7z/Sep0K91rjMbL4da6VSmOxk4hSXrhK0M+nDnQ==" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.3.5/sweetalert2.min.css" integrity="sha512-NU255TKQ55xzDS6UHQgO9HQ4jVWoAEGG/lh2Vme0E2ymREox7e8qwIfn6BFem8lbahhU9E2IQrHZlFAxtKWH2Q==" crossorigin="anonymous" />

</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">


		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
					<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

						<!-- Topbar Navbar -->
						<ul class="navbar-nav ml-auto">

							<!-- Nav Item - Alerts -->
							<li class="nav-item dropdown no-arrow mx-1">
								<a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
									data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fas fa-bell fa-fw"></i>
									<!-- Counter - Alerts -->
									<span class="badge badge-danger badge-counter">3+</span>
								</a>
								<!-- Dropdown - Alerts -->
								<div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
									aria-labelledby="alertsDropdown">
									<h6 class="dropdown-header">
										Alerts Center
									</h6>
									<a class="dropdown-item d-flex align-items-center" href="#">
										<div class="mr-3">
											<div class="icon-circle bg-primary">
												<i class="fas fa-file-alt text-white"></i>
											</div>
										</div>
										<div>
											<div class="small text-gray-500">December 12, 2019</div>
											<span class="font-weight-bold">A new monthly report is ready to download!</span>
										</div>
									</a>
									<a class="dropdown-item d-flex align-items-center" href="#">
										<div class="mr-3">
											<div class="icon-circle bg-success">
												<i class="fas fa-donate text-white"></i>
											</div>
										</div>
										<div>
											<div class="small text-gray-500">December 7, 2019</div>
											$290.29 has been deposited into your account!
										</div>
									</a>
									<a class="dropdown-item d-flex align-items-center" href="#">
										<div class="mr-3">
											<div class="icon-circle bg-warning">
												<i class="fas fa-exclamation-triangle text-white"></i>
											</div>
										</div>
										<div>
											<div class="small text-gray-500">December 2, 2019</div>
											Spending Alert: We've noticed unusually high spending for your account.
										</div>
									</a>
									<a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
								</div>
							</li>

							<div class="topbar-divider d-none d-sm-block"></div>

							<!-- Nav Item - User Information -->
							<li class="nav-item dropdown no-arrow">
								<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
									data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="mr-2 d-none d-lg-inline text-gray-600 small"><?= $tabel_staff['nama']; ?></span>
									<!-- <img class="img-profile rounded-circle" src="img/undraw_profile.svg"> -->
									<span class="img-profile rounded-circle d-flex align-items-center"><i class="fas fa-user-tie"></i></span>
								</a>
								<!-- Dropdown - User Information -->
								<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
									aria-labelledby="userDropdown">
									<a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
										<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
										Logout
									</a>
								</div>
							</li>

						</ul>

					</nav>
				<!-- End of Topbar -->

					<!-- Begin Page Content -->
					<div class="container-fluid">

					<!-- Page Heading -->
						<div class="d-sm-flex align-items-center justify-content-between mb-4">
							<!-- <h1 class="h3 mb-0 text-gray-800">Register / Daftar event</h1> -->
						</div>

						<?= print_r($this->session->all_userdata()) ?>
 
						<!-- keterangan tugas dan keterangan event -->
							<?php
								foreach($all_tugas_staff_petugas as $data_tugas_staff_petugas){
									if($this->session->userdata('id_tugas') == $data_tugas_staff_petugas->id_tugas){
										if($data_tugas_staff_petugas->petugas_pintu_area == true){ ?>
											<div class="row">
												<div class="col-md-12">
													<div class="card shadow mb-4">
														<!-- Card Header - Dropdown -->
														<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
															<h6 class="m-0 font-weight-bold text-primary">Keterangan tugas</h6>
														</div>
														<div class="card-body p-3">
															<!-- Nested Row within Card Body -->
															<div class="row">
																<div class="offset-lg-1 col-lg-10">
																	<!-- <div class="pt-5 pb-5"> -->
																	<div class="pt-5 pb-5">
																		<div class="row">
																			<div class="col-md-6">
																				<p class="text-center">
																					<h5 class="text-center">Anda bertugas sebagai</h5>
																					<hr>
																					<h2 class="text-center">
																						Petugas pintu area
																					</h2>
																				</p>
																			</div>
																			<div class="col-md-6">
																				<p class="text-center">
																					<h5 class="text-center">Pada area</h5>
																					<hr>
																					<h2 class="text-center">
																						<?php
																							foreach($all_area as $area_data){
																								if($data_tugas_staff_petugas->id_area == $area_data->id_area){
																									echo $area_data->nama_area;
																								}
																							}
																						?>
																					</h2>
																				</p>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-12">
													<div class="card shadow mb-4">
														<!-- Card Header - Dropdown -->
														<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
															<h6 class="m-0 font-weight-bold text-primary">Keterangan event</h6>
														</div>
														<div class="card-body p-3">
															<!-- Nested Row within Card Body -->
															<div class="row">
																<div class="offset-lg-1 col-lg-10">
																	<!-- <div class="pt-5 pb-5"> -->
																	<div class="pt-5 pb-5">
																		<p class="text-center">
																			<h5 class="text-center">Pada Event</h5>
																			<hr>
																			<h2 class="text-center">
																				<!-- </?= $petugas_pintu_keluar->nama_event ?> -->

																				<?php
																					foreach($all_event as $event_data){
																						if($data_tugas_staff_petugas->id_event == $event_data->id_event){
																							echo $event_data->nama_event;
																						}
																					}
																				?>
																			</h2>
																		</p>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<!-- form scan -->
												<div class="card shadow mb-4">
													<!-- Card Header - Dropdown -->
													<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
														<h6 class="m-0 font-weight-bold text-primary">Form scan visitor</h6>
													</div>
													<div class="card-body p-3">
														<!-- Nested Row within Card Body -->
														<div class="row">
															<div class="offset-lg-1 col-lg-10">
																<!-- <div class="pt-5 pb-5"> -->
																<div class="pt-5 pb-5">
																	<form id="form-scan-visitor-area" enctype="multipart/form-data" action="" class="" method="POST">
																		<input type="hidden" id="tipe_tugas" value="pintu_area" hidden aria-hidden="true">
																		<div class="form-group">
																			<label class="bmd-label-floating" for="field_scan_id_visitor">Scan ID Visitor</label>
																			<input type="text" class="form-control" id="field_scan_id_visitor" name="field_scan_id_visitor" placeholder="masukkan id visitor hasil scan barcode disini" autofocus>

																			<small id="error_field_scan_id_visitor" class="form-text text-muted invalid-feedback"></small>
																			<small id="help-kursor" class="form-text text-muted">Pastikan kursor anda aktif didalam input diatas</small>
																		</div>
																	</form>
																</div>
															</div>
														</div>
													</div>
												</div>

											<!-- list data visitor yang telah discan -->
												<div class="card shadow mb-4">
													<!-- Card Header - Dropdown -->
													<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
														<h6 class="m-0 font-weight-bold text-primary">List data visitor yang telah di-scan oleh anda</h6>
													</div>
													<div class="card-body p-3">
														<!-- Nested Row within Card Body -->
														<div class="row">
															<div class="offset-lg-1 col-lg-10">
																<div class="pt-5 pb-5">
																	<div id="view_tabel_data_visitor_keluarmasuk_area">
																		<?php $this->load->view('tabel/tabel_data_visitor_keluarmasuk_area', ['visitor_scan_keluarmasuk_area' => $visitor_scan_keluarmasuk_area, 'hitung_visitor_scan_keluarmasuk_area' => $hitung_visitor_scan_keluarmasuk_area]); ?>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>

											<!-- chart data visitor logged in - logged out -->
												<div class="card shadow mb-4">
													<!-- Card Header - Dropdown -->
													<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
														<h6 class="m-0 font-weight-bold text-primary">Chart total visitor didalam area</h6>
													</div>
													<div class="card-body p-3">
														<!-- Nested Row within Card Body -->
														<div class="row">
															<div class="offset-lg-1 col-lg-10">
																<div class="pt-5 pb-5">
																	<div id="view_chart_visitor_keluar_masuk">
																		<?php $this->load->view('chart/chart_visitor_keluar_masuk', ['hitung_visitor_masuk_event' => $hitung_visitor_masuk_event, 'hitung_visitor_didalam_area' => $hitung_visitor_didalam_area,'hitung_visitor_keluar_event' => $hitung_visitor_keluar_event]); ?>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>

										<?php }elseif($data_tugas_staff_petugas->petugas_pintu_keluar == true){ ?>
											<div class="row">
												<div class="col-md-6">
													<div class="card shadow mb-4">
														<!-- Card Header - Dropdown -->
														<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
															<h6 class="m-0 font-weight-bold text-primary">Keterangan tugas</h6>
														</div>
														<div class="card-body p-3" style="height: 275px;">
															<!-- Nested Row within Card Body -->
															<div class="row">
																<div class="offset-lg-1 col-lg-10">
																	<!-- <div class="pt-5 pb-5"> -->
																	<div class="pt-5 pb-5">
																		<p class="text-center">
																			<h5 class="text-center">Anda bertugas sebagai</h5>
																			<hr>
																			<h2 class="text-center">
																				Petugas pintu keluar
																			</h2>
																		</p>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<div class="col-md-6">
													<div class="card shadow mb-4">
														<!-- Card Header - Dropdown -->
														<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
															<h6 class="m-0 font-weight-bold text-primary">Keterangan event</h6>
														</div>
														<div class="card-body p-3" style="height: 275px;">
															<!-- Nested Row within Card Body -->
															<div class="row">
																<div class="offset-lg-1 col-lg-10">
																	<!-- <div class="pt-5 pb-5"> -->
																	<div class="pt-5 pb-5">
																		<p class="text-center">
																			<h5 class="text-center">Pada Event</h5>
																			<hr>
																			<h2 class="text-center">
																				<?php
																					foreach($all_event as $event_data){
																						if($data_tugas_staff_petugas->id_event == $event_data->id_event){
																							echo $event_data->nama_event;
																						}
																					}
																				?>
																			</h2>
																		</p>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>

											<!-- form scan -->
												<div class="card shadow mb-4">
													<!-- Card Header - Dropdown -->
													<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
														<h6 class="m-0 font-weight-bold text-primary">Form scan visitor</h6>
													</div>
													<div class="card-body p-3">
														<!-- Nested Row within Card Body -->
														<div class="row">
															<div class="offset-lg-1 col-lg-10">
																<!-- <div class="pt-5 pb-5"> -->
																<div class="pt-5 pb-5">
																	<form id="form-scan-visitor-keluar" enctype="multipart/form-data" action="" class="" method="POST">
																		<input type="hidden" id="tipe_tugas" value="pintu_keluar" hidden aria-hidden="true">
																		<div class="form-group">
																			<label class="bmd-label-floating" for="field_scan_id_visitor">Scan ID Visitor</label>
																			<input type="text" class="form-control" id="field_scan_id_visitor" name="field_scan_id_visitor" placeholder="masukkan id visitor hasil scan barcode disini" autofocus>
					
																			<small id="error_field_scan_id_visitor" class="form-text text-muted invalid-feedback"></small>
																			<small id="help-kursor" class="form-text text-muted">Pastikan kursor anda aktif didalam input diatas</small>
																		</div>
																	</form>
																</div>
															</div>
														</div>
													</div>
												</div>
					
											<!-- list data visitor yang telah discan -->
												<div class="card shadow mb-4">
													<!-- Card Header - Dropdown -->
													<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
														<h6 class="m-0 font-weight-bold text-primary">List data visitor yang telah di-scan oleh anda</h6>
													</div>
													<div class="card-body p-3">
														<!-- Nested Row within Card Body -->
														<div class="row">
															<div class="offset-lg-1 col-lg-10">
																<div class="pt-5 pb-5">
																	<div id="view_tabel_data_visitor_keluar">
																		<?php $this->load->view('tabel/tabel_data_visitor_keluar', ['visitor_scan_keluar' => $visitor_scan_keluar, 'hitung_visitor_scan_keluar' => $hitung_visitor_scan_keluar]); ?>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
					
											<!-- chart data visitor logged in - logged out -->
												<div class="card shadow mb-4">
													<!-- Card Header - Dropdown -->
													<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
														<h6 class="m-0 font-weight-bold text-primary">Chart total visitor keluar/masuk/in_area</h6>
													</div>
													<div class="card-body p-3">
														<!-- Nested Row within Card Body -->
														<div class="row">
															<div class="offset-lg-1 col-lg-10">
																<div class="pt-5 pb-5">
																	<div id="view_chart_visitor_keluar_masuk">
																		<?php $this->load->view('chart/chart_visitor_keluar_masuk', ['hitung_visitor_masuk_event' => $hitung_visitor_masuk_event, 'hitung_visitor_didalam_area' => $hitung_visitor_didalam_area,'hitung_visitor_keluar_event' => $hitung_visitor_keluar_event]); ?>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
										<?php }
									}
								}
							?>

						

					</div>
					<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

  	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

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

  	<!-- Core plugin JavaScript-->
	<script src="<?= base_url() ?>assets/jquery-easing/jquery.easing.min.js"></script>
	
	<!-- sweetalert -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.3.5/sweetalert2.all.min.js" integrity="sha512-rQGS49+CfE3nYVbZ4JFwdUrwZwHMnvNz611lVFevMeKN8HG7z/Sep0K91rjMbL4da6VSmOxk4hSXrhK0M+nDnQ==" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.3.5/sweetalert2.min.css" integrity="sha512-NU255TKQ55xzDS6UHQgO9HQ4jVWoAEGG/lh2Vme0E2ymREox7e8qwIfn6BFem8lbahhU9E2IQrHZlFAxtKWH2Q==" crossorigin="anonymous" />

    <!-- Custom scripts for all pages-->
	<script src="<?= base_url() ?>assets/sba2/js/sb-admin-2.min.js"></script>
	
	<!-- highcharts -->
	<script src="<?= base_url() ?>assets/Highcharts/code/highcharts.js"></script>
	<script src="<?= base_url() ?>assets/Highcharts/code/modules/exporting.js"></script>
	<script src="<?= base_url() ?>assets/Highcharts/code/modules/export-data.js"></script>
	<script src="<?= base_url() ?>assets/Highcharts/code/modules/accessibility.js"></script>

	<!-- select2 -->
	<!-- <script src="</?= base_url() ?>vendor/select2/dist/js/select2.min.js"></script> -->

	<script>
		$(document).ready(function(){
			var visitor_id = "";
			
			// $("#help-kursor").hide();

			// $('#field_scan_id_visitor').on('focus', function(){
			// 	console.log("fokus");
			// 	$("#help-kursor").hide();
			// });

			$('#field_scan_id_visitor').on('input', function(){
				// console.log($('#field_scan_id_visitor').val());
				visitor_id = $(this).val();

				// if($(this).val() == '' || $(this).val().indexOf(' ')>=0){
				if($(this).val() == ''){
					$('#field_scan_id_visitor').addClass('is-invalid');
					$('#error_field_scan_id_visitor').html('Harap isi field ini !');
				}else{
					if($("#tipe_tugas").val() == "pintu_keluar"){
						scan_keluar_visitor();
					}else if($("#tipe_tugas").val() == "pintu_area"){
						scan_area_visitor();
					}
				}
			});

			function scan_keluar_visitor(){
				$.ajax({
					url: '<?= base_url(); ?>staff_only/petugas/scan/pintu_keluar/'+visitor_id.trim()+'', // URL tujuan
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

						if(callback.status == "sukses"){ // Jika Statusnya = sukses
							// console.log('callback sukses');

							// Ganti isi dari div id="view_tabel_data_visitor_keluar" dengan view yang diambil dari view_tabel_data_visitor_keluar.php
							$('#view_tabel_data_visitor_keluar').html(callback.view_tabel_data_visitor_keluar);

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

							$('#field_scan_id_visitor').val('');

							$('#field_scan_id_visitor').removeClass('is-invalid');
							$('#error_field_scan_id_visitor').html('');
							
							$('#field_scan_id_visitor').focus();

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
			function scan_area_visitor(){
				$.ajax({
					url: '<?= base_url(); ?>staff_only/petugas/scan/pintu_area/'+visitor_id.trim()+'', // URL tujuan
					type: 'POST',
					// data: $("#form-modal form").serialize(),
					data: new FormData(document.getElementById('form-scan-visitor-area')),
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

						if(callback.status == "sukses"){ // Jika Statusnya = sukses
							// console.log('callback sukses');

							// Ganti isi dari div id="view_tabel_data_visitor_area" dengan view yang diambil dari view_tabel_data_visitor_area.php
							// $('#view_tabel_data_visitor_area').html(callback.view_tabel_data_visitor_area);

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

							$('#field_scan_id_visitor').val('');

							$('#field_scan_id_visitor').removeClass('is-invalid');
							$('#error_field_scan_id_visitor').html('');
							
							$('#field_scan_id_visitor').focus();

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
						}
					},
					error: function(xhr, ajaxOptions, thrownError, errorMessage, callback) {
						console.log("error :", errorMessage);
						console.log(callback);
						console.log(thrownError + "\r\n" + xhr.status + "\r\n"  + xhr.statusText + "\r\n" + xhr.responseText);
					}
				});
			};
		});
	</script>

</body>

</html>
