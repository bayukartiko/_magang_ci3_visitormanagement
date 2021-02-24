<?php if($id_event == null){ ?>
	<div class="text-right float-right">
		<i class="fas fa-arrow-up fa-5x"></i>
		<h3>Pilih event untuk menampilkan menu filter</h3>
	</div>
<?php }else{ ?>
	<form action="<?= base_url('staff_only/admin/aksi_print_report_filter'); ?>" enctype="multipart/form-data" id="form_report_filter" method="POST">
		<input type="hidden" name="id_event" id="event_id" value="<?= $id_event ?>">
		<div class="row">
			<div class="col-md-6">
				<label for="daritgl">Dari Tanggal</label>
				<input type="datetime-local" name="daritgl" id="daritgl" class="form-control">
				<span class="text-danger invalid-feedback" id="error_daritgl"></span>
			</div>
			<div class="col-md-6">
				<label for="smptgl">Sampai Tanggal</label>
				<input type="datetime-local" name="smptgl" id="smptgl" class="form-control">
				<span class="text-danger invalid-feedback" id="error_smptgl"></span>
			</div>
		</div>
		<br>
		<button type="submit" class="btn btn-primary float-right">Generate Report</button>
	</form>

	<br>

	<!-- <button class="btn btn-primary float-right" id="btn_generate_report_filter">Generate report</button> -->
	<script>
		$(document).ready(function(){
			// generate report filter data visitor
				$("#btn_generate_report_filter").click(function(){
					$(this).html('Sedang memproses..');
					$(this).attr('disabled', true);

					var startDate = new Date($('#form_report_filter #daritgl').val());
					var endDate = new Date($('#form_report_filter #smptgl').val());

					if (endDate < startDate || isNaN(startDate)){
						$('#form_report_filter #smptgl').addClass('is-invalid');
						$('#form_report_filter #error_smptgl').html('tanggal/waktu ini harus tanggal/waktu setelah tanggal/waktu awal');
						$('#btn_generate_report_filter').html('x Terjadi kesalahan x');
						setTimeout(() => {
							$('#btn_generate_report_filter').html('Generate Report');
							$('#btn_generate_report_filter').attr('disabled', false);
						}, 2000);
						return false;
					}else{
						$('#form_report_filter #smptgl').removeClass('is-invalid');
						$('#form_report_filter #error_smptgl').html('');
					}

					// generate_report_filter(startDate, endDate);
				});

				function generate_report_filter($daritgl, $smptgl){
					$.ajax({
						url: '<?= base_url(); ?>staff_only/admin/aksi_print_report_filter/'+$("#event_id").val()+'', // URL tujuan
						type: 'POST',
						// data: $("#form-modal form").serialize(),
						data: new FormData(document.getElementById('form_report_filter')),
						processData:false,
						contentType:false,
						cache:false,
						async:false,
						dataType: 'JSON',
						success: function(callback){ // Ketika proses pengiriman berhasil

							// window.location.reload();
							// Ganti isi dari div view dengan view yang diambil dari view_register.php
							// $('#view_report_filter').html(callback.view_report_filter);
							
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

<?php } ?>

