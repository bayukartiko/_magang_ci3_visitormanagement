
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
						<div class="row">
							<div class="col-xl-6">
                        		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
							</div>
							<div class="col-xl-6">
								<!-- <select class="custom-select">
									<option selected disabled>Pilih event</option>
									<option value="1">event 1</option>
									<option value="2">event 2</option>
									<option value="3">event 3</option>
									<option value="etc...">tec...</option>
								</select> -->
							</div>
						</div>

						<!-- <div class="float-right">
							abc
						</div> -->
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Visitor</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $hitung_visitor; ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Total Staff</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $hitung_staff ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<!-- <div class="col-xl-3 col-md-6 mb-4">
							<div class="card border-left-primary shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
												Total Event</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $hitung_event ?></div>
										</div>
										<div class="col-auto">
											<i class="fas fa-building fa-2x text-gray-300"></i>
										</div>
									</div>
								</div>
							</div>
						</div> -->
						<!-- <div class="col-xl-4 col-md-6 mb-4">
							<div class="card border-left-primary shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
												Total Area</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800"></?= $hitung_area ?></div>
										</div>
										<div class="col-auto">
											<i class="fas fa-store-alt fa-2x text-gray-300"></i>
										</div>
									</div>
								</div>
							</div>
						</div> -->
                    </div>

                    <!-- Chart Status visitor -->

						<!-- <div id="view_chart_total_visitor_perArea">
							</?php $this->load->view('chart/status_visitor'); ?>
						</div> -->

					<!-- Chart total visitor per area -->

						<!-- <div id="view_chart_total_visitor_perArea">
							</?php $this->load->view('chart/total_visitor_perArea'); ?>
						</div> -->

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
	
	<script>
		$(document).ready(function() {
			$('#tabel_recent_actifity').DataTable();
		});
	</script>

    