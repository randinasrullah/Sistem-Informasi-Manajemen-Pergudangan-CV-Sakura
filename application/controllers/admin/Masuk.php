<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Masuk extends CI_controller 
{
	function __construct ()
	{
		parent::__construct ();
		if (!$this->session->userdata("admin")) 
		{
			redirect ('', 'refresh');
		}

		$this->load->model("Mmasuk");
		$this->load->model("Mbahan");
		$this->load->model("Mpemasok");
		$this->load->model("Mdetail_masuk");

	}

	public function index ()
	{
		for ($i=2019; $i <= date("Y") ; $i++) 
		{ 
			$data['tahun'][$i] = $i;
		}
		$data['bulan']['01'] = "Januari";
		$data['bulan']['02'] = "Februari";
		$data['bulan']['03'] = "Maret";
		$data['bulan']['04'] = "April";
		$data['bulan']['05'] = "Mei";
		$data['bulan']['06'] = "Juni";
		$data['bulan']['07'] = "Juli";
		$data['bulan']['08'] = "Agustus";
		$data['bulan']['09'] = "September";
		$data['bulan']['10'] = "Oktober";
		$data['bulan']['11'] = "November";
		$data['bulan']['12'] = "Desember";

		$inputan = $this->input->post();
		if ($inputan) {
			$data['tahun_terpilih'] = $inputan['tahun'];
			$data['bulan_terpilih'] = $inputan['bulan'];
			$data['url'] = $inputan['tahun']."-".$inputan['bulan'];
			$data["masuk"] = $this->Mmasuk->tampil_masuk_tanggal($inputan['tahun']."-".$inputan['bulan']);
		} else {
			$data['tahun_terpilih'] = "";
			$data['bulan_terpilih'] = "";
			$data['url'] = "";
			$data["masuk"] = $this->Mmasuk->tampil_masuk();
		}
		for ($i=2019; $i <= date("Y") ; $i++) 
		{ 
			$data['tahun'][$i] = $i;
		}
		$data['bulan']['01'] = "Januari";
		$data['bulan']['02'] = "Februari";
		$data['bulan']['03'] = "Maret";
		$data['bulan']['04'] = "April";
		$data['bulan']['05'] = "Mei";
		$data['bulan']['06'] = "Juni";
		$data['bulan']['07'] = "Juli";
		$data['bulan']['08'] = "Agustus";
		$data['bulan']['09'] = "September";
		$data['bulan']['10'] = "Oktober";
		$data['bulan']['11'] = "November";
		$data['bulan']['12'] = "Desember";

		$inputan = $this->input->post();
		if ($inputan) {
			$data['tahun_terpilih'] = $inputan['tahun'];
			$data['bulan_terpilih'] = $inputan['bulan'];
			$data['url'] = $inputan['tahun']."-".$inputan['bulan'];
			$data["masuk"] = $this->Mmasuk->tampil_masuk_tanggal($inputan['tahun']."-".$inputan['bulan']);
		} else {
			$data['tahun_terpilih'] = "";
			$data['bulan_terpilih'] = "";
			$data['url'] = "";
			$data["masuk"] = $this->Mmasuk->tampil_masuk();
		}
		// $data["detail_masuk"] = $this->Mdetail_masuk->tampil();
		$this->load->view('admin/header');
		$this->load->view('admin/masuk/tampilmasuk',$data);
		$this->load->view('admin/footer');
	}

	// public function bahan()
	// {
		
	// 	for ($i=2019; $i <= date("Y") ; $i++) 
	// 	{ 
	// 		$data['tahun'][$i] = $i;
	// 	}
	// 	$data['bulan']['01'] = "Januari";
	// 	$data['bulan']['02'] = "Februari";
	// 	$data['bulan']['03'] = "Maret";
	// 	$data['bulan']['04'] = "April";
	// 	$data['bulan']['05'] = "Mei";
	// 	$data['bulan']['06'] = "Juni";
	// 	$data['bulan']['07'] = "Juli";
	// 	$data['bulan']['08'] = "Agustus";
	// 	$data['bulan']['09'] = "September";
	// 	$data['bulan']['10'] = "Oktober";
	// 	$data['bulan']['11'] = "November";
	// 	$data['bulan']['12'] = "Desember";


	// 	$data["bahan"] = $this->Mbahan->tampil_bahan();
	// 	$inputan = $this->input->post();
	// 	if ($inputan) {
	// 		$data['tahun_terpilih'] = $inputan['tahun'];
	// 		$data['bulan_terpilih'] = $inputan['bulan'];
	// 		$data['url'] = $inputan['tahun']."-".$inputan['bulan'];
	// 		foreach ($data['bahan'] as $key => $value) {
	// 			$detail = $this->Mdetail_masuk->tampil_masuk_bahan($value['id_bahan'], $inputan['tahun']."-".$inputan['bulan']);
	// 			// mencari total
	// 			// 1. Membuat wadah penampung sub total yang isinya masih kosong
	// 			$total[$value['id_bahan']] = array();
	// 			// 2. Memperulangkan data yang nantinya akan di jumlahkan
	// 			foreach ($detail as $key_d => $value_d) {
	// 				// diambil sub nya saja per bahan. lalu disimpan di $total yang mempunyai indix id_bahan dan index urutan biasa
	// 				$total[$value['id_bahan']][] = $value_d['sub_harga_detail_masuk'];
	// 			}
	// 			// menjumlahkan total yang berisi sub nya tadi menggunakan fungsi array_sum
	// 			$data['bahan'][$key]['total'] = array_sum($total[$value['id_bahan']]);
	// 		}
	// 	} else {
	// 		$data['tahun_terpilih'] = "";
	// 		$data['bulan_terpilih'] = "";
	// 		$data['url'] = "";
	// 		foreach ($data["bahan"] as $key => $value) {
	// 			$detail = $this->Mdetail_masuk->tampil_bahan($value['id_bahan']);
	// 			$total[$value['id_bahan']] = array();
	// 			foreach ($detail as $key_d => $value_d) {
	// 				$total[$value['id_bahan']][] = $value_d['sub_harga_detail_masuk'];
	// 			}
	// 			$data['bahan'][$key]['total'] = array_sum($total[$value['id_bahan']]);
	// 		}
	// 	}
	// 	$this->load->view('admin/header');
	// 	$this->load->view('admin/masuk/tampilmasukbahan',$data);
	// 	$this->load->view('admin/footer');
	// }
	
	public function tambah ()
	{
		$data['bahan'] = $this->Mbahan->tampil_bahan();
		$data['pemasok'] = $this->Mpemasok->tampil_pemasok();
		$inputan = $this->input->post();
		if ($inputan) {

			$hasil = $this->Mmasuk->tambah($inputan);
			if ($hasil== "gagal") 
			{
				$this->session->set_flashdata('belum_lengkap', ' <div class="alert alert-danger"> Data Belum Lengkap. Silahkan isi ulang</div>');
				redirect('admin/masuk/tambah');
			}
			redirect ('admin/masuk', 'refresh');
		}

		$this->load->view('admin/header');
		$this->load->view('admin/masuk/tambahmasuk',$data);
		$this->load->view('admin/footer');
	}	

	public function ubah ($id_masuk)
	{
		$data['id_masuk'] = $id_masuk;
		$data['bahan'] = $this->Mbahan->tampil_bahan();
		$data['pemasok'] = $this->Mpemasok->tampil_pemasok();
		$detail = $this->Mmasuk->tampil_detail_masuk($id_masuk);
		foreach ($data['bahan'] as $key_b => $value_b) 
		{
			foreach ($detail as $key_d => $value_d) 
			{
				if ($value_d['id_bahan']==$value_b['id_bahan'])
				{
					$data['bahan'][$key_b] = $value_d;
				}
			}
		}
		$inputan =$this->input->post();
		if($inputan){
			$this->Mmasuk->ubah_masuk($inputan, $id_masuk);
			redirect('admin/masuk', 'refresh');
		}
		$this->load->view('admin/header');
		$this->load->view('admin/masuk/ubahmasuk', $data);
		$this->load->view('admin/footer');
	}
	public function hapus_detail($id_masuk, $id_detail_masuk)
	{
		$this->Mmasuk->hapus_detail($id_detail_masuk, $id_masuk);
		redirect('admin/masuk/ubah/' .$id_masuk,'refresh');
	}
	public function hapus_masuk($id_masuk)
	{
		$this->Mmasuk->hapus_masuk($id_masuk);
		redirect("admin/masuk","refresh");
	}
}
?>