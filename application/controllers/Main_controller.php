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

	public function index()
	{
		// $this->load->view('welcome_message');
		echo "welcome / index";

		// menghubungkan ke view:
			// $this->load->view('nama_file_view_didalam_folder_app/view');
		// menghubungkan ke model:
			// 1. buat pemanggilan model dahulu
				// $this->load->model('nama_file_model')
			// 2. buat fungsinya
				// $this->nama_file_model->nama_function_didalam_model_tsb();
			// 3. buat variabel untuk menampung data
				// $data['nama_array'] = $this->nama_file_model->nama_function_didalam_model_tsb();
			// 4. kirim ke view
				// $this->load->view('nama_file_view_didalam_folder_app/view', $data);
				
	}

	public function page_register(){
		// $this->session->sess_destroy();
		$data["nama_event"] = 'nama eventasdasd';
		// $data["id_visitor"] = $this->session->userdata('id_visitor');
		// $data["nama_visitor"] = $this->session->userdata('nama_visitor');
		// $data["qrcode"] = $this->session->userdata('gambar_qrcode');
		// $data["status_login"] = $this->session->userdata('status');
		
		$this->load->view('template/pengunjung/header', $data);
		$this->load->view('visitorRegister2', $data);
		$this->load->view('template/pengunjung/footer', $data);
	}

	public function register(){
		// if($this->input->is_ajax_request()){
	
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
					$tgl = mdate("%Y%m%d%H%i%s");
					$batas_user = str_pad($kode, 7, "0", STR_PAD_LEFT);
					$id_visitor = "VSTR".$tgl.$batas_user;

				$this->main_model->simpan_register_pengunjung($id_visitor);

				// qr code
					$config['cacheable'] = true; //boolean, the default is true
					$config['cachedir'] = './assets/'; //string, the default is application/cache/
					$config['errorlog'] = './assets/'; //string, the default is application/logs/
					$config['imagedir'] = './assets/img/qrcode/'; //direktori penyimpanan qr code
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

				// Load ulang view_register.php agar data yang baru bisa muncul di tabel pada visitorRegister2.php
				// $data["nama_event"] = 'nama event';
				// $data["id_visitor"] = $this->session->userdata('id_visitor');
				// $data["nama_visitor"] = $this->session->userdata('nama_visitor');
				// $data["qrcode"] = $this->session->userdata('gambar_qrcode');
				// $data["status_login"] = $this->session->userdata('status');
				$html = $this->load->view('registrasi/view_register', array('plain'=>'null'), true);

				$callback = array(
					'status'=>'sukses',
					'pesan'=>'Data berhasil disimpan',
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
		// }
		// var_dump($callback);

	}
}
