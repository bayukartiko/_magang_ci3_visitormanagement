<?php 

class Staff_model extends CI_Model{

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
	public function validasi_form_tambah_event(){
		$this->form_validation->set_rules('nama_event', 'nama event', 'required|trim', [
			'required' => 'Nama event harus diisi !',
		]);
		$this->form_validation->set_rules('tgl_mulai', 'tgl mulai', 'required|trim', [
			'required' => 'Tanggal mulai event harus diisi !'
		]);
		$this->form_validation->set_rules('tgl_selesai', 'tgl selesai', 'required|trim', [
			'required' => 'Tanggal selesai event harus diisi !'
		]);
		// $this->form_validation->set_rules('namaArea[]', 'nama area', 'required|trim|xss_clean', [
		// 	'required' => 'Nama area harus diisi !'
		// ]);
		// $this->form_validation->set_rules('namaPetugas[]', 'nama petugas', 'required|trim|xss_clean', [
		// 	'required' => 'Nama petugas harus dipilih !'
		// ]);

		if($this->form_validation->run() == true){
			return true;
		}else{
			return false;
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
				$data_tabel_event = [
					"id_event" => htmlspecialchars($id_event),
					"nama_event" => htmlspecialchars($this->input->post('nama_event', true)),
					"tanggal_dibuka" => htmlspecialchars($this->input->post('tgl_mulai', true)),
					"tanggal_ditutup" => htmlspecialchars($this->input->post('tgl_selesai', true)),
					"status" => htmlspecialchars('active'),
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
		}
		// elseif($mode == "hapus"){
		// 	$this->db->delete('tabel_staff', array('staff_id' => $staff_id));
		// }
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
				unlink(FCPATH . 'assets/img/barcode/' . $id_visitor .'.png');
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
