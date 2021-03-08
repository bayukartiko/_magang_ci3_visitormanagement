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

	<!-- data visitor -->
		<table class="table tabel table-responsive table-hover table-striped">
			<thead>
				<tr>
					<th colspan="12" class="text-center h2" style="background-color: #8c99a6;">List Data Visitor</th>
				</tr>
				<tr>
					<th style="background-color: aqua;">Nomor.</th>
					<th style="background-color: aqua;">Visitor ID</th>
					<th style="background-color: aqua;">Nama</th>
					<th style="background-color: aqua;">Perusahaan</th>
					<th style="background-color: aqua;">Jabatan</th>
					<th style="background-color: aqua;">Email visitor</th>
					<th style="background-color: aqua;">Email perusahaan</th>
					<th style="background-color: aqua;">No.Telepon visitor</th>
					<th style="background-color: aqua;">No.Telepon perusahaan</th>
					<th style="background-color: aqua;">Alasan ikut</th>
					<th style="background-color: aqua;">Berpartisipasi pada event</th>
					<th style="background-color: aqua;">List area yang dikunjungi</th>
				</tr>
			</thead>
			<tbody>
				<?php $no = 1; foreach($all_visitor as $data_visitor){ ?>
					<tr>
						<td><?= $no++ ?></td>
						<td><?= $data_visitor->id_visitor ?></td>
						<td><?= $data_visitor->nama_visitor ?></td>
						<td><?php if(empty($data_visitor->perusahaan_visitor)){echo "<i class='text-danger'>tidak diisi</i>";}else{echo $data_visitor->perusahaan_visitor;} ?></td>
						<td><?php if(empty($data_visitor->jabatan_visitor)){echo "<i class='text-danger'>tidak diisi</i>";}else{echo $data_visitor->jabatan_visitor;} ?></td>
						<td><?= $data_visitor->email_visitor ?></td>
						<td><?php if(empty($data_visitor->email_perusahaan)){echo "<i class='text-danger'>tidak diisi</i>";}else{echo $data_visitor->email_perusahaan;} ?></td>
						<td><?= $data_visitor->tlp_visitor ?></td>
						<td><?php if(empty($data_visitor->tlp_perusahaan)){echo "<i class='text-danger'>tidak diisi</i>";}else{echo $data_visitor->tlp_perusahaan;} ?></td>
						<td><?php if(empty($data_visitor->alasan_ikut)){echo "<i class='text-danger'>tidak diisi</i>";}else{echo $data_visitor->alasan_ikut;} ?></td>
						<td>
							<table>
								<thead>
									<tr>
										<th style="background-color: #708090;">Nama Event</th>
										<th style="background-color: #708090;">Waktu Masuk ke Event</th>
										<th style="background-color: #708090;">Waktu Keluar dari Event</th>
										<th style="background-color: #708090;">Lama Berkunjung ke Event</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>
											<?php 
												foreach($all_event as $event_data){
													if($data_visitor->id_event == $event_data->id_event){
														echo $event_data->nama_event;
													}
												}
											?>
										</td>
										<td>
											<?= date('D, d-m-Y H:i:s', strtotime($data_visitor->time_in_event)); ?>
										</td>
										<td>
											<?= date('D, d-m-Y H:i:s', strtotime($data_visitor->time_out_event)); ?>
										</td>
										<td>
											<?php 
												$get_waktu_berkunjung_event = $this->db->query("SELECT SUM(TIMEDIFF(time_out_event,time_in_event)) as 'lama_berkunjung_event' FROM tabel_visitor WHERE id_visitor='".$data_visitor->id_visitor."'")->row("lama_berkunjung_event"); 

												echo floor($get_waktu_berkunjung_event / 3600).' jam <br>'.floor(($get_waktu_berkunjung_event / 60) % 60). ' menit <br>'.floor($get_waktu_berkunjung_event % 60).' detik'; 
											?>
										</td>
								</tbody>
							</table>
						</td>
						<td>
							<table>
								<thead>
									<tr>
										<th style="background-color: #708090;">Nama Area</th>
										<th style="background-color: #708090;">Waktu Masuk ke Area</th>
										<th style="background-color: #708090;">Waktu Keluar dari Area</th>
										<th style="background-color: #708090;">Lama Berkunjung ke Area</th>
									</tr>
								</thead>
								<tbody>
									<?php 
										$data_visitor_tracking = $this->db->group_by('id_area')->get_where('tabel_tracking', ['id_visitor'=>$data_visitor->id_visitor])->result(); 
										// $all_tracking = $this->db->order_by('nomor', 'DESC')->group_by('id_visitor')->get_where('tabel_tracking', ["id_event"=>$event["id_event"], "id_area"=>$data_area->id_area, "time_out_area !="=>null])->result();
										if($data_visitor_tracking != null){
											foreach($data_visitor_tracking as $data_track_visitor){
									?>
												<tr>
													<td>
														<?php 
															foreach($all_area as $data_area){
																if($data_track_visitor->id_area == $data_area->id_area){
																	echo $data_area->nama_area;
																}
															} 
														?>
													</td>
													<td>
														<?= 
															date('D, d-M-Y H:i:s', strtotime($data_track_visitor->time_in_area)); 
														?>
													</td>
													<td>
														<?= 
															date('D, d-M-Y H:i:s', strtotime($data_track_visitor->time_out_area)); 
														?>
													</td>
													<td>
														<?php 
															$get_waktu_berkunjung_area = $this->db->query("SELECT SUM(TIMEDIFF(time_out_area,time_in_area)) as 'total_lama_berkunjung_area' FROM tabel_tracking WHERE id_visitor='".$data_track_visitor->id_visitor."' AND id_area='".$data_track_visitor->id_area."'")->row("total_lama_berkunjung_area"); 
															
															echo floor($get_waktu_berkunjung_area / 3600).' jam <br>'.floor(($get_waktu_berkunjung_area / 60) % 60). ' menit <br>'.floor($get_waktu_berkunjung_area % 60).' detik'; 
														?>
													</td>
												</tr>
									<?php 
											}
										}else{ ?>
											<tr>
												<td colspan="4"><i class="text-danger">Visitor belum berkunjung ke area manapun</i></td>
											</tr>
										<?php }
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
					<th style="background-color: aqua;">Visitor ID</th>
					<th style="background-color: aqua;">Nama</th>
					<th style="background-color: aqua;">Perusahaan</th>
					<th style="background-color: aqua;">Jabatan</th>
					<th style="background-color: aqua;">Email visitor</th>
					<th style="background-color: aqua;">Email perusahaan</th>
					<th style="background-color: aqua;">No.Telepon visitor</th>
					<th style="background-color: aqua;">No.Telepon perusahaan</th>
					<th style="background-color: aqua;">Alasan ikut</th>
					<th style="background-color: aqua;">Berpartisipasi pada event</th>
					<th style="background-color: aqua;">List area yang dikunjungi</th>
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

