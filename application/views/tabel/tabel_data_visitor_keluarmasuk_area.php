<table class="table table-hover table-bordered table-responsive-sm" id="tabel-data-visitor-keluarmasuk-area" width="100%" cellspacing="0">
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
			if($hitung_visitor_scan_keluarmasuk_area>0){
				foreach($visitor_scan_keluarmasuk_area as $data_visitor_scan_keluarmasuk_area){
		?>
					<tr>
						<td>
							<?php
								foreach($all_visitor as $data_all_visitor){
									if($data_visitor_scan_keluarmasuk_area->id_visitor == $data_all_visitor->id_visitor){
										echo $data_all_visitor->nama_visitor;
									}
								}
							?>
						</td>
						<td><?= $data_visitor_scan_keluarmasuk_area->time_in_area ?></td>
						<td>
							<?php
								if($data_visitor_scan_keluarmasuk_area->time_out_area == "0000-00-00 00:00:00"){
									echo "belum scan keluar";
								}else{
									echo $data_visitor_scan_keluarmasuk_area->time_out_area;
								}
							?>
						</td>
						<td><button class="btn btn-info">Detail</button></td>
					</tr>
		<?php 
				}
			}else{
		?>

			<tr>
				<td colspan="4"><p class="text-center">Belum ada visitor yang discan oleh anda</p></td>
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
	$('#tabel-data-visitor-keluarmasuk-area').DataTable({
		"ordering": false
	});
</script>
