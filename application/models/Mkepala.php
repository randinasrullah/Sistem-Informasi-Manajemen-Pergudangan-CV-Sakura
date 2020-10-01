<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mkepala extends CI_model
{
	public function ubah_profil ($inputan, $id_kepala)
	{
		// mengubah data di db
		$this->db->where('id_kepala',$id_kepala);
		$this->db->update('kepala', $inputan);

		// mengubah di session
		// ubah di session sama aja membuat session baru
		$inputan['id_kepala'] = $id_kepala;
		$this->session->set_userdata("kepala", $inputan);
	}
	public function tampil_kepala ()
	{
		$ambil = $this->db->get('kepala');
		return $ambil->result_array();
	}
	
	public function get($id = null)
	{
		$this->db->from('kepala');
		if ($id !=null) {
				$this->db->where("id_kepala", $id);
			}	
			$query = $this->db->get();
			return $query;
	}
}