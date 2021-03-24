<?php 

class Main_model extends CI_Model{

	protected $id_event, $id_visitor, $ci_session_visitor_id, $password;

	public function validasi_register_pengunjung(){
		$this->form_validation->set_rules('nama_depan', 'nama depan', 'required|trim', [
			'required' => 'Nama depan harus diisi !'
		]);
		$this->form_validation->set_rules('nama_belakang', 'nama belakang', 'required|trim', [
			'required' => 'Nama belakang harus diisi !'
		]);
		// $this->form_validation->set_rules('nama_perusahaan', 'nama perusahaan', 'required|trim', [
		// 	'required' => 'Nama perusahaan harus diisi !'
		// ]);
		// $this->form_validation->set_rules('jabatan', 'jabatan', 'required|trim', [
		// 	'required' => 'Jabatan anda harus diisi !'
		// ]);
		$this->form_validation->set_rules('email_pribadi', 'email pribadi', 'required|valid_email|trim', [
			'required' => 'Email anda harus diisi !',
			'valid_email' => 'Email tidak benar !'
		]);
		// $this->form_validation->set_rules('email_perusahaan', 'email perusahaan', 'required|valid_email|trim', [
		// 	'required' => 'Email Perusahaan harus diisi !',
		// 	'valid_email' => 'Email tidak benar !'
		// ]);
		$this->form_validation->set_rules('notlp_pribadi', 'nomor telepon pribadi', 'required|numeric|trim', [
			'required' => 'Nomor telepon anda harus diisi !',
			'numeric' => 'Isi no telepon harus angka !'
		]);
		// $this->form_validation->set_rules('notlp_perusahaan', 'nomor telepon perusahaan', 'required|numeric|trim', [
		// 	'required' => 'Nomor telepon perusahaan harus diisi !',
		// 	'numeric' => 'Isi no telepon harus angka !'
		// ]);
		// $this->form_validation->set_rules('alasan', 'alasan', 'required|trim', [
		// 	'required' => 'Alasan anda mengikuti event ini harus diisi !'
		// ]);

		if($this->form_validation->run() == true){
			return true;
		}else{
			return false;
		}
	}

	public function simpan_register_pengunjung($id_visitor, $id_event, $tipe_daftar){
		$event = $this->db->get_where('tabel_event', ["id_event" => $id_event])->row_array();

		if($tipe_daftar == "daftar_jarak_jauh"){
			$data_tabel_visitor = [
				"id_visitor" => htmlspecialchars($id_visitor),
				"id_event" => htmlspecialchars($id_event),
				"nama_visitor" => htmlspecialchars($this->input->post('nama_depan', true)) . ' ' . htmlspecialchars($this->input->post('nama_belakang', true)),
				"perusahaan_visitor" => htmlspecialchars($this->input->post('nama_perusahaan', true)),
				"jabatan_visitor" => htmlspecialchars($this->input->post('jabatan', true)),
				"email_visitor" => htmlspecialchars($this->input->post('email_pribadi', true)),
				"email_perusahaan" => htmlspecialchars($this->input->post('email_perusahaan', true)),
				"tlp_visitor" => htmlspecialchars($this->input->post('notlp_pribadi', true)),
				"tlp_perusahaan" => htmlspecialchars($this->input->post('notlp_perusahaan', true)),
				"alasan_ikut" => htmlspecialchars($this->input->post('alasan', true)),
				"gambar_qrcode" => null,
				"registered_at" => htmlspecialchars(mdate("%Y-%m-%d %H:%i:%s")),
				"id_petugas_pintu_keluar" => null,
				"id_petugas_pintu_area" => null,
				"time_in_event" => null,
				"status" => htmlspecialchars("terdaftar_lebih_awal")
			];
			$this->db->insert('tabel_visitor', $data_tabel_visitor);
	
			// kirim email
				$config["protocol"] = 'smtp';
				$config["smtp_host"] = 'ssl://smtp.googlemail.com';
				$config["smtp_user"] = $_ENV["AlamatEmail"];
				$config["smtp_pass"] = $_ENV["PasswordEmail"];
				$config["smtp_port"] = '465';
				$config["mailtype"] = 'html';
				$config["charset"] = 'utf-8';
				$config["newline"] = "\r\n";
	
				$this->load->library("email", $config);
				$this->email->initialize($config);
	
				$this->email->from($_ENV["AlamatEmail"], "Visitor Management");
				$this->email->to('bayu69kartiko@gmail.com');
				$this->email->subject('Testing');
				$this->email->message('<p>Hai '. htmlspecialchars($this->input->post("nama_depan", true)) . ' ' . htmlspecialchars($this->input->post("nama_belakang", true)) .'!</p><p>Selamat, kamu telah terdaftar pada event <b>'. $event["nama_event"] .'</b>!</p><br><p>Berikut kode pendaftaran anda:</p><h4 style="color: #7952B3; font-size: large;"><a href="'. base_url() . $event["custom_url"] .'/register?kode_pendaftaran='. $id_visitor .'" onclick="return confirm("Kode Pendaftaran ini hanya berlaku 1 kali pemakaian. \n yakin untuk melanjutkan?");">'. $id_visitor .'</a></h4><p>Kamu bisa langsung mengakses event ini hanya dengan menekan kode pendaftaran anda diatas.</p><br><p>Terima kasih sudah berpartisipasi pada event <b>'. $event["nama_event"] .'</b> :)</p><br><p>Regards,</p><p><b>Visitor Management</b></p>');
	
				if($this->email->send()){
					return true;
				}else{
					echo $this->email->print_debugger();
					die;
				}
		}elseif($tipe_daftar == "daftar_di_depan"){
			$data_tabel_visitor = [
				"id_visitor" => htmlspecialchars($id_visitor),
				"id_event" => htmlspecialchars($id_event),
				"nama_visitor" => htmlspecialchars($this->input->post('nama_depan', true)) . ' ' . htmlspecialchars($this->input->post('nama_belakang', true)),
				"perusahaan_visitor" => htmlspecialchars($this->input->post('nama_perusahaan', true)),
				"jabatan_visitor" => htmlspecialchars($this->input->post('jabatan', true)),
				"email_visitor" => htmlspecialchars($this->input->post('email_pribadi', true)),
				"email_perusahaan" => htmlspecialchars($this->input->post('email_perusahaan', true)),
				"tlp_visitor" => htmlspecialchars($this->input->post('notlp_pribadi', true)),
				"tlp_perusahaan" => htmlspecialchars($this->input->post('notlp_perusahaan', true)),
				"alasan_ikut" => htmlspecialchars($this->input->post('alasan', true)),
				"gambar_qrcode" => htmlspecialchars($id_visitor.'.png'),
				"registered_at" => htmlspecialchars(mdate("%Y-%m-%d %H:%i:%s")),
				"id_petugas_pintu_keluar" => null,
				"id_petugas_pintu_area" => null,
				"time_in_event" => htmlspecialchars(mdate("%Y-%m-%d %H:%i:%s")),
				"status" => htmlspecialchars("telah_masuk_event")
			];
			$this->db->insert('tabel_visitor', $data_tabel_visitor);

			$this->session->set_userdata($data_tabel_visitor);
			$this->db->update('ci_sessions', ["user_id" => $this->session->userdata('id_visitor'), "id_event" => $id_event, "status"=>"visitor_telah_masuk_event"], ["id" => session_id()]);
		}elseif($tipe_daftar == "verifikasi_register"){
			$data_tabel_visitor = [
				"gambar_qrcode" => htmlspecialchars($id_visitor.'.png'),
				"id_petugas_pintu_keluar" => null,
				"id_petugas_pintu_area" => null,
				"time_in_event" => htmlspecialchars(mdate("%Y-%m-%d %H:%i:%s")),
				"status" => htmlspecialchars("telah_masuk_event")
			];
			$this->db->update('tabel_visitor', $data_tabel_visitor, ["id_visitor" => $id_visitor]);

			$this->session->set_userdata($this->db->get_where("tabel_visitor", ["id_visitor" => $id_visitor])->row_array());
			$this->db->update('ci_sessions', ["user_id" => $id_visitor, "id_event" => $id_event, "status"=>"visitor_telah_masuk_event"], ["id" => session_id()]);
		}

	}
}

?>
