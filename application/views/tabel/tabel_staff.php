<table id="tabel_list_staff" class="table table-bordered table-hover table-responsive-sm" style="width:100%">
	<thead>
		<tr>
			<th>Nomor.</th>
			<th>Nama</th>
			<th>Jabatan</th>
			<th>Bertugas di</th>
			<th>status</th>
			<th>aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$no = 1;
			foreach($all_staff as $staff_data){ // ambil semua data tabel_staff
		?>
			<tr>
				<td><?= $no ?></td>
				<td><?= $staff_data->nama ?></td>
				<td>
					<?php 
						foreach($all_role as $role_data){ // ambil semua data tabel_role
							if($staff_data->role_id == $role_data->role_id){ // jika id_role pada tabel_role sama dengan id_role pada tabel_staff
								echo $role_data->nama_role;
							}
						}
					?> 
				</td>
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
				<td><?= $staff_data->is_active ?></td>
				<td>
					<?php if($staff_data->is_active == 'online'){ ?>
						<button data-id="<?= $staff_data->staff_id; ?>" data-toggle="modal" data-target="#modal_detail_staff" class="btn btn-info btn-detail-staff">Detail</button>
					<?php }else{ ?>
						<?php if($staff_data->sedang_bertugas == true){ ?>
							<button data-id="<?= $staff_data->staff_id; ?>" data-toggle="modal" data-target="#modal_detail_staff" class="btn btn-info btn-detail-staff m-1">Detail</button>
						<?php }else{ ?>
							<button data-id="<?= $staff_data->staff_id; ?>" data-toggle="modal" data-target="#modal_detail_staff" class="btn btn-info btn-detail-staff m-1">Detail</button>
							<button data-id="<?= $staff_data->staff_id; ?>" data-toggle="modal" data-target="#modal_hapus_staff" class="btn btn-danger btn-hapus-staff m-1">Hapus</button>
						<?php } ?>
					<?php } ?>

				<!-- Membuat sebuah textbox hidden yang akan digunakan untuk form detail -->
					<input type="hidden" class="staff_id-value_detail" value="<?= $staff_data->staff_id; ?>">
					<input type="hidden" class="role_id-value_detail" value="<?= $staff_data->role_id; ?>">
					<input type="hidden" class="username-value_detail" value="<?= $staff_data->username; ?>">
					<input type="hidden" class="password-value_detail" value="<?= $staff_data->password; ?>">
					<input type="hidden" class="nama-value_detail" value="<?= $staff_data->nama; ?>">
					<!-- <input type="hidden" class="id_area-value_detail" value="</?php if($staff_data->role_id == 1){echo 'bagian admin';}else{foreach($all_area as $area_data){if($staff_data->sedang_bertugas == true){echo $area_data->nama_area;}elseif($staff_data->sedang_bertugas == false){echo 'belum bertugas';}}}?>"> -->
					<input type="hidden" class="id_area-value_detail" value="<?php if($staff_data->role_id == 1){echo 'bagian admin';}else{if($staff_data->sedang_bertugas == true){foreach($all_tugas_staff_petugas as $data_tugas_staff_petugas){if($staff_data->id_tugas == $data_tugas_staff_petugas->id_tugas){if($data_tugas_staff_petugas->petugas_pintu_area == true){foreach($all_area as $area_data){if($data_tugas_staff_petugas->id_area == $area_data->id_area){echo $area_data->nama_area;}}}}}}elseif($staff_data->sedang_bertugas == false){echo "belum bertugas";}}?>">
					<input type="hidden" class="verified-value_detail" value="<?= $staff_data->verified; ?>">
					<input type="hidden" class="is_active-value_detail" value="<?= $staff_data->is_active; ?>">
				</td>
			</tr>
		<?php 
			$no++;
			} 
		?>
	</tbody>
	<tfoot>
		<tr>
			<th>Nomor.</th>
			<th>Nama</th>
			<th>Jabatan</th>
			<th>Bertugas di</th>
			<th>status</th>
			<th>aksi</th>
		</tr>
	</tfoot>
</table>

<script>
	$('#tabel_list_staff').DataTable();
</script>
