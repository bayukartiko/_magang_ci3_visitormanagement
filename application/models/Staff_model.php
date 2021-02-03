<?php 

class Staff_model extends CI_Model{

	public function get_tb_staff(){
		$data = $this->db->get("tabel_staff");
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
				"id_area" => null,
				"verified" => htmlspecialchars('1'),
				"is_active" => htmlspecialchars('offline'),
			];
			$this->db->insert('tabel_staff', $data_tabel_staff);
		}elseif($mode == "hapus"){
			$this->db->delete('tabel_staff', array('staff_id' => $staff_id));
		}
	}
	public function aksi_crud_event($mode, $id_event, $id_area){
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
					'staff_id' => htmlspecialchars($nama_petugas[$index]),
				));
				$index++;
				}
				$this->db->insert_batch('tabel_area', $data_tabel_area);

			// update tabel_staff berdasarkan id_area yang ditugaskannya
				$nama_area = $_POST['namaArea'];
				$nama_petugas = $_POST['namaPetugas'];
				$index = 0; // Set index array awal dengan 0
				foreach($nama_area as $nama_area){ // buat perulangan berdasarkan nama sampai data terakhir
					$this->db->update('tabel_staff', ["id_area" => htmlspecialchars($id_area).htmlspecialchars($index)], array('staff_id' => htmlspecialchars($nama_petugas[$index])));
				$index++;
				}
		}
		// elseif($mode == "hapus"){
		// 	$this->db->delete('tabel_staff', array('staff_id' => $staff_id));
		// }
	}
	public function aksi_crud_area($data_tabel_area){
		$this->db->insert_batch('tabel_area', $data_tabel_area);
	}


}
?>
