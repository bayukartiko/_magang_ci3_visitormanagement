<?php

	function cek_staff_login(){
		$ci = get_instance();
		if(!$ci->session->userdata('username')){
			redirect('staff_only/login');
		}else{
			$role = $ci->session->userdata('role_id');
			$controller = $ci->uri->segment(1);

			$staff = 'staff_only';
			$visitor = 'visitor';

			if($role ==	'1' && $controller != $staff){
				redirect('block');
			}elseif($role == '2' && $controller != $staff){
				redirect('block');
			}

		}
	}

?>
