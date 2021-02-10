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
	public function __construct()
	{
		parent::__construct();
		$this->load->model('main_model');
		$this->load->library('form_validation', 'ciqrcode');
	}

	// public function coba_parameter($nama){
	// 	echo $nama;
	// }

	public function index_visitor(){
		redirect('visitor/register');
	}
	public function index_staff(){
		redirect('staff_only/login');
	}

	// public function coba_barcode(){
		// 	$generatorHTML = new Picqer\Barcode\BarcodeGeneratorHTML();
		// 	$generatorSVG = new Picqer\Barcode\BarcodeGeneratorSVG();
		// 	$generatorPNG = new Picqer\Barcode\BarcodeGeneratorPNG();
		// 	$generatorJPG = new Picqer\Barcode\BarcodeGeneratorJPG();

		// 	// Most used types are TYPE_CODE_128 and TYPE_CODE_39. Because of the best scanner support, variable length and most chars supported.
		// 	// Code 128 and Code 39 should not be used for products that are for sale in retail stores (retail products need EAN barcodes).

		// 	$kode_angka = '1234567890';
		// 	$kode_huruf = 'abcdefghijklmnopqrstuvwxyz';
		// 	// echo $generatorHTML->getBarcode('210131000001', $generatorHTML::TYPE_CODE_128);
		// 	// file_put_contents('assets/img/barcode/'.$kode.'.jpg', $generatorJPG->getBarcode($kode, $generatorJPG::TYPE_CODABAR));
		// 	file_put_contents('assets/img/barcode/'.$kode_angka.'.png', $generatorJPG->getBarcode($kode_angka, $generatorJPG::TYPE_CODE_128));
		// 	echo '<img src="assets/img/barcode/'.$kode_angka.'.png">';
		// 	// echo '<img src="data:image/png;base64,' . base64_encode($generatorPNG->getBarcode($kode, $generatorPNG::TYPE_CODE_128)) . '">';

		// 	// save jpg barcode to disk
		// 	// $generator = new Picqer\Barcode\BarcodeGeneratorJPG();
		// 	// file_put_contents('barcode.jpg', $generator->getBarcode('081231723897', $generator::TYPE_CODABAR));
	// }

	public function redirect_register(){
		redirect('visitor/register');
	}

	public function page_register_visitor(){
		// $this->session->sess_destroy();
		$data["nama_event"] = 'nama event';

		$data["all_area"] = $this->db->get('tabel_area')->result();
		$data["all_data_saya"] = $this->db->get_where('tabel_visitor', ["id_visitor" => $this->session->userdata("id_visitor")])->row_array();
		$data["all_data_tracking_saya"] = $this->db->order_by('time_in_area', 'DESC')->get_where('tabel_tracking', ["id_visitor" => $this->session->userdata("id_visitor")])->result();
		$data["all_data_tracking_saya_1"] = $this->db->order_by('time_in_area', 'DESC')->limit(1)->get_where('tabel_tracking', ["id_visitor" => $this->session->userdata("id_visitor")])->result();
		
		$this->load->view('template/visitor/header', $data);
		$this->load->view('visitorRegister2', $data);
		$this->load->view('template/visitor/footer', $data);
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
			$this->load->view('template/staff_only/header');
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

		if($staff){ // staff terdeteksi ada
			if($staff['verified'] == '1'){
				if($staff['is_active'] == 'offline'){

					if(password_verify($password, $staff['password'])){
					// if($password == $staff['password']){
						$log_stat = 'online';
						$this->db->set('is_active', $log_stat);
						$this->db->where('staff_id', $staff['staff_id']);
						$this->db->update('tabel_staff');
						$staff = $this->db->get_where('tabel_staff', ['username' => $username])->row_array();

						$this->db->update('ci_sessions', ["user_id" => $staff['staff_id']], ["id" => session_id()]);

						$data = [
							"staff_id" => $staff["staff_id"],
							"role_id" => $staff["role_id"],
							"username" => $staff["username"],
							"nama" => $staff["nama"],
							"sedang_bertugas" => $staff["sedang_bertugas"],
							"id_tugas" => $staff["id_tugas"],
							"verified" => $staff["verified"],
							"is_active" => $staff["is_active"]
						];
						// $this->session->sess_expiration = '10';// expires in 4 hours (14400)
						$this->session->set_userdata($data);
						// $session = $this->session->set_userdata($data);
						// var_dump($session);
						// die;

						// cek tipe user
						if($role['role_id'] == '1'){
							redirect('staff_only/admin/home');
						}elseif($role['role_id'] == '2'){
							redirect('staff_only/petugas/scan');
						}else{
							echo 'role tidak dikenal !';
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

	public function aksi_register_visitor(){
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
					// $id_visitor = "VSTR".$tgl.$batas_user;
					$id_visitor = "VSTR".$tgl.$batas_user;

				$this->main_model->simpan_register_pengunjung($id_visitor);

				// qr code
					// $config['cacheable'] = true; //boolean, the default is true
					// $config['cachedir'] = './assets/'; //string, the default is application/cache/
					// $config['errorlog'] = './assets/'; //string, the default is application/logs/
					// $config['imagedir'] = './assets/img/qrcode/'; //direktori penyimpanan qr code
					// $config['quality'] = true; //boolean, the default is true
					// $config['size'] = '1024'; //interger, the default is 1024
					// $config['black'] = array(224,255,255); // array, default is array(255,255,255)
					// $config['white'] = array(70,130,180); // array, default is array(0,0,0)
					// $this->ciqrcode->initialize($config);
					// $image_name= $id_visitor.'.png';
					// $params['data'] = $id_visitor; //data yang akan di jadikan QR CODE
					// $params['level'] = 'H'; //H=High
					// $params['size'] = 10;
					// $params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/img/qrcode/
					// $this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
				
				// barcode
					$generatorJPG = new Picqer\Barcode\BarcodeGeneratorJPG();
					file_put_contents('assets/img/barcode/'.$id_visitor.'.png', $generatorJPG->getBarcode($id_visitor, $generatorJPG::TYPE_CODE_128));

				$all_area = $this->db->get('tabel_area')->result();
				$all_data_saya = $this->db->get_where('tabel_visitor', ["id_visitor" => $this->session->userdata("id_visitor")])->row_array();
				$all_data_tracking_saya = $this->db->order_by('time_in_area', 'DESC')->get_where('tabel_tracking', ["id_visitor" => $this->session->userdata("id_visitor")])->result();
				$all_data_tracking_saya_1 = $this->db->order_by('time_in_area', 'DESC')->limit(1)->get_where('tabel_tracking', ["id_visitor" => $this->session->userdata("id_visitor")])->result();
				
				// Load ulang view_register.php agar data yang baru bisa muncul di tabel pada visitorRegister2.php
				$html = $this->load->view('registrasi/view_register', array(
					"all_area" => $all_area,
					"all_data_saya" => $all_data_saya,
					"all_data_tracking_saya" => $all_data_tracking_saya,
					"all_data_tracking_saya_1" => $all_data_tracking_saya_1
				), true);

				$callback = array(
					'status'=>'sukses',
					'pesan'=>'Selamat! anda sudah terdaftar.',
					'html'=>$html
				);
			}else{
				$callback = array(
					'status'=>'gagal',
					'nama_depan_error' => form_error('nama_depan'),
					'nama_belakang_error' => form_error('nama_belakang'),
					'nama_perusahaan_error' => form_error('nama_perusahaan'),
					'jabatan_error' => form_error('jabatan'),
					'email_pribadi_error' => form_error('email_pribadi'),
					'email_perusahaan_error' => form_error('email_perusahaan'),
					'notlp_pribadi_error' => form_error('notlp_pribadi'),
					'notlp_perusahaan_error' => form_error('notlp_perusahaan'),
					'alasan_error' => form_error('alasan'),
					// 'pesan'=>validation_errors()
				);
			}
			echo json_encode($callback);
		}
		// var_dump($callback);

	}
}
