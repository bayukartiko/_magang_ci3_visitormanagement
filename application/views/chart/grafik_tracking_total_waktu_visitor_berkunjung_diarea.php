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
	<div id="container-total-waktu-visitor-berkunjung-diarea"></div>
	<!-- <p class="highcharts-description">
		A basic column chart compares rainfall values between four cities.
		Tokyo has the overall highest amount of rainfall, followed by New York.
		The chart is making use of the axis crosshair feature, to highlight
		months as they are hovered over.
	</p> -->
</figure>

<script type="text/javascript">
	Highcharts.chart('container-total-waktu-visitor-berkunjung-diarea', {
		chart: {
			type: 'column',
			scrollablePlotArea:{
				minHeight:undefined,
				minWidth:700,
			}
		},
		title: {
			text: 'Total Popularitas Area berdasarkan Lama Waktu dikunjungi'
		},
		subtitle: {
			text: 'Event: <?= $event["nama_event"] ?>'
		},
		xAxis: {
			// type: 'datetime'
			categories: [
				<?php foreach($all_area as $data_area){ ?>
					'<?= $data_area->nama_area ?>',
				<?php } ?>
			],
			crosshair: true
		},
		yAxis: {
			labels: {
                formatter: function () {
                    var time = this.value;
                    var jam=parseInt(time/3600);
                    var menit=parseInt((parseInt(time%3600))/60);
                    return jam + ' jam ' + menit + ' menit';
					// return moment.utc(this.value).format('HH:mm:ss');
                }
            },
			title: {
				text: 'Lama Dikunjungi'
			}
		},
		tooltip: {
			pointFormatter: function() {
				var time = this.y;
				var jam=parseInt(time/3600);
				var menit=parseInt((parseInt(time%3600))/60);
				var detik=parseInt(time%60);
				if(jam == 0 && menit != 0){
					return '<b>'+ menit + ' menit </b>';
				}else if(jam == 0 && menit == 0){
					return '<b> Belum Dikunjungi </b>';
				}else{
					return '<b>'+ jam + ' jam ' + menit + ' menit ' + detik + ' detik </b>';
				}
			},
			shared: true,
			useHTML: true
		},
		credits: {
			enabled: true
		},
		series: [{
			name: "total lama waktu dikunjungi",
			data: [<?php
					foreach($all_area as $data_area){
						// $hitung_total_lama_waktu_visitor_berkunjung_perarea = $this->db->query("SELECT SEC_TO_TIME(SUM(TIMEDIFF(time_out_area,time_in_area))) as 'total_lama_berkunjung_area' FROM tabel_tracking WHERE id_area='".$data_area->id_area."'")->result();
						$hitung_total_lama_waktu_visitor_berkunjung_perarea = $this->db->query("SELECT SUM(TIMEDIFF(time_out_area,time_in_area)) as 'total_lama_berkunjung_area' FROM tabel_tracking WHERE id_area='".$data_area->id_area."'")->result();

						foreach($hitung_total_lama_waktu_visitor_berkunjung_perarea as $data_total_lama_waktu_visitor_berkunjung_perarea){ 
							if($data_total_lama_waktu_visitor_berkunjung_perarea->total_lama_berkunjung_area == null){ ?>
								<?= 0 ?>
							<?php }else{ ?>
								<?= $data_total_lama_waktu_visitor_berkunjung_perarea->total_lama_berkunjung_area ?>,
							<?php } ?>
							// </?= date("G.i", strtotime($data_total_lama_waktu_visitor_berkunjung_perarea->total_lama_berkunjung_area)) ?>,
							// [</?= str_replace(":", ".", substr("$data_total_lama_waktu_visitor_berkunjung_perarea->total_lama_berkunjung_area", 0, -3)) ?>],
						<?php }
					}
				?>]
		}]
	});

</script>
