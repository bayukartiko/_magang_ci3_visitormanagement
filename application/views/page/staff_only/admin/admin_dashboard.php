
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
                        <div class="col-xl-4 col-md-6 mb-4">
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
                        <div class="col-xl-4 col-md-6 mb-4">
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
						<div class="col-xl-4 col-md-6 mb-4">
							<div class="card border-left-primary shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
												Total Area</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800"><?= $hitung_area ?></div>
										</div>
										<div class="col-auto">
											<i class="fas fa-store-alt fa-2x text-gray-300"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
                    </div>

                    <!-- Chart Status visitor -->

						<div id="view_chart_total_visitor_perArea">
							<?php $this->load->view('chart/status_visitor'); ?>
						</div>

					<!-- Chart total visitor per area -->

						<div id="view_chart_total_visitor_perArea">
							<?php $this->load->view('chart/total_visitor_perArea'); ?>
						</div>

                    <!-- Chart status staff -->

						<div id="view_chart_status_staff">
							<?php $this->load->view('chart/status_staff', ['hitung_staff_online'=>$hitung_staff_online, 'hitung_staff_offline'=>$hitung_staff_offline]); ?>
						</div>

                    <!-- Chart Total staff -->

						<div id="view_chart_total_staff">
							<?php $this->load->view('chart/total_staff', ['hitung_staff_admin'=>$hitung_staff_admin, 'hitung_staff_petugas'=>$hitung_staff_petugas]); ?>
						</div>
					
					<div class="card shadow mb-4">
						<!-- Card Header - Dropdown -->
						<div
							class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
							<h6 class="m-0 font-weight-bold text-primary">Visitor Recent Activity</h6>
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
						<table id="tabel_recent_actifity" class="table table-striped table-bordered table-hover table-responsive-sm" style="width:100%">
							<thead>
								<tr>
									<th>Nama</th>
									<th>Perusahaan</th>
									<th>Area</th>
									<th>Waktu masuk</th>
									<th>Waktu keluar</th>
									<th>aksi</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>Tiger Nixon</td>
									<td>Edinburgh</td>
									<td>area 1</td>
									<td>2011/04/25 13:55:41</td>
									<td>2011/04/25 14:01:37</td>
									<td>
										<button class="btn btn-primary">Info Visitor</button>
									</td>
								</tr>
								<tr>
									<td>Tiger Nixon</td>
									<td>Edinburgh</td>
									<td>area 1</td>
									<td>2011/04/25 13:55:41</td>
									<td>2011/04/25 14:01:37</td>
									<td>
										<button class="btn btn-primary">Info Visitor</button>
									</td>
								</tr>
								<tr>
									<td>Tiger Nixon</td>
									<td>Edinburgh</td>
									<td>area 1</td>
									<td>2011/04/25 13:55:41</td>
									<td>2011/04/25 14:01:37</td>
									<td>
										<button class="btn btn-primary">Info Visitor</button>
									</td>
								</tr>
							</tbody>
							<tfoot>
								<tr>
									<th>Nama</th>
									<th>Perusahaan</th>
									<th>Area</th>
									<th>Waktu masuk</th>
									<th>Waktu keluar</th>
									<th>aksi</th>
								</tr>
							</tfoot>
						</table>
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
		$(document).ready(function() {
			$('#tabel_recent_actifity').DataTable();
		});
	</script>

    