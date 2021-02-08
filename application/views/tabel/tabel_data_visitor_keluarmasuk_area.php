<table class="table table-hover table-bordered table-responsive-sm" id="tabel-data-visitor-keluar" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>Nama</th>
			<th>Waktu Masuk</th>
			<th>Waktu Keluar</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php 
			if($hitung_visitor_scan_keluar>0){
				foreach($visitor_scan_keluar as $data_visitor_scan_keluar){ 
			
		?>
			<tr>
				<td><?= $data_visitor_scan_keluar->nama_visitor ?></td>
				<td><?= $data_visitor_scan_keluar->time_in_event ?></td>
				<td><?= $data_visitor_scan_keluar->time_out_event ?></td>
				<td><button class="btn btn-info">Detail</button></td>
			</tr>
		<?php 
				}
			}else{
		?>

			<tr>
				<td colspan="4"><p class="text-center">Belum ada visitor masuk/keluar area</p></td>
			</tr>

		<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<th>Nama</th>
			<th>Waktu Masuk</th>
			<th>Waktu Keluar</th>
			<th>Aksi</th>
		</tr>
	</tfoot>
</table>

<script>
	$('#tabel-data-visitor-keluar').DataTable();
</script>
