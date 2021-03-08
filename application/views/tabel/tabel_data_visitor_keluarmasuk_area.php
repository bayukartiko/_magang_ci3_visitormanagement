<table class="table table-hover table-bordered table-responsive-sm tabel-visitor" id="tabel-data-visitor-keluarmasuk-area" width="100%" cellspacing="0">
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
								if($data_visitor_scan_keluarmasuk_area->time_out_area == null){
									echo "<i class='text-danger'>belum scan keluar area</i>";
								}else{
									echo $data_visitor_scan_keluarmasuk_area->time_out_area;
								}
							?>
						</td>
						<td><a href="javascript:void()" data-id="<?= $data_visitor_scan_keluarmasuk_area->id_visitor; ?>" data-toggle="modal" data-target="#modal_detail_visitor" class="btn btn-info btn-detail-visitor m-1">Detail</a></td>

							<?php
								foreach($all_visitor as $data_all_visitor){
									if($data_visitor_scan_keluarmasuk_area->id_visitor == $data_all_visitor->id_visitor){ ?>
										<!-- Membuat sebuah textbox hidden yang akan digunakan untuk detail visitor -->
											<input type="hidden" class="nama_visitor-value_data" value="<?= $data_all_visitor->nama_visitor; ?>">
											<input type="hidden" class="perusahaan_visitor-value_data" value="<?= $data_all_visitor->perusahaan_visitor; ?>">
											<input type="hidden" class="jabatan_visitor-value_data" value="<?= $data_all_visitor->jabatan_visitor; ?>">
											<input type="hidden" class="email_visitor-value_data" value="<?= $data_all_visitor->email_visitor; ?>">
											<input type="hidden" class="email_perusahaan-value_data" value="<?= $data_all_visitor->email_perusahaan; ?>">
											<input type="hidden" class="tlp_visitor-value_data" value="<?= $data_all_visitor->tlp_visitor; ?>">
											<input type="hidden" class="tlp_perusahaan-value_data" value="<?= $data_all_visitor->tlp_perusahaan; ?>">
											<input type="hidden" class="alasan_ikut-value_data" value="<?= $data_all_visitor->alasan_ikut; ?>">
											<input type="hidden" class="dvioa-value_data" value="<table class='table text-center table-responsive-sm'><thead><tr><th colspan='2'>Waktu Berkunjung ke Area</th></tr></thead><tbody><tr><td>Waktu Masuk ke Area <br><b><?= date('D, d-M-Y H:i:s', strtotime($data_visitor_scan_keluarmasuk_area->time_in_area)); ?></b></span></td><td>Waktu Keluar dari Area <br> <b><?php if($data_visitor_scan_keluarmasuk_area->time_out_area != null){ echo date('D, d-M-Y H:i:s', strtotime($data_visitor_scan_keluarmasuk_area->time_out_area)); }else{echo "<i class='text-danger'>Visitor belum keluar area ini</i>";} ?></b></span></td></tr><tr><td colspan='2'>Lama Berkunjung ke Area <br> <b><?php $get_waktu_berkunjung_area = $this->db->query("SELECT SUM(TIMEDIFF(time_out_area,time_in_area)) as 'total_lama_berkunjung_area' FROM tabel_tracking WHERE id_visitor='".$data_all_visitor->id_visitor."' AND id_area='".$this->db->get_where('tabel_tugas_staff_petugas', ['id_tugas' => $this->session->userdata('id_tugas')])->row('id_area')."'")->row("total_lama_berkunjung_area"); if($get_waktu_berkunjung_area != null){ echo floor($get_waktu_berkunjung_area / 3600).' jam '.floor(($get_waktu_berkunjung_area / 60) % 60). ' menit '.floor($get_waktu_berkunjung_area % 60).' detik';}else{echo "<i class='text-danger'>Visitor belum keluar area ini</i>";} ?></b></td></tr></tbody></table>">
									<?php }
								}
							?>
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
</script>
