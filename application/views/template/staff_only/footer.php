
	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('staff_only/admin/logout') ?>">Logout</a>
                </div>
            </div>
        </div>
	</div>

	<!-- Core plugin JavaScript-->
	<script src="<?= base_url() ?>assets/jquery-easing/jquery.easing.min.js"></script>
	
	<!-- sweetalert -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.3.5/sweetalert2.all.min.js" integrity="sha512-rQGS49+CfE3nYVbZ4JFwdUrwZwHMnvNz611lVFevMeKN8HG7z/Sep0K91rjMbL4da6VSmOxk4hSXrhK0M+nDnQ==" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/10.3.5/sweetalert2.min.css" integrity="sha512-NU255TKQ55xzDS6UHQgO9HQ4jVWoAEGG/lh2Vme0E2ymREox7e8qwIfn6BFem8lbahhU9E2IQrHZlFAxtKWH2Q==" crossorigin="anonymous" />

    <!-- Custom scripts for all pages-->
	<script src="<?= base_url() ?>assets/sba2/js/sb-admin-2.min.js"></script>
	
	<!-- highcharts -->
	<script src="<?= base_url() ?>assets/Highcharts/code/highcharts.js"></script>
	<script src="<?= base_url() ?>assets/Highcharts/code/modules/exporting.js"></script>
	<script src="<?= base_url() ?>assets/Highcharts/code/modules/export-data.js"></script>
	<script src="<?= base_url() ?>assets/Highcharts/code/modules/accessibility.js"></script>

	<!-- select2 -->
	<!-- <script src="</?= base_url() ?>vendor/select2/dist/js/select2.min.js"></script> -->
	<script>
		$(document).ready(function(){
			function aktivasi_event_otomatis(){
				$.ajax({
					url: '<?= base_url(); ?>staff_only/admin/aktivasi_event_otomatis', // URL tujuan
					type: 'POST', // Tentukan type nya POST atau GET
					// data: new FormData(document.getElementById('modal_hapus_event')),
					// processData:false,
					// contentType:false,
					// cache:false,
					// async:false,
					dataType: 'JSON',
					success: function(callback){ // Ketika proses pengiriman berhasil

						callback.forEach(callback_data => {
							if(callback_data.status == "sukses"){
	
								// Ganti isi dari div view dengan view yang diambil dari view_register.php
								if($('#view_tabel_event').is(':visible')){
									$('#view_tabel_event').html(callback_data.view_tabel_event);
								}

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
									icon: 'info',
									title: callback_data.pesan
								});
	
							}
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
			setInterval(function(){
				<?php if($this->session->userdata("nama")){ ?> // jika ada session [gk jalan]
					<?php if($this->session->userdata("role_id") == "1"){ ?> // jika user saat ini adalah admin [gk jalan]
						aktivasi_event_otomatis();
					<?php } ?> // [gk jalan]
				<?php } ?> // [gk jalan]
			}, 10000); // 10 detik
		});
	</script>
	<!-- buat event baru bug:
pilih petugas area pas klik tambah gk reload [abis hapus]-->


</body>


</html>
