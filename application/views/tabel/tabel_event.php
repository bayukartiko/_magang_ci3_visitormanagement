<table id="tabel_list_event" class="table table-striped table-bordered table-hover table-responsive-sm" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>Nomor</th>
			<th>Nama Event</th>
			<th>Tanggal dimulai</th>
			<th>Tanggal Berakhir</th>
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
				<td><?= $event_data->nama_event ?></td>
				<td><?= $event_data->tanggal_dibuka ?></td>
				<td><?= $event_data->tanggal_ditutup ?></td>
				<td>
					<?= $this->db->get_where('tabel_area', ['id_event' => $event_data->id_event])->num_rows() ?>
				</td>
				<td><?= $event_data->status ?></td>
				<td><button class="btn btn-info">Detail</button></td>
			</tr>
		<?php 
			$no++;
			}
		?>
	</tbody>
	<tfoot>
		<tr>
			<th>Nomor</th>
			<th>Nama Event</th>
			<th>Tanggal dimulai</th>
			<th>Tanggal Berakhir</th>
			<th>Total Area</th>
			<th>Status</th>
			<th>Aksi</th>
		</tr>
	</tfoot>
</table>

<script>
	$('#tabel_list_event').DataTable();
</script>
