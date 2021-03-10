<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main_controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	protected $id_event, $id_visitor, $id_area, $id_petugas, $id_tugas, $event_id, $staff_id, $ci_session_visitor_id, $password;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('main_model');
		$this->load->library('form_validation', 'ciqrcode', 'session');

		if(!empty($_SESSION['staff_id'])) {
			// if (time()-$_SESSION['waktu_aktif']>ini_get("session.gc_maxlifetime")){
			if (time()-$_SESSION['waktu_aktif']>86400){ // 1 hari waktu session
				$log_stat = 'offline';
				$this->db->set('is_active', $log_stat);
				$this->db->where('staff_id', $this->session->userdata('staff_id'));
				$this->db->update('tabel_staff');

				$this->db->delete('ci_sessions', ["user_id" => $this->session->userdata('staff_id'), "id" => session_id()]); // hapus data sesion dari database

				$session_aktif = array('staff_id', 'role_id', 'username', 'nama', 'sedang_bertugas', 'id_tugas', 'verified', 'is_active', 'waktu_aktif');
				$this->session->unset_userdata($session_aktif);

				session_regenerate_id(); // Update the current session id with a newly generated one
				$this->session->set_flashdata('sukses', 'Sesi anda telah berakhir !');
				redirect('staff_only/login');
			}else{
				$_SESSION['waktu_aktif']=time();
			}
		}else{
			$tabel_session = $this->db->get('ci_sessions')->result();
			$tabel_staff = $this->db->get('tabel_staff')->result();

			foreach($tabel_session as $data_session){
				foreach($tabel_staff as $data_staff){
					if($data_session->user_id == $data_staff->staff_id){
						if(time()-$data_session->timestamp>86400){ // 1 hari waktu session
							$log_stat = 'offline';
							$this->db->set('is_active', $log_stat);
							$this->db->where('staff_id', $data_session->user_id);
							$this->db->update('tabel_staff');

							$this->db->delete('ci_sessions', ["user_id" => $data_session->user_id]); // hapus data sesion dari database
						}
					}
				}
			}

		}
	}

	public function index(){

		$data["title"] = "Visitor Management";
		$this->load->view('template/visitor/b4/header', $data);
		$this->load->view('index');
		$this->load->view('template/visitor/b4/footer');

	}

	public function index_visitor(){
		redirect('visitor/register');
	}
	public function index_staff(){
		redirect('staff_only/login');
	}

	public function redirect_register(){
		redirect('visitor/register');
	}

	public function cek_event_jamDitutup($custom_url){
		if($this->input->is_ajax_request()){
			$event = $this->db->get_where('tabel_event', ['custom_url' => $custom_url])->row_array();
			
			if($event["status"] == "active"){ // jika status event aktif
				if(mdate('%H:%i:%s') >= $event["jam_ditutup"]){ // jika jam sekarang lebih atau sama dengan dari jam tutup event

					if($this->session->userdata("id_visitor")){ // jika masih ada session
						$tabel_tracking = $this->db->get("tabel_tracking")->result();
						$tabel_visitor = $this->db->get("tabel_visitor")->result();
						
						foreach($tabel_visitor as $data_tabel_visitor){
							if($data_tabel_visitor->id_visitor == $this->session->userdata("id_visitor")){
								if($data_tabel_visitor->status == "didalam_area"){
									$data_update_tabel_tracking = [
										"time_out_area" => htmlspecialchars(mdate("%Y-%m-%d %H:%i:%s")),
									];
									$this->db->order_by('time_in_area', 'DESC')->limit(1)->update('tabel_tracking', $data_update_tabel_tracking, ["id_visitor"=>$this->session->userdata("id_visitor")]);
								}
							}
						}
		
						$this->db->update('tabel_visitor', ['id_petugas_pintu_area' => null, 'id_petugas_pintu_keluar' => $this->session->userdata('staff_id'), 'time_out_event' => htmlspecialchars(mdate("%Y-%m-%d %H:%i:%s")), 'status' => 'telah_keluar_event'], ['id_visitor' => $this->session->userdata("id_visitor")]);

						// hapus gambar barcode visitor berdasarkan id_visitor
							// unlink(FCPATH . 'assets/img/barcode/' . $this->session->userdata("id_visitor") .'.png');
							unlink(FCPATH . 'assets/img/qrcode/' . $this->session->userdata("id_visitor") .'.png');
				
						// update ci_sessions visitor
						// $this->db->update('ci_sessions', ["status"=>"visitor_telah_keluar_event"], ['user_id' => $id_visitor]);
						$this->db->delete('ci_sessions', ['user_id' => $this->session->userdata("id_visitor")]);
	
						$event_data = $this->db->get_where('tabel_event', ['custom_url' => $custom_url])->row_array();
						$all_area = $this->db->get('tabel_area')->result();
						$all_data_saya = $this->db->get_where('tabel_visitor', ["id_visitor" => $this->session->userdata("id_visitor")])->row_array();
						$all_data_tracking_saya = $this->db->order_by('time_in_area', 'DESC')->get_where('tabel_tracking', ["id_visitor" => $this->session->userdata("id_visitor")])->result();
						$all_data_tracking_saya_1 = $this->db->order_by('time_in_area', 'DESC')->limit(1)->get_where('tabel_tracking', ["id_visitor" => $this->session->userdata("id_visitor")])->result();
						$data_session = $this->db->get_where('ci_sessions', ["user_id" => $this->session->userdata("id_visitor")])->row_array();

						$view_register = $this->load->view('registrasi/b4/view_register', array(
							"event" => $event_data,
							"nama_event" => $event_data["nama_event"],
							"all_data_saya" => $all_data_saya, 
							"all_data_tracking_saya" => $all_data_tracking_saya, 
							"all_data_tracking_saya_1" => $all_data_tracking_saya_1, 
							"all_area" => $all_area, 
							"data_session"=>$data_session
						), true);

						$callback = array(
							"view_register" => $view_register,
							"event_status" => $event["status"]
						);
						// redirect($custom_url);
						// header('Location: '.base_url().$custom_url); 
						// header("Refresh:0");
					}else{ // jika tidak ada session
						$event_data = $this->db->get_where('tabel_event', ['custom_url' => $custom_url])->row_array();
						$all_area = $this->db->get('tabel_area')->result();
						$all_data_saya = $this->db->get_where('tabel_visitor', ["id_visitor" => $this->session->userdata("id_visitor")])->row_array();
						$all_data_tracking_saya = $this->db->order_by('time_in_area', 'DESC')->get_where('tabel_tracking', ["id_visitor" => $this->session->userdata("id_visitor")])->result();
						$all_data_tracking_saya_1 = $this->db->order_by('time_in_area', 'DESC')->limit(1)->get_where('tabel_tracking', ["id_visitor" => $this->session->userdata("id_visitor")])->result();
						$data_session = $this->db->get_where('ci_sessions', ["user_id" => $this->session->userdata("id_visitor")])->row_array();

						$view_register = $this->load->view('registrasi/b4/view_register', array(
							"event" => $event_data,
							"nama_event" => $event_data["nama_event"],
							"all_data_saya" => $all_data_saya, 
							"all_data_tracking_saya" => $all_data_tracking_saya, 
							"all_data_tracking_saya_1" => $all_data_tracking_saya_1, 
							"all_area" => $all_area, 
							"data_session"=>$data_session
						), true);

						$callback = array(
							"view_register" => $view_register,
							"event_status" => $event_data["status"]
						);
						// header('Location: '.base_url().$custom_url); 
						// header("Refresh:0");
					}
					
				}else{ // jika jam sekarang kurang dari jam tutup event
					$callback = array(
						// "event_status" => $event["status"]
					);
				}
			}else{ // jika status event tidak aktif
				if($this->session->userdata("id_visitor")){ // jika session masih ada
					$tabel_tracking = $this->db->get("tabel_tracking")->result();
					$tabel_visitor = $this->db->get("tabel_visitor")->result();
					
					foreach($tabel_visitor as $data_tabel_visitor){
						if($data_tabel_visitor->id_visitor == $this->session->userdata("id_visitor")){
							if($data_tabel_visitor->status == "didalam_area"){
								$data_update_tabel_tracking = [
									"time_out_area" => htmlspecialchars(mdate("%Y-%m-%d %H:%i:%s")),
								];
								$this->db->order_by('time_in_area', 'DESC')->limit(1)->update('tabel_tracking', $data_update_tabel_tracking, ["id_visitor"=>$this->session->userdata("id_visitor")]);
							}
						}
					}
	
					$this->db->update('tabel_visitor', ['id_petugas_pintu_area' => null, 'id_petugas_pintu_keluar' => $this->session->userdata('staff_id'), 'time_out_event' => htmlspecialchars(mdate("%Y-%m-%d %H:%i:%s")), 'status' => 'telah_keluar_event'], ['id_visitor' => $this->session->userdata("id_visitor")]);
					// hapus gambar barcode visitor berdasarkan id_visitor
	
						unlink(FCPATH . 'assets/img/barcode/' . $this->session->userdata("id_visitor") .'.png');
			
					// update ci_sessions visitor
					// $this->db->update('ci_sessions', ["status"=>"visitor_telah_keluar_event"], ['user_id' => $id_visitor]);
					$this->db->delete('ci_sessions', ['user_id' => $this->session->userdata("id_visitor")]);
				}

				$event_data = $this->db->get_where('tabel_event', ['custom_url' => $custom_url])->row_array();
				$all_area = $this->db->get('tabel_area')->result();
				$all_data_saya = $this->db->get_where('tabel_visitor', ["id_visitor" => $this->session->userdata("id_visitor")])->row_array();
				$all_data_tracking_saya = $this->db->order_by('time_in_area', 'DESC')->get_where('tabel_tracking', ["id_visitor" => $this->session->userdata("id_visitor")])->result();
				$all_data_tracking_saya_1 = $this->db->order_by('time_in_area', 'DESC')->limit(1)->get_where('tabel_tracking', ["id_visitor" => $this->session->userdata("id_visitor")])->result();
				$data_session = $this->db->get_where('ci_sessions', ["user_id" => $this->session->userdata("id_visitor")])->row_array();

				$view_register = $this->load->view('registrasi/b4/view_register', array(
					"event" => $event_data,
					"nama_event" => $event_data["nama_event"],
					"all_data_saya" => $all_data_saya, 
					"all_data_tracking_saya" => $all_data_tracking_saya, 
					"all_data_tracking_saya_1" => $all_data_tracking_saya_1, 
					"all_area" => $all_area, 
					"data_session"=>$data_session
				), true);

				$callback = array(
					"view_register" => $view_register,
					"event_status" => $event["status"]
				);
			}
		};
		// var_dump($callback_status);
		echo json_encode($callback);
	}

	public function page_register_visitor($custom_url){
		$event_data = $this->db->get_where('tabel_event', ['custom_url' => $custom_url])->row_array();

		if($event_data){
			// $this->session->sess_destroy();
			$data["id_event"] = $event_data["id_event"];
			$data["nama_event"] = $event_data["nama_event"];
			$data["custom_url"] = $event_data["custom_url"];
			$data["title"] = "VM - Welcome";
	
			$data["event"] = $event_data;
			$data["all_area"] = $this->db->get('tabel_area')->result();
			$data["all_data_saya"] = $this->db->get_where('tabel_visitor', ["id_visitor" => $this->session->userdata("id_visitor")])->row_array();
			$data["all_data_tracking_saya"] = $this->db->order_by('time_in_area', 'DESC')->get_where('tabel_tracking', ["id_visitor" => $this->session->userdata("id_visitor")])->result();
			$data["all_data_tracking_saya_1"] = $this->db->order_by('time_in_area', 'DESC')->limit(1)->get_where('tabel_tracking', ["id_visitor" => $this->session->userdata("id_visitor")])->result();
			$data["data_session"] = $this->db->get_where('ci_sessions', ["user_id" => $this->session->userdata("id_visitor")])->row_array();
			
			// $this->load->view('template/visitor/header', $data);
			// $this->load->view('visitorRegister2', $data);
			// $this->load->view('template/visitor/footer', $data);
			
			$this->load->view('template/visitor/b4/header', $data);
			$this->load->view('visitor_register', $data);
			$this->load->view('template/visitor/b4/footer', $data);
	
			if($this->session->userdata("id_visitor")){
				$cek_visitor_keluar_event = $this->db->get_where('ci_sessions', ["id" => session_id(), "user_id"=>$this->session->userdata("id_visitor")])->row_array();
				if($cek_visitor_keluar_event["status"] == "visitor_telah_keluar_event"){
					$this->db->delete('ci_sessions', ['user_id' => $this->session->userdata("id_visitor")]);
				}
			}
		}else{
			redirect('block');
		}
	}
	
	public function page_login_staff(){
		// $this->session->sess_destroy();
		if($this->session->userdata('username')){ // jika ada session dari staff
			if($this->session->userdata('role_id') == '1'){
				$this->session->set_flashdata('harap_logout', 'harap logout terlebih dahulu !');
				redirect('staff_only/admin/home');
			}elseif($this->session->userdata('role_id') == '2'){
				$this->session->set_flashdata('harap_logout', 'harap logout terlebih dahulu !');
				redirect('staff_only/petugas/scan');
			}
		}

		$this->form_validation->set_rules('username', 'username', 'required|trim', [
			'required' => 'field username harus diisi !'
		]);
		$this->form_validation->set_rules('password', 'password', 'required|trim', [
			'required' => 'field password harus diisi !'
		]);
		if($this->form_validation->run() == false){
			$data["title"] = "VM - Login";
			$this->load->view('template/staff_only/header', $data);
			$this->load->view('login');
			$this->load->view('template/staff_only/footer');
		}else{
			// echo 'berhasil';
			$this->_aksi_login_staff();
		}
	}

	private function _aksi_login_staff(){
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		$staff = $this->db->get_where('tabel_staff', ['username' => $username])->row_array();
		$role = $this->db->get_where('tabel_role', ['role_id' => $staff['role_id']])->row_array();
		$tugas_staff = $this->db->get_where('tabel_tugas_staff_petugas', ["id_tugas"=>$staff["id_tugas"]])->row_array();
		$event = $this->db->get_where('tabel_event', ["id_event"=>$tugas_staff["id_event"]])->row_array();

		if($staff){ // staff terdeteksi ada
			if($staff['verified'] == '1'){
				if($staff['is_active'] == 'offline'){

					if(password_verify($password, $staff['password'])){
					// if($password == $staff['password']){

						if($staff["sedang_bertugas"] == true || $role["role_id"] == "1"){
							
							if($event["status"] != "not_active"){
								$log_stat = 'online';
								$this->db->set('is_active', $log_stat);
								$this->db->where('staff_id', $staff['staff_id']);
								$this->db->update('tabel_staff');
								$staff = $this->db->get_where('tabel_staff', ['username' => $username])->row_array();
								
								if($staff["role_id"] == "1"){
									$this->db->update('ci_sessions', ["user_id" => $staff['staff_id'], "status"=>"adalah_staff"], ["id" => session_id()]);
								}elseif($staff["role_id"] == "2"){
									$this->db->update('ci_sessions', ["user_id" => $staff['staff_id'], "id_event"=>$tugas_staff['id_event'], "status"=>"adalah_staff"], ["id" => session_id()]);
								}
		
								$data = [
									"staff_id" => $staff["staff_id"],
									"role_id" => $staff["role_id"],
									"username" => $staff["username"],
									"nama" => $staff["nama"],
									"sedang_bertugas" => $staff["sedang_bertugas"],
									"id_tugas" => $staff["id_tugas"],
									"verified" => $staff["verified"],
									"is_active" => $staff["is_active"],
									"waktu_aktif" => time()
								];
								// $this->session->sess_expiration = '60';// expires in 4 hours (14400)
								$this->session->set_userdata($data);
		
								// cek tipe user
								if($role['role_id'] == '1'){
									redirect('staff_only/admin/home');
								}elseif($role['role_id'] == '2'){
									redirect('staff_only/petugas/scan');
								}else{
									echo 'role tidak dikenal !';
								}
							}else{
								$this->session->set_flashdata('gagal', 'Maaf, event ini sudah ditutup');
								redirect('staff_only/login');
							}

						}else{
							$this->session->set_flashdata('gagal', 'Maaf, anda belum bertugas pada event manapun, silahkan komunikasikan dengan pihak yang bertanggung jawab');
							redirect('staff_only/login');
						}

					}else{
						$this->session->set_flashdata('gagal', 'Username atau password salah !');
						redirect('staff_only/login');
					}

				}else{
					$this->session->set_flashdata('gagal', 'Staff ini sedang aktif !');
					redirect('staff_only/login');
				}

			}else{
				$this->session->set_flashdata('gagal', 'Staff ini belum di verifikasi !');
				redirect('staff_only/login');
			}

		}else{
			$this->session->set_flashdata('gagal', 'Staff ini belum terdaftar !');
			redirect('staff_only/login');
		}
		
	}

	public function aksi_register_visitor($id_event){
		if($this->input->is_ajax_request()){
	
			if($this->main_model->validasi_register_pengunjung() == true){
				// buat kostum id
					// $hitung_total_visitor = $this->db->query('SELECT * FROM tabel_visitor')->num_rows()+1;
					// $id_visitor = "VSTR".mdate("%Y%m%d%H%i%s").$hitung_total_visitor;
					if($this->db->query('SELECT * FROM tabel_visitor')->num_rows() > 0){
						$data = $this->db->query('SELECT * FROM tabel_visitor')->num_rows();
						$kode = $data+1;
					}else{
						$kode = 1;
					}
					// $tgl = mdate("%y%m%d%H%i%s");
					$d = new DateTime();
					$tgl = $d->format("ymdu");
					$batas_user = str_pad($kode, 7, "0", STR_PAD_LEFT);
					$id_visitor = "VSTR".$tgl.$batas_user;

				$this->main_model->simpan_register_pengunjung($id_visitor, $id_event);

				// qr code
					$config['cacheable'] = true; //boolean, the default is true
					$config['cachedir'] = 'assets/'; //string, the default is application/cache/
					$config['errorlog'] = 'assets/'; //string, the default is application/logs/
					$config['imagedir'] = 'assets/img/qrcode/'; //direktori penyimpanan qr code
					$config['quality'] = true; //boolean, the default is true
					$config['size'] = '1024'; //interger, the default is 1024
					$config['black'] = array(224,255,255); // array, default is array(255,255,255)
					$config['white'] = array(70,130,180); // array, default is array(0,0,0)
					$this->ciqrcode->initialize($config);
					$image_name= $id_visitor.'.png';
					$params['data'] = $id_visitor; //data yang akan di jadikan QR CODE
					$params['level'] = 'H'; //H=High
					$params['size'] = 10;
					$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/img/qrcode/
					$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
				
				// barcode
					// $generatorJPG = new Picqer\Barcode\BarcodeGeneratorJPG();
					// file_put_contents('assets/img/barcode/'.$id_visitor.'.png', $generatorJPG->getBarcode($id_visitor, $generatorJPG::TYPE_CODE_128));

				$event_data = $this->db->get_where('tabel_event', ['id_event' => $id_event])->row_array();
				$all_area = $this->db->get('tabel_area')->result();
				$all_data_saya = $this->db->get_where('tabel_visitor', ["id_visitor" => $this->session->userdata("id_visitor")])->row_array();
				$all_data_tracking_saya = $this->db->order_by('time_in_area', 'DESC')->get_where('tabel_tracking', ["id_visitor" => $this->session->userdata("id_visitor")])->result();
				$all_data_tracking_saya_1 = $this->db->order_by('time_in_area', 'DESC')->limit(1)->get_where('tabel_tracking', ["id_visitor" => $this->session->userdata("id_visitor")])->result();
				$data_session = $this->db->get_where('ci_sessions', ["user_id" => $this->session->userdata("id_visitor")])->row_array();
				
				// Load ulang view_register.php agar data yang baru bisa muncul di tabel pada visitorRegister2.php
				// $html = $this->load->view('registrasi/view_register', array(
				// 	"all_area" => $all_area,
				// 	"all_data_saya" => $all_data_saya,
				// 	"all_data_tracking_saya" => $all_data_tracking_saya,
				// 	"all_data_tracking_saya_1" => $all_data_tracking_saya_1
				// ), true);
				
				$html = $this->load->view('registrasi/b4/view_register', array(
					"event" => $event_data,
					"nama_event" => $event_data["nama_event"],
					"all_data_saya" => $all_data_saya, 
					"all_data_tracking_saya" => $all_data_tracking_saya, 
					"all_data_tracking_saya_1" => $all_data_tracking_saya_1, 
					"all_area" => $all_area, 
					"data_session"=>$data_session
				), true);

				$callback = array(
					'status'=>'sukses',
					'pesan'=>'Hore! anda sudah terdaftar.',
					'html'=>$html
				);
			}else{
				$callback = array(
					'status'=>'gagal',
					'nama_depan_error' => form_error('nama_depan'),
					'nama_belakang_error' => form_error('nama_belakang'),
					// 'nama_perusahaan_error' => form_error('nama_perusahaan'),
					// 'jabatan_error' => form_error('jabatan'),
					'email_pribadi_error' => form_error('email_pribadi'),
					// 'email_perusahaan_error' => form_error('email_perusahaan'),
					'notlp_pribadi_error' => form_error('notlp_pribadi'),
					// 'notlp_perusahaan_error' => form_error('notlp_perusahaan'),
					// 'alasan_error' => form_error('alasan'),
					// 'pesan'=>validation_errors()
				);
			}
			echo json_encode($callback);
		}
		// var_dump($callback);

	}

	public function visitor_logout(){
		$cek_visitor_keluar_event = $this->db->get_where('ci_sessions', ["id" => session_id(), "user_id"=>$this->session->userdata("id_visitor")])->row_array();
		if($cek_visitor_keluar_event["status"] == "visitor_telah_keluar_event"){
			$this->db->delete('ci_sessions', ['user_id' => $this->session->userdata("id_visitor")]);
			redirect('/');
		}elseif($cek_visitor_keluar_event["status"] == "visitor_telah_masuk_event"){
			redirect('visitor/register');
		}else{
			redirect('/');
		}
	}

	public function block(){
		$data["title"] = "VM - Block";
		$this->load->view('template/visitor/b4/header', $data);
		$this->load->view('block');
		$this->load->view('template/visitor/b4/footer');
	}
}
