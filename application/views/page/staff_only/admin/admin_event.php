
          <!-- Begin Page Content -->
          <div class="container-fluid">

			<!-- Page Heading -->
			<div class="d-sm-flex align-items-center justify-content-between mb-4">
				<h1 class="h3 mb-0 text-gray-800">Register / Daftar event</h1>
			</div>

			<div class="card shadow mb-4">
				<!-- Card Header - Dropdown -->
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">List data event</h6>
				</div>
				<div class="card-body">
					<button class="btn btn-primary" data-toggle="modal" data-target="#modal_tambah_event">Tambah event baru</button>
					<br><br>

					<div class="table-responsive">
						<div id="view_tabel_event">
							<?php $this->load->view('tabel/tabel_event', ['all_event' => $all_event, 'all_area' => $all_area, 'all_tugas_staff_petugas' => $all_tugas_staff_petugas]); ?>
						</div>
					</div>
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

	<!-- modal preview qrcode  -->
		<div class="modal fade" id="modal_preview_qrcode" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg text-justify modal-dialog-centered">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Preview QR code</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body mx-auto text-center">
						<!-- <span class="nama_event-preview_qrcode m-1"></span><br> -->
						<img src="" alt="" class="gambar_qrcode-preview_qrcode img-thumbnail shadow-sm m-1" style="width: 400px; height: 400px;"><br>
						<!-- <span class="link_event-preview_qrcode text-primary m-1"></span> -->
					</div>
					<div class="modal-footer">
						<a href="" class="btn btn-primary btn-download-pdf-qrcode">Download PDF</a> | 
						<a href="" download="" class="btn btn-primary btn-download-png-qrcode">Download PNG</a>
						<button type="button" class="btn btn-default" data-dismiss="modal">Tutup</button>
					</div>
				</div>
			</div>
		</div>
    <!-- modal tambah event -->
		<div class="modal fade" id="modal_tambah_event" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Buat Event Baru</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="form-tambah-event" enctype="multipart/form-data" action="" class="" method="POST">
							<div class="row">
								<div class="offset-md-1 col-md-10">
									<div class="form-group">
										<label class="bmd-label-floating text-gray-800" for="field_nama_event">Nama Event</label>
										<input type="text" class="form-control" id="field_nama_event" name="nama_event" placeholder="masukkan nama event" value="<?= set_value('nama_event') ?>"/>

										<small id="error_nama_event" class="invalid-feedback"></small>
									</div>
								</div>
								<div class="offset-md-1 col-md-10">
									<div class="form-group">
										<label class="bmd-label-floating text-gray-800" for="field_custom_url">Custom URL (opsional)</label>
										<table>
											<tr>
												<td><?= base_url() ?></td>
												<td>
													<input type="text" class="form-control" id="field_custom_url" name="custom_url" placeholder="masukkan custom url" value="<?= set_value('custom_url') ?>"/>
												</td>
											</tr>
										</table>
										<small id="error_custom_url" class="invalid-feedback"></small>
										<small class="text-muted">akan membuat url event custom untuk visitor akses event ini, jika tidak di-isi maka url akan mengikuti isi field nama event</small><br>
										<small class="text-muted">jika <u>tidak di-isi</u>, url event akan menjadi seperti ini: <b><?= base_url() ?>nama_event</b></small><br>
										<small class="text-muted">jika <u>di-isi</u>, url event akan menjadi seperti ini: <b><?= base_url() ?>custom_url</b></small>
									</div>
								</div>
								<div class="offset-md-1 col-md-5">
									<div class="form-group">
										<label class="bmd-label-floating text-gray-800" for="field_tgl_mulai">Tanggal Dimulai</label>
										<input type="date" class="form-control" id="field_tgl_mulai" name="tgl_mulai" value="<?= set_value('tgl_mulai') ?>"/>

										<small id="error_tgl_mulai" class="invalid-feedback"></small>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label class="bmd-label-floating text-gray-800" for="field_tgl_selesai">Tanggal Berakhir</label>
										<input type="date" class="form-control" id="field_tgl_selesai" name="tgl_selesai" value="<?= set_value('tgl_selesai') ?>"/>
										
										<small id="error_tgl_selesai" class="invalid-feedback"></small>
									</div>
								</div>
								<div class="offset-md-1 col-md-5">
									<div class="form-group">
										<label class="bmd-label-floating text-gray-800" for="field_jam_dibuka">Jam Dibuka</label>
										<input type="time" class="form-control" id="field_jam_dibuka" name="jam_dibuka" value="<?= set_value('jam_dibuka') ?>"/>
										
										<small id="error_jam_dibuka" class="invalid-feedback"></small>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label class="bmd-label-floating text-gray-800" for="field_jam_ditutup">Jam Ditutup</label>
										<input type="time" class="form-control" id="field_jam_ditutup" name="jam_ditutup" value="<?= set_value('jam_ditutup') ?>"/>

										<small id="error_jam_ditutup" class="invalid-feedback"></small>
									</div>
								</div>
								<div class="offset-md-1 col-md-10">
									<div class="form-group" id="view_petugas_pintu_keluar">
										<?php $this->load->view('page/staff_only/admin/select_petugas_pintu/petugas_pintu_keluar', ['staff_nganggur' => $staff_nganggur]); ?>
									</div>
								</div>
								<div class="offset-md-1 col-md-10">
									<br>
									<hr>
									<h3 class="text-center">Buat area beserta petugasnya untuk event ini</h3>
									<br>
									<table class="table table-hover table-responsive-sm table-borderless text-center" id="form-area">
										<span id="error"></span>
										<thead>
											<tr>
												<!-- <th>Nomor.</th> -->
												<th>Nama Area</th>
												<th>Nama Petugas</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<!-- <td>1</td> -->
												<td>
													<input type="text" name="namaArea[]" class="form-control field_nama_area" placeholder="Masukkan Nama Area" value="<?= set_value('namaArea[]') ?>"/>
													<?php echo form_error('namaArea[]'); ?>
												</td>
												<td id="view_petugas_pintu_area">
													<?php $this->load->view('page/staff_only/admin/select_petugas_pintu/petugas_pintu_area', ['staff_nganggur' => $staff_nganggur]); ?>
												</td>
												<td>
													<a class="btn btn-danger" id="remove-form"><i class="fas fa-trash"></i></a>
												</td>
											</tr>
										</tbody>
										<tfoot>
											<tr>
												<th colspan="3">
													<a class="btn btn-secondary float-right" id="btn-tambah-input">tambah</a>
												</th>
											</tr>
										</tfoot>
									</table>

									<!-- tampung jumlah data form -->
									<input type="hidden" id="jumlah-form" value="1">
									
								</div>
								<div class="offset-md-1 col-md-10">
									<div class="form-group">
										<br>
										<hr>
										<br>
										<div class="alert alert-danger">
											<h6>Baca peringatan ini sebelum menyimpan event ini:</h6>
											<ul>
												<li>
													Anda tidak bisa mengubah/mengedit:
													<ol>
														<li>Nama petugas pintu keluar</li>
														<li>Nama area</li>
														<li>Nama petugas pintu area</li>
													</ol>
												</li>
												<li>
													Tetapi anda masih bisa mengubah/mengedit:
													<ol>
														<li>Nama event</li>
														<li>Custom URL</li>
														<li>Tanggal dimulai</li>
														<li>Tanggal berakhir</li>
														<li>Jam dibuka</li>
														<li>Jam ditutup</li>
													</ol>
												</li>
												<li>jika status event ini sudah aktif, maka anda sudah tidak bisa mengubah/mengedit bahkan menghapus event ini.</li>
											</ul>
											<h6>
												peringatan diatas mulai berlaku pada saat anda berhasil menyimpan event ini, <br>
												disarankan untuk mengecek ulang form event ini agar menghindari kesalahan sebelum memutuskan untuk menyimpan event ini ! 
											</h6>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" id="btn-simpan">Simpan</button>
						<button type="button" class="btn btn-transparent" data-dismiss="modal">Batal</button>
					</div>
				</div>
			</div>
		</div>
	
	<!-- modal ubah event -->
		<div class="modal fade" id="modal_ubah_event" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Ubah data event</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="form-ubah-event" enctype="multipart/form-data" action="" class="" method="POST">
							<div class="row">
								<div class="offset-md-1 col-md-10">
									<div class="form-group">
										<label class="bmd-label-floating text-gray-800" for="field_nama_event-edit">Nama Event</label>
										<input type="hidden" id="field_id_event-edit" name="id_event"/>
										<input type="text" class="form-control" id="field_nama_event-edit" name="nama_event" placeholder="masukkan nama event" value="<?= set_value('nama_event') ?>"/>

										<small id="error_nama_event-edit" class="invalid-feedback"></small>
									</div>
								</div>
								<div class="offset-md-1 col-md-10">
									<div class="form-group">
										<label class="bmd-label-floating text-gray-800" for="field_custom_url-edit">Custom URL (opsional)</label>
										<table>
											<tr>
												<td><?= base_url() ?></td>
												<td>
													<input type="text" class="form-control" id="field_custom_url-edit" name="custom_url" placeholder="masukkan custom url" value="<?= set_value('custom_url') ?>"/>
												</td>
											</tr>
										</table>
										<small class="text-muted">akan membuat url event custom untuk visitor akses event ini, jika tidak di-isi maka url akan mengikuti isi field nama event</small><br>
										<small class="text-muted">jika <u>tidak di-isi</u>, url event akan menjadi seperti ini: <b><?= base_url() ?>nama_event</b></small><br>
										<small class="text-muted">jika <u>di-isi</u>, url event akan menjadi seperti ini: <b><?= base_url() ?>custom_url</b></small>
									</div>
								</div>
								<div class="offset-md-1 col-md-5">
									<div class="form-group">
										<label class="bmd-label-floating text-gray-800" for="field_tgl_mulai-edit">Tanggal Dimulai</label>
										<input type="date" class="form-control" id="field_tgl_mulai-edit" name="tgl_mulai" value="<?= set_value('tgl_mulai') ?>"/>

										<small id="error_tgl_mulai-edit" class="invalid-feedback"></small>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label class="bmd-label-floating text-gray-800" for="field_tgl_selesai-edit">Tanggal Berakhir</label>
										<input type="date" class="form-control" id="field_tgl_selesai-edit" name="tgl_selesai" value="<?= set_value('tgl_selesai') ?>"/>
										
										<small id="error_tgl_selesai-edit" class="invalid-feedback"></small>
									</div>
								</div>
								<div class="offset-md-1 col-md-5">
									<div class="form-group">
										<label class="bmd-label-floating text-gray-800" for="field_jam_dibuka-edit">Jam Dibuka</label>
										<input type="time" class="form-control" id="field_jam_dibuka-edit" name="jam_dibuka" value="<?= set_value('jam_dibuka') ?>"/>
										
										<small id="error_jam_dibuka-edit" class="invalid-feedback"></small>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label class="bmd-label-floating text-gray-800" for="field_jam_ditutup-edit">Jam Ditutup</label>
										<input type="time" class="form-control" id="field_jam_ditutup-edit" name="jam_ditutup" value="<?= set_value('jam_ditutup') ?>"/>

										<small id="error_jam_ditutup-edit" class="invalid-feedback"></small>
									</div>
								</div>
								<div class="offset-md-1 col-md-10">
									<div class="form-group">
										<br>
										<hr>
										<br>
										<div class="alert alert-danger">
											<h6>Baca peringatan ini sebelum mengubah event ini:</h6>
											<ul>
												<li>jika status event ini sudah aktif, maka anda sudah tidak bisa mengubah/mengedit bahkan menghapus event ini.</li>
											</ul>
											<h6>
												peringatan diatas mulai berlaku pada saat anda berhasil mengubah event ini, <br>
												disarankan untuk mengecek ulang form ubah event ini agar menghindari kesalahan sebelum memutuskan untuk mengubah event ini ! 
											</h6>
										</div>
									</div>
								</div>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" id="btn-ubah">Ubah</button>
						<button type="button" class="btn btn-transparent" data-dismiss="modal">Batal</button>
					</div>
				</div>
			</div>
		</div>

	<!-- modal hapus event -->
		<div class="modal fade" id="modal_hapus_event" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Hapus event</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						Anda yakin ingin menghapus event ini?
						<br>
						ini akan menghapus semua data dalam database yang berhubungan dengan event ini <b>secara permanen</b>, yakin mau melanjutkan?
					</div>
					<div class="modal-footer">
						<button class="btn btn-danger" type="button" id="btn-hapus">Hapus</button>
						<button class="btn btn-transparent" type="button" id="btn-hapus" data-dismiss="modal">Batal</button>
					</div>
				</div>
			</div>
		</div>
	
	<!-- modal detail event -->
		<div class="modal fade" id="modal_detail_event" data-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Detail Event</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<div class="modal-body">
						<fieldset disabled="disabled">
							<div class="row">
								<div class="offset-md-1 col-md-10">
									<div class="form-group">
										<div class="row">
											<div class="col-md-3">
												<a href="" download="" id="field_href_qrcode-detail">
													<img id="field_qrcode-detail" src="" alt="" class="img-thumbnail mx-auto" style="width: 200px; height: 200px;">
												</a>
											</div>
											<div class="col-md-9">
												<label class="bmd-label-floating text-gray-800" for="field_nama_event-detail">Nama Event</label>
												<input type="text" class="form-control" id="field_nama_event-detail" disabled/>
											</div>
										</div>
									</div>
								</div>
								<div class="offset-md-1 col-md-10">
									<div class="form-group">
										<label class="bmd-label-floating text-gray-800" for="field_custom_url-detail">Custom URL</label>
										<table>
											<tr>
												<td><?= base_url() ?></td>
												<td>
													<input type="text" class="form-control" id="field_custom_url-detail" disabled/>
												</td>
											</tr>
										</table>
									</div>
								</div>
								<div class="offset-md-1 col-md-5">
									<div class="form-group">
										<label class="bmd-label-floating text-gray-800" for="field_tgl_mulai-detail">Tanggal Dimulai</label>
										<input type="date" class="form-control" id="field_tgl_mulai-detail" disabled/>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label class="bmd-label-floating text-gray-800" for="field_tgl_selesai-detail">Tanggal Berakhir</label>
										<input type="date" class="form-control" id="field_tgl_selesai-detail" disabled/>
									</div>
								</div>
								<div class="offset-md-1 col-md-5">
									<div class="form-group">
										<label class="bmd-label-floating text-gray-800" for="field_jam_dibuka-detail">Jam Dibuka</label>
										<input type="time" class="form-control" id="field_jam_dibuka-detail" disabled/>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label class="bmd-label-floating text-gray-800" for="field_jam_ditutup-detail">Jam Ditutup</label>
										<input type="time" class="form-control" id="field_jam_ditutup-detail"/>
									</div>
								</div>
								<div class="offset-md-1 col-md-10">
									<div class="form-group">
										<label class="bmd-label-floating text-gray-800" for="field_nama_petugas_pintuKeluar-detail">Petugas pintu keluar event</label>
										<input type="text" class="form-control" id="field_nama_petugas_pintuKeluar-detail" disabled>
									</div>
								</div>
								<div class="offset-md-1 col-md-10">
									<br>
									<hr>
									<h3 class="text-center">Nama area beserta petugasnya di event ini</h3>
									<br>
									<table class="table table-hover table-striped table-responsive-sm table-borderless text-center">
										<thead>
											<tr>
												<!-- <th>Nomor.</th> -->
												<th>Nama Area</th>
												<th>Nama Petugas</th>
											</tr>
										</thead>
										<tbody id="field_nama_area_nama_petugas_pintuArea-detail">
										</tbody>
									</table>
								</div>
							</div>
						</fieldset>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Mengerti</button>
					</div>
				</div>
			</div>
		</div>
		
    <script>
      $(document).ready(function () {
			// $('.field_nama_petugas').select2({
			// 	theme: 'bootstrap4',
			// });
			
			var id_event = "";
			var nextform = ""; 

			$('#modal_tambah_event').on('hidden.bs.modal', function (e){ // Ketika Modal Dialog di Close / tertutup
				$('#modal_tambah_event input, #modal_tambah_event select, #modal_tambah_event datetime-local').val(''); // Clear inputan menjadi kosong
				$('#btn-simpan').html('Simpan');
			});
			$('#modal_ubah_event').on('hidden.bs.modal', function (e){ // Ketika Modal Dialog di Close / tertutup
				$('#modal_tambah_event input, #modal_tambah_event select, #modal_tambah_event datetime-local').val(''); // Clear inputan menjadi kosong
				$('#btn-ubah').html('Ubah');
			});
			
			$("#btn-tambah-input").click(function(){ // Ketika tombol Tambah Data Form di klik
				var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
				nextform = jumlah + 1; // Tambah 1 untuk jumlah form nya

				// tambahkan form dengan menggunakan append
				$("#form-area > tbody").append(
					'<tr>'+
						// "<td>"+ nextform + "</td>" +
						'<td>'+
							'<input type="text" name="namaArea[]" class="form-control field_nama_area" placeholder="Masukkan Nama Area" value="<?= set_value('namaArea[]') ?>"/>'+
						'</td>'+
						'<td id="view_petugas_pintu_area-multiple">'+
							'<?php $this->load->view("page/staff_only/admin/select_petugas_pintu/petugas_pintu_area_multiple", ["staff_nganggur" => $staff_nganggur]); ?>
						'</td>'+
						'<td><a class="btn btn-danger" id="remove-form"><i class="fas fa-trash"></i></a></td>'+
					'</tr>'
					);

				$('.select-petugas-pintu').change(function () {
					if ($('.select-petugas-pintu option[value="' + $(this).val() + '"]:selected').length > 1) {
						$(this).val('').change();
						alert('Anda sudah memilih petugas ini pada pilihan sebelumnya, harap pilih petugas yang lain.');
					}
				});
				
				$("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
			});

			$('.select-petugas-pintu').change(function () {
				if ($('.select-petugas-pintu option[value="' + $(this).val() + '"]:selected').length > 1) {
					$(this).val('').change();
					alert('Anda sudah memilih petugas ini pada pilihan sebelumnya, harap pilih petugas yang lain.');
				}
			});

			$("body").on("click", "#remove-form", function () {
				$(this).parents("tr").remove();
				// $('#error').html('');
				// var nextform = jumlah - 1; // kirangi 1 untuk jumlah form nya
				var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
				nextform = jumlah - 1;
				$("#jumlah-form").val(nextform);
			});

			// fungsi preview qrcode
				$('#view_tabel_event').on('click', '.btn-preview-qrcode', function(){
					id_event = $(this).data('id');
					
					var tr = $(this).closest('tr');
					var id_event = tr.find('.id_event-value_data').val();
					var src_qrcode_event = tr.find('.src_qrcode_event-value_data').val();
					var alt_qrcode_event = tr.find('.alt_qrcode_event-value_data').val();
					var download_qrcode_event = tr.find('.download_qrcode_event-value_data').val();
					var nama_event = tr.find('.nama_event-value_data').val();
					var link_akses = tr.find('.link_akses_event-value_data').val();
					
					$('.gambar_qrcode-preview_qrcode').attr("src", src_qrcode_event);
					$('.gambar_qrcode-preview_qrcode').attr("alt", alt_qrcode_event);
					$('.field_href_qrcode-detail').attr("href", src_qrcode_event);
					$('.btn-download-png-qrcode').attr("href", src_qrcode_event);
					$('.btn-download-png-qrcode').attr("download", download_qrcode_event);
					$('.btn-download-pdf-qrcode').attr("href", "print_qrcode/"+id_event);
					$('.nama_event-preview_qrcode').html("<h4>"+nama_event+"</h4>");
					$('.link_event-preview_qrcode').html("<h5>"+link_akses+"</h5>");
				});
				
			// fungsi tambah event
				$('#btn-simpan').click(function(e){ // Ketika tombol simpan didalam modal di klik
					// e.preventDefault();
					$('#btn-simpan').html('Sedang menambahkan..'); // ganti text btn-simpan jadi sedang menambahkan
					$('#btn-simpan').attr('disabled', true);

					
					var startDate = new Date($('#field_tgl_mulai').val());
					var endDate = new Date($('#field_tgl_selesai').val());
					if (endDate < startDate){
						$('#field_tgl_selesai').addClass('is-invalid');
						$('#error_tgl_selesai').html('tanggal berakhir harus tanggal setelah tanggal dimulai');
						$('#btn-simpan').html('x Terjadi kesalahan x');
						setTimeout(() => {
							$('#btn-simpan').html('Simpan');
							$('#btn-simpan').attr('disabled', false);
						}, 2000);
						return false;
					}else{
						$('#field_tgl_selesai').removeClass('is-invalid');
						$('#error_tgl_selesai').html('');
					}

					var startTime = $('#field_jam_dibuka').val();
					var endTime = $('#field_jam_ditutup').val();
					if (endTime < startTime){
						$('#field_jam_ditutup').addClass('is-invalid');
						$('#error_jam_ditutup').html('jam ditutup harus jam setelah jam dibuka');
						$('#btn-simpan').html('x Terjadi kesalahan x');
						setTimeout(() => {
							$('#btn-simpan').html('Simpan');
							$('#btn-simpan').attr('disabled', false);
						}, 2000);
						return false;
					}else if(endTime == startTime){
						$('#field_jam_ditutup').addClass('is-invalid');
						$('#error_jam_ditutup').html('jam ditutup tidak boleh sama dengan jam dibuka');
						$('#btn-simpan').html('x Terjadi kesalahan x');
						setTimeout(() => {
							$('#btn-simpan').html('Simpan');
							$('#btn-simpan').attr('disabled', false);
						}, 2000);
						return false;
					}else{
						$('#field_jam_ditutup').removeClass('is-invalid');
						$('#error_jam_ditutup').html('');
					}
					
					var error = '';
					var hitung_field_nama_area = 1;
					$('.field_nama_area').each(function(){
						if($(this).val() == ''){
							error += "<p>harap isi field nama area pada baris "+hitung_field_nama_area+" !</p>";
							$(this).addClass('is-invalid');
							return false;
						}else{
							$(this).removeClass('is-invalid');
						}
						hitung_field_nama_area = hitung_field_nama_area + 1;
					});
					var hitung_field_nama_petugas = 1;
					$('.field_nama_petugas').each(function(){
						if($(this).find(":selected").val() == ''){
							error += "<p>harap pilih field nama petugas pada baris "+hitung_field_nama_petugas+" !</p>";
							$(this).addClass('is-invalid');
							return false;
						}else{
							$(this).removeClass('is-invalid');
						}
						hitung_field_nama_petugas = hitung_field_nama_petugas + 1;
					});

					if(error == ''){
						$('#error').html('');
						tambah_event();
					}else{
						$('#error').html('<div class="alert alert-warning alert-dismissible fade show" role="alert">'+error+'</div>');
						$('#btn-simpan').html('x Terjadi kesalahan x');
						setTimeout(() => {
							$('#btn-simpan').html('Simpan');
							$('#btn-simpan').attr('disabled', false);
						}, 2000);
					}

				});

				function tambah_event(){
					$.ajax({
						url: '<?= base_url(); ?>staff_only/admin/crud_event/tambah/'+null+'', // URL tujuan
						type: 'POST',
						// data: $("#form-modal form").serialize(),
						data: new FormData(document.getElementById('form-tambah-event')),
						processData:false,
						contentType:false,
						cache:false,
						async:false,
						dataType: 'JSON',
						beforeSend: function() {
							// $('#loading-simpan').show(); // Munculkan loading simpan
							$('#btn-simpan').html('Sedang menambahkan..'); // ganti text btn-simpan jadi sedang menambahkan
							$('#btn-simpan').attr('disabled', true);
						},
						success: function(callback){
							// console.log('sukses');
							// console.log(callback)

							if(callback.status == "sukses"){ // Jika Statusnya = sukses
								// console.log('callback sukses');

								$('#modal_tambah_event').modal('hide');

								// $('#total_staff').html(callback.total_staff)
								// $('#total_staff_admin').html(callback.total_staff_admin)
								// $('#total_staff_petugas').html(callback.total_staff_petugas)

								// window.location.reload();
								// Ganti isi dari div view dengan view yang diambil dari view_register.php
								$('#view_tabel_event').html(callback.view_tabel_event);
								$('#view_petugas_pintu_keluar').html(callback.view_select_petugas_pintu_keluar);
								$('#view_petugas_pintu_area').html(callback.view_select_petugas_pintu_area);
								$('#view_petugas_pintu_area-multiple').html(callback.view_select_petugas_pintu_area_multiple);
								// $('#view_chart_status_staff').html(callback.view_chart_status_staff);
								// $('#view_chart_total_staff').html(callback.view_chart_total_staff);
								// $('#pesan-sukses').html(callback.pesan).fadeIn().delay(10000).fadeOut();
								const Toast = Swal.mixin({
									toast: true,
									position: 'top-start',
									showConfirmButton: false,
									timer: 5000,
									timerProgressBar: true,
									didOpen: (toast) => {
										toast.addEventListener('mouseenter', Swal.stopTimer)
										toast.addEventListener('mouseleave', Swal.resumeTimer)
									}
								});
								Toast.fire({
									icon: 'success',
									title: callback.pesan
								});

								$('#btn-simpan').html('Simpan'); // ganti text btn-simpan jadi sedang menambahkan
								$('#btn-simpan').attr('disabled', false);

								// setTimeout(() => {
								// 	window.location.reload();
								// }, 2000);

							}else{
								// console.log('callback error');
								// tampil pesan validasi
									if(callback.nama_event_error){
										$('#field_nama_event').addClass('is-invalid');
										$('#error_nama_event').html(callback.nama_event_error);
									}else{
										$('#field_nama_event').removeClass('is-invalid');
										$('#error_nama_event').html('');
									}
									
									if(callback.custom_url_error){
										$('#field_custom_url').addClass('is-invalid');
										$('#error_custom_url').html(callback.custom_url_error);
									}else{
										$('#field_custom_url').removeClass('is-invalid');
										$('#error_custom_url').html('');
									}
									
									if(callback.tgl_mulai_error){
										$('#field_tgl_mulai').addClass('is-invalid');
										$('#error_tgl_mulai').html(callback.tgl_mulai_error);
									}else{
										$('#field_tgl_mulai').removeClass('is-invalid');
										$('#error_tgl_mulai').html('');
									}

									if(callback.tgl_selesai_error){
										$('#field_tgl_selesai').addClass('is-invalid');
										$('#error_tgl_selesai').html(callback.tgl_selesai_error);
									}else{
										$('#field_tgl_selesai').removeClass('is-invalid');
										$('#error_tgl_selesai').html('');
									}

									if(callback.jam_dibuka_error){
										$('#field_jam_dibuka').addClass('is-invalid');
										$('#error_jam_dibuka').html(callback.jam_dibuka_error);
									}else{
										$('#field_jam_dibuka').removeClass('is-invalid');
										$('#error_jam_dibuka').html('');
									}

									if(callback.jam_ditutup_error){
										$('#field_jam_ditutup').addClass('is-invalid');
										$('#error_jam_ditutup').html(callback.jam_ditutup_error);
									}else{
										$('#field_jam_ditutup').removeClass('is-invalid');
										$('#error_jam_ditutup').html('');
									}

									if(callback.nama_petugas_pintuKeluar_error){
										$('#field_nama_petugas_pintuKeluar').addClass('is-invalid');
										$('#error_nama_petugas_pintuKeluar').html(callback.nama_petugas_pintuKeluar_error);
									}else{
										$('#field_nama_petugas_pintuKeluar').removeClass('is-invalid');
										$('#error_nama_petugas_pintuKeluar').html('');
									}
									// if(callback.namaArea_error){
									// 	$('.field_nama_area').addClass('is-invalid');
									// 	$('.error_tgl_selesai').html(callback.tgl_selesai_error);
									// }else{
									// 	$('.field_nama_area').removeClass('is-invalid');
									// 	$('.error_tgl_selesai').html('');
									// }
									// if(callback.namaPetugas_error){
									// 	$('.field_nama_petugas').addClass('is-invalid');
									// 	$('.error_tgl_selesai').html(callback.tgl_selesai_error);
									// }else{
									// 	$('.field_nama_petugas').removeClass('is-invalid');
									// 	$('.error_tgl_selesai').html('');
									// }
								
								$('#btn-simpan').html('x Terjadi kesalahan x');
								setTimeout(() => {
									$('#btn-simpan').html('Simpan');
									$('#btn-simpan').attr('disabled', false);
								}, 2000);
							}
						},
						error: function(xhr, ajaxOptions, thrownError, errorMessage, callback) {
							console.log("error :", errorMessage);
							console.log(callback)
							// alert(xhr.responseText);
							console.log(thrownError + "\r\n" + xhr.status + "\r\n"  + xhr.statusText + "\r\n" + xhr.responseText);
						}
					});
				};

			// fungsi hapus event
				$('#view_tabel_event').on('click', '.btn-hapus-event', function(){
					id_event = $(this).data('id');
				});
				
				$('#btn-hapus').click(function(e){
					$('#btn-hapus').html('Sedang menghapus..');
					$('#btn-hapus').attr('disabled', true);
					hapus_event();
				});

				function hapus_event(){
					$.ajax({
						url: '<?= base_url(); ?>staff_only/admin/crud_event/hapus/'+id_event+'', // URL tujuan
						type: 'POST', // Tentukan type nya POST atau GET
						// data: new FormData(document.getElementById('modal_hapus_event')),
						// processData:false,
						// contentType:false,
						// cache:false,
						// async:false,
						dataType: 'JSON',
						beforeSend: function() {
							$('#btn-hapus').html('Sedang menghapus..');
							$('#btn-hapus').attr('disabled', true);
						},
						success: function(callback){ // Ketika proses pengiriman berhasil
							$('#modal_hapus_event').modal('hide'); // Close / Tutup Modal Dialog

							// window.location.reload();
							// Ganti isi dari div view dengan view yang diambil dari view_register.php
							$('#view_tabel_event').html(callback.view_tabel_event);
							$('#view_petugas_pintu_keluar').html(callback.view_select_petugas_pintu_keluar);
							$('#view_petugas_pintu_area').html(callback.view_select_petugas_pintu_area);
							$('#view_petugas_pintu_area-multiple').html(callback.view_select_petugas_pintu_area_multiple);
							
							const Toast = Swal.mixin({
								toast: true,
								position: 'top-start',
								showConfirmButton: false,
								timer: 10000,
								timerProgressBar: true,
								didOpen: (toast) => {
									toast.addEventListener('mouseenter', Swal.stopTimer)
									toast.addEventListener('mouseleave', Swal.resumeTimer)
								}
							});
							Toast.fire({
								icon: 'success',
								title: callback.pesan
							});

							$('#btn-hapus').html('Hapus');
							$('#btn-hapus').attr('disabled', false);
						},
						error: function(xhr, ajaxOptions, thrownError, errorMessage, callback) {
							console.log("error :", errorMessage);
							console.log(callback)
							// alert(xhr.responseText);
							console.log(thrownError + "\r\n" + xhr.status + "\r\n"  + xhr.statusText + "\r\n" + xhr.responseText);
						}
					});
				}
			
			// fungsi edit event
				$('#view_tabel_event').on('click', '.btn-ubah-event', function(){
					id_event = $(this).data('id');
					
					var tr = $(this).closest('tr');
					var id_event = tr.find('.id_event-value_data').val();
					var nama_event = tr.find('.nama_event-value_data').val();
					var custom_url = tr.find('.custom_url-value_data').val();
					var gambar_qrcode = tr.find('.gambar_qrcode-value_data').val();
					var tanggal_dibuka = tr.find('.tanggal_dibuka-value_data').val();
					var tanggal_ditutup = tr.find('.tanggal_ditutup-value_data').val();
					var jam_dibuka = tr.find('.jam_dibuka-value_data').val();
					var jam_ditutup = tr.find('.jam_ditutup-value_data').val();
					var status = tr.find('.status-value_data').val();
					
					$('#field_id_event-edit').val(id_event);
					$('#field_nama_event-edit').val(nama_event);
					$('#field_custom_url-edit').val(custom_url);
					$('#field_tgl_mulai-edit').val(tanggal_dibuka);
					$('#field_tgl_selesai-edit').val(tanggal_ditutup);
					$('#field_jam_dibuka-edit').val(jam_dibuka);
					$('#field_jam_ditutup-edit').val(jam_ditutup);
				});

				$('#btn-ubah').click(function(e){
					$('#btn-ubah').html('Sedang mengubah..'); // ganti text btn-ubah jadi sedang menambahkan
					$('#btn-ubah').attr('disabled', true);
					
					var startDate = new Date($('#field_tgl_mulai-edit').val());
					var endDate = new Date($('#field_tgl_selesai-edit').val());
					if (endDate < startDate){
						$('#field_tgl_selesai-edit').addClass('is-invalid');
						$('#error_tgl_selesai-edit').html('tanggal berakhir harus tanggal setelah tanggal dimulai');
						$('#btn-ubah').html('x Terjadi kesalahan x');
						setTimeout(() => {
							$('#btn-ubah').html('Ubah');
							$('#btn-ubah').attr('disabled', false);
						}, 2000);
						return false;
					}else{
						$('#field_tgl_selesai-edit').removeClass('is-invalid');
						$('#error_tgl_selesai-edit').html('');
					}

					var startTime = $('#field_jam_dibuka-edit').val();
					var endTime = $('#field_jam_ditutup-edit').val();
					if (endTime < startTime){
						$('#field_jam_ditutup-edit').addClass('is-invalid');
						$('#error_jam_ditutup-edit').html('jam ditutup harus jam setelah jam dibuka');
						$('#btn-ubah').html('x Terjadi kesalahan x');
						setTimeout(() => {
							$('#btn-ubah').html('Ubah');
							$('#btn-ubah').attr('disabled', false);
						}, 2000);
						return false;
					}else if(endTime == startTime){
						$('#field_jam_ditutup-edit').addClass('is-invalid');
						$('#error_jam_ditutup-edit').html('jam ditutup tidak boleh sama dengan jam dibuka');
						$('#btn-ubah').html('x Terjadi kesalahan x');
						setTimeout(() => {
							$('#btn-ubah').html('Ubah');
							$('#btn-ubah').attr('disabled', false);
						}, 2000);
						return false;
					}else{
						$('#field_jam_ditutup-edit').removeClass('is-invalid');
						$('#error_jam_ditutup-edit').html('');
					}

					ubah_event();
					
				});

				function ubah_event(){
					$.ajax({
						url: '<?= base_url(); ?>staff_only/admin/crud_event/ubah/'+$("#field_id_event-edit").val()+'', // URL tujuan
						type: 'POST',
						// data: $("#form-modal form").serialize(),
						data: new FormData(document.getElementById('form-ubah-event')),
						processData:false,
						contentType:false,
						cache:false,
						async:false,
						dataType: 'JSON',
						beforeSend: function() {
							$('#btn-ubah').html('Sedang mengubah..'); // ganti text btn-ubah jadi sedang menambahkan
							$('#btn-ubah').attr('disabled', true);
						},
						success: function(callback){
							if(callback.status == "sukses"){ // Jika Statusnya = sukses

								$('#modal_ubah_event').modal('hide');

								// window.location.reload();
								// Ganti isi dari div view dengan view yang diambil dari view_register.php
								$('#view_tabel_event').html(callback.view_tabel_event);

								const Toast = Swal.mixin({
									toast: true,
									position: 'top-start',
									showConfirmButton: false,
									timer: 5000,
									timerProgressBar: true,
									didOpen: (toast) => {
										toast.addEventListener('mouseenter', Swal.stopTimer)
										toast.addEventListener('mouseleave', Swal.resumeTimer)
									}
								});
								Toast.fire({
									icon: 'success',
									title: callback.pesan
								});

								$('#btn-ubah').html('Ubah'); // ganti text btn-ubah jadi sedang menambahkan
								$('#btn-ubah').attr('disabled', false);

								// setTimeout(() => {
								// 	window.location.reload();
								// }, 2000);

							}else{
								// console.log('callback error');
								// tampil pesan validasi
									if(callback.nama_event_error){
										$('#field_nama_event-edit').addClass('is-invalid');
										$('#error_nama_event-edit').html(callback.nama_event_error);
									}else{
										$('#field_nama_event-edit').removeClass('is-invalid');
										$('#error_nama_event-edit').html('');
									}
									
									if(callback.tgl_mulai_error){
										$('#field_tgl_mulai-edit').addClass('is-invalid');
										$('#error_tgl_mulai-edit').html(callback.tgl_mulai_error);
									}else{
										$('#field_tgl_mulai-edit').removeClass('is-invalid');
										$('#error_tgl_mulai-edit').html('');
									}

									if(callback.tgl_selesai_error){
										$('#field_tgl_selesai-edit').addClass('is-invalid');
										$('#error_tgl_selesai-edit').html(callback.tgl_selesai_error);
									}else{
										$('#field_tgl_selesai-edit').removeClass('is-invalid');
										$('#error_tgl_selesai-edit').html('');
									}

									if(callback.jam_dibuka_error){
										$('#field_jam_dibuka-edit').addClass('is-invalid');
										$('#error_jam_dibuka-edit').html(callback.jam_dibuka_error);
									}else{
										$('#field_jam_dibuka-edit').removeClass('is-invalid');
										$('#error_jam_dibuka-edit').html('');
									}

									if(callback.jam_ditutup_error){
										$('#field_jam_ditutup-edit').addClass('is-invalid');
										$('#error_jam_ditutup-edit').html(callback.jam_ditutup_error);
									}else{
										$('#field_jam_ditutup-edit').removeClass('is-invalid');
										$('#error_jam_ditutup-edit').html('');
									}
								
								$('#btn-ubah').html('x Terjadi kesalahan x');
								setTimeout(() => {
									$('#btn-ubah').html('Ubah');
									$('#btn-ubah').attr('disabled', false);
								}, 2000);
							}
						},
						error: function(xhr, ajaxOptions, thrownError, errorMessage, callback) {
							console.log("error :", errorMessage);
							console.log(callback)
							// alert(xhr.responseText);
							console.log(thrownError + "\r\n" + xhr.status + "\r\n"  + xhr.statusText + "\r\n" + xhr.responseText);
						}
					});
				}
			
			// fungsi detail event
				$('#view_tabel_event').on('click', '.btn-detail-event', function(){
					id_event = $(this).data('id');
					
					var tr = $(this).closest('tr');
					var id_event = tr.find('.id_event-value_data').val();
					var src_qrcode_event = tr.find('.src_qrcode_event-value_data').val();
					var alt_qrcode_event = tr.find('.alt_qrcode_event-value_data').val();
					var download_qrcode_event = tr.find('.download_qrcode_event-value_data').val();
					var nama_event = tr.find('.nama_event-value_data').val();
					var custom_url = tr.find('.custom_url-value_data').val();
					var gambar_qrcode = tr.find('.gambar_qrcode-value_data').val();
					var tanggal_dibuka = tr.find('.tanggal_dibuka-value_data').val();
					var tanggal_ditutup = tr.find('.tanggal_ditutup-value_data').val();
					var jam_dibuka = tr.find('.jam_dibuka-value_data').val();
					var jam_ditutup = tr.find('.jam_ditutup-value_data').val();
					var status = tr.find('.status-value_data').val();
					var petugas_pintu_keluar = tr.find('.petugas_pintu_keluar-value_data').val();
					var nama_area_nama_petugas_pintu_area = tr.find('.nama_area_nama_petugas_pintu_area-value_data').val();
					
					$('#field_qrcode-detail').attr("src", src_qrcode_event);
					$('#field_qrcode-detail').attr("alt", alt_qrcode_event);
					// $('#field_href_qrcode-detail').attr("href", src_qrcode_event);
					$('#field_href_qrcode-detail').attr("download", download_qrcode_event+".png");
					$('#field_nama_event-detail').val(nama_event);
					$('#field_custom_url-detail').val(custom_url);
					$('#field_tgl_mulai-detail').val(tanggal_dibuka);
					$('#field_tgl_selesai-detail').val(tanggal_ditutup);
					$('#field_jam_dibuka-detail').val(jam_dibuka);
					$('#field_jam_ditutup-detail').val(jam_ditutup);
					$('#field_nama_petugas_pintuKeluar-detail').val(petugas_pintu_keluar);
					$('#field_nama_area_nama_petugas_pintuArea-detail').html(nama_area_nama_petugas_pintu_area);
				});

      });
    </script>
