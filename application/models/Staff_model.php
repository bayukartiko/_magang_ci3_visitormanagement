<?php 

class Staff_model extends CI_Model{

	protected $id_area, $id_event, $id_tugas, $id_visitor, $event_id, $staff_id, $id_petugas, $ci_session_visitor_id, $password;

	public function get_tb_staff(){
		$data = $this->db->get("tabel_staff");
		return $data->result();
	}
	public function get_tb_visitor(){
		$data = $this->db->get("tabel_visitor");
		return $data->result();
	}
	public function get_tb_role(){
		$data = $this->db->get("tabel_role");
		return $data->result();
	}
	public function get_tb_area(){
		$data = $this->db->get("tabel_area");
		return $data->result();
	}
	public function get_tb_event(){
		$data = $this->db->get("tabel_event");
		return $data->result();
	}
	public function get_tb_tugas_staff_petugas(){
		$data = $this->db->get("tabel_tugas_staff_petugas");
		return $data->result();
	}
	public function get_tb_tracking(){
		$data = $this->db->get("tabel_tracking");
		return $data->result();
	}

	public function validasi_form_tambah_staff(){
		$this->form_validation->set_rules('username', 'username', 'required|trim|is_unique[tabel_staff.username]', [
			'required' => 'Username harus diisi !',
			'is_unique' => 'Username sudah terdaftar sebelumnya !'
		]);
		$this->form_validation->set_rules('password', 'password', 'required|trim', [
			'required' => 'Passoword harus diisi !'
		]);
		$this->form_validation->set_rules('nama', 'nama', 'required|trim', [
			'required' => 'Nama harus diisi !'
		]);
		$this->form_validation->set_rules('jabatan', 'jabatan', 'required|trim', [
			'required' => 'Jabatan harus dipilih !'
		]);

		if($this->form_validation->run() == true){
			return true;
		}else{
			return false;
		}
	}
	public function validasi_form_crud_event($mode){
		if($mode == "tambah"){
			$this->form_validation->set_rules('nama_event', 'nama event', 'required|trim', [
				'required' => 'Nama event harus diisi !',
			]);
			$this->form_validation->set_rules('alamat_event', 'alamat event', 'required|trim', [
				'required' => 'Alamat event harus diisi !',
			]);
			$this->form_validation->set_rules('alamat-event-addr', 'hidden alamat event', 'required|trim', [
				'required' => 'error field alamat event, coba input ulang field ini',
			]);
			$this->form_validation->set_rules('alamat-event-latitude', 'hidden latitude alamat event', 'required|trim', [
				'required' => 'error field alamat event, coba input ulang field ini',
			]);
			$this->form_validation->set_rules('alamat-event-longitude', 'hidden longitude alamat event', 'required|trim', [
				'required' => 'error field alamat event, coba input ulang field ini',
			]);
			$this->form_validation->set_rules('custom_url', 'custom_url', 'is_unique[tabel_event.custom_url]|trim', [
				'is_unique' => 'Custom url ini sudah digunakan sebelumnya, harap membuat custom url yang baru !'
			]);
			$this->form_validation->set_rules('tgl_mulai', 'tgl mulai', 'required|trim', [
				'required' => 'Tanggal mulai event harus diisi !'
			]);
			$this->form_validation->set_rules('tgl_selesai', 'tgl selesai', 'required|trim', [
				'required' => 'Tanggal selesai event harus diisi !'
			]);
			$this->form_validation->set_rules('jam_dibuka', 'jam dibuka', 'required|trim', [
				'required' => 'Jam dibuka harus diisi !'
			]);
			$this->form_validation->set_rules('jam_ditutup', 'jam ditutup', 'required|trim', [
				'required' => 'Jam ditutup harus diisi !'
			]);
			$this->form_validation->set_rules('nama_petugas_pintuKeluar', 'nama_petugas_pintuKeluar', 'required|trim', [
				'required' => 'Nama petugas pintu keluar harus dipilih !'
			]);
	
			if($this->form_validation->run() == true){
				return true;
			}else{
				return false;
			}
		}elseif($mode == "ubah"){
			$this->form_validation->set_rules('nama_event', 'nama event', 'required|trim', [
				'required' => 'Nama event harus diisi !',
			]);

			$this->form_validation->set_rules('alamat_event-edit', 'alamat event', 'required|trim', [
				'required' => 'Alamat event harus diisi !',
			]);
			$this->form_validation->set_rules('alamat-event-addr-edit', 'hidden alamat event', 'required|trim', [
				'required' => 'error field alamat event, coba input ulang field ini',
			]);
			$this->form_validation->set_rules('alamat-event-latitude-edit', 'hidden latitude alamat event', 'required|trim', [
				'required' => 'error field alamat event, coba input ulang field ini',
			]);
			$this->form_validation->set_rules('alamat-event-longitude-edit', 'hidden longitude alamat event', 'required|trim', [
				'required' => 'error field alamat event, coba input ulang field ini',
			]);

			$this->form_validation->set_rules('custom_url', 'custom_url', 'trim',);
			$this->form_validation->set_rules('tgl_mulai', 'tgl mulai', 'required|trim', [
				'required' => 'Tanggal mulai event harus diisi !'
			]);
			$this->form_validation->set_rules('tgl_selesai', 'tgl selesai', 'required|trim', [
				'required' => 'Tanggal selesai event harus diisi !'
			]);
			$this->form_validation->set_rules('jam_dibuka', 'jam dibuka', 'required|trim', [
				'required' => 'Jam dibuka harus diisi !'
			]);
			$this->form_validation->set_rules('jam_ditutup', 'jam ditutup', 'required|trim', [
				'required' => 'Jam ditutup harus diisi !'
			]);

			if($this->form_validation->run() == true){
				return true;
			}else{
				return false;
			}
		}
	}

	public function aksi_crud_staff($mode, $staff_id){
		if($mode == "tambah"){
			$data_tabel_staff = [
				"staff_id" => htmlspecialchars($staff_id),
				"role_id" => htmlspecialchars($this->input->post('jabatan', true)),
				"username" => htmlspecialchars($this->input->post('username', true)),
				"password" => password_hash(htmlspecialchars($this->input->post('password', true)), PASSWORD_DEFAULT),
				"nama" => htmlspecialchars($this->input->post('nama', true)),
				"sedang_bertugas" => false,
				"id_tugas" => null,
				"verified" => htmlspecialchars('1'),
				"is_active" => htmlspecialchars('offline'),
			];
			$this->db->insert('tabel_staff', $data_tabel_staff);
		}elseif($mode == "hapus"){
			$this->db->delete('tabel_staff', array('staff_id' => $staff_id));
		}
	}
	public function aksi_crud_event($mode, $id_event, $id_area, $id_tugas){
		if($mode == "tambah"){
			// insert tabel_event
				$nama_event = str_replace(' ', '_', $this->input->post('nama_event', true));
				$custom_url = str_replace(' ', '_', $this->input->post('custom_url', true));
				if(empty($this->input->post("custom_url", true))){
					$url = $nama_event;
				}elseif(!empty($this->input->post("custom_url", true))){
					$url = $custom_url;
				}

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
					$image_name= $id_event.'.png';
					$params['data'] = base_url().$url; //data yang akan di jadikan QR CODE
					$params['level'] = 'H'; //H=High
					$params['size'] = 10;
					$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/img/qrcode/
					$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
				
				// upload gambar event
					$upload_foto = $_FILES['field_gambar_event']['name'];
											
					if(!empty($upload_foto)){
						$config['upload_path'] = './assets/img/event_image/';
						$config['allowed_types'] = 'jpg|png|jpeg|gif';
						$config['remove_space'] = TRUE;
						// $config['file_name'] = url_title($this->input->post('field_gambar_event'));
						$config['file_name'] = $id_event;

						$this->load->library('upload', $config);
						$this->upload->initialize($config);
						if($this->upload->do_upload('field_gambar_event')){
		
							$gambar_baru = $this->upload->data('file_name');
							$this->db->set('gambar_event', $gambar_baru);
						}else{
							echo $this->upload->display_errors();
						}
					}else{
						$this->db->set('gambar_event', 'default.jpg');
					}

				// jika input tanggal_mulai kurang atau sama dengan dari tanggal sekarang
				if($this->input->post('tgl_mulai', true) <= mdate('%Y-%m-%d')){

					// jika input tanggal_selesai lebih besar atau sama dengan dari tanggal sekarang
					if($this->input->post('tgl_selesai', true) >= mdate('%Y-%m-%d')){

						// jika input jam dibuka kurang atau sama dengan dari jam sekarang
						if($this->input->post('jam_dibuka', true) <= mdate('%H:%i:%s')){

							// jika input jam_ditutup lebih besar dari jam sekarang
							if($this->input->post('jam_ditutup', true) > mdate('%H:%i:%s')){
								$status = "active";
							// jika input jam_ditutup kurang dari jam sekarang
							}elseif($this->input->post('jam_ditutup', true) < mdate('%H:%i:%s')){
								$status = "not_active";
							}

						// jika input jam_dibuka lebih besar dari jam sekarang
						}elseif($this->input->post('jam_dibuka', true) > mdate('%H:%i:%s')){
							$status = "not_active";
						}
						
					// jika input tanggal_selesai kurang dari tanggal sekarang
					}elseif($this->input->post('tgl_selesai', true) < mdate('%Y-%m-%d')){
						$status = "not_active";
					}

				// jika input tanggal_mulai lebih besar dari tanggal sekarang
				}elseif($this->input->post('tgl_mulai', true) > mdate('%Y-%m-%d')){
					$status = "not_active";
				}

				$data_tabel_event = [
					"id_event" => htmlspecialchars($id_event),
					"nama_event" => htmlspecialchars($this->input->post('nama_event', true)),
					"detail_event" => htmlspecialchars($this->input->post('detail_event', true)),
					"alamat_event" => $this->input->post('alamat_event', false),
					"latitude" => $this->input->post('alamat-event-latitude', false),
					"longitude" => $this->input->post('alamat-event-longitude', false),
					"custom_url" => htmlspecialchars($url),
					"gambar_qrcode" => htmlspecialchars($id_event.'.png'),
					"tanggal_dibuka" => htmlspecialchars($this->input->post('tgl_mulai', true)),
					"tanggal_ditutup" => htmlspecialchars($this->input->post('tgl_selesai', true)),
					"jam_dibuka" => htmlspecialchars($this->input->post('jam_dibuka', true)),
					"jam_ditutup" => htmlspecialchars($this->input->post('jam_ditutup', true)),
					"status" => htmlspecialchars($status),
				];
				$this->db->insert('tabel_event', $data_tabel_event);

			// insert tabel_area
				// Ambil data yang dikirim dari form
				$nama_area = $_POST['namaArea'];
				$nama_petugas = $_POST['namaPetugas'];
				$data_tabel_area = array();
				$index = 0; // Set index array awal dengan 0
				foreach($nama_area as $nama_area){ // buat perulangan berdasarkan nama sampai data terakhir
					array_push($data_tabel_area, array(
						'id_area' => htmlspecialchars($id_area).htmlspecialchars($index),
						'id_event' => htmlspecialchars($id_event),
						'nama_area' => htmlspecialchars($nama_area),
					));
					$index++;
				}
				$this->db->insert_batch('tabel_area', $data_tabel_area);
			
			// insert tabel_tugas_staff_petugas (untuk petugas_pintu_area)
				$nama_area = $_POST['namaArea'];
				$id_petugas = $_POST['namaPetugas'];
				$data_tabel_tugas_staff_petugas_pintu_area = array();
				$index = 0; // Set index array awal dengan 0
				foreach($nama_area as $nama_area){ // buat perulangan berdasarkan nama sampai data terakhir
					array_push($data_tabel_tugas_staff_petugas_pintu_area, array(
						'id_tugas' => htmlspecialchars($id_tugas).htmlspecialchars($index),
						'staff_id' => htmlspecialchars($id_petugas[$index]),
						'petugas_pintu_keluar' => false,
						'petugas_pintu_area' => true,
						'id_event' => htmlspecialchars($id_event),
						'id_area' => htmlspecialchars($id_area).htmlspecialchars($index),
					));
					$index++;
				}
				$this->db->insert_batch('tabel_tugas_staff_petugas', $data_tabel_tugas_staff_petugas_pintu_area);

			// insert tabel_tugas_staff_petugas (untuk petugas_pintu_keluar)
				$data_tabel_tugas_staff_petugas_pintu_keluar = [
					"id_tugas" => htmlspecialchars($id_tugas),
					"staff_id" => htmlspecialchars($this->input->post('nama_petugas_pintuKeluar', true)),
					"petugas_pintu_keluar" => true,
					"petugas_pintu_area" => false,
					"id_event" => htmlspecialchars($id_event),
					"id_area" => null
				];
				$this->db->insert('tabel_tugas_staff_petugas', $data_tabel_tugas_staff_petugas_pintu_keluar);


			// update tabel_staff berdasarkan id_tugas yang ditugaskannya sebagai petugas_pintu_keluar
				$this->db->update('tabel_staff', ["id_tugas" => htmlspecialchars($id_tugas), "sedang_bertugas" => true], ["staff_id" => htmlspecialchars($this->input->post('nama_petugas_pintuKeluar', true))]);

			// update tabel_staff berdasarkan id_tugas yang ditugaskannya sebagai petugas_pintu_area
				$nama_area = $_POST['namaArea'];
				$nama_petugas = $_POST['namaPetugas'];
				$index = 0; // Set index array awal dengan 0
				foreach($nama_area as $nama_area){ // buat perulangan berdasarkan nama sampai data terakhir
					$this->db->update('tabel_staff', ["id_tugas" => htmlspecialchars($id_tugas).htmlspecialchars($index), "sedang_bertugas" => true], array('staff_id' => htmlspecialchars($nama_petugas[$index])));
					$index++;
				}
		}elseif($mode == "hapus"){
			// hapus gambar qrcode event
				unlink(FCPATH . 'assets/img/qrcode/' . $id_event .'.png');

			// hapus gambar event
				$gambar_lama = $this->db->get_where('tabel_event', ['id_event'=>$id_event])->row_array();
				if($gambar_lama["gambar_event"] != 'default.jpg'){
					unlink(FCPATH . '/assets/img/event_image/' . $gambar_lama["gambar_event"]);
				}

			// hapus tabel_area
				$this->db->delete('tabel_area', array('id_event' => $id_event));

			// update tabel_staff yang terkena imbas hapus tabel_tugas_staff_petugas
				$id_tugas = $this->db->get_where('tabel_tugas_staff_petugas', ["id_event" => $id_event])->result();
				foreach($id_tugas as $data_id_tugas){
					$this->db->update('tabel_staff', ["sedang_bertugas" => false], array('id_tugas' => $data_id_tugas->id_tugas));
				}
			
			// hapus tabel_tugas_staff_petugas
				$this->db->delete('tabel_tugas_staff_petugas', array('id_event' => $id_event));
			
			// hapus tabel_tracking
				$this->db->delete('tabel_tracking', array('id_event' => $id_event));

			// hapus tabel_visitor
				$this->db->delete('tabel_visitor', array('id_event' => $id_event));
			
			// hapus tabel_event
				$this->db->delete('tabel_event', array('id_event' => $id_event));
		}elseif($mode == "ubah"){
			// update tabel_event
				$nama_event = str_replace(' ', '_', $this->input->post('nama_event', true));
				$custom_url = str_replace(' ', '_', $this->input->post('custom_url', true));
				if(empty($this->input->post("custom_url", true))){
					$url = $nama_event;
				}elseif(!empty($this->input->post("custom_url", true))){
					$url = $custom_url;
				}

				unlink(FCPATH . 'assets/img/qrcode/' . $id_event .'.png');

				// ubah gambar event
					$upload_foto = $_FILES['field_gambar_event-edit']['name'];
					
					if(!empty($upload_foto)){
						$config['upload_path'] = './assets/img/event_image/';
						$config['allowed_types'] = 'jpg|png|jpeg|gif';
						$config['file_name'] = $id_event;
						
						// $filename = $this->upload->file_name;
						$this->upload->initialize($config);
						if($this->upload->do_upload('field_gambar_event-edit')){

							// hapus gambar lama
								$gambar_lama = $this->db->get_where('tabel_event', ['id_event'=>$id_event])->row_array();
								if($gambar_lama["gambar_event"] != 'default.jpg'){
									unlink(FCPATH . 'assets/img/event_image/' . $gambar_lama["gambar_event"]);
								}
								
								// }
								$gambar_baru = $this->upload->data('file_name');
								$this->db->set('gambar_event', $gambar_baru);
						}else{
							echo $this->upload->display_errors();
						}
						// $data = $this->upload->data();
					}else{
						$gambar_lama = $this->input->post('hidden-field_gambar_event-edit');
						$this->db->set('gambar_event', $gambar_lama);
					}
				
				// jika input tanggal_mulai kurang atau sama dengan dari tanggal sekarang
				if($this->input->post('tgl_mulai', true) <= mdate('%Y-%m-%d')){

					// jika input tanggal_selesai lebih besar atau sama dengan dari tanggal sekarang
					if($this->input->post('tgl_selesai', true) >= mdate('%Y-%m-%d')){

						// jika input jam dibuka kurang atau sama dengan dari jam sekarang
						if($this->input->post('jam_dibuka', true) <= mdate('%H:%i:%s')){

							// jika input jam_ditutup lebih besar dari jam sekarang
							if($this->input->post('jam_ditutup', true) > mdate('%H:%i:%s')){
								$status = "active";
							// jika input jam_ditutup kurang dari jam sekarang
							}elseif($this->input->post('jam_ditutup', true) < mdate('%H:%i:%s')){
								$status = "not_active";
							}

						// jika input jam_dibuka lebih besar dari jam sekarang
						}elseif($this->input->post('jam_dibuka', true) > mdate('%H:%i:%s')){
							$status = "not_active";
						}
						
					// jika input tanggal_selesai kurang dari tanggal sekarang
					}elseif($this->input->post('tgl_selesai', true) < mdate('%Y-%m-%d')){
						$status = "not_active";
					}

				// jika input tanggal_mulai lebih besar dari tanggal sekarang
				}elseif($this->input->post('tgl_mulai', true) > mdate('%Y-%m-%d')){
					$status = "not_active";
				}

				$data_tabel_event = [
					"nama_event" => htmlspecialchars($this->input->post('nama_event', true)),
					"detail_event" => $this->input->post('detail_event', false),
					"alamat_event" => $this->input->post('alamat_event-edit', false),
					"latitude" => $this->input->post('alamat-event-latitude-edit', false),
					"longitude" => $this->input->post('alamat-event-longitude-edit', false),
					"custom_url" => htmlspecialchars($url),
					"gambar_qrcode" => htmlspecialchars($id_event.'.png'),
					"tanggal_dibuka" => htmlspecialchars($this->input->post('tgl_mulai', true)),
					"tanggal_ditutup" => htmlspecialchars($this->input->post('tgl_selesai', true)),
					"jam_dibuka" => htmlspecialchars($this->input->post('jam_dibuka', true)),
					"jam_ditutup" => htmlspecialchars($this->input->post('jam_ditutup', true)),
					"status" => htmlspecialchars($status),
				];
				$this->db->update('tabel_event', $data_tabel_event, ["id_event" => $id_event]);

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
					$image_name= $id_event.'.png';
					$params['data'] = base_url().$url; //data yang akan di jadikan QR CODE
					$params['level'] = 'H'; //H=High
					$params['size'] = 10;
					$params['savename'] = FCPATH.$config['imagedir'].$image_name; //simpan image QR CODE ke folder assets/img/qrcode/
					$this->ciqrcode->generate($params); // fungsi untuk generate QR CODE
		}
	}

	public function validasi_scan_visitor($tipe_scan, $id_visitor){
		if($tipe_scan == 'pintu_keluar'){
			$ci_session_visitor_id = $this->db->get_where('ci_sessions', ['user_id' => $id_visitor])->row();
			if(!$ci_session_visitor_id){
				return false;
			}else{
				return true;
			}
		}elseif($tipe_scan == "pintu_area"){
			$ci_session_visitor_id = $this->db->get_where('ci_sessions', ['user_id' => $id_visitor])->row();
			if(!$ci_session_visitor_id){
				return false;
			}else{
				return true;
			}
		}
	}

	public function aksi_scan_visitor($tipe_scan, $id_visitor){
		if($tipe_scan == 'pintu_keluar'){
			// update tabel_staff isi id_petugas_pintu_keluar

				$tabel_tracking = $this->get_tb_tracking();
				$tabel_visitor = $this->get_tb_visitor();
				
				foreach($tabel_visitor as $data_tabel_visitor){
					if($data_tabel_visitor->id_visitor == $id_visitor){
						if($data_tabel_visitor->status == "didalam_area"){
							$data_update_tabel_tracking = [
								"time_out_area" => htmlspecialchars(mdate("%Y-%m-%d %H:%i:%s")),
							];
							$this->db->order_by('time_in_area', 'DESC')->limit(1)->update('tabel_tracking', $data_update_tabel_tracking, ["id_visitor"=>$id_visitor]);
						}
					}
				}

				$this->db->update('tabel_visitor', ['id_petugas_pintu_area' => null, 'id_petugas_pintu_keluar' => $this->session->userdata('staff_id'), 'time_out_event' => htmlspecialchars(mdate("%Y-%m-%d %H:%i:%s")), 'status' => 'telah_keluar_event'], ['id_visitor' => $id_visitor]);
			// hapus gambar barcode visitor berdasarkan id_visitor
	
			// $gambar_lama = $this->input->post('gambarlama');
			// if($gambar_lama != 'default.jpg'){
				// unlink(FCPATH . 'assets/img/barcode/' . $id_visitor .'.png');
				unlink(FCPATH . 'assets/img/qrcode/' . $id_visitor .'.png');
			// }
	
			// update ci_sessions visitor
			$this->db->update('ci_sessions', ["status"=>"visitor_telah_keluar_event"], ['user_id' => $id_visitor]);
			// $this->db->delete('ci_sessions', ['user_id' => $id_visitor]);

		}elseif($tipe_scan == "pintu_area"){
			// insert tabel_tracking
				// ambil id_area berdasarkan id_area petugas ini
					$tabel_tugas = $this->get_tb_tugas_staff_petugas();
					foreach($tabel_tugas as $data_tabel_tugas){
						if($data_tabel_tugas->staff_id == $this->session->userdata("staff_id")){
							$id_area = $data_tabel_tugas->id_area;
						}
					}

				// ambil semua data tabel_tracking
				$tabel_tracking = $this->get_tb_tracking();
				$tabel_visitor = $this->get_tb_visitor();
				$visitor = $this->db->get_where("tabel_visitor", ["id_visitor" => $id_visitor])->row_array();

				if($tabel_tracking == null){
					$data_tabel_tracking = [
						"id_visitor" => htmlspecialchars($id_visitor),
						"id_petugas_pintu_area" => htmlspecialchars($this->session->userdata('staff_id')),
						"id_area" => htmlspecialchars($id_area),
						"time_in_area" => htmlspecialchars(mdate("%Y-%m-%d %H:%i:%s")),
					];
					$this->db->insert('tabel_tracking', $data_tabel_tracking);

					// update tabel_staff isi id_petugas_pintu_area
					$this->db->update('tabel_visitor', ['id_petugas_pintu_area' => $this->session->userdata('staff_id'), 'status' => 'didalam_area'], ['id_visitor' => $id_visitor]);

					return "visitor berhasil masuk area.";

				}else{

					foreach($tabel_visitor as $data_tabel_visitor){ // deploy semua data tabel_visitor
						if($data_tabel_visitor->id_visitor == $id_visitor){ // jika id_visitor pada tabel_visitor sama dengan id_visitor parameter
							
							// if($data_tabel_visitor->id_petugas_pintu_area == null){ // jika id_visitor tidak ada dan id_petugas tidak ada (sama-sama 1 baris)
								if($data_tabel_visitor->id_petugas_pintu_area != $this->session->userdata("staff_id") && $data_tabel_visitor->status == "didalam_area"){ // jika id_petugas pada tabel_visitor tidak sama dengan staff_id anda saat ini

									$data_update_tabel_tracking = [
										"time_out_area" => htmlspecialchars(mdate("%Y-%m-%d %H:%i:%s")),
									];
									$this->db->order_by('time_in_area', 'DESC')->limit(1)->update('tabel_tracking', $data_update_tabel_tracking, ["id_visitor"=>$id_visitor]);

									$data_insert_tabel_tracking = [
										"id_visitor" => htmlspecialchars($id_visitor),
										"id_event" => htmlspecialchars($visitor["id_event"]),
										"id_petugas_pintu_area" => htmlspecialchars($this->session->userdata('staff_id')),
										"id_area" => htmlspecialchars($id_area),
										"time_in_area" => htmlspecialchars(mdate("%Y-%m-%d %H:%i:%s")),
									];
									$this->db->insert('tabel_tracking', $data_insert_tabel_tracking);
	
									$this->db->update('tabel_visitor', ['id_petugas_pintu_area' => $this->session->userdata('staff_id'), 'status' => 'didalam_area'], ['id_visitor' => $id_visitor]);

									return "visitor berhasil masuk area.";
									
								}elseif($data_tabel_visitor->id_petugas_pintu_area == $this->session->userdata("staff_id") && $data_tabel_visitor->status == "didalam_area"){ // jika id_petugas pada tabel_visitor sama dengan staff_id anda saat ini

									$data_update_tabel_tracking = [
										"time_out_area" => htmlspecialchars(mdate("%Y-%m-%d %H:%i:%s")),
									];
									$this->db->order_by('time_in_area', 'DESC')->limit(1)->update('tabel_tracking', $data_update_tabel_tracking, ["id_visitor"=>$id_visitor]);

									$this->db->update('tabel_visitor', ['id_petugas_pintu_area' => null, 'status' => 'telah_masuk_event'], ['id_visitor' => $id_visitor]);

									return "visitor berhasil keluar area.";

								}elseif($data_tabel_visitor->id_petugas_pintu_area == null && $data_tabel_visitor->status == "telah_masuk_event"){ // jika id_petugas pada tabel_visitor sama dengan kosong/tidak ada/null

									$data_tabel_tracking = [
										"id_visitor" => htmlspecialchars($id_visitor),
										"id_event" => htmlspecialchars($visitor["id_event"]),
										"id_petugas_pintu_area" => htmlspecialchars($this->session->userdata('staff_id')),
										"id_area" => htmlspecialchars($id_area),
										"time_in_area" => htmlspecialchars(mdate("%Y-%m-%d %H:%i:%s")),
									];
									$this->db->insert('tabel_tracking', $data_tabel_tracking);
	
									// update tabel_staff isi id_petugas_pintu_area
									$this->db->update('tabel_visitor', ['id_petugas_pintu_area' => $this->session->userdata('staff_id'), 'status' => 'didalam_area'], ['id_visitor' => $id_visitor]);

									return "visitor berhasil masuk area.";
								}

							// }

						}
					}

				}


				// $data_tabel_tracking = [
				// 	"id_visitor" => htmlspecialchars($id_visitor),
				// 	"id_petugas_pintu_area" => htmlspecialchars($this->session->userdata('staff_id')),
				// 	"id_area" => htmlspecialchars($id_area),
				// 	"time_in_area" => htmlspecialchars(mdate("%Y-%m-%d %H:%i:%s")),
				// ];
				// $this->db->insert('tabel_tracking', $data_tabel_tracking);
		}
	}

}
?>
