	
	<!-- footer -->
		<footer class="footer" data-background-color="black">
			<div class="container">
				<nav class="float-left">
					<ul>
						<li>
							<a href="https://www.creative-tim.com/">
								Creative Tim
							</a>
						</li>
						<li>
							<a href="https://www.creative-tim.com/presentation">
								About Us
							</a>
						</li>
						<li>
							<a href="https://www.creative-tim.com/blog">
								Blog
							</a>
						</li>
						<li>
							<a href="https://www.creative-tim.com/license">
								Licenses
							</a>
						</li>
					</ul>
				</nav>
				<div class="copyright float-right">
					&copy;
					<script>
						// document.write(new Date().getFullYear())
					</script>, made with <i class="material-icons">favorite</i> by
					<a href="https://www.creative-tim.com/" target="_blank">Creative Tim</a> for a better web.
				</div>
			</div>
		</footer>
	<!-- end footer -->

	<!--   Core JS Files   -->
	<script src="./assets/js/core/jquery.min.js" type="text/javascript"></script>
	<script src="./assets/js/core/popper.min.js" type="text/javascript"></script>
	<script src="./assets/js/core/bootstrap-material-design.min.js" type="text/javascript"></script>
	
	<!--	Plugin for the Datepicker, full documentation here: https://github.com/Eonasdan/bootstrap-datetimepicker -->
		<script src="./assets/js/plugins/moment.min.js"></script>
	<script src="./assets/js/plugins/bootstrap-datetimepicker.js" type="text/javascript"></script>
	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="./assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
	<!--  Google Maps Plugin    -->
	<!-- Control Center for Material Kit: parallax effects, scripts for the example pages etc -->
	<script src="./assets/js/material-kit.js?v=2.0.7" type="text/javascript"></script>
	<script>
		$(document).ready(function() {
			//init DateTimePickers
			materialKit.initFormExtendedDatetimepickers();

			// Sliders Init
			// materialKit.initSliders();
		});

		function scrollToDownload() {
			if ($('.section-download').length != 0) {
				$("html, body").animate({
					scrollTop: $('.section-download').offset().top
				}, 1000);
			}
		}

		$(document).ready(function(){
			// $("#loading-simpan, #loading-ubah, #loading-hapus, #pesan-error, #pesan-sukses").hide();

			// $('#form-register').on('hidden.bs.modal', function (e){ // Ketika Modal Dialog di Close / tertutup
			// 	$('#form-register input, #form-register select, #form-register textarea').val(''); // Clear inputan menjadi kosong
			// 	$('#pesan-error').hide();
			// });

			// $('#btn-simpan').click(function(){ // Ketika tombol tambah diklik
			// 	$('#form-register input, #form-register select, #form-register textarea').val(''); // Clear inputan menjadi kosong
			// 	$('#pesan-error').hide();
			// 	// $('#loading-simpan').hide();
			// 	$('#btn-simpan').html('Daftar');
			// });

			$('#btn-simpan').click(function(e){ // Ketika tombol simpan didalam modal di klik
				e.preventDefault();
				// $('#loading-simpan').show(); // Munculkan loading simpan
				$('#btn-simpan').html('Sedang mendaftar..'); // ganti text btn-simpan jadi sedang mendaftar

				$.ajax({
					url: '<?= base_url(); ?>main_controller/register', // URL tujuan
					type: 'POST',
					// data: $("#form-modal form").serialize(),
					data: new FormData(document.getElementById('form-register')),
					processData:false,
					contentType:false,
					cache:false,
					async:false,
					dataType: 'JSON',
					beforeSend: function() {
						// $('#loading-simpan').show(); // Munculkan loading simpan
						$('#btn-simpan').html('Sedang mendaftar..'); // ganti text btn-simpan jadi sedang mendaftar
					},
					success: function(callback){
						console.log('sukses');
						console.log(callback)

						if(callback.status == "sukses"){ // Jika Statusnya = sukses
							console.log('callback sukses');
							

							$('#Modalregister').modal('hide');

							// window.location.reload();
							// Ganti isi dari div view dengan view yang diambil dari view_register.php
							$('#view').html(callback.html);
							// $('#pesan-sukses').html(callback.pesan).fadeIn().delay(10000).fadeOut();

						}else{
							console.log('callback error');
							// tampil pesan validasi
								if(callback.nama_depan_error){
									$('#field_nama_depan').addClass('has-danger');
									$('#error_nama_depan').html(callback.nama_depan_error);
								}else{
									$('#field_nama_depan').removeClass('has-danger');
									$('#error_nama_depan').html('');
								}
								
								if(callback.nama_belakang_error){
									$('#field_nama_belakang').addClass('has-danger');
									$('#error_nama_belakang').html(callback.nama_belakang_error);
								}else{
									$('#field_nama_belakang').removeClass('has-danger');
									$('#error_nama_belakang').html('');
								}

								if(callback.nama_perusahaan_error){
									$('#field_nama_perusahaan').addClass('has-danger');
									$('#error_nama_perusahaan').html(callback.nama_perusahaan_error);
								}else{
									$('#field_nama_perusahaan').removeClass('has-danger');
									$('#error_nama_perusahaan').html('');
								}

								if(callback.jabatan_error){
									$('#field_jabatan').addClass('has-danger');
									$('#error_jabatan').html(callback.jabatan_error);
								}else{
									$('#field_jabatan').removeClass('has-danger');
									$('#error_jabatan').html('');
								}

								if(callback.email_pribadi_error){
									$('#field_email_pribadi').addClass('has-danger');
									$('#error_email_pribadi').html(callback.email_pribadi_error);
								}else{
									$('#field_email_pribadi').removeClass('has-danger');
									$('#error_email_pribadi').html('');
								}

								if(callback.email_perusahaan_error){
									$('#field_email_perusahaan').addClass('has-danger');
									$('#error_email_perusahaan').html(callback.email_perusahaan_error);
								}else{
									$('#field_email_perusahaan').removeClass('has-danger');
									$('#error_email_perusahaan').html('');
								}

								if(callback.notlp_pribadi_error){
									$('#field_notlp_pribadi').addClass('has-danger');
									$('#error_notlp_pribadi').html(callback.notlp_pribadi_error);
								}else{
									$('#field_notlp_pribadi').removeClass('has-danger');
									$('#error_notlp_pribadi').html('');
								}

								if(callback.notlp_perusahaan_error){
									$('#field_notlp_perusahaan').addClass('has-danger');
									$('#error_notlp_perusahaan').html(callback.notlp_perusahaan_error);
								}else{
									$('#field_notlp_perusahaan').removeClass('has-danger');
									$('#error_notlp_perusahaan').html('');
								}

								if(callback.alasan_error){
									$('#field_alasan').addClass('has-danger');
									$('#error_alasan').html(callback.alasan_error);
								}else{
									$('#field_alasan').removeClass('has-danger');
									$('#error_alasan').html('');
								}
							
							$('#btn-simpan').html('x Terjadi kesalahan x');
							setTimeout(() => {
								$('#btn-simpan').html('Daftar');
							}, 2000);
						}
					},
					error: function(xhr, ajaxOptions, thrownError, errorMessage, callback) {
						console.log("error :", errorMessage);
						console.log(callback)
						// alert(xhr.responseText);
						console.log(thrownError + "\r\n" + xhr.status + "\r\n"  + xhr.statusText + "\r\n" + xhr.responseText);
						
						// console.warn(jqxhr);
						// console.debug(xhr); 
						// console.debug(error);
					}
				});
			});
		});
		
		
	</script>
</body>

</html>
