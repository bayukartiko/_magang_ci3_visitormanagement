
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Register / Daftar Staff</h1>

						<!-- <div class="float-right">
							abc
						</div> -->
					</div>
					
					<!-- Content Row -->
                    <div class="row">
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Staff</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
												<span id="total_staff">
													<?= $hitung_staff ?>
												</span>
											</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Staff Admin</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
												<span id="total_staff_admin">
													<?= $hitung_staff_admin ?>
												</span>
											</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Staff Petugas</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
												<span id="total_staff_petugas">
													<?= $hitung_staff_petugas ?>
												</span>
											</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					
					<div class="card shadow mb-4">
						<!-- Card Header - Dropdown -->
						<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
							<h6 class="m-0 font-weight-bold text-primary">List data staff</h6>
							<!-- <div class="dropdown no-arrow">
								<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
									data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
								</a>
								<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
									aria-labelledby="dropdownMenuLink">
									<div class="dropdown-header">Dropdown Header:</div>
									<a class="dropdown-item" href="#">Action</a>
									<a class="dropdown-item" href="#">Another action</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="#">Something else here</a>
								</div>
							</div> -->
						</div>
						<!-- Card Body -->
						<div class="card-body">
							<button class="btn btn-primary" data-toggle="modal" data-target="#modal_tambah_staff">Tambah staff baru</button>
							<br><br>
							
							<div id="view_tabel_staff">
								<?php $this->load->view('tabel/tabel_staff', ['all_staff'=>$all_staff, 'all_role'=>$all_role, 'all_area'=>$all_area, 'all_event'=>$all_event]); ?>
							</div>
						</div>
					</div>

					<hr>

					<!-- Chart status staff -->

						<div id="view_chart_status_staff">
							<?php $this->load->view('chart/status_staff', ['hitung_staff_online'=>$hitung_staff_online, 'hitung_staff_offline'=>$hitung_staff_offline]); ?>
						</div>

					<!-- Chart Total staff -->

						<div id="view_chart_total_staff">
							<?php $this->load->view('chart/total_staff', ['hitung_staff_admin'=>$hitung_staff_admin, 'hitung_staff_petugas'=>$hitung_staff_petugas]); ?>
						</div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
	<!-- End of Page Wrapper -->

	<!-- modal tambah staff-->
		<div class="modal fade" id="modal_tambah_staff" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Form tambah staff baru</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<form id="form-tambah-staff" enctype="multipart/form-data" action="" class="" method="POST">
							<div class="form-row">
								<div class="form-group col-md-6">
									<label for="field_username">Username</label>
									<input type="text" class="form-control" id="field_username" name="username" placeholder="masukkan username" value="<?= set_value('username') ?>">
									
									<small id="error_username" class="invalid-feedback"></small>
								</div>
								<div class="form-group col-md-6">
									<label for="field_password">Password</label>
									<input type="password" class="form-control" id="field_password" name="password" placeholder="masukkan password" value="<?= set_value('password') ?>">

									<small id="error_password" class="invalid-feedback"></small>
								</div>
							</div>
							<div class="form-group">
								<label for="field_nama">Nama</label>
								<input type="text" class="form-control" id="field_nama" name="nama" placeholder="Masukkan nama staff" value="<?= set_value('nama') ?>">

								<small id="error_nama" class="invalid-feedback"></small>
							</div>
							<div class="form-group">
								<label for="field_jabatan">Jabatan</label>
								<select name="jabatan" id="field_jabatan" class="form-control">
								<!-- <select name="jabatan" id="field_jabatan" class="form-control" data-live-search="true" multiple> -->
									<option value="" selected disabled>Pilih Jabatan</option>
									<option value="1">admin</option>
									<option value="2">petugas</option>
								</select>

								<small id="error_jabatan" class="invalid-feedback"></small>
							</div>
						</form>
					</div>
					<div class="modal-footer">
						<button type="submit" class="btn btn-primary btn-raised" id="btn-simpan">Simpan</button>
						<button class="btn btn-transparent" type="button" data-dismiss="modal">Batal</button>
					</div>
				</div>
			</div>
		</div>
	<!-- modal detail staff -->
		<div class="modal fade" id="modal_detail_staff" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Detail staff</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						<fieldset disabled="disabled">
							<div class="form-group">
								<label for="username_detail">Username</label>
								<input type="text" class="form-control" id="username_detail" disabled>
							</div>
							<div class="form-group">
								<label for="nama_detail">Nama</label>
								<input type="text" class="form-control" id="nama_detail" disabled>
							</div>
							<div class="form-group">
								<label for="jabatan_detail">Jabatan</label>
								<select id="jabatan_detail" class="form-control" disabled>
									<option value="" selected disabled>Pilih Jabatan</option>
									<option value="1">admin</option>
									<option value="2">petugas</option>
								</select>
							</div>
							<div class="form-group">
								<label for="nama_area_detail">Bertugas di</label>
								<input type="text" class="form-control" id="nama_area_detail" disabled>
							</div>
							<div class="form-group">
								<label for="verified_detail">Terverifikasi?</label>
								<input type="text" class="form-control" id="verified_detail" disabled>
							</div>
							<div class="form-group">
								<label for="status_detail">Status</label><br>
								<button id="status_detail" class="btn btn-outline-info"></button>
							</div>
						</fieldset>
					</div>
					<div class="modal-footer">
						<div class="mr-auto">
							<!-- <button class="btn btn-secondary" type="button">edit</button>
							<button class="btn btn-danger" type="button" id="btn-hapus">Hapus</button> -->
						</div>
						| <button class="btn btn-primary" type="button" data-dismiss="modal">Mengerti</button>
					</div>
				</div>
			</div>
		</div>
	<!-- modal hapus staff -->
		<div class="modal fade" id="modal_hapus_staff" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
			aria-hidden="true">
			<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">Hapus staff</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
					</div>
					<div class="modal-body">
						Anda yakin ingin menghapus staff ini?
						<br>
						Ini akan bersifat permanen!
					</div>
					<div class="modal-footer">
						<button class="btn btn-danger" type="button" id="btn-hapus" data-dismiss="modal">Hapus</button>
						<button class="btn btn-transparent" type="button" id="btn-hapus" data-dismiss="modal">Batal</button>
					</div>
				</div>
			</div>
		</div>
	<script>
		$(document).ready(function() {
			$('#view_tabel_staff #tabel_list_staff').DataTable();
			var id = "";

			$('#modal_tambah_staff').on('hidden.bs.modal', function (e){ // Ketika Modal Dialog di Close / tertutup
				$('#modal_tambah_staff input, #modal_tambah_staff select, #modal_tambah_staff textarea, #modal_tambah_staff password').val(''); // Clear inputan menjadi kosong
				$('#btn-simpan').html('Simpan');
			});
			
			$('#view_tabel_staff').on('click', '.btn-detail-staff', function(){
				id = $(this).data('id'); // Set variabel id dengan id yang kita set pada atribut data-id pada tag button edit
				
				var tr = $(this).closest('tr');
				var staff_id = tr.find('.staff_id-value_detail').val();
				var role_id = tr.find('.role_id-value_detail').val();
				var username = tr.find('.username-value_detail').val();
				var nama = tr.find('.nama-value_detail').val();
				var id_area = tr.find('.id_area-value_detail').val();
				var verified = tr.find('.verified-value_detail').val();
				var role = tr.find('.role-value_detail').val();
				var is_active = tr.find('.is_active-value_detail').val();
				
				$('#username_detail').val(username);
				$('#nama_detail').val(nama);
				if(role_id == '1'){
					$('#jabatan_detail option[value=1]').attr('selected', 'selected');
				}else if(role_id == '2'){
					$('#jabatan_detail option[value=2]').attr('selected', 'selected');
				}
				$('#nama_area_detail').val(id_area);
				if(verified == '1'){
					$('#verified_detail').val('ya');
				}else{
					$('#verified_detail').val('tidak');
				}
				$('#status_detail').html(is_active);

			});

			$('#btn-simpan').click(function(e){ // Ketika tombol simpan didalam modal di klik
				e.preventDefault();
				$('#btn-simpan').html('Sedang menambahkan..'); // ganti text btn-simpan jadi sedang menambahkan
				$('#btn-simpan').attr('disabled', true);
				tambah_staff();
			});

			$('#view_tabel_staff').on('click', '.btn-hapus-staff', function(){
				id = $(this).data('id');
			});
			$('#btn-hapus').click(function(e){
				$('#btn-hapus').html('Sedang menghapus..');
				$('#btn-hapus').attr('disabled', true);
				hapus_staff();
			});

			function tambah_staff(){
				$.ajax({
					url: '<?= base_url(); ?>staff_only/admin/crud_staff/tambah/'+null+'', // URL tujuan
					type: 'POST',
					// data: $("#form-modal form").serialize(),
					data: new FormData(document.getElementById('form-tambah-staff')),
					processData:false,
					contentType:false,
					cache:false,
					async:false,
					dataType: 'JSON',
					beforeSend: function() {
						// $('#loading-simpan').show(); // Munculkan loading simpan
						$('#btn-simpan').html('Sedang menambahkan..'); // ganti text btn-simpan jadi sedang mendaftar
					},
					success: function(callback){
						// console.log('sukses');
						// console.log(callback)

						if(callback.status == "sukses"){ // Jika Statusnya = sukses
							// console.log('callback sukses');
							

							$('#modal_tambah_staff').modal('hide');

							$('#total_staff').html(callback.total_staff)
							$('#total_staff_admin').html(callback.total_staff_admin)
							$('#total_staff_petugas').html(callback.total_staff_petugas)

							// window.location.reload();
							// Ganti isi dari div view dengan view yang diambil dari view_register.php
							$('#view_tabel_staff').html(callback.view_tabel_staff);
							$('#view_chart_status_staff').html(callback.view_chart_status_staff);
							$('#view_chart_total_staff').html(callback.view_chart_total_staff);
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
								if(callback.username_error){
									$('#field_username').addClass('is-invalid');
									$('#error_username').html(callback.username_error);
								}else{
									$('#field_username').removeClass('is-invalid');
									$('#error_username').html('');
								}
								
								if(callback.password_error){
									$('#field_password').addClass('is-invalid');
									$('#error_password').html(callback.password_error);
								}else{
									$('#field_password').removeClass('is-invalid');
									$('#error_password').html('');
								}

								if(callback.nama_error){
									$('#field_nama').addClass('is-invalid');
									$('#error_nama').html(callback.nama_error);
								}else{
									$('#field_nama').removeClass('is-invalid');
									$('#error_nama').html('');
								}

								if(callback.jabatan_error){
									$('#field_jabatan').addClass('is-invalid');
									$('#error_jabatan').html(callback.jabatan_error);
								}else{
									$('#field_jabatan').removeClass('is-invalid');
									$('#error_jabatan').html('');
								}
							
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

			function hapus_staff(){
				$.ajax({
					url: '<?= base_url(); ?>staff_only/admin/crud_staff/hapus/'+id+'', // URL tujuan
					type: 'POST', // Tentukan type nya POST atau GET
					// data: new FormData(document.getElementById('modal_hapus_staff')),
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
						$('#modal_hapus_staff').modal('hide'); // Close / Tutup Modal Dialog

						$('#total_staff').html(callback.total_staff)
						$('#total_staff_admin').html(callback.total_staff_admin)
						$('#total_staff_petugas').html(callback.total_staff_petugas)

						// window.location.reload();
						// Ganti isi dari div view dengan view yang diambil dari view_register.php
						$('#view_tabel_staff').html(callback.view_tabel_staff);
						$('#view_chart_status_staff').html(callback.view_chart_status_staff);
						$('#view_chart_total_staff').html(callback.view_chart_total_staff);
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

		});
	</script>

    