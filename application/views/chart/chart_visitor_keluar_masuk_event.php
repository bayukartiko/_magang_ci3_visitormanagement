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
<div class="row">
	<div class="col-md-6">
		<table class="table table-hover table-responsive-sm">
			<tbody>
				<tr>
					<td>visitor masuk event</td>
					<td><button class="btn btn-outline-primary"><?= $hitung_visitor_masuk_event ?></button></td>
				</tr>
				<tr>
					<td>visitor keluar event</td>
					<td><button class="btn btn-outline-secondary"><?= $hitung_visitor_keluar_event ?></button></td>
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
								name: 'visitor masuk event',
								y: <?= $hitung_visitor_masuk_event ?>
							}, {
								name: 'visitor keluar event',
								y: <?= $hitung_visitor_keluar_event ?>
						}]
					}]
				})
			});
		</script>

	</div>
</div>
