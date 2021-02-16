<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Staff_controller extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->helper('main_helper');
		cek_staff_login();
		$this->load->library('form_validation');
		$this->load->model('staff_model');
	}

	// page admin
		public function page_admin_dashboard(){
			$data['tabel_staff'] = $this->db->get_where('tabel_staff', ['username' => $this->session->userdata('username')])->row_array();

			$event_aktif = $this->db->get_where('tabel_event', ['status' => 'active'])->row_array();
			$data['hitung_visitor'] = $this->db->get('tabel_visitor')->num_rows();
			$data['hitung_staff'] = $this->db->get_where('tabel_staff', ['verified' => '1'])->num_rows();
			$data['hitung_event'] = $this->db->get_where('tabel_event', ['status' => 'active'])->num_rows();
			$data['hitung_area'] = $this->db->get_where('tabel_area', ['id_event' => $event_aktif['id_event']])->num_rows();
			$data['hitung_visitor_loggedin'] = $this->db->get_where('tabel_visitor', ['status' => 'logged in'])->num_rows();
			$data['hitung_visitor_loggedout'] = $this->db->get_where('tabel_visitor', ['status' => 'logged out'])->num_rows();
			$data['hitung_visitor_inarea'] = $this->db->get_where('tabel_visitor', ['status' => 'in area'])->num_rows();
			$data['hitung_staff_online'] = $this->db->get_where('tabel_staff', ['is_active' => 'online'])->num_rows();
			$data['hitung_staff_offline'] = $this->db->get_where('tabel_staff', ['is_active' => 'offline'])->num_rows();
			$data['hitung_staff_admin'] = $this->db->get_where('tabel_staff', ['role_id' => '1'])->num_rows();
			$data['hitung_staff_petugas'] = $this->db->get_where('tabel_staff', ['role_id' => '2'])->num_rows();

			// echo 'selamat datang ' . $data['tb_user']['username'];
			$this->load->view('template/staff_only/header', $data);
			$this->load->view('template/staff_only/sidebar', $data);
			$this->load->view('template/staff_only/topbar', $data);
			$this->load->view('page/staff_only/admin/admin_dashboard', $data);
			$this->load->view('template/staff_only/footer', $data);
		}

		public function page_admin_tracking(){
			$data['tabel_staff'] = $this->db->get_where('tabel_staff', ['username' => $this->session->userdata('username')])->row_array();

			// echo 'selamat datang ' . $data['tb_user']['username'];
			$this->load->view('template/staff_only/header', $data);
			$this->load->view('template/staff_only/sidebar', $data);
			$this->load->view('template/staff_only/topbar', $data);
			$this->load->view('page/staff_only/admin/admin_tracking', $data);
			$this->load->view('template/staff_only/footer', $data);
		}

		public function page_admin_report(){
			$data['tabel_staff'] = $this->db->get_where('tabel_staff', ['username' => $this->session->userdata('username')])->row_array();

			// echo 'selamat datang ' . $data['tb_user']['username'];
			$this->load->view('template/staff_only/header', $data);
			$this->load->view('template/staff_only/sidebar', $data);
			$this->load->view('template/staff_only/topbar', $data);
			$this->load->view('page/staff_only/admin/admin_report', $data);
			$this->load->view('template/staff_only/footer', $data);
		}

		public function page_admin_daftar_staff(){
			$data['tabel_staff'] = $this->db->get_where('tabel_staff', ['username' => $this->session->userdata('username')])->row_array();
			$data['all_staff'] = $this->staff_model->get_tb_staff();
			$data['all_role'] = $this->staff_model->get_tb_role();
			$data['all_area'] = $this->staff_model->get_tb_area();
			$data['all_event'] = $this->staff_model->get_tb_event();
			$data['all_tugas_staff_petugas'] = $this->staff_model->get_tb_tugas_staff_petugas();

			$data['hitung_area'] = $this->db->get('tabel_area')->num_rows();
			$data['hitung_staff'] = $this->db->get_where('tabel_staff', ['verified' => '1'])->num_rows();
			$data['hitung_staff_admin'] = $this->db->get_where('tabel_staff', ['role_id' => '1'])->num_rows();
			$data['hitung_staff_petugas'] = $this->db->get_where('tabel_staff', ['role_id' => '2'])->num_rows();
			$data['hitung_staff_online'] = $this->db->get_where('tabel_staff', ['is_active' => 'online'])->num_rows();
			$data['hitung_staff_offline'] = $this->db->get_where('tabel_staff', ['is_active' => 'offline'])->num_rows();

			// echo 'selamat datang ' . $data['tb_user']['username'];
			$this->load->view('template/staff_only/header', $data);
			$this->load->view('template/staff_only/sidebar', $data);
			$this->load->view('template/staff_only/topbar', $data);
			$this->load->view('page/staff_only/admin/admin_daftar_staff', $data);
			$this->load->view('template/staff_only/footer', $data);
		}

		public function page_admin_data_list(){
			$data['tabel_staff'] = $this->db->get_where('tabel_staff', ['username' => $this->session->userdata('username')])->row_array();

			// echo 'selamat datang ' . $data['tb_user']['username'];
			$this->load->view('template/staff_only/header', $data);
			$this->load->view('template/staff_only/sidebar', $data);
			$this->load->view('template/staff_only/topbar', $data);
			$this->load->view('page/staff_only/admin/admin_data_list', $data);
			$this->load->view('template/staff_only/footer', $data);
		}

		public function page_admin_event_management(){
			$data['tabel_staff'] = $this->db->get_where('tabel_staff', ['username' => $this->session->userdata('username')])->row_array();
			$data['staff_nganggur'] = $this->db->get_where('tabel_staff', ['sedang_bertugas' => false, 'role_id' => '2'])->result();
			$data['all_event'] = $this->staff_model->get_tb_event();
			$data['all_area'] = $this->staff_model->get_tb_area();
			$data['all_staff'] = $this->staff_model->get_tb_staff();
			$data['all_tugas_staff_petugas'] = $this->staff_model->get_tb_tugas_staff_petugas();

			// $id_event = $this->db->get('tabel_event')->row_array();
			// $data['hitung_area'] = $this->db->get_where('tabel_area', ['id_event' => $id_event['id_event']])->num_rows();

			// echo 'selamat datang ' . $data['tb_user']['username'];
			$this->load->view('template/staff_only/header', $data);
			$this->load->view('template/staff_only/sidebar', $data);
			$this->load->view('template/staff_only/topbar', $data);
			$this->load->view('page/staff_only/admin/admin_event', $data);
			$this->load->view('template/staff_only/footer', $data);
		}

		// aksi admin
			public function crud_staff($mode, $staff_id){
				if($mode == "tambah"){
					if($this->input->is_ajax_request()){
			
						if($this->staff_model->validasi_form_tambah_staff() == true){
							// buat kostum id
								if($this->db->query('SELECT * FROM tabel_staff')->num_rows() > 0){
									$data = $this->db->query('SELECT * FROM tabel_staff')->num_rows();
									$kode = $data+1;
								}else{
									$kode = 1;
								}
								// $tgl = mdate("%Y%m%d%H%i%s");
								$d = new DateTime();
								$tgl = $d->format("ymdu");
								$batas_user = str_pad($kode, 7, "0", STR_PAD_LEFT);
								$staff_id = "STF".$tgl.$batas_user;
			
							$this->staff_model->aksi_crud_staff("tambah", $staff_id);
			
							// Load ulang tabel_staff.php agar data yang baru bisa muncul di tabel pada admin_daftar_staff.php
			
							$total_staff = $this->db->get_where('tabel_staff', ['verified' => '1'])->num_rows();
							$total_staff_admin = $this->db->get_where('tabel_staff', ['role_id' => '1'])->num_rows();
							$total_staff_petugas = $this->db->get_where('tabel_staff', ['role_id' => '2'])->num_rows();
							$total_staff_online = $this->db->get_where('tabel_staff', ['is_active' => 'online'])->num_rows();
							$total_staff_offline = $this->db->get_where('tabel_staff', ['is_active' => 'offline'])->num_rows();
							$all_tugas_staff_petugas = $this->staff_model->get_tb_tugas_staff_petugas();
							$hitung_area = $this->db->get('tabel_area')->num_rows();

							$view_chart_status_staff = $this->load->view('chart/status_staff', array(
								'hitung_staff_online'=>$total_staff_online,
								'hitung_staff_offline'=>$total_staff_offline
							), true);
			
							$view_chart_total_staff = $this->load->view('chart/total_staff', array(
								'hitung_staff_admin'=>$total_staff_admin,
								'hitung_staff_petugas'=>$total_staff_petugas
							), true);
			
							$view_tabel_staff = $this->load->view('tabel/tabel_staff', array(
								'all_staff'=>$this->staff_model->get_tb_staff(),
								'all_role'=>$this->staff_model->get_tb_role(),
								'all_area'=>$this->staff_model->get_tb_area(),
								'all_event'=>$this->staff_model->get_tb_event(),
								'hitung_area'=>$this->db->get('tabel_area')->num_rows(),
								'all_tugas_staff_petugas'=>$this->staff_model->get_tb_tugas_staff_petugas(),
							), true);
			
							$callback = array(
								'status'=>'sukses',
								'pesan'=>'Staff berhasil ditambahkan.',
								'hitung_area'=>$hitung_area,
								'total_staff'=>$total_staff,
								'total_staff_admin'=>$total_staff_admin,
								'total_staff_petugas'=>$total_staff_petugas,
								'view_chart_status_staff'=>$view_chart_status_staff,
								'view_chart_total_staff'=>$view_chart_total_staff,
								'view_tabel_staff'=>$view_tabel_staff
							);
						}else{
							$callback = array(
								'status'=>'gagal',
								'username_error' => form_error('username'),
								'password_error' => form_error('password'),
								'nama_error' => form_error('nama'),
								'jabatan_error' => form_error('jabatan'),
								// 'pesan'=>validation_errors()
							);
						}
						echo json_encode($callback);
					}
				}elseif($mode == "hapus"){
					if($this->input->is_ajax_request()){
						$this->staff_model->aksi_crud_staff("hapus", $staff_id); // panggil fungsi crud_member() di AdminModel
			
						// Load ulang tabel_staff.php agar data yang baru bisa muncul di tabel pada admin_daftar_staff.php
			
						$total_staff = $this->db->get_where('tabel_staff', ['verified' => '1'])->num_rows();
						$total_staff_admin = $this->db->get_where('tabel_staff', ['role_id' => '1'])->num_rows();
						$total_staff_petugas = $this->db->get_where('tabel_staff', ['role_id' => '2'])->num_rows();
						$total_staff_online = $this->db->get_where('tabel_staff', ['is_active' => 'online'])->num_rows();
						$total_staff_offline = $this->db->get_where('tabel_staff', ['is_active' => 'offline'])->num_rows();
						$hitung_area = $this->db->get('tabel_area')->num_rows();
						$all_tugas_staff_petugas = $this->staff_model->get_tb_tugas_staff_petugas();
			
						$view_chart_status_staff = $this->load->view('chart/status_staff', array(
							'hitung_staff_online'=>$total_staff_online,
							'hitung_staff_offline'=>$total_staff_offline
						), true);
			
						$view_chart_total_staff = $this->load->view('chart/total_staff', array(
							'hitung_staff_admin'=>$total_staff_admin,
							'hitung_staff_petugas'=>$total_staff_petugas
						), true);
			
						$view_tabel_staff = $this->load->view('tabel/tabel_staff', array(
							'all_staff'=>$this->staff_model->get_tb_staff(),
							'all_role'=>$this->staff_model->get_tb_role(),
							'all_area'=>$this->staff_model->get_tb_area(),
							'all_event'=>$this->staff_model->get_tb_event(),
							'hitung_area'=>$this->db->get('tabel_area')->num_rows(),
							'all_tugas_staff_petugas'=>$this->staff_model->get_tb_tugas_staff_petugas(),
						), true);
			
						$callback = array(
							'status'=>'sukses',
							'pesan'=>'Staff berhasil dihapus.',
							'hitung_area'=>$hitung_area,
							'total_staff'=>$total_staff,
							'total_staff_admin'=>$total_staff_admin,
							'total_staff_petugas'=>$total_staff_petugas,
							'view_chart_status_staff'=>$view_chart_status_staff,
							'view_chart_total_staff'=>$view_chart_total_staff,
							'view_tabel_staff'=>$view_tabel_staff
						);
					}else{
						$callback = array(
							'status'=>'gagal'
						);
					}
					echo json_encode($callback);
				}
			}

			public function crud_event($mode, $event_id){
				if($mode == "tambah"){
					if($this->input->is_ajax_request()){
			
						if($this->staff_model->validasi_form_crud_event("tambah") == true){
							// buat kostum id tabel event
								if($this->db->query('SELECT * FROM tabel_event')->num_rows() > 0){
									$data = $this->db->query('SELECT * FROM tabel_event')->num_rows();
									$kode = $data+1;
								}else{
									$kode = 1;
								}
								// $tgl = mdate("%d%m%y%H%i%s");
								$d = new DateTime();
								$tgl = $d->format("ymdu");
								$batas_event = str_pad($kode, 7, "0", STR_PAD_LEFT);
								$id_event = "EVNT".$tgl.$batas_event;

							// buat kostum id tabel area
								if($this->db->query('SELECT * FROM tabel_area')->num_rows() > 0){
									$data = $this->db->query('SELECT * FROM tabel_area')->num_rows();
									$kode = $data+1;
								}else{
									$kode = 1;
								}
								// $tgl = mdate("%d%m%y%H%i%s");
								$d = new DateTime();
								$tgl = $d->format("ymdu");
								$batas_area = str_pad($kode, 7, "0", STR_PAD_LEFT);
								$id_area = "AR".$tgl.$batas_area;

							// buat kostum id tabel tugas
								if($this->db->query('SELECT * FROM tabel_tugas_staff_petugas')->num_rows() > 0){
									$data = $this->db->query('SELECT * FROM tabel_area')->num_rows();
									$kode = $data+1;
								}else{
									$kode = 1;
								}
								// $tgl = mdate("%d%m%y%H%i%s");
								$d = new DateTime();
								$tgl = $d->format("ymdu");
								$batas_tugas = str_pad($kode, 7, "0", STR_PAD_LEFT);
								$id_tugas = "TGS".$tgl.$batas_tugas;

							$this->staff_model->aksi_crud_event("tambah", $id_event, $id_area, $id_tugas);
			
							// Load ulang tabel_event.php agar data yang baru bisa muncul di tabel pada admin_event.php
							$staff_nganggur = $this->db->get_where('tabel_staff', ['sedang_bertugas' => false, 'role_id' => '2'])->result();
							$id_event = $this->db->get('tabel_event')->row_array();

							$view_tabel_event = $this->load->view('tabel/tabel_event', array(
								'all_event' => $this->staff_model->get_tb_event(),
								'all_area' => $this->staff_model->get_tb_area(),
								'staff_nganggur' => $staff_nganggur,
								'all_staff' => $this->staff_model->get_tb_staff(),
								'all_tugas_staff_petugas' => $this->staff_model->get_tb_tugas_staff_petugas(),
							), true);

							$view_select_petugas_pintu_keluar = $this->load->view('page/staff_only/admin/select_petugas_pintu/petugas_pintu_keluar', array(
								'staff_nganggur' => $staff_nganggur
							), true);
							$view_select_petugas_pintu_area = $this->load->view('page/staff_only/admin/select_petugas_pintu/petugas_pintu_area', array(
								'staff_nganggur' => $staff_nganggur
							), true);
							$view_select_petugas_pintu_area_multiple = $this->load->view('page/staff_only/admin/select_petugas_pintu/petugas_pintu_area_multiple', array(
								'staff_nganggur' => $staff_nganggur
							), true);
			
							$callback = array(
								'status'=>'sukses',
								'pesan'=>'Event berhasil ditambahkan.',
								'view_tabel_event'=>$view_tabel_event,
								'view_select_petugas_pintu_keluar'=>$view_select_petugas_pintu_keluar,
								'view_select_petugas_pintu_area'=>$view_select_petugas_pintu_area,
								'view_select_petugas_pintu_area_multiple'=>$view_select_petugas_pintu_area_multiple,
							);
							
						}else{
							$callback = array(
								'status'=>'gagal',
								'nama_event_error' => form_error('nama_event'),
								'tgl_mulai_error' => form_error('tgl_mulai'),
								'tgl_selesai_error' => form_error('tgl_selesai'),
								'jam_dibuka_error' => form_error('jam_dibuka'),
								'jam_ditutup_error' => form_error('jam_ditutup'),
								'nama_petugas_pintuKeluar_error' => form_error('nama_petugas_pintuKeluar'),
								// 'namaArea_error' => form_error('namaArea[]'),
								// 'namaPetugas_error' => form_error('namaPetugas[]'),
								// 'pesan'=>validation_errors()
							);
						}
						echo json_encode($callback);
					}
				}elseif($mode == "hapus"){
					if($this->input->is_ajax_request()){
						$this->staff_model->aksi_crud_event("hapus", $event_id, null, null); // panggil fungsi crud_member() di AdminModel
			
						// Load ulang tabel_staff.php agar data yang baru bisa muncul di tabel pada admin_daftar_staff.php
						$staff_nganggur = $this->db->get_where('tabel_staff', ['sedang_bertugas' => false, 'role_id' => '2'])->result();
						$id_event = $this->db->get('tabel_event')->row_array();
			
						$view_tabel_event = $this->load->view('tabel/tabel_event', array(
							'all_event' => $this->staff_model->get_tb_event(),
							'all_area' => $this->staff_model->get_tb_area(),
							'staff_nganggur' => $staff_nganggur,
							'all_staff' => $this->staff_model->get_tb_staff(),
							'all_tugas_staff_petugas' => $this->staff_model->get_tb_tugas_staff_petugas(),
						), true);
						$view_select_petugas_pintu_keluar = $this->load->view('page/staff_only/admin/select_petugas_pintu/petugas_pintu_keluar', array(
							'staff_nganggur' => $staff_nganggur
						), true);
						$view_select_petugas_pintu_area = $this->load->view('page/staff_only/admin/select_petugas_pintu/petugas_pintu_area', array(
							'staff_nganggur' => $staff_nganggur
						), true);
						$view_select_petugas_pintu_area_multiple = $this->load->view('page/staff_only/admin/select_petugas_pintu/petugas_pintu_area_multiple', array(
							'staff_nganggur' => $staff_nganggur
						), true);
			
						$callback = array(
							'status'=>'sukses',
							'pesan'=>'Event berhasil dihapus.',
							'view_tabel_event'=>$view_tabel_event,
							'view_select_petugas_pintu_keluar'=>$view_select_petugas_pintu_keluar,
							'view_select_petugas_pintu_area'=>$view_select_petugas_pintu_area,
							'view_select_petugas_pintu_area_multiple'=>$view_select_petugas_pintu_area_multiple,
						);
					}else{
						$callback = array(
							'status'=>'gagal'
						);
					}
					echo json_encode($callback);
				}elseif($mode == "ubah"){
					if($this->input->is_ajax_request()){
						if($this->staff_model->validasi_form_crud_event("ubah") == true){
							$this->staff_model->aksi_crud_event("ubah", $event_id, null, null);
			
							// Load ulang tabel_event.php agar data yang baru bisa muncul di tabel pada admin_event.php
							$staff_nganggur = $this->db->get_where('tabel_staff', ['sedang_bertugas' => true, 'role_id' => '2'])->result();
							$id_event = $this->db->get('tabel_event')->row_array();

							$view_tabel_event = $this->load->view('tabel/tabel_event', array(
								'all_event' => $this->staff_model->get_tb_event(),
								'all_area' => $this->staff_model->get_tb_area(),
								'staff_nganggur' => $staff_nganggur,
								'all_staff' => $this->staff_model->get_tb_staff(),
								'all_tugas_staff_petugas' => $this->staff_model->get_tb_tugas_staff_petugas(),
							), true);
							$view_select_petugas_pintu_keluar = $this->load->view('page/staff_only/admin/select_petugas_pintu/petugas_pintu_keluar', array(
								'staff_nganggur' => $staff_nganggur
							), true);
							$view_select_petugas_pintu_area = $this->load->view('page/staff_only/admin/select_petugas_pintu/petugas_pintu_area', array(
								'staff_nganggur' => $staff_nganggur
							), true);
							$view_select_petugas_pintu_area_multiple = $this->load->view('page/staff_only/admin/select_petugas_pintu/petugas_pintu_area_multiple', array(
								'staff_nganggur' => $staff_nganggur
							), true);
			
							$callback = array(
								'status'=>'sukses',
								'pesan'=>'Event berhasil diubah.',
								'view_tabel_event'=>$view_tabel_event,
								'view_select_petugas_pintu_keluar'=>$view_select_petugas_pintu_keluar,
								'view_select_petugas_pintu_area'=>$view_select_petugas_pintu_area,
								'view_select_petugas_pintu_area_multiple'=>$view_select_petugas_pintu_area_multiple,
							);
							
						}else{
							$callback = array(
								'status'=>'gagal',
								'nama_event_error' => form_error('nama_event'),
								'tgl_mulai_error' => form_error('tgl_mulai'),
								'tgl_selesai_error' => form_error('tgl_selesai'),
								'jam_dibuka_error' => form_error('jam_dibuka'),
								'jam_ditutup_error' => form_error('jam_ditutup'),
								// 'pesan'=>validation_errors()
							);
						}
						echo json_encode($callback);
					}
				}
			}

			public function event_aktivasi_otomatis(){
				if($this->input->is_ajax_request()){
					// $this->staff_model->aksi_event_aktivasi_otomatis();
					$all_event = $this->staff_model->get_tb_event();

					foreach($all_event as $data_event){
						// jika input tanggal_mulai kurang atau sama dengan dari tanggal sekarang
						if($data_event->tanggal_dibuka <= mdate('%Y-%m-%d')){

							// jika input tanggal_selesai lebih besar atau sama dengan dari tanggal sekarang
							if($data_event->tanggal_ditutup >= mdate('%Y-%m-%d')){

								// jika input jam dibuka kurang atau sama dengan dari jam sekarang
								if($data_event->jam_dibuka <= mdate('%H:%i:%s')){

									// jika input jam_ditutup lebih besar dari jam sekarang
									if($data_event->jam_ditutup > mdate('%H:%i:%s')){
										if($data_event->status != "active"){
											$status = "active";

											$data_tabel_event = [
												"status" => htmlspecialchars($status),
											];
											$this->db->update('tabel_event', $data_tabel_event, ["id_event" => $data_event->id_event]);

											// Load ulang tabel_event.php agar data yang baru bisa muncul di tabel pada admin_event.php
											$staff_nganggur = $this->db->get_where('tabel_staff', ['sedang_bertugas' => false, 'role_id' => '2'])->result();
											$id_event = $this->db->get('tabel_event')->row_array();

											$view_tabel_event = $this->load->view('tabel/tabel_event', array(
												'all_event' => $this->staff_model->get_tb_event(),
												'all_area' => $this->staff_model->get_tb_area(),
												'staff_nganggur' => $staff_nganggur,
												'all_staff' => $this->staff_model->get_tb_staff(),
												'all_tugas_staff_petugas' => $this->staff_model->get_tb_tugas_staff_petugas(),
											), true);

											$callback = array(
												'status'=>'sukses',
												'pesan'=>'Event berhasil ditambahkan.',
												'view_tabel_event'=>$view_tabel_event,
											);
										}else{
											$callback = array(
												'status'=>'gagal',
											);
										}
									// jika input jam_ditutup kurang dari jam sekarang
									}elseif($data_event->jam_ditutup < mdate('%H:%i:%s')){
										if($data_event->status != "not_active"){
											$status = "not_active";

											$data_tabel_event = [
												"status" => htmlspecialchars($status),
											];
											$this->db->update('tabel_event', $data_tabel_event, ["id_event" => $data_event->id_event]);

											// Load ulang tabel_event.php agar data yang baru bisa muncul di tabel pada admin_event.php
											$staff_nganggur = $this->db->get_where('tabel_staff', ['sedang_bertugas' => false, 'role_id' => '2'])->result();
											$id_event = $this->db->get('tabel_event')->row_array();

											$view_tabel_event = $this->load->view('tabel/tabel_event', array(
												'all_event' => $this->staff_model->get_tb_event(),
												'all_area' => $this->staff_model->get_tb_area(),
												'staff_nganggur' => $staff_nganggur,
												'all_staff' => $this->staff_model->get_tb_staff(),
												'all_tugas_staff_petugas' => $this->staff_model->get_tb_tugas_staff_petugas(),
											), true);

											$callback = array(
												'status'=>'sukses',
												'pesan'=>'Event berhasil ditambahkan.',
												'view_tabel_event'=>$view_tabel_event,
											);
										}else{
											$callback = array(
												'status'=>'gagal',
											);
										}
									}

								// jika input jam_dibuka lebih besar dari jam sekarang
								}elseif($data_event->jam_dibuka > mdate('%H:%i:%s')){
									if($data_event->status != "not_active"){
										$status = "not_active";

										$data_tabel_event = [
											"status" => htmlspecialchars($status),
										];
										$this->db->update('tabel_event', $data_tabel_event, ["id_event" => $data_event->id_event]);

										// Load ulang tabel_event.php agar data yang baru bisa muncul di tabel pada admin_event.php
										$staff_nganggur = $this->db->get_where('tabel_staff', ['sedang_bertugas' => false, 'role_id' => '2'])->result();
										$id_event = $this->db->get('tabel_event')->row_array();

										$view_tabel_event = $this->load->view('tabel/tabel_event', array(
											'all_event' => $this->staff_model->get_tb_event(),
											'all_area' => $this->staff_model->get_tb_area(),
											'staff_nganggur' => $staff_nganggur,
											'all_staff' => $this->staff_model->get_tb_staff(),
											'all_tugas_staff_petugas' => $this->staff_model->get_tb_tugas_staff_petugas(),
										), true);

										$callback = array(
											'status'=>'sukses',
											'pesan'=>'Event berhasil ditambahkan.',
											'view_tabel_event'=>$view_tabel_event,
										);
									}else{
										$callback = array(
											'status'=>'gagal',
										);
									}
								}
								
							// jika input tanggal_selesai kurang dari tanggal sekarang
							}elseif($data_event->tanggal_ditutup < mdate('%Y-%m-%d')){
								if($data_event->status != "not_active"){
									$status = "not_active";

									$data_tabel_event = [
										"status" => htmlspecialchars($status),
									];
									$this->db->update('tabel_event', $data_tabel_event, ["id_event" => $data_event->id_event]);

									// Load ulang tabel_event.php agar data yang baru bisa muncul di tabel pada admin_event.php
									$staff_nganggur = $this->db->get_where('tabel_staff', ['sedang_bertugas' => false, 'role_id' => '2'])->result();
									$id_event = $this->db->get('tabel_event')->row_array();

									$view_tabel_event = $this->load->view('tabel/tabel_event', array(
										'all_event' => $this->staff_model->get_tb_event(),
										'all_area' => $this->staff_model->get_tb_area(),
										'staff_nganggur' => $staff_nganggur,
										'all_staff' => $this->staff_model->get_tb_staff(),
										'all_tugas_staff_petugas' => $this->staff_model->get_tb_tugas_staff_petugas(),
									), true);

									$callback = array(
										'status'=>'sukses',
										'pesan'=>'Event berhasil ditambahkan.',
										'view_tabel_event'=>$view_tabel_event,
									);
								}else{
									$callback = array(
										'status'=>'gagal',
									);
								}
							}

						// jika input tanggal_mulai lebih besar dari tanggal sekarang
						}elseif($data_event->tanggal_dibuka > mdate('%Y-%m-%d')){
							if($data_event->status != "not_active"){
								$status = "not_active";

								$data_tabel_event = [
									"status" => htmlspecialchars($status),
								];
								$this->db->update('tabel_event', $data_tabel_event, ["id_event" => $data_event->id_event]);

								// Load ulang tabel_event.php agar data yang baru bisa muncul di tabel pada admin_event.php
								$staff_nganggur = $this->db->get_where('tabel_staff', ['sedang_bertugas' => false, 'role_id' => '2'])->result();
								$id_event = $this->db->get('tabel_event')->row_array();

								$view_tabel_event = $this->load->view('tabel/tabel_event', array(
									'all_event' => $this->staff_model->get_tb_event(),
									'all_area' => $this->staff_model->get_tb_area(),
									'staff_nganggur' => $staff_nganggur,
									'all_staff' => $this->staff_model->get_tb_staff(),
									'all_tugas_staff_petugas' => $this->staff_model->get_tb_tugas_staff_petugas(),
								), true);

								$callback = array(
									'status'=>'sukses',
									'pesan'=>'Event berhasil ditambahkan.',
									'view_tabel_event'=>$view_tabel_event,
								);
							}else{
								$callback = array(
									'status'=>'gagal',
								);
							}
						}
					}
				}else{
					$callback = array(
						'status'=>'gagal',
					);
				}
				echo json_encode($callback);
			}

	// page petugas
		public function page_petugas_scan(){
			$data['tabel_staff'] = $this->db->get_where('tabel_staff', ['username' => $this->session->userdata('username')])->row_array();
			$data['all_visitor'] = $this->staff_model->get_tb_visitor();
			$data['all_staff'] = $this->staff_model->get_tb_staff();
			$data['all_role'] = $this->staff_model->get_tb_role();
			$data['all_area'] = $this->staff_model->get_tb_area();
			$data['all_event'] = $this->staff_model->get_tb_event();
			$data['all_tracking'] = $this->staff_model->get_tb_tracking();
			$data['all_tugas_staff_petugas'] = $this->staff_model->get_tb_tugas_staff_petugas();
			$data['petugas_pintu_keluar'] = $this->db->get_where('tabel_event', ['id_event' => $this->session->userdata('id_event')])->row();
			$data['petugas_pintu_area'] = $this->db->get_where('tabel_area', ['id_area' => $this->session->userdata('id_area')])->row();

			$data['hitung_visitor_scan_keluar'] = $this->db->get_where('tabel_visitor', ['id_petugas_pintu_keluar' => $this->session->userdata('staff_id')])->num_rows();
			$data['visitor_scan_keluar'] = $this->db->order_by('time_out_event', 'DESC')->get_where('tabel_visitor', ['id_petugas_pintu_keluar' => $this->session->userdata('staff_id')])->result();
			$data['hitung_visitor_scan_keluarmasuk_area'] = $this->db->get_where('tabel_tracking', ['id_petugas_pintu_area' => $this->session->userdata('staff_id')])->num_rows();
			$data['visitor_scan_keluarmasuk_area'] = $this->db->order_by('time_in_area', 'DESC')->get_where('tabel_tracking', ['id_petugas_pintu_area' => $this->session->userdata('staff_id')])->result();
			
			$data['hitung_visitor_masuk_event'] = $this->db->get_where('tabel_visitor', ['status' => 'telah_masuk_event', 'status' => 'didalam_area'])->num_rows();
			$data['hitung_visitor_diluar_area'] = $this->db->get_where('tabel_visitor', ['status' => 'telah_masuk_event'])->num_rows();
			$data['hitung_visitor_didalam_area'] = $this->db->get_where('tabel_visitor', ['id_petugas_pintu_area' => $this->session->userdata("staff_id")])->num_rows();
			$data['hitung_visitor_keluar_event'] = $this->db->get_where('tabel_visitor', ['status' => 'telah_keluar_event'])->num_rows();
			
			// echo 'selamat datang ' . $data['tb_user']['username'];
			// $this->load->view('template/staff_only/header', $data);
			$this->load->view('page/staff_only/petugas/petugas_scan_tracking', $data);
			// $this->load->view('template/staff_only/footer', $data);

			// $this->load->view('template/staff_only/header', $data);
			// $this->load->view('page/staff_only/petugas/petugas_scan', $data);
			// $this->load->view('template/staff_only/footer', $data);
		}

		// aksi petugas
			public function petugas_scan($tipe_scan, $id_visitor){
				if($tipe_scan == "pintu_keluar"){
					if($this->input->is_ajax_request()){
						if($this->staff_model->validasi_scan_visitor($tipe_scan, $id_visitor) == true){
							$this->staff_model->aksi_scan_visitor("pintu_keluar", $id_visitor);

							$hitung_visitor_scan_keluar = $this->db->get_where('tabel_visitor', ['id_petugas_pintu_keluar' => $this->session->userdata('staff_id')])->num_rows();
							$visitor_scan_keluar = $this->db->order_by('time_out_event', 'DESC')->get_where('tabel_visitor', ['id_petugas_pintu_keluar' => $this->session->userdata('staff_id')])->result();
							
							$hitung_visitor_masuk_event = $this->db->get_where('tabel_visitor', ['status' => 'telah_masuk_event', 'status' => 'didalam_area'])->num_rows();
							$hitung_visitor_keluar_event = $this->db->get_where('tabel_visitor', ['status' => 'telah_keluar_event'])->num_rows();

							$view_tabel_data_visitor_keluar = $this->load->view('tabel/tabel_data_visitor_keluar', array(
								'visitor_scan_keluar' => $visitor_scan_keluar, 
								'hitung_visitor_scan_keluar' => $hitung_visitor_scan_keluar
							), true);

							$view_chart_visitor_keluar_masuk_event = $this->load->view('chart/chart_visitor_keluar_masuk_event', array(
								'hitung_visitor_masuk_event' => $hitung_visitor_masuk_event,
								'hitung_visitor_keluar_event' => $hitung_visitor_keluar_event
							), true);

							$callback = array(
								'status'=>'sukses',
								'pesan'=>'visitor berhasil keluar event.',
								'view_tabel_data_visitor_keluar'=>$view_tabel_data_visitor_keluar,
								'view_chart_visitor_keluar_masuk_event'=>$view_chart_visitor_keluar_masuk_event
							);
						}else{
							$callback = array(
								'status'=>'gagal',
								'field_scan_id_visitor_error' => 'ID visitor tidak valid'
							);
						}
						echo json_encode($callback);
					}
				}elseif($tipe_scan == "pintu_area"){
					if($this->input->is_ajax_request()){
						if($this->staff_model->validasi_scan_visitor($tipe_scan, $id_visitor) == true){
							$pesan = $this->staff_model->aksi_scan_visitor("pintu_area", $id_visitor);

							$all_visitor = $this->staff_model->get_tb_visitor();
							$hitung_visitor_scan_keluarmasuk_area = $this->db->get_where('tabel_tracking', ['id_petugas_pintu_area' => $this->session->userdata('staff_id')])->num_rows();
							$visitor_scan_keluarmasuk_area = $this->db->order_by('time_in_area', 'DESC')->get_where('tabel_tracking', ['id_petugas_pintu_area' => $this->session->userdata('staff_id')])->result();
							
							$hitung_visitor_diluar_area = $this->db->get_where('tabel_visitor', ['status' => 'telah_masuk_event'])->num_rows();
							$hitung_visitor_didalam_area = $this->db->get_where('tabel_visitor', ['id_petugas_pintu_area' => $this->session->userdata("staff_id")])->num_rows();

							$view_tabel_data_visitor_keluarmasuk_area = $this->load->view('tabel/tabel_data_visitor_keluarmasuk_area', array(
								'all_visitor' => $all_visitor, 
								'visitor_scan_keluarmasuk_area' => $visitor_scan_keluarmasuk_area, 
								'hitung_visitor_scan_keluarmasuk_area' => $hitung_visitor_scan_keluarmasuk_area
							), true);

							$view_chart_visitor_keluar_masuk_area = $this->load->view('chart/chart_visitor_keluar_masuk_area', array(
								'hitung_visitor_diluar_area' => $hitung_visitor_diluar_area,
								'hitung_visitor_didalam_area' => $hitung_visitor_didalam_area,
							), true);

							$callback = array(
								'status'=>'sukses',
								'pesan'=>$pesan,
								'view_tabel_data_visitor_keluarmasuk_area'=>$view_tabel_data_visitor_keluarmasuk_area,
								'view_chart_visitor_keluar_masuk_area'=>$view_chart_visitor_keluar_masuk_area
							);
						}else{
							$callback = array(
								'status'=>'gagal',
								'field_scan_id_visitor_error' => 'ID visitor tidak valid'
							);
						}
						echo json_encode($callback);
					}
				}
			}



	public function logout(){
		$log_stat = 'offline';
		$this->db->set('is_active', $log_stat);
		$this->db->where('staff_id', $this->session->userdata('staff_id'));
		$this->db->update('tabel_staff');

		$this->db->delete('ci_sessions', ["user_id" => $this->session->userdata('staff_id'), "id" => session_id()]); // hapus data sesion dari database

		$session_aktif = array('staff_id', 'role_id', 'username', 'password', 'nama', 'verified', 'is_active');
		$this->session->unset_userdata($session_aktif);

		session_regenerate_id(); // Update the current session id with a newly generated one
		$this->session->set_flashdata('sukses', 'Anda sudah berhasil keluar !');
		redirect('staff_only/login');
	}
}
?>
