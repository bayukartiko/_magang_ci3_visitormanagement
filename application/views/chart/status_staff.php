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
			<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
				<div class="dropdown-header">Pilih Staff:</div>
				<a class="dropdown-item" href="" id="admin">Admin</a>
				<a class="dropdown-item" href="" id="petugas">Petugas</a>
				<div class="dropdown-divider"></div>
				<a class="dropdown-item" href="" id="semua_staff">Semua Staff</a>
			</div>
			<select name="" id="" class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
 				<option value="" class="dropdown-item">asdas</option>
			</select>
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
					$(document).ready(function(){

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
