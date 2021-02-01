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
}
?>
