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

	<!-- data event -->
		<table class="table tabel table-responsive table-hover table-striped">
			<thead>
				<tr>
					<th colspan="10" class="text-center h2" style="background-color: #8c99a6;">List data event</th>
				</tr>
				<tr>
					<th style="background-color: aqua;">Nomor.</th>
					<th style="background-color: aqua;">Event ID</th>
					<th style="background-color: aqua;">Link akses</th>
					<th style="background-color: aqua;">Nama Event</th>
					<th style="background-color: aqua;">Tanggal Dilaksanakan</th>
					<th style="background-color: aqua;">Tanggal Berakhir</th>
					<th style="background-color: aqua;">Jam Dibuka</th>
					<th style="background-color: aqua;">Jam Ditutup</th>
					<th style="background-color: aqua;">Status</th>
					<th style="background-color: aqua;">List Area</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; foreach($all_event as $event_data){ ?>
					<tr>
						<td class="text-center"><?= $no++ ?></td>
						<td><?= $event_data->id_event ?></td>
						<td>
							<a href="<?= base_url().$event_data->custom_url ?>"><?= base_url().$event_data->custom_url ?></a>
						</td>
						<td><?= $event_data->nama_event ?></td>
						<td><?= date('D, d-M-Y', strtotime($event_data->tanggal_dibuka)) ?></td>
						<td><?= date('D, d-M-Y', strtotime($event_data->tanggal_ditutup)) ?></td>
						<td><?= date('H:i', strtotime($event_data->jam_dibuka)) ?></td>
						<td><?= date('H:i', strtotime($event_data->jam_ditutup)) ?></td>
						<td>
							<?php if($event_data->status == "active"){
								echo "<button class='btn btn-outline-primary'>Dibuka</button>";
							}else{
								echo "<button class='btn btn-outline-secondary'>Ditutup</button>";
							} ?>
						</td>
						<td>
							<table>
								<thead>
									<tr>
										<th style="background-color: #708090;">Nama Area</th>
										<th style="background-color: #708090;">Nama Petugas</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$no = 1;
										foreach($all_area as $data_area){
											if($data_area->id_event == $event_data->id_event){ ?>
												<tr>
													<td><?= $data_area->nama_area ?></td>
													<td>
														<?php
															foreach($all_tugas_staff_petugas as $data_all_tugas_staff_petugas){
																if($data_all_tugas_staff_petugas->id_area == $data_area->id_area){
																	foreach($all_staff as $data_staff){
																		if($data_staff->staff_id == $data_all_tugas_staff_petugas->staff_id){
																			echo $data_staff->nama;
																		}
																	}
																}
															}
														?>
													</td>
												</tr>
											<?php }
										}
									?>
								</tbody>
							</table>
						</td>
					</tr>
				<?php } ?>
			</tbody>
			<tfoot>
				<tr>
					<th style="background-color: aqua;">Nomor.</th>
					<th style="background-color: aqua;">Event ID</th>
					<th style="background-color: aqua;">Link Akses</th>
					<th style="background-color: aqua;">Nama Event</th>
					<th style="background-color: aqua;">Tanggal Dilaksanakan</th>
					<th style="background-color: aqua;">Tanggal Berakhir</th>
					<th style="background-color: aqua;">Jam Dibuka</th>
					<th style="background-color: aqua;">Jam Ditutup</th>
					<th style="background-color: aqua;">Status</th>
					<th style="background-color: aqua;">List Area</th>
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

