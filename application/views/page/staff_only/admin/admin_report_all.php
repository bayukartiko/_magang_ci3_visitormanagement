<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-4">
		<h1 class="h3 mb-0 text-gray-800">Report / all</h1>
		<a href="<?= base_url('staff_only/admin/aksi_print_report_all') ?>" class="btn btn-primary">print</a>
	</div>

	<!-- tabel list data event -->
		<div class="card shadow mb-4">
			<!-- Card Header - Dropdown -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">List data event</h6>
			</div>
			<div class="card-body">
				<table class="table tabel table-responsive table-hover table-striped">
					<thead>
						<tr>
							<th>Nomor.</th>
							<th>QR Code</th>
							<th>Nama Event</th>
							<th>List Area</th>
							<th>Tanggal Dilaksanakan</th>
							<th>Tanggal Berakhir</th>
							<th>Jam Dibuka</th>
							<th>Jam Ditutup</th>
							<th>Status</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach($all_event as $event_data){ ?>
							<tr>
								<td class="text-center"><?= $no++ ?></td>
								<td>
									<a href="<?= base_url() ?>assets/img/qrcode/<?= $event_data->gambar_qrcode ?>" download="<?= base_url() ?><?= $event_data->custom_url ?>" >
										<img src="<?= base_url() ?>assets/img/qrcode/<?= $event_data->gambar_qrcode ?>" alt="<?= $event_data->gambar_qrcode ?>" style="width: 75px; height: 75px;">
									</a>
								</td>
								<td><?= $event_data->nama_event ?></td>
								<td>
									<ol>
										<?php 
											$no = 1;
											foreach($all_area as $data_area){
												if($data_area->id_event == $event_data->id_event){ ?>
													<li><?= $data_area->nama_area ?></li>
												<?php }
											}
										?>
									</ol>
								</td>
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
							</tr>
						<?php } ?>
					</tbody>
					<tfoot>
						<tr>
							<th>Nomor.</th>
							<th>QR Code</th>
							<th>Nama Event</th>
							<th>List Area</th>
							<th>Tanggal Dilaksanakan</th>
							<th>Tanggal Berakhir</th>
							<th>Jam Dibuka</th>
							<th>Jam Ditutup</th>
							<th>Status</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>

	<!-- tabel list data staff -->
		<div class="card shadow mb-4">
			<!-- Card Header - Dropdown -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">List data staff</h6>
			</div>
			<div class="card-body">
				<table class="table tabel table-responsive-sm table-hover table-striped">
					<thead>
						<tr>
							<th>Nomor.</th>
							<th>Jabatan</th>
							<th>Nama</th>
							<th>Username</th>
							<th>Bertugas di</th>
						</tr>
					</thead>
					<tbody>
						<?php $no = 1; foreach($all_staff as $staff_data){ ?>
							<tr>
								<td><?= $no++ ?></td>
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
																	<td colspan="2" class="text-center">Petugas pintu area</td>
																</tr>
																<tr>
																	<td>Nama Event</td>
																	<td>: 
																		<?php foreach($all_event as $event_data){ // ambil semua data tabel_event ?> 
																			<?php if($data_tugas_staff_petugas->id_event == $event_data->id_event){ // jika id_event pada tabel_tugas_staff_petugas sama dengan id_event pada tabel_event ?>
																				<?= $event_data->nama_event ?>
																			<?php } ?>
																		<?php } ?>
																	</td>
																</tr>
																<tr>
																	<td>Nama Area</td>
																	<td>: 
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
																	<td colspan="2" class="text-center">Petugas pintu keluar event</td>
																</tr>
																<tr>
																	<td>Nama Event</td>
																	<td>: 
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
							<th>Nomor.</th>
							<th>Jabatan</th>
							<th>Nama</th>
							<th>Username</th>
							<th>Bertugas di</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>

	<!-- tabel list data visitor -->
		<div class="card shadow mb-4">
			<!-- Card Header - Dropdown -->
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">List data visitor</h6>
			</div>
			<div class="card-body">
				<table class="table tabel table-responsive table-hover table-striped">
					<thead>
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
							<th>Berpartisipasi pada event</th>
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
								<td>
									<?php 
										foreach($all_event as $event_data){
											if($data_visitor->id_event == $event_data->id_event){
												echo $event_data->nama_event;
											}
										}
									?>
								</td>
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
							<th>Berpartisipasi pada event</th>
						</tr>
					</tfoot>
				</table>
			</div>
		</div>

	

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<script>
	$(document).ready(function(){
		$(".tabel").DataTable({
			pageLength : 5,
    		lengthMenu: [[5, 10, 25, 50, 100, -1], [5, 10, 25, 50, 100, 'all']]
		});
	});
</script>
