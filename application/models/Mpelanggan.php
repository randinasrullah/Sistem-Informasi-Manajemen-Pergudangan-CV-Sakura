<?php 
class Mpelanggan extends CI_Model
{
	public function tampil_pelanggan ()
	{
		$ambil = $this->db->get('pelanggan');
		return $ambil->result_array();
	}

	public function tambah ($inputan)
	{
		$this->db->insert('pelanggan', $inputan);
	}

	public function detail($id_pelanggan)
	{
		$this->db->where('id_pelanggan', $id_pelanggan);
		$ambil = $this->db->get('pelanggan');
		return $ambil->row_array();
	}

	public function ubah($inputan, $id_pelanggan)
	{
		$this->db->where('id_pelanggan',$id_pelanggan);
		$this->db->update('pelanggan', $inputan);
	}
	public function hapus ($id_pelanggan)
	{
		$this->db->where('id_pelanggan',$id_pelanggan);
		$this->db->delete('pelanggan');
	}
}

?>
