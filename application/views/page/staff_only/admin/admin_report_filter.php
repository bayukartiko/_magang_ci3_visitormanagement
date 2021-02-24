
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Report / filter</h1>
					</div>

                    <div class="card shadow mb-4">
						<!-- Card Header - Dropdown -->
						<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
							<h6 class="m-0 font-weight-bold text-primary">Pilih event untuk filter data</h6>
							<select id="pilih-event" class="form-control w-auto">
								<option value="" selected disabled>Pilih Event</option>
								<?php foreach($all_event as $data_event){ ?>
									<option value="<?= $data_event->id_event ?>"><?= $data_event->nama_event ?></option>
								<?php } ?>
							</select>
						</div>
						<div class="card-body">

							<div id="view_report_filter">
								<?php $this->load->view('page/staff_only/admin/report/view_report_filter', ['id_event'=>null]); ?>
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

	<script>
		$(document).ready(function(){
			$("#pilih-event").on('change', function(){

				$.ajax({
					url: '<?= base_url(); ?>staff_only/admin/ubah_view_report_filter/'+$(this).val()+'', // URL tujuan
					type: 'POST',
					dataType: 'JSON',
					success: function(callback){ // Ketika proses pengiriman berhasil

						// window.location.reload();
						// Ganti isi dari div view dengan view yang diambil dari view_register.php
						$('#view_report_filter').html(callback.view_report_filter);
						
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

			});

		});
	</script>
