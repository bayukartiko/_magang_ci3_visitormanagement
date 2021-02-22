<?php if($id_event == null){ ?>
	<div class="text-right float-right">
		<i class="fas fa-arrow-up fa-5x"></i>
		<h3>Pilih event untuk menampilkan data tracking</h3>
	</div>
<?php }else{ ?>
	<div class="row">
		<div class="col-md-6">
			<!-- nama event -->
				<div class="card shadow-sm mb-4">
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary">Nama Event</h6>
					</div>
					<div class="card-body">
						<?= $event["nama_event"] ?>
					</div>
				</div>
		</div>
		<div class="col-md-6">
			<!-- status event -->
				<div class="card shadow-sm mb-4">
					<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
						<h6 class="m-0 font-weight-bold text-primary">Status Event</h6>
					</div>
					<div class="card-body">
						<?php 
							if($event["status"] == "active"){
								echo "Dibuka";
							}else{
								echo "Ditutup";
							}
						?>
					</div>
				</div>
		</div>
	</div>

	<!-- grafik hitung visitor -->
		<div class="card shadow-sm mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Grafik total visitor <?= $event["nama_event"] ?></h6>
				<select id="pilih-grafik" class="form-control w-auto">
					<option value="" selected disabled>Pilih Grafik</option>
					<option value="jam">Per jam</option>
					<option value="hari">Per hari</option>
				</select>
			</div>
			<div class="card-body" id="view_grafik_tracking_event_total_visitor">
				<?php $this->load->view('chart/grafik_tracking_event_total_visitor', ['pilih_grafik'=>null]) ?>
			</div>

		</div>

	<!-- data visitor in/out [nama_area] -->
		<?php foreach($all_area as $data_area){ ?>
			<div class="card shadow-sm mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Data visitor in/out <?= $data_area->nama_area ?></h6>
				</div>
				<div class="card-body">
					<div class="row">
						<div class="col-md-6">
							
							<div class="accordion" id="accordionVisitorInOut<?= $data_area->nama_area ?>">
								<!-- visitor in -->
								<div class="card">
									<div class="card-header" id="visitormasuk">
										<h2 class="mb-0">
											<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#visitorin<?= $data_area->nama_area ?>" aria-expanded="false" aria-controls="visitorin<?= $data_area->nama_area ?>">
												Visitor in
	
												<span class="badge badge-secondary float-right d-flex align-items-center"><?= $this->db->get_where('tabel_tracking', ["id_event"=>$event["id_event"], "id_area"=>$data_area->id_area, "time_out_area"=>null])->num_rows() ?></span>
											</button>
										</h2>
									</div>
									
									<div id="visitorin<?= $data_area->nama_area ?>" class="collapse" aria-labelledby="visitormasuk" data-parent="#accordionVisitorInOut<?= $data_area->nama_area ?>">
										<div class="card-body">
											<table class="table table-hover table-striped table-responsive-sm tabel-visitor">
												<thead>
													<tr>
														<th>Nama Visitor</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php 
														$all_tracking = $this->db->get_where('tabel_tracking', ["id_event"=>$event["id_event"], "id_area"=>$data_area->id_area, "time_out_area"=>null])->result();
														foreach($all_tracking as $data_tracking){
															$all_visitor = $this->db->get_where('tabel_visitor', ["id_visitor"=>$data_tracking->id_visitor])->result(); 

															foreach($all_visitor as $data_visitor){ ?>
																<tr>
																	<td><?= $data_visitor->nama_visitor ?></td>
																	<td><a href="javascript:void()" data-id="<?= $data_visitor->id_visitor; ?>" data-toggle="modal" data-target="#modal_detail_visitor" class="btn btn-info btn-detail-visitor m-1">Detail</a></td>

																	<!-- Membuat sebuah textbox hidden yang akan digunakan untuk detail visitor -->
																		<input type="hidden" class="nama_visitor-value_data" value="<?= $data_visitor->nama_visitor; ?>">
																		<input type="hidden" class="perusahaan_visitor-value_data" value="<?= $data_visitor->perusahaan_visitor; ?>">
																		<input type="hidden" class="jabatan_visitor-value_data" value="<?= $data_visitor->jabatan_visitor; ?>">
																		<input type="hidden" class="email_visitor-value_data" value="<?= $data_visitor->email_visitor; ?>">
																		<input type="hidden" class="email_perusahaan-value_data" value="<?= $data_visitor->email_perusahaan; ?>">
																		<input type="hidden" class="tlp_visitor-value_data" value="<?= $data_visitor->tlp_visitor; ?>">
																		<input type="hidden" class="tlp_perusahaan-value_data" value="<?= $data_visitor->tlp_perusahaan; ?>">
																		<input type="hidden" class="alasan_ikut-value_data" value="<?= $data_visitor->alasan_ikut; ?>">
																		<input type="hidden" class="dvioa-value_data" value="<table class='table text-center table-responsive-sm'><thead><tr><th colspan='2'>Waktu Berkunjung ke Area</th></tr></thead><tbody><tr><td>Waktu Masuk ke Area <br><b><?= date('D, d-M-Y H:i:s', strtotime($data_tracking->time_in_area)); ?></b></span></td><td>Waktu Keluar dari Area <br> <b><?= date('D, d-M-Y H:i:s', strtotime($data_tracking->time_out_area)); ?></b></span></td></tr><tr><td colspan='2'>Lama Berkunjung ke Area <br> <b><?php $get_waktu_berkunjung_area = $this->db->query("SELECT TIMEDIFF(time_out_area,time_in_area) as 'lama_berkunjung_area' FROM tabel_tracking WHERE id_visitor='".$data_visitor->id_visitor."' AND id_area='".$data_tracking->id_area."'")->row("lama_berkunjung_area"); echo date('H', strtotime($get_waktu_berkunjung_area)).' jam '.date('i', strtotime($get_waktu_berkunjung_area)).' menit '.date('s', strtotime($get_waktu_berkunjung_area)). ' detik '; ?></b></td></tr></tbody></table>">
																</tr>
															<?php }
														}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								
								<!-- visitor out -->
								<div class="card">
									<div class="card-header" id="visitorkeluar">
										<h2 class="mb-0">
											<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#visitorout<?= $data_area->nama_area ?>" aria-expanded="false" aria-controls="visitorout<?= $data_area->nama_area ?>">
												Visitor out
	
												<span class="badge badge-secondary float-right d-flex align-items-center"><?= $this->db->get_where('tabel_tracking', ["id_event"=>$event["id_event"], "id_area"=>$data_area->id_area, "time_out_area !="=>null])->num_rows() ?></span>
											</button>
										</h2>
									</div>
	
									<div id="visitorout<?= $data_area->nama_area ?>" class="collapse" aria-labelledby="visitorkeluar" data-parent="#accordionVisitorInOut<?= $data_area->nama_area ?>">
										<div class="card-body">
											<table class="table table-hover table-striped table-responsive-sm tabel-visitor">
												<thead>
													<tr>
														<th>Nama Visitor</th>
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php 
														$all_tracking = $this->db->get_where('tabel_tracking', ["id_event"=>$event["id_event"], "id_area"=>$data_area->id_area, "time_out_area !="=>null])->result();
														foreach($all_tracking as $data_tracking){
															$all_visitor = $this->db->get_where('tabel_visitor', ["id_visitor"=>$data_tracking->id_visitor])->result(); 

															foreach($all_visitor as $data_visitor){ ?>
																<tr>
																	<td><?= $data_visitor->nama_visitor ?></td>
																	<td><a href="javascript:void()" data-id="<?= $data_visitor->id_visitor; ?>" data-toggle="modal" data-target="#modal_detail_visitor" class="btn btn-info btn-detail-visitor m-1">Detail</a></td>

																	<!-- Membuat sebuah textbox hidden yang akan digunakan untuk detail visitor -->
																		<input type="hidden" class="nama_visitor-value_data" value="<?= $data_visitor->nama_visitor; ?>">
																		<input type="hidden" class="perusahaan_visitor-value_data" value="<?= $data_visitor->perusahaan_visitor; ?>">
																		<input type="hidden" class="jabatan_visitor-value_data" value="<?= $data_visitor->jabatan_visitor; ?>">
																		<input type="hidden" class="email_visitor-value_data" value="<?= $data_visitor->email_visitor; ?>">
																		<input type="hidden" class="email_perusahaan-value_data" value="<?= $data_visitor->email_perusahaan; ?>">
																		<input type="hidden" class="tlp_visitor-value_data" value="<?= $data_visitor->tlp_visitor; ?>">
																		<input type="hidden" class="tlp_perusahaan-value_data" value="<?= $data_visitor->tlp_perusahaan; ?>">
																		<input type="hidden" class="alasan_ikut-value_data" value="<?= $data_visitor->alasan_ikut; ?>">
																		<input type="hidden" class="dvioa-value_data" value="<table class='table text-center table-responsive-sm'><thead><tr><th colspan='2'>Waktu Berkunjung ke Area</th></tr></thead><tbody><tr><td>Waktu Masuk ke Area <br><b><?= date('D, d-M-Y H:i:s', strtotime($data_tracking->time_in_area)); ?></b></span></td><td>Waktu Keluar dari Area <br> <b><?= date('D, d-M-Y H:i:s', strtotime($data_tracking->time_out_area)); ?></b></span></td></tr><tr><td colspan='2'>Lama Berkunjung ke Area <br> <b><?php $get_waktu_berkunjung_area = $this->db->query("SELECT TIMEDIFF(time_out_area,time_in_area) as 'lama_berkunjung_area' FROM tabel_tracking WHERE id_visitor='".$data_visitor->id_visitor."' AND id_area='".$data_tracking->id_area."'")->row("lama_berkunjung_area"); echo date('H', strtotime($get_waktu_berkunjung_area)).' jam '.date('i', strtotime($get_waktu_berkunjung_area)).' menit '.date('s', strtotime($get_waktu_berkunjung_area)). ' detik '; ?></b></td></tr></tbody></table>">
																</tr>
															<?php }
														}
													?>
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
	
						</div>
						<div class="col-md-6">
							<style>
								.highcharts-figure, .highcharts-data-table table {
									min-width: 320px; 
									max-width: 800px;
									margin: 1em auto;
								}
	
								.highcharts-data-table table {
									font-family: Verdana, sans-serif;
									border-collapse: collapse;
									border: 1px solid #EBEBEB;
									margin: 10px auto;
									text-align: center;
									width: 100%;
									max-width: 500px;
								}
								.highcharts-data-table caption {
									padding: 1em 0;
									font-size: 1.2em;
									color: #555;
								}
								.highcharts-data-table th {
									font-weight: 600;
									padding: 0.5em;
								}
								.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
									padding: 0.5em;
								}
								.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
									background: #f8f8f8;
								}
								.highcharts-data-table tr:hover {
									background: #f1f7ff;
								}
	
	
								input[type="number"] {
									min-width: 50px;
								}
							</style>
	
							<div id="status_visitor_chart<?= $data_area->nama_area ?>"></div>
	
							<script>
								$(document).ready(function(){
									$("#status_visitor_chart<?= $data_area->nama_area ?>").highcharts({
										chart: {
											plotBackgroundColor: null,
											BackgroundColor: null,
											plotBorderWidth: null,
											plotShadow: false,
											type: 'pie'
										},
										title: {
											text: null
										},
										tooltip: {
											pointFormat: '<b>{point.y:1f} Orang</b>'
										},
										accessibility: {
											point: {
												valueSuffix: '%'
											}
										},
										plotOptions: {
											pie: {
												allowPointSelect: true,
												cursor: 'pointer',
												dataLabels: {
													enabled: true,
													format: '<b>{point.name}</b>: {point.y:1f} Orang'
												}
											}
										},
										series: [{
											name: 'Brands',
											colorByPoint: true,
											data: [{
													name: 'visitor in',
													y: <?= $this->db->get_where('tabel_tracking', ["id_event"=>$event["id_event"], "id_area"=>$data_area->id_area, "time_out_area"=>null])->num_rows() ?>
												}, {
													name: 'visitor out',
													y: <?= $this->db->get_where('tabel_tracking', ["id_event"=>$event["id_event"], "id_area"=>$data_area->id_area, "time_out_area !="=>null])->num_rows() ?>
												}]
										}]
									})
								});
							</script>
	
						</div>
					</div>
				</div>
			</div>
		<?php } ?>

	<!-- data visitor yang berpartisipasi -->
		<div class="card shadow-sm mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Data visitor yang berpartisipasi</h6>
			</div>
			<div class="card-body">
				<table class="table tabel table-hover table-striped table-responsive-sm tabel-data-visitor-berpartisipasi">
					<thead>
						<tr>
							<th>Nama</th>
							<th>Perusahaan</th>
							<th>Waktu Masuk</th>
							<th>Waktu Keluar</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($all_visitor_join as $data_visitor){ ?>
							<tr>
								<td><?= $data_visitor->nama_visitor ?></td>
								<td><?= $data_visitor->perusahaan_visitor ?></td>
								<td><?= date('D, d-M-Y H:i:s', strtotime($data_visitor->time_in_event)) ?></td>
								<td><?= date('D, d-M-Y H:i:s', strtotime($data_visitor->time_out_event)) ?></td>
								<td><a href="javascript:void()" data-id="<?= $data_visitor->id_visitor; ?>" data-toggle="modal" data-target="#modal_detail_visitor" class="btn btn-info btn-detail-visitor m-1">Detail</a></td>

								<!-- Membuat sebuah textbox hidden yang akan digunakan untuk detail visitor -->
									<input type="hidden" class="id_visitor-value_data" value="<?= $data_visitor->id_visitor; ?>">
									<input type="hidden" class="nama_visitor-value_data" value="<?= $data_visitor->nama_visitor; ?>">
									<input type="hidden" class="perusahaan_visitor-value_data" value="<?= $data_visitor->perusahaan_visitor; ?>">
									<input type="hidden" class="jabatan_visitor-value_data" value="<?= $data_visitor->jabatan_visitor; ?>">
									<input type="hidden" class="email_visitor-value_data" value="<?= $data_visitor->email_visitor; ?>">
									<input type="hidden" class="email_perusahaan-value_data" value="<?= $data_visitor->email_perusahaan; ?>">
									<input type="hidden" class="tlp_visitor-value_data" value="<?= $data_visitor->tlp_visitor; ?>">
									<input type="hidden" class="tlp_perusahaan-value_data" value="<?= $data_visitor->tlp_perusahaan; ?>">
									<input type="hidden" class="alasan_ikut-value_data" value="<?= $data_visitor->alasan_ikut; ?>">
									<!-- <input type="hidden" class="time_in_event-value_data" value="</?= date('D, d-M-Y H:i:s', strtotime($data_visitor->time_in_event)); ?>">
									<input type="hidden" class="time_out_event-value_data" value="</?= date('D, d-M-Y H:i:s', strtotime($data_visitor->time_out_event)); ?>">
									<input type="hidden" class="lama_berkunjung_event-value_data" value="</?php $get_waktu_berkunjung_event = $this->db->query("SELECT TIMEDIFF(time_out_event,time_in_event) as 'lama_berkunjung_event' FROM tabel_visitor WHERE id_visitor='".$data_visitor->id_visitor."'")->row("lama_berkunjung_event"); echo date('H', strtotime($get_waktu_berkunjung_event)).' jam '.date('i', strtotime($get_waktu_berkunjung_event)).' menit '.date('s', strtotime($get_waktu_berkunjung_event)). ' detik '; ?>"> -->
									<input type="hidden" class="dvyb-value_data" value="<table class='table text-center table-responsive-sm'><thead><tr><th colspan='2'>Waktu Berkunjung ke Event</th></tr></thead><tbody><tr><td>Waktu Masuk ke Event <br><b><?= date('D, d-M-Y H:i:s', strtotime($data_visitor->time_in_event)); ?></b></span></td><td>Waktu Keluar dari Event <br> <b><?= date('D, d-M-Y H:i:s', strtotime($data_visitor->time_out_event)); ?></b></span></td></tr><tr><td colspan='2'>Lama Berkunjung ke Event <br> <b><?php $get_waktu_berkunjung_event = $this->db->query("SELECT TIMEDIFF(time_out_event,time_in_event) as 'lama_berkunjung_event' FROM tabel_visitor WHERE id_visitor='".$data_visitor->id_visitor."'")->row("lama_berkunjung_event"); echo date('H', strtotime($get_waktu_berkunjung_event)).' jam '.date('i', strtotime($get_waktu_berkunjung_event)).' menit '.date('s', strtotime($get_waktu_berkunjung_event)). ' detik '; ?></b></td></tr></tbody></table><hr><table class='table table-responsive-sm text-center'><thead><tr><th colspan='2'>Waktu Berkunjung ke Area</th></tr><tr><th>Nama Area</th><th>Lama Berkunjung</th></tr></thead><tbody><?php $data_visitor_tracking = $this->db->get_where('tabel_tracking', ['id_event'=>$id_event, 'id_visitor'=>$data_visitor->id_visitor])->result(); foreach($data_visitor_tracking as $data_track_visitor){?> <tr><td><?php foreach($all_area as $data_area){if($data_track_visitor->id_area == $data_area->id_area){echo $data_area->nama_area;}} ?></td><td><?php $get_waktu_berkunjung_area = $this->db->query("SELECT TIMEDIFF(time_out_area,time_in_area) as 'lama_berkunjung_area' FROM tabel_tracking WHERE id_visitor='".$data_track_visitor->id_visitor."' AND id_area='".$data_track_visitor->id_area."'")->row("lama_berkunjung_area"); echo date('H', strtotime($get_waktu_berkunjung_area)).' jam '.date('i', strtotime($get_waktu_berkunjung_area)).' menit '.date('s', strtotime($get_waktu_berkunjung_area)).' detik'; ?></td></tr> <?php } ?></tbody></table>">
							</tr>
						<?php } ?>
					</tbody>
					<tfoot>
						<tr>
							<th>Nama</th>
							<th>Perusahaan</th>
							<th>Waktu Masuk</th>
							<th>Waktu Keluar</th>
							<th>Aksi</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>

	<div class="modal fade" id="modal_detail_visitor" tabindex="-1" aria-hidden="true">
		<div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title"">Detail Visitor</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<fieldset disabled="disabled">
						<div class="form-group" id="field_alasan">
							<label for="nama">Nama Visitor</label>
							<input type="text" class="form-control" id="nama_visitor-detail" disabled>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div class="form-group" id="field_nama_perusahaan">
									<label for="nama_perusahaan">Nama Perusahaan</label>
									<input type="text" class="form-control" id="nama_perusahaan-detail" disabled>
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group" id="field_jabatan">
									<label for="jabatan">Jabatan</label>
									<input type="text" class="form-control" id="jabatan-detail" disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group" id="field_email_pribadi">
									<label for="email_pribadi">Email Pribadi</label>
									<input type="email" class="form-control" id="email_pribadi-detail" disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group" id="field_email_perusahaan">
									<label for="email_perusahaan">Email Perusahaan</label>
									<input type="email" class="form-control" id="email_perusahaan-detail" disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group" id="field_notlp_pribadi">
									<label for="notlp_pribadi">No Telpon Pribadi</label>
									<input type="number" class="form-control" id="notlp_pribadi-detail" disabled>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group" id="field_notlp_perusahaan">
									<label for="notlp_perusahaan">No Telpon Perusahaan</label>
									<input type="number" class="form-control" id="notlp_perusahaan-detail" disabled>
								</div>
							</div>
						</div>
						<div class="form-group" id="field_alasan">
							<label for="alasan">Alasan Mengikuti Event</label>
							<textarea class="form-control" rows="4" id="alasan-detail" disabled></textarea>
						</div>
						<div class="form-group" id="field_custom"></div>
					</fieldset>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Mengerti</button>
				</div>
			</div>
		</div>
	</div>

	<script>
		$(document).ready(function(){
			$("#tabel_aktifitas_terbaru").DataTable();
			$(".tabel").DataTable();

			$("#pilih-grafik").on('change', function(){
				$.ajax({
					url: '<?= base_url(); ?>staff_only/admin/ubah_view_grafik_tracking_event_total_visitor/'+$(this).val()+'/<?= $event["id_event"] ?>', // URL tujuan
					type: 'POST',
					dataType: 'JSON',
					success: function(callback){ // Ketika proses pengiriman berhasil
	
						$('#view_grafik_tracking_event_total_visitor').html(callback.view_grafik_tracking_event_total_visitor);
	
					},
					error: function(xhr, ajaxOptions, thrownError, errorMessage, callback) {
						console.log("error :", errorMessage);
						console.log(callback)
						// alert(xhr.responseText);
						console.log(thrownError + "\r\n" + xhr.status + "\r\n"  + xhr.statusText + "\r\n" + xhr.responseText);
					}
				});
			})

			$(".tabel-visitor").on('click', '.btn-detail-visitor', function(){
				var tr = $(this).closest('tr');
				var nama_visitor = tr.find('.nama_visitor-value_data').val();
				var perusahaan_visitor = tr.find('.perusahaan_visitor-value_data').val();
				var jabatan_visitor = tr.find('.jabatan_visitor-value_data').val();
				var email_visitor = tr.find('.email_visitor-value_data').val();
				var email_perusahaan = tr.find('.email_perusahaan-value_data').val();
				var tlp_visitor = tr.find('.tlp_visitor-value_data').val();
				var tlp_perusahaan = tr.find('.tlp_perusahaan-value_data').val();
				var alasan_ikut = tr.find('.alasan_ikut-value_data').val();
				var field_custom_dvioa = tr.find('.dvioa-value_data').val();

				$('#nama_visitor-detail').val(nama_visitor);
				$('#nama_perusahaan-detail').val(perusahaan_visitor);
				$('#jabatan-detail').val(jabatan_visitor);
				$('#email_pribadi-detail').val(email_visitor);
				$('#email_perusahaan-detail').val(email_perusahaan);
				$('#notlp_pribadi-detail').val(tlp_visitor);
				$('#notlp_perusahaan-detail').val(tlp_perusahaan);
				$('#alasan-detail').val(alasan_ikut);
				$('#field_custom').html(field_custom_dvioa);
			});
			$(".tabel-data-visitor-berpartisipasi").on('click', '.btn-detail-visitor', function(){
				var tr = $(this).closest('tr');
				var id_visitor = tr.find('.id_visitor-value_data').val();
				var nama_visitor = tr.find('.nama_visitor-value_data').val();
				var perusahaan_visitor = tr.find('.perusahaan_visitor-value_data').val();
				var jabatan_visitor = tr.find('.jabatan_visitor-value_data').val();
				var email_visitor = tr.find('.email_visitor-value_data').val();
				var email_perusahaan = tr.find('.email_perusahaan-value_data').val();
				var tlp_visitor = tr.find('.tlp_visitor-value_data').val();
				var tlp_perusahaan = tr.find('.tlp_perusahaan-value_data').val();
				var alasan_ikut = tr.find('.alasan_ikut-value_data').val();
				// var time_in_event = tr.find('.time_in_event-value_data').val();
				// var time_out_event = tr.find('.time_out_event-value_data').val();
				// var lama_berkunjung_event = tr.find('.lama_berkunjung_event-value_data').val();
				var field_custom_dvyb = tr.find('.dvyb-value_data').val();
				// var tabel_visitor_berkunjung_area = tr.find('.tabel_visitor_berkunjung_area-value_data').val();

				$('#nama_visitor-detail').val(nama_visitor);
				$('#nama_perusahaan-detail').val(perusahaan_visitor);
				$('#jabatan-detail').val(jabatan_visitor);
				$('#email_pribadi-detail').val(email_visitor);
				$('#email_perusahaan-detail').val(email_perusahaan);
				$('#notlp_pribadi-detail').val(tlp_visitor);
				$('#notlp_perusahaan-detail').val(tlp_perusahaan);
				$('#alasan-detail').val(alasan_ikut);
				// $('#time_in_event-detail').html(time_in_event);
				// $('#time_out_event-detail').html(time_out_event);
				// $('#lama_berkunjung_event-detail').html(lama_berkunjung_event);
				$('#field_custom').html(field_custom_dvyb);
				// $('#tabel_visitor_berkunjung_area').html(tabel_visitor_berkunjung_area);
			});
		});
	</script>

<?php } ?>

