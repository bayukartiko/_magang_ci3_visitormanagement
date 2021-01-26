<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		cek_staff_login();
		$this->load->library('form_validation');
		// $this->load->model('AdminModel');	
	}
	public function index_admin(){
		$data['tabel_staff'] = $this->db->get_where('tabel_staff', ['username' => $this->session->userdata('username')])->row_array();

		// echo 'selamat datang ' . $data['tb_user']['username'];
		// $this->load->view('websiteLaundryPBO/admin/templating_engine_admin/header', $data);
		// $this->load->view('websiteLaundryPBO/admin/templating_engine_admin/sidebar', $data);
		$this->load->view('page/staff_only/admin/index_dashboard', $data);
		// $this->load->view('websiteLaundryPBO/admin/templating_engine_admin/footer', $data);
	}

	public function logout(){
		$log_stat = '0';
		$this->db->set('is_active', $log_stat);
		$this->db->where('staff_id', $this->session->userdata('staff_id'));
		$this->db->update('tabel_staff');

		$session_aktif = array('staff_id', 'role_id', 'username', 'password', 'nama', 'verified', 'is_active');
		$this->session->unset_userdata($session_aktif);
		// $this->session->sess_destroy();

		$this->session->set_flashdata('sukses', 'Anda sudah berhasil keluar !');
		redirect('staff_only/login');
	}
}
?>
