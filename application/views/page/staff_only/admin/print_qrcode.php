<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

  <title>SB Admin 2 - Blank</title>

  <!-- Custom fonts for this template-->
  <link href="<?= base_url() ?>assets/fontawesome/css/all.min.css" rel="stylesheet" type="text/css">

  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css" rel="stylesheet" />

</head>

<body id="page-top" style="background-color: #28903B; font-family: 'Nunito Sans', sans-serif;">

	<div class="text-center m-4">
		<div class="row">
			<div class="col-md-12">
				<h1 class="font-weight-bold" style="color: #ffffff;"><?= $nama_aplikasi ?></h1>
				<br><br>
			</div>
			<div class="col-md-12">
				<div class="card mx-auto w-50 h-100">
					<div class="card-body" style="color: #ffffff;">
						<h3><?= $nama_event ?></h3>
						<br><br>
						<img src="<?= base_url() ?>assets/img/qrcode/<?= $qrcode_event ?>" alt="" style="width: 350px; height: 350px;">
						<br>
						<h5><?= $link_akses_event ?></h5>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
