<table id="tabel_list_event" class="table table-striped table-bordered table-hover table-responsive-sm" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>Nomor</th>
			<th>QR Code</th>
			<th>Nama Event</th>
			<th>Total Area</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			$no = 1;
			foreach($all_event as $event_data){
		?>
			<tr>
				<td><?= $no ?></td>
				<td>
					<a href="<?= base_url() ?>assets/img/qrcode/<?= $event_data->gambar_qrcode ?>" download="<?= base_url() ?><?= $event_data->custom_url ?>" >
						<img src="<?= base_url() ?>assets/img/qrcode/<?= $event_data->gambar_qrcode ?>" alt="<?= $event_data->gambar_qrcode ?>" style="width: 75px; height: 75px;">
					</a>
				</td>
				<td><?= $event_data->nama_event ?></td>
				<td>
					<?= $this->db->get_where('tabel_area', ['id_event' => $event_data->id_event])->num_rows() ?>
				</td>
				<td><?= $event_data->status ?></td>
				<td>
					<?php if($event_data->status == "active"){ ?>
						<a href="javascript:void()" data-id="<?= $event_data->id_event; ?>" data-toggle="modal" data-target="#modal_detail_event" class="btn btn-info btn-detail-event m-1" id="btn-detail-event">Detail</a> <br>
					<?php }elseif($event_data->status == "not_active"){ ?>
						<a href="javascript:void()" data-id="<?= $event_data->id_event; ?>" data-toggle="modal" data-target="#modal_detail_event" class="btn btn-info btn-detail-event m-1" id="btn-detail-event">Detail</a> <br>
						<a href="javascript:void()" data-id="<?= $event_data->id_event; ?>" data-toggle="modal" data-target="#modal_ubah_event" class="btn btn-secondary btn-ubah-event m-1" id="btn-ubah-event">Ubah</a> <br>
						<a href="javascript:void()" data-id="<?= $event_data->id_event; ?>" data-toggle="modal" data-target="#modal_hapus_event" class="btn btn-danger btn-hapus-event m-1" id="btn-hapus-event">Hapus</a> <br>
					<?php } ?>

						<!-- Membuat sebuah textbox hidden yang akan digunakan untuk form ubah event -->
							<input type="hidden" class="id_event-value_data" value="<?= $event_data->id_event; ?>">
							<input type="hidden" class="src_qrcode_event-value_data" value="<?= base_url() ?>assets/img/qrcode/<?= $event_data->gambar_qrcode ?>">
							<input type="hidden" class="alt_qrcode_event-value_data" value="<?= $event_data->gambar_qrcode ?>">
							<input type="hidden" class="download_qrcode_event-value_data" value="<?= base_url() ?><?= $event_data->custom_url ?>">
							<input type="hidden" class="nama_event-value_data" value="<?= $event_data->nama_event; ?>">
							<input type="hidden" class="custom_url-value_data" value="<?= $event_data->custom_url; ?>">
							<input type="hidden" class="gambar_qrcode-value_data" value="<?= $event_data->gambar_qrcode; ?>">
							<input type="hidden" class="tanggal_dibuka-value_data" value="<?= $event_data->tanggal_dibuka; ?>">
							<input type="hidden" class="tanggal_ditutup-value_data" value="<?= $event_data->tanggal_ditutup; ?>">
							<input type="hidden" class="jam_dibuka-value_data" value="<?= $event_data->jam_dibuka; ?>">
							<input type="hidden" class="jam_ditutup-value_data" value="<?= $event_data->jam_ditutup; ?>">
							<input type="hidden" class="status-value_data" value="<?= $event_data->status; ?>">
							<input type="hidden" class="petugas_pintu_keluar-value_data" value="<?php foreach($all_tugas_staff_petugas as $data_tugas_staff_petugas){if($data_tugas_staff_petugas->id_event == $event_data->id_event && $data_tugas_staff_petugas->petugas_pintu_keluar == true){foreach($all_staff as $staff_data){if($staff_data->staff_id == $data_tugas_staff_petugas->staff_id){echo $staff_data->nama;}}}} ?>">
							<input type="hidden" class="nama_area_nama_petugas_pintu_area-value_data" value="<?php foreach($all_tugas_staff_petugas as $data_tugas_staff_petugas){if($data_tugas_staff_petugas->id_event == $event_data->id_event && $data_tugas_staff_petugas->petugas_pintu_area == true){foreach($all_staff as $staff_data){if($staff_data->staff_id == $data_tugas_staff_petugas->staff_id){foreach($all_area as $data_area){if($data_area->id_area == $data_tugas_staff_petugas->id_area){echo '<tr>'.'<td>'.$data_area->nama_area.'</td>'.'<td>'.$staff_data->nama.'</td>'.'</tr>';}}}}}} ?>">
				</td>
			</tr>
		<?php 
			$no++;
			}
		?>
	</tbody>
	<tfoot>
		<tr>
			<th>Nomor</th>
			<th>QR Code</th>
			<th>Nama Event</th>
			<th>Total Area</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
	</tfoot>
</table>

<script>
	$('#tabel_list_event').DataTable();
</script>
