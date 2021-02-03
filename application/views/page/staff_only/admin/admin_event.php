
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
							<?php $this->load->view('tabel/tabel_event', ['all_event' => $all_event, 'all_area' => $all_area]); ?>
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

    <!-- event modal -->
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
									<div class="offset-md-1 col-md-5">
										<div class="form-group">
											<label class="bmd-label-floating text-gray-800" for="field_tgl_mulai">Tanggal Mulai</label>
											<input type="datetime-local" class="form-control" id="field_tgl_mulai" name="tgl_mulai" value="<?= set_value('tgl_mulai') ?>"/>

											<small id="error_tgl_mulai" class="invalid-feedback"></small>
										</div>
									</div>
									<div class="col-md-5">
										<div class="form-group">
											<label class="bmd-label-floating text-gray-800" for="field_tgl_selesai">Tanggal Selesai</label>
											<input type="datetime-local" class="form-control" id="field_tgl_selesai" name="tgl_selesai" value="<?= set_value('tgl_selesai') ?>"/>

											<small id="error_tgl_selesai" class="invalid-feedback"></small>
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
													<td>
														<select name="namaPetugas[]" class="form-control field_nama_petugas">
															<option value="" disabled selected>Pilih petugas</option>
															<?php foreach($staff_nganggur as $staff_data){ ?>
																<option value="<?= $staff_data->staff_id ?>"><?= $staff_data->nama ?></option>
															<?php } ?>
														</select>
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
		
    <script>
      $(document).ready(function () {
				// $('.field_nama_petugas').select2({
				// 	theme: 'bootstrap4',
				// });

				$('#modal_tambah_event').on('hidden.bs.modal', function (e){ // Ketika Modal Dialog di Close / tertutup
					$('#modal_tambah_event input, #modal_tambah_event select, #modal_tambah_event datetime-local').val(''); // Clear inputan menjadi kosong
					$('#btn-simpan').html('Tambah');
				});

				var nextform = ""; 
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
							'<td>'+
								'<select name="namaPetugas[]" class="form-control field_nama_petugas">'+
									'<option value="" disabled selected>Pilih petugas</option>'+
									'<?php foreach($staff_nganggur as $staff_data){ ?>'+
										'<option value="<?= $staff_data->staff_id ?>"><?= $staff_data->nama ?></option>'+
									'<?php } ?>'+
								'</select>'+
							'</td>'+
							'<td><a class="btn btn-danger" id="remove-form"><i class="fas fa-trash"></i></a></td>'+
						'</tr>'
						);
					
					$("#jumlah-form").val(nextform); // Ubah value textbox jumlah-form dengan variabel nextform
				});

				$("body").on("click", "#remove-form", function () {
					$(this).parents("tr").remove();
					// $('#error').html('');
					// var nextform = jumlah - 1; // kirangi 1 untuk jumlah form nya
					var jumlah = parseInt($("#jumlah-form").val()); // Ambil jumlah data form pada textbox jumlah-form
					nextform = jumlah - 1;
					$("#jumlah-form").val(nextform);
				});


				// fungsi tambah event
					$('#btn-simpan').click(function(e){ // Ketika tombol simpan didalam modal di klik
						e.preventDefault();
						$('#btn-simpan').html('Sedang menambahkan..'); // ganti text btn-simpan jadi sedang menambahkan
						$('#btn-simpan').attr('disabled', true);

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
									$('#view_tabel_event').html(callback.view_tabel_staff);
									// $('#view_chart_status_staff').html(callback.view_chart_status_staff);
									// $('#view_chart_total_staff').html(callback.view_chart_total_staff);
									// $('#pesan-sukses').html(callback.pesan).fadeIn().delay(10000).fadeOut();
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

									$('#btn-simpan').html('Simpan'); // ganti text btn-simpan jadi sedang menambahkan
									$('#btn-simpan').attr('disabled', false);

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


      });
    </script>
