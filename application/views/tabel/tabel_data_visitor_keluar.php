<table class="table table-hover table-bordered table-responsive-sm tabel-data-visitor-keluar" width="100%" cellspacing="0">
	<thead>
		<tr>
			<th>Nama</th>
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
				<td><?= $data_visitor_scan_keluar->time_out_event ?></td>
				<td><a href="javascript:void()" data-id="<?= $data_visitor_scan_keluar->id_visitor; ?>" data-toggle="modal" data-target="#modal_detail_visitor" class="btn btn-info btn-detail-visitor m-1">Detail</a></td>

				<!-- Membuat sebuah textbox hidden yang akan digunakan untuk detail visitor -->
					<input type="hidden" class="id_visitor-value_data" value="<?= $data_visitor_scan_keluar->id_visitor; ?>">
					<input type="hidden" class="nama_visitor-value_data" value="<?= $data_visitor_scan_keluar->nama_visitor; ?>">
					<input type="hidden" class="perusahaan_visitor-value_data" value="<?= $data_visitor_scan_keluar->perusahaan_visitor; ?>">
					<input type="hidden" class="jabatan_visitor-value_data" value="<?= $data_visitor_scan_keluar->jabatan_visitor; ?>">
					<input type="hidden" class="email_visitor-value_data" value="<?= $data_visitor_scan_keluar->email_visitor; ?>">
					<input type="hidden" class="email_perusahaan-value_data" value="<?= $data_visitor_scan_keluar->email_perusahaan; ?>">
					<input type="hidden" class="tlp_visitor-value_data" value="<?= $data_visitor_scan_keluar->tlp_visitor; ?>">
					<input type="hidden" class="tlp_perusahaan-value_data" value="<?= $data_visitor_scan_keluar->tlp_perusahaan; ?>">
					<input type="hidden" class="alasan_ikut-value_data" value="<?= $data_visitor_scan_keluar->alasan_ikut; ?>">
					<!-- <input type="hidden" class="time_in_event-value_data" value="</?= date('D, d-M-Y H:i:s', strtotime($data_visitor_scan_keluar->time_in_event)); ?>">
					<input type="hidden" class="time_out_event-value_data" value="</?= date('D, d-M-Y H:i:s', strtotime($data_visitor_scan_keluar->time_out_event)); ?>">
					<input type="hidden" class="lama_berkunjung_event-value_data" value="</?php $get_waktu_berkunjung_event = $this->db->query("SELECT TIMEDIFF(time_out_event,time_in_event) as 'lama_berkunjung_event' FROM tabel_visitor WHERE id_visitor='".$data_visitor_scan_keluar->id_visitor."'")->row("lama_berkunjung_event"); echo date('H', strtotime($get_waktu_berkunjung_event)).' jam '.date('i', strtotime($get_waktu_berkunjung_event)).' menit '.date('s', strtotime($get_waktu_berkunjung_event)). ' detik '; ?>"> -->
					<input type="hidden" class="dvyb-value_data" value="<table class='table text-center table-responsive-sm'><thead><tr><th colspan='2'>Waktu Berkunjung ke Event</th></tr></thead><tbody><tr><td>Waktu Masuk ke Event <br><b><?= date('D, d-M-Y H:i:s', strtotime($data_visitor_scan_keluar->time_in_event)); ?></b></span></td><td>Waktu Keluar dari Event <br> <b><?php if($data_visitor_scan_keluar->time_out_event != null){ echo date('D, d-M-Y H:i:s', strtotime($data_visitor_scan_keluar->time_out_event)); }else{ echo "Belum Scan Keluar Event"; } ?></b></span></td></tr><tr><td colspan='2'>Lama Berkunjung ke Event <br> <b><?php if($data_visitor_scan_keluar->time_out_event != null){$get_waktu_berkunjung_event = $this->db->query("SELECT SUM(TIMEDIFF(time_out_event,time_in_event)) as 'lama_berkunjung_event' FROM tabel_visitor WHERE id_visitor='".$data_visitor_scan_keluar->id_visitor."'")->row("lama_berkunjung_event"); echo floor($get_waktu_berkunjung_event / 3600).' jam '.floor(($get_waktu_berkunjung_event / 60) % 60). ' menit '.floor($get_waktu_berkunjung_event % 60).' detik';}else{ echo 'Belum Scan Keluar Event';} ?></b></td></tr></tbody></table><hr><table class='table table-responsive-sm text-center'><thead><tr><th colspan='2'>Waktu Berkunjung ke Area</th></tr><tr><th>Nama Area</th><th>Lama Berkunjung</th></tr></thead><tbody><?php $data_visitor_scan_keluar_tracking = $this->db->get_where('tabel_tracking', ['id_visitor'=>$data_visitor_scan_keluar->id_visitor])->result(); if($data_visitor_scan_keluar_tracking != null){ foreach($data_visitor_scan_keluar_tracking as $data_track_visitor){?> <tr><td><?php foreach($all_area as $data_area){if($data_track_visitor->id_area == $data_area->id_area){echo $data_area->nama_area;}} ?></td><td><?php $get_waktu_berkunjung_area = $this->db->query("SELECT SUM(TIMEDIFF(time_out_area,time_in_area)) as 'total_lama_berkunjung_area' FROM tabel_tracking WHERE id_visitor='".$data_track_visitor->id_visitor."' AND id_area='".$data_track_visitor->id_area."'")->row("total_lama_berkunjung_area"); echo floor($get_waktu_berkunjung_area / 3600).' jam '.floor(($get_waktu_berkunjung_area / 60) % 60). ' menit '.floor($get_waktu_berkunjung_area % 60).' detik'; ?></td></tr> <?php }}else{ ?><tr><td colspan='2'><i class='text-danger'>Visitor belum berkunjung ke area manapun</i></td></tr><?php } ?></tbody></table>">
			</tr>
		<?php 
				}
			}else{
		?>

			<tr>
				<td colspan="4"><p class="text-center">Belum ada visitor keluar</p></td>
			</tr>

		<?php } ?>
	</tbody>
	<tfoot>
		<tr>
			<th>Nama</th>
			<th>Waktu Keluar</th>
			<th>Aksi</th>
		</tr>
	</tfoot>
</table>

<script>
	$('#tabel-data-visitor-keluar').DataTable({
		"ordering": false
	});

	$(".tabel-data-visitor-keluar").on('click', '.btn-detail-visitor', function(){
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
</script>
