<?php

	function cek_staff_login(){
		$ci = get_instance();
		if(!$ci->session->userdata('username')){
			redirect('staff_only/login');
		}else{
			$role = $ci->session->userdata('role_id');
			$segment1 = $ci->uri->segment(1);
			$segment2 = $ci->uri->segment(2);
			$segment3 = $ci->uri->segment(3);

			$staff = 'staff_only';
			$admin = 'admin';
			$petugas = 'petugas';

			if($role && $segment1 != $staff){
				redirect('block');
			}else{
				if($role ==	'1' && $segment2 != $admin){
					redirect('block');
				}elseif($role == '2' && $segment2 != $petugas){
					redirect('block');
				}
			}
		}
	}

?>
