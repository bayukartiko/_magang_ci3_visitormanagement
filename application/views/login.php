<style>
	html, body {
		height: 100%;
	}

	body {
		display: -ms-flexbox;
		display: flex;
		-ms-flex-align: center;
		align-items: center;
		padding-top: 40px;
		padding-bottom: 40px;
		background-color: #DFE6E9;
	}

	.div-login {
		width: 100%;
		padding: 15px;
		margin: auto;
	}
	
	.ikon-mata{
		float: right;
		margin-right: 20px;
		margin-top: -35px;
		position: relative;
		z-index: 2;
	}
	.ikon-mata:hover{
		cursor: pointer;
	}
	.btn-login{
		width: 150px;
		margin: auto;
	}
</style>

<body class="bg-gradient-primary">
	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center div-login">

			<div class="col-xl-8 col-lg-12 col-md-9">

				<div class="card o-hidden border-0 shadow-lg my-5">
					<!-- <div class="card-img-top" style="background-color: red;">sdf</div> -->
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="offset-lg-3 col-lg-6">
								<!-- <div class="pt-5 pb-5"> -->
								<div class="pt-5 pb-5">
									<div class="text-center">
										<h1 class="h4 text-gray-900 mb-4">Visitor Management</h1>
										<h2 class="h4 text-gray-900 mb-4">Staff login</h2>
									</div>

									<?php if($this->session->flashdata('sukses')) {  ?>
										<div class="alert alert-success alert-dismissible fade show" role="alert">
											<?= $this->session->flashdata('sukses') ?>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									<?php }elseif($this->session->flashdata('gagal')) { ?>
										<div class="alert alert-danger alert-dismissible fade show" role="alert">
											<?= $this->session->flashdata('gagal') ?>
											<button type="button" class="close" data-dismiss="alert" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
									<?php } ?>

									<form class="user needs-validation" id="form_login" method="POST" action="<?= base_url('staff_only/login'); ?>">
										<div class="form-group">
											<input type="text" class="form-control form-control-user text-center" id="input_username" name="username" aria-describedby="username" placeholder="Masukkan Username" value="<?= set_value('username'); ?>">

											<small id="error_username" class="form-text text-muted text-danger text-center"><?= form_error('username'); ?></small>
										</div>
										<div class="form-group">
											<input type="password" class="form-control form-control-user text-center" id="input_password" name="password" placeholder="Masukkan Password" value="<?= set_value('password'); ?>">
											<div class="lihat-password">
												<span toggle="#inputPassword" class="ikon-mata far fa-eye"></span>
											</div>

											<small id="error_password" class="form-text text-muted text-danger text-center"><?= form_error('password'); ?></small>
										</div>
										<!-- <div class="form-group">
											<div class="custom-control custom-checkbox small">
												<input type="checkbox" class="custom-control-input" id="customCheck">
												<label class="custom-control-label" for="customCheck">Remember
													Me</label>
											</div>
										</div> -->
										<button type="submit" class="btn btn-primary btn-user btn-block btn-login">
											login
										</button>
									</form>
									<!-- <hr> -->
									<!-- <div class="text-center">
										<a class="small" href="forgot-password.html">Forgot Password?</a>
									</div> -->
									<!-- <div class="text-center">
										<a class="small" href="register.html">Buat Akun Baru!</a>
									</div> -->
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>
	</div>

	<script>
		$(document).ready(function(){
			$('.lihat-password').click(function(){
				$(this).children().toggleClass('far fa-eye far fa-eye-slash');
				let input = $(this).prev();
				input.attr('type', input.attr('type') === 'password' ? 'text' : 'password');
			});
		});
	</script>
</body>
