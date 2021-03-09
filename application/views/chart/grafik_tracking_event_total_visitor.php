<?php setlocale(LC_ALL, 'IND') ?>
<?php if($pilih_grafik == null){ ?>
	<div class="text-right float-right">
		<i class="fas fa-arrow-up fa-5x"></i>
		<h3>Pilih tipe grafik untuk menampilkan data</h3>
	</div>
<?php }elseif($pilih_grafik == "hari"){ ?>
	<style type="text/css">
		.highcharts-figure, .highcharts-data-table table {
			min-width: 310px; 
			max-width: 800px;
			margin: 1em auto;
		}

		#container {
			height: 400px;
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

	</style>

	<!-- buat fungsi if event ini masih aktif tampilin chart ini -->
	<figure class="highcharts-figure">
		<div id="container"></div>
		<!-- <p class="highcharts-description">
			A basic column chart compares rainfall values between four cities.
			Tokyo has the overall highest amount of rainfall, followed by New York.
			The chart is making use of the axis crosshair feature, to highlight
			months as they are hovered over.
		</p> -->
	</figure>

	<script type="text/javascript">
		Highcharts.chart('container', {
			chart: {
				type: 'column',
				scrollablePlotArea:{
					minHeight:undefined,
					minWidth:700,
				}
			},
			title: {
				text: 'Total visitor per-hari'
			},
			subtitle: {
				text: 'Event: <?= $event["nama_event"] ?>'
			},
			xAxis: {
				categories: [
					<?php foreach($total_visitor as $tanggal){ ?>
						'<?= date('D, d-M-Y', strtotime($tanggal->mendaftar_pada)) ?>',
					<?php } ?>
				],
				crosshair: true
			},
			yAxis: {
				min: 0,
				title: {
					text: 'Jumlah Visitor'
				}
			},
			tooltip: {
				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
					'<td style="padding:0"><b>{point.y:1f} orang</b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true
			},
			plotOptions: {
				column: {
					dataLabels: {
						enabled: true,
						format: "{point.y:1f} orang"
					},
					pointPadding: 0.2,
					borderWidth: 0
				}
			},
			series: [{
				name: 'Total Visitor',
				data: [
					<?php foreach($total_visitor as $total){ ?>
						<?= $total->total_visitor ?>,
					<?php } ?>
				]
			}]
		});
	</script>
<?php }elseif($pilih_grafik == "jam"){ ?>
	<style type="text/css">
		.highcharts-figure, .highcharts-data-table table {
			min-width: 310px; 
			max-width: 800px;
			margin: 1em auto;
		}

		#container {
			height: 400px;
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

	</style>

	<!-- buat fungsi if event ini masih aktif tampilin chart ini -->
	<figure class="highcharts-figure">
		<div id="container"></div>
		<!-- <p class="highcharts-description">
			A basic column chart compares rainfall values between four cities.
			Tokyo has the overall highest amount of rainfall, followed by New York.
			The chart is making use of the axis crosshair feature, to highlight
			months as they are hovered over.
		</p> -->
	</figure>

	<script type="text/javascript">
		Highcharts.chart('container', {
			chart: {
				type: 'column',
				scrollablePlotArea:{
					minHeight:undefined,
					minWidth:700,
				}
			},
			title: {
				text: 'Total visitor in/out per-jam'
			},
			subtitle: {
				text: 'Event: <?= $event["nama_event"] ?>'
			},
			xAxis: {
				categories: [
					<?php foreach($visitor_in as $tanggal){ ?>
						'<?= date('D, d-M-Y H:i', strtotime($tanggal->waktu_masuk_event)) ?>',
					<?php } ?>
				],
				crosshair: true
			},
			yAxis: {
				min: 0,
				title: {
					text: 'Jumlah Visitor'
				}
			},
			tooltip: {
				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
					'<td style="padding:0"><b>{point.y:1f} orang</b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0
				}
			},
			series: [{
				name: 'Visitor in',
				data: [
					<?php foreach($visitor_in as $total){ ?>
						<?= $total->visitor_in ?>,
					<?php } ?>
				]
			}, {
				name: 'Visitor out',
				data: [
					<?php foreach($visitor_out as $total){ ?>
						<?= $total->visitor_out ?>,
					<?php } ?>
				]
			}]
		});
	</script>
<?php } ?>
