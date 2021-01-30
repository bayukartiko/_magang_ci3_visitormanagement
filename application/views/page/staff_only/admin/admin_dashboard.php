
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

                    <!-- Content Row -->

                        <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Status visitor</h6>
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
									<div class="row">
										<div class="col-md-6">
											<table class="table table-hover table-responsive-sm">
												<tbody>
													<tr>
														<td>Masuk</td>
														<td><button class="btn btn-outline-primary"><?= $hitung_visitor_loggedin ?></button></td>
													</tr>
													<tr>
														<td>Keluar</td>
														<td><button class="btn btn-outline-secondary"><?= $hitung_visitor_loggedout ?></button></td>
													</tr>
													<tr>
														<td>Di dalam area</td>
														<td><button class="btn btn-outline-secondary"><?= $hitung_visitor_inarea ?></button></td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="col-md-6">
											<div class="chart-pie pt-4 pb-2">
												<canvas id="status_visitor_chart"></canvas>
											</div>
												<script>
													// Set new default font family and font color to mimic Bootstrap's default styling
													Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
													Chart.defaults.global.defaultFontColor = '#858796';

													// Pie Chart Example
													var ctx = document.getElementById("status_visitor_chart");
													var myPieChart = new Chart(ctx, {
														type: 'doughnut',
														data: {
															labels: ['Masuk', 'Keluar', 'Di dalam area'],
															datasets: [{
																data: [<?= $hitung_visitor_loggedin ?>, <?= $hitung_visitor_loggedout ?>, <?= $hitung_visitor_inarea ?>],
																backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
																hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
																hoverBorderColor: "rgba(234, 236, 244, 1)",
															}],
														},
														options: {
															maintainAspectRatio: false,
															tooltips: {
																backgroundColor: "rgb(255,255,255)",
																bodyFontColor: "#858796",
																borderColor: '#dddfeb',
																borderWidth: 1,
																xPadding: 15,
																yPadding: 15,
																displayColors: false,
																caretPadding: 10,
															},
															legend: {
																display: false
															},
															cutoutPercentage: 80,
														},
													});

												</script>
											<div class="mt-4 text-center small">
												<span class="mr-2">
													<i class="fas fa-circle text-primary"></i> Masuk
												</span>
												<span class="mr-2">
													<i class="fas fa-circle text-success"></i> Keluar
												</span>
												<span class="mr-2">
													<i class="fas fa-circle text-info"></i> Di dalam area
												</span>
											</div>
										</div>
									</div>
                                </div>
                            </div>

                    <!-- Content Row -->

                        <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Status staff</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
                                            aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Pilih Staff:</div>
                                            <a class="dropdown-item" href="#">Admin</a>
                                            <a class="dropdown-item" href="#">Petugas</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Semua Staff</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
									<div class="row">
										<div class="col-md-6">
											<table class="table table-hover table-responsive-sm">
												<tbody>
													<tr>
														<td>online</td>
														<td><button class="btn btn-outline-primary"><?= $hitung_staff_online ?></button></td>
													</tr>
													<tr>
														<td>offline</td>
														<td><button class="btn btn-outline-secondary"><?= $hitung_staff_offline ?></button></td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="col-md-6">
											<div class="chart-pie pt-4 pb-2">
												<canvas id="status_staff_chart"></canvas>
											</div>
											<script>
												// Set new default font family and font color to mimic Bootstrap's default styling
												Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
												Chart.defaults.global.defaultFontColor = '#858796';

												// Pie Chart Example
												var ctx = document.getElementById("status_staff_chart");
												var myPieChart = new Chart(ctx, {
													type: 'doughnut',
													data: {
														labels: ['online', 'offline'],
														datasets: [{
															data: [<?= $hitung_staff_online ?>, <?= $hitung_staff_offline ?>],
															backgroundColor: ['#4e73df', '#1cc88a'],
															hoverBackgroundColor: ['#2e59d9', '#17a673'],
															hoverBorderColor: "rgba(234, 236, 244, 1)",
														}],
													},
													options: {
														maintainAspectRatio: false,
														tooltips: {
															backgroundColor: "rgb(255,255,255)",
															bodyFontColor: "#858796",
															borderColor: '#dddfeb',
															borderWidth: 1,
															xPadding: 15,
															yPadding: 15,
															displayColors: false,
															caretPadding: 10,
														},
														legend: {
															display: false
														},
														cutoutPercentage: 80,
													},
												});

											</script>
											<div class="mt-4 text-center small">
												<span class="mr-2">
													<i class="fas fa-circle text-primary"></i> online
												</span>
												<span class="mr-2">
													<i class="fas fa-circle text-success"></i> offline
												</span>
											</div>
										</div>
									</div>
                                </div>
                            </div>

                    <!-- Content Row -->

                        <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Total staff</h6>
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
									<div class="row">
										<div class="col-md-6">
											<table class="table table-hover table-responsive-sm">
												<tbody>
													<tr>
														<td>admin</td>
														<td><button class="btn btn-outline-primary"><?= $hitung_staff_admin ?></button></td>
													</tr>
													<tr>
														<td>petugas</td>
														<td><button class="btn btn-outline-secondary"><?= $hitung_staff_petugas ?></button></td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="col-md-6">
											<div class="chart-pie pt-4 pb-2">
												<canvas id="total_staff_chart"></canvas>
											</div>
											<script>
												// Set new default font family and font color to mimic Bootstrap's default styling
												Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
												Chart.defaults.global.defaultFontColor = '#858796';

												// Pie Chart Example
												var ctx = document.getElementById("total_staff_chart");
												var myPieChart = new Chart(ctx, {
													type: 'doughnut',
													data: {
														labels: ['admin', 'petugas'],
														datasets: [{
															data: [<?= $hitung_staff_admin ?>, <?= $hitung_staff_petugas ?>],
															backgroundColor: ['#4e73df', '#1cc88a'],
															hoverBackgroundColor: ['#2e59d9', '#17a673'],
															hoverBorderColor: "rgba(234, 236, 244, 1)",
														}],
													},
													options: {
														maintainAspectRatio: false,
														tooltips: {
															backgroundColor: "rgb(255,255,255)",
															bodyFontColor: "#858796",
															borderColor: '#dddfeb',
															borderWidth: 1,
															xPadding: 15,
															yPadding: 15,
															displayColors: false,
															caretPadding: 10,
														},
														legend: {
															display: false
														},
														cutoutPercentage: 80,
													},
												});

											</script>
											<div class="mt-4 text-center small">
												<span class="mr-2">
													<i class="fas fa-circle text-primary"></i> admin
												</span>
												<span class="mr-2">
													<i class="fas fa-circle text-success"></i> petugas
												</span>
											</div>
										</div>
									</div>
                                </div>
                            </div>
                    <!-- Content Row -->

                        <!-- Area Chart -->
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Total visitor per area</h6>
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
									<div class="row">
										<div class="col-md-6">
											<table class="table table-hover table-responsive-sm">
												<tbody>
													<tr>
														<td>area 1</td>
														<td><button class="btn btn-outline-primary"><?= $hitung_staff_admin ?></button></td>
													</tr>
													<tr>
														<td>area 2</td>
														<td><button class="btn btn-outline-secondary"><?= $hitung_staff_petugas ?></button></td>
													</tr>
													<tr>
														<td>etc...</td>
														<td><button class="btn btn-outline-secondary"><?= $hitung_staff_petugas ?></button></td>
													</tr>
												</tbody>
											</table>
										</div>
										<div class="col-md-6">
											<div class="chart-pie pt-4 pb-2">
												<canvas id="total_visitor_per_area_chart"></canvas>
											</div>
											<script>
												// Set new default font family and font color to mimic Bootstrap's default styling
												Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
												Chart.defaults.global.defaultFontColor = '#858796';

												// Pie Chart Example
												var ctx = document.getElementById("total_visitor_per_area_chart");
												var myPieChart = new Chart(ctx, {
													type: 'doughnut',
													data: {
														labels: ['admin', 'petugas'],
														datasets: [{
															data: [<?= $hitung_staff_admin ?>, <?= $hitung_staff_petugas ?>],
															backgroundColor: ['#4e73df', '#1cc88a'],
															hoverBackgroundColor: ['#2e59d9', '#17a673'],
															hoverBorderColor: "rgba(234, 236, 244, 1)",
														}],
													},
													options: {
														maintainAspectRatio: false,
														tooltips: {
															backgroundColor: "rgb(255,255,255)",
															bodyFontColor: "#858796",
															borderColor: '#dddfeb',
															borderWidth: 1,
															xPadding: 15,
															yPadding: 15,
															displayColors: false,
															caretPadding: 10,
														},
														legend: {
															display: false
														},
														cutoutPercentage: 80,
													},
												});

											</script>
											<div class="mt-4 text-center small">
												<span class="mr-2">
													<i class="fas fa-circle text-primary"></i> area 1
												</span>
												<span class="mr-2">
													<i class="fas fa-circle text-success"></i> area 2
												</span>
												<span class="mr-2">
													<i class="fas fa-circle text-success"></i> etc..
												</span>
											</div>
										</div>
									</div>
                                </div>
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

    