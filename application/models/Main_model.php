<?php 

class Main_model extends CI_Model{

	public function validasi_register_pengunjung(){
		$this->form_validation->set_rules('nama_depan', 'nama depan', 'required|trim', [
			'required' => 'Nama depan harus diisi !'
		]);
		$this->form_validation->set_rules('nama_belakang', 'nama belakang', 'required|trim', [
			'required' => 'Nama belakang harus diisi !'
		]);
		$this->form_validation->set_rules('nama_perusahaan', 'nama perusahaan', 'required|trim', [
			'required' => 'Nama perusahaan harus diisi !'
		]);
		$this->form_validation->set_rules('jabatan', 'jabatan', 'required|trim', [
			'required' => 'Jabatan anda harus diisi !'
		]);
		$this->form_validation->set_rules('email_pribadi', 'email pribadi', 'required|valid_email|trim', [
			'required' => 'Email anda harus diisi !',
			'valid_email' => 'Email tidak benar !'
		]);
		$this->form_validation->set_rules('email_perusahaan', 'email perusahaan', 'required|valid_email|trim', [
			'required' => 'Email Perusahaan harus diisi !',
			'valid_email' => 'Email tidak benar !'
		]);
		$this->form_validation->set_rules('notlp_pribadi', 'nomor telepon pribadi', 'required|numeric|trim', [
			'required' => 'Nomor telepon anda harus diisi !',
			'numeric' => 'Isi no telepon harus angka !'
		]);
		$this->form_validation->set_rules('notlp_perusahaan', 'nomor telepon perusahaan', 'required|numeric|trim', [
			'required' => 'Nomor telepon perusahaan harus diisi !',
			'numeric' => 'Isi no telepon harus angka !'
		]);
		$this->form_validation->set_rules('alasan', 'alasan', 'required|trim', [
			'required' => 'Alasan anda mengikuti event ini harus diisi !'
		]);

		if($this->form_validation->run() == true){
			return true;
		}else{
			return false;
		}
	}

	public function simpan_register_pengunjung($id_visitor){
		$data_tabel_visitor = [
			"id_visitor" => $id_visitor,
			"id_event" => 'EVNT202001210000001',
			"nama_visitor" => $this->input->post('nama_depan', true) . ' ' . $this->input->post('nama_belakang', true),
			"perusahaan_visitor" => $this->input->post('nama_perusahaan', true),
			"jabatan_visitor" => $this->input->post('jabatan', true),
			"email_visitor" => $this->input->post('email_pribadi', true),
			"email_perusahaan" => $this->input->post('email_perusahaan', true),
			"tlp_visitor" => $this->input->post('notlp_pribadi', true),
			"tlp_perusahaan" => $this->input->post('notlp_perusahaan', true),
			"alasan_ikut" => $this->input->post('alasan', true),
			"gambar_qrcode" => $id_visitor.'.png',
			"registered_at" => mdate("%Y-%m-%d %H:%i:%s"),
			"time_logged_in" => mdate("%Y-%m-%d %H:%i:%s"),
			"status" => "logged in"
		];
		$this->db->insert('tabel_visitor', $data_tabel_visitor);

		$this->session->set_userdata($data_tabel_visitor);
	}
}

?>
