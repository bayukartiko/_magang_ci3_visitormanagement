<body id="page-top">
	<!-- <?php if($this->session->flashdata('harap_logout')){ ?>
		<script>
			$(document).ready(function(){
				const Toast = Swal.mixin({
					toast: true,
					position: 'top-start',
					showConfirmButton: false,
					timer: 10000,
					timerProgressBar: true,
					didOpen: (toast) => {
						toast.addEventListener('mouseenter', Swal.stopTimer)
						toast.addEventListener('mouseleave', Swal.resumeTimer)
					}
				});
				Toast.fire({
					icon: 'error',
					title: <?= $this->session->flashdata('harap_logout') ?>
				});
			})
		</script>
	<?php } ?> -->
    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="admin_index.html">
                <div class="sidebar-brand-icon">
					<!-- <i class="fas fa-laugh-wink"></i> -->
					<img src="<?= base_url() ?>assets/img/id_card_img.png" alt="logo" class="text-white" style="width: 50px; height: 50px;">
                </div>
                <div class="sidebar-brand-text mx-3">Visitor Management</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <!-- <li class="nav-item active"> -->
            <li class="nav-item">
                <a class="nav-link" href="<?= base_url('staff_only/admin/home') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#register"
                    aria-expanded="true" aria-controls="register">
                    <i class="fas fa-fw fa-edit"></i>
                    <span>Register</span>
                </a>
                <div id="register" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Register:</h6>
                        <a class="collapse-item" href="<?= base_url('staff_only/admin/daftar_staff') ?>">Register staff baru</a>
                        <a class="collapse-item" href="<?= base_url('staff_only/admin/daftar_event') ?>">Register event baru</a>
                    </div>
                </div>
			</li>

			<!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#datalist"
                    aria-expanded="true" aria-controls="datalist">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data List</span>
                </a>
                <div id="datalist" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Data List:</h6>
                        <a class="collapse-item" href="<?= base_url('staff_only/admin/data_tracking') ?>">Data Tracking</a>
                        <!-- <a class="collapse-item" href="</?= base_url('staff_only/admin/data_visitor') ?>">Data Visitor</a> -->
                    </div>
                </div>
			</li>

			<li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#report"
                    aria-expanded="true" aria-controls="report">
                    <i class="fas fa-fw fa-print"></i>
                    <span>Report</span>
                </a>
                <div id="report" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Report:</h6>
                        <!-- <a class="collapse-item" href="login.html">Login</a> -->
                        <a class="collapse-item" href="">Visitor Tracking</a>
                        <a class="collapse-item" href="">Data Visitor</a>
                        <a class="collapse-item" href="">Data Event & Staff</a>
						<hr>
                        <a class="collapse-item" href="<?= base_url('staff_only/admin/report_all') ?>">All Report</a>
                        <a class="collapse-item" href="<?= base_url('staff_only/admin/report_filter') ?>">Filter Report</a>
                        <!-- <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a> -->
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <!-- <div class="sidebar-card">
                <img class="sidebar-card-illustration mb-2" src="img/undraw_rocket.svg" alt="">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components, and more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to Pro!</a>
            </div> -->

        </ul>
        <!-- End of Sidebar -->
