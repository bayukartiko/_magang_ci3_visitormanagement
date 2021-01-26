<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<h1>Selamat datang, <?= $tabel_staff['nama']; ?></h1>
	<a href="<?= base_url('staff_only/admin/logout') ?>">logout</a>
</body>
</html>
