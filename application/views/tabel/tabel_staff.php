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
			foreach($all_staff as $staff_data){ 
		?>
			<tr>
				<td><?= $no ?></td>
				<td><?= $staff_data->nama ?></td>
				<td>
					<?php 
						foreach($all_role as $role_data){
							if($staff_data->role_id == $role_data->role_id){
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
							foreach($all_area as $area_data){
								if($staff_data->id_area == $area_data->id_area){
								?>
									<table class="table table-borderless table-hover table-responsive-sm">
										<tr>
											<td>Nama Event</td>
											<td>: 
												<?php foreach($all_event as $event_data){ ?>
													<?php if($staff_data->id_area == $area_data->id_area){ ?>
														<?php if($event_data->id_event == $area_data->id_event){ ?> 
															<?= $event_data->nama_event ?>
														<?php } ?> 
													<?php } ?>
												<?php } ?>
											</td>
										</tr>
										<tr>
											<td>Nama Area</td>
											<td>: <?= $area_data->nama_area; ?></td>
										</tr>
									</table>
								<?php	
								}elseif($staff_data->id_area == null){
									echo '<button class="btn btn-outline-danger"> belum bertugas </button>';
									break;
								}
							}
						}
					?>
				</td>
				<td><?= $staff_data->is_active ?></td>
				<td>
					<?php if($staff_data->is_active == 'online'){ ?>
						<a href="javascript:void();" data-id="<?= $staff_data->staff_id; ?>" data-toggle="modal" data-target="#modal_detail_staff" class="btn btn-info btn-detail-staff">Detail</a>
					<?php }else{ ?>
							<a href="javascript:void();" data-id="<?= $staff_data->staff_id; ?>" data-toggle="modal" data-target="#modal_detail_staff" class="btn btn-info btn-detail-staff">Detail</a>
							<a href="javascript:void();" data-id="<?= $staff_data->staff_id; ?>" data-toggle="modal" data-target="#modal_hapus_staff" class="btn btn-danger btn-hapus-staff">Hapus</a>
					<?php } ?>

				<!-- Membuat sebuah textbox hidden yang akan digunakan untuk form detail -->
					<input type="hidden" class="staff_id-value_detail" value="<?= $staff_data->staff_id; ?>">
					<input type="hidden" class="role_id-value_detail" value="<?= $staff_data->role_id; ?>">
					<input type="hidden" class="username-value_detail" value="<?= $staff_data->username; ?>">
					<input type="hidden" class="password-value_detail" value="<?= $staff_data->password; ?>">
					<input type="hidden" class="nama-value_detail" value="<?= $staff_data->nama; ?>">
					<input type="hidden" class="id_area-value_detail" value="<?php if($staff_data->role_id == 1){echo 'bagian admin';}else{foreach($all_area as $area_data){if($staff_data->id_area == $area_data->id_area){echo $area_data->nama_area;}elseif($staff_data->id_area == null){echo 'belum bertugas';}}}?>
					">
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
