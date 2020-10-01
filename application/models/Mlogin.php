<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Mlogin extends CI_Model 
{

	public function login_user ($inputan)
	{

		$this->db->where('username_kepala LIKE binary', $inputan['username']);
		$cuk = $this->db->get('kepala');
		$hitung_cuk = $cuk->num_rows();

		$this->db->where('username_admin LIKE binary', $inputan['username']);
		$cua = $this->db->get('admin');
		$hitung_cua = $cua->num_rows();

		if ($hitung_cuk>0 OR $hitung_cua>0){
			
		// Intinya login ada 2, yaitu =
		// 1. Mencocokan data dari form ke data di db
		// 2. Setelah itu, lalu data login di simpan ke session dan user bisa akses data
		// Session untuk menyimpan data di browser

	// mencocokan data ke db
			$this->db->where('username_kepala LIKE binary', $inputan['username']);
			$this->db->where('password_kepala LIKE binary', md5($inputan['password']));
			$ambil_kepala = $this->db->get('kepala');

	// Menghitung data yang di ambil, gunakan fungsi num_rows
			$hitung_kepala = $ambil_kepala->num_rows();
	// Jika hitung ==1, maka lanjut

			if ($hitung_kepala==1)
			{
			// ubah $ambil_kepala menjadi array
				$data_kepala = $ambil_kepala->row_array();
			// simpan data kepala ke dalam session yang bernama kepala
				$this->session->set_userdata("kepala", $data_kepala);
				return "sukses_login_kepala";
			} else {
				$this->db->where('username_admin LIKE binary', $inputan['username']);
				$this->db->where('password_admin LIKE binary', md5($inputan['password']));
				$this->db->where('status_admin', "Aktif");
				$ambil_admin = $this->db->get('admin');
				$hitung_admin = $ambil_admin->num_rows();
				if ($hitung_admin==1)
				{
					$data_admin = $ambil_admin->row_array();
					$this->session->set_userdata("admin", $data_admin);
					return "sukses_login_admin";
				} else {
					return "salah_password";
				}
			}
		} else {
			return "salah_username";
		}

	}
}
?>