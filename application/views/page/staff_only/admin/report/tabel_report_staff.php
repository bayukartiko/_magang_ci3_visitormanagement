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

</head>

<body>
	<style>
		* {
			box-sizing: border-box;
		}
		table, th, td {
			border: 1px solid black;
			text-align: center;
			font-size: small;
			color: black;
		}
		table{
			margin: 10px;
		}
		.baris{
			display: flex;
		}
		.kolom {
			flex: 50%;
			padding: 5px;
		}
	</style>

	<!-- data staff -->
		<table class="table tabel table-responsive-sm table-hover table-striped">
			<thead>
				<tr>
					<th style="background-color: #8c99a6;" colspan="6" class="text-center h2">List Data Staff</th>
				</tr>
				<tr>
					<th style="background-color: aqua;">Nomor.</th>
					<th style="background-color: aqua;">Staff ID</th>
					<th style="background-color: aqua;">Jabatan</th>
					<th style="background-color: aqua;">Nama</th>
					<th style="background-color: aqua;">Username</th>
					<th style="background-color: aqua;">Tempat Bertugas</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; foreach($all_staff as $staff_data){ ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $staff_data->staff_id ?></td>
						<td>
							<?php 
								foreach($all_role as $data_role){
									if($staff_data->role_id == $data_role->role_id){
										echo $data_role->nama_role;
									}
								}
							?>
						</td>
						<td><?= $staff_data->nama ?></td>
						<td><?= $staff_data->username ?></td>
						<td>
							<?php 
								if($staff_data->role_id == 1){
									echo '<button class="btn btn-outline-success"> bagian admin </button>';
								}else{
									if($staff_data->sedang_bertugas == true){ // cek apakah staff sedang bertugas
										foreach($all_tugas_staff_petugas as $data_tugas_staff_petugas){ // ambil semua data tabel_tugas_staff_petugas
											if($staff_data->id_tugas == $data_tugas_staff_petugas->id_tugas){ // jika id_tugas pada tabel_staff sama dengan id_tugas pada tabel_tugas_staff_petugas
												if($data_tugas_staff_petugas->petugas_pintu_area == true){ // jika tugasnya jadi petugas_pintu_area ?>
													<table class="table table-borderless table-hover table-responsive-sm">
														<tr>
															<td style="background-color: #708090;" colspan="2" class="text-center">Petugas pintu area</td>
														</tr>
														<tr>
															<td>Nama Event <span style="float: right;">:</span></td>
															<td>
																<?php foreach($all_event as $event_data){ // ambil semua data tabel_event ?> 
																	<?php if($data_tugas_staff_petugas->id_event == $event_data->id_event){ // jika id_event pada tabel_tugas_staff_petugas sama dengan id_event pada tabel_event ?>
																		<?= $event_data->nama_event ?>
																	<?php } ?>
																<?php } ?>
															</td>
														</tr>
														<tr>
															<td>Nama Area <span style="float: right;">:</span></td>
															<td>
																<?php foreach($all_area as $area_data){ // ambil semua data tabel_area ?> 
																	<?php if($data_tugas_staff_petugas->id_area == $area_data->id_area){ // jika id_area pada tabel_tugas_staff_petugas sama dengan id_area pada tabel_area ?>
																		<?= $area_data->nama_area ?>
																	<?php } ?>
																<?php } ?>
															</td>
														</tr>
													</table>
												<?php }elseif($data_tugas_staff_petugas->petugas_pintu_keluar == true){ // jika tugasnya jadi petugas_pintu_keluar ?>
													<table class="table table-borderless table-hover table-responsive-sm">
														<tr>
															<td style="background-color: #708090;" colspan="2" class="text-center">Petugas pintu keluar event</td>
														</tr>
														<tr>
															<td>Nama Event <span style="float: right;">:</span></td>
															<td>
																<?php foreach($all_event as $event_data){ // ambil semua data tabel_event ?> 
																	<?php if($data_tugas_staff_petugas->id_event == $event_data->id_event){ // jika id_event pada tabel_tugas_staff_petugas sama dengan id_event pada tabel_event ?>
																		<?= $event_data->nama_event ?>
																	<?php } ?>
																<?php } ?>
															</td>
														</tr>
													</table>
												<?php }
											}
										}
									}else{
										echo '<button class="btn btn-outline-danger"> belum bertugas </button>';
									}
								}
							?>
						</td>
					</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<th style="background-color: aqua;">Nomor.</th>
					<th style="background-color: aqua;">Staff ID</th>
					<th style="background-color: aqua;">Jabatan</th>
					<th style="background-color: aqua;">Nama</th>
					<th style="background-color: aqua;">Username</th>
					<th style="background-color: aqua;">Tempat Bertugas</th>
				</tr>
			</tfoot>
		</table>

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

</body>

</html>

