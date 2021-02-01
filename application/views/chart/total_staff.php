<style>
	.highcharts-figure, .highcharts-data-table table {
		min-width: 320px; 
		max-width: 800px;
		margin: 1em auto;
	}

	.highcharts-data-table table {
		font-family: Verdana, sans-serif;
		border-collapse: collapse;
		border: 1px solid #EBEBEB;
		margin: 10px auto;
		text-align: center;
		width: 100%;
		max-width: 500px;
	}
	.highcharts-data-table caption {
		padding: 1em 0;
		font-size: 1.2em;
		color: #555;
	}
	.highcharts-data-table th {
		font-weight: 600;
		padding: 0.5em;
	}
	.highcharts-data-table td, .highcharts-data-table th, .highcharts-data-table caption {
		padding: 0.5em;
	}
	.highcharts-data-table thead tr, .highcharts-data-table tr:nth-child(even) {
		background: #f8f8f8;
	}
	.highcharts-data-table tr:hover {
		background: #f1f7ff;
	}


	input[type="number"] {
		min-width: 50px;
	}
</style>
<!-- Pie Chart -->
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
				<div id="total_staff_chart"></div>

				<script>
					$(document).ready(function(){
						$("#total_staff_chart").highcharts({
							chart: {
								plotBackgroundColor: null,
								BackgroundColor: null,
								plotBorderWidth: null,
								plotShadow: false,
								type: 'pie'
							},
							title: {
								text: null
							},
							tooltip: {
								pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
							},
							accessibility: {
								point: {
									valueSuffix: '%'
								}
							},
							plotOptions: {
								pie: {
									allowPointSelect: true,
									cursor: 'pointer',
									dataLabels: {
										enabled: true,
										format: '<b>{point.name}</b>: {point.percentage:.1f} %'
									}
								}
							},
							series: [{
								name: 'Brands',
								colorByPoint: true,
								data: [{
										name: 'Admin',
										y: <?= $hitung_staff_admin ?>
									}, {
										name: 'Petugas',
										y: <?= $hitung_staff_petugas ?>
								}]
							}]
						})
					});
				</script>

			</div>
		</div>
	</div>
</div>
