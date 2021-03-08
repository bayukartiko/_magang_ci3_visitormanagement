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
		table, th, td {
			border: 1px solid black;
			text-align: center;
			font-size: small;
			color: black;
		}
	</style>

	<table class="table tabel table-responsive table-hover table-striped">
		<thead>
			<tr>
				<th colspan="10" class="text-center h2">List Data Visitor</th>
			</tr>
			<tr>
				<th>Nomor.</th>
				<th>Nama</th>
				<th>Perusahaan</th>
				<th>Jabatan</th>
				<th>Email visitor</th>
				<th>Email perusahaan</th>
				<th>No.Telepon visitor</th>
				<th>No.Telepon perusahaan</th>
				<th>Alasan ikut</th>
				<th>Tanggal/waktu register</th>
			</tr>
		</thead>
		<tbody>
			<?php $no = 1; foreach($all_visitor as $data_visitor){ ?>
				<tr>
					<td><?= $no++ ?></td>
					<td><?= $data_visitor->nama_visitor ?></td>
					<td><?php if(empty($data_visitor->perusahaan_visitor)){echo "<i class='text-danger'>tidak diisi</i>";}else{echo $data_visitor->perusahaan_visitor;} ?></td>
					<td><?php if(empty($data_visitor->jabatan_visitor)){echo "<i class='text-danger'>tidak diisi</i>";}else{echo $data_visitor->jabatan_visitor;} ?></td>
					<td><?= $data_visitor->email_visitor ?></td>
					<td><?php if(empty($data_visitor->email_perusahaan)){echo "<i class='text-danger'>tidak diisi</i>";}else{echo $data_visitor->email_perusahaan;} ?></td>
					<td><?= $data_visitor->tlp_visitor ?></td>
					<td><?php if(empty($data_visitor->tlp_perusahaan)){echo "<i class='text-danger'>tidak diisi</i>";}else{echo $data_visitor->tlp_perusahaan;} ?></td>
					<td><?php if(empty($data_visitor->alasan_ikut)){echo "<i class='text-danger'>tidak diisi</i>";}else{echo $data_visitor->alasan_ikut;} ?></td>
					<td><?= date("D, d-M-Y H:i:s", strtotime($data_visitor->registered_at)) ?></td>
				</tr>
			<?php } ?>
		</tbody>
		<tfoot>
			<tr>
				<th>Nomor.</th>
				<th>Nama</th>
				<th>Perusahaan</th>
				<th>Jabatan</th>
				<th>Email visitor</th>
				<th>Email perusahaan</th>
				<th>No.Telepon visitor</th>
				<th>No.Telepon perusahaan</th>
				<th>Alasan ikut</th>
				<th>Tanggal/waktu register</th>
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
