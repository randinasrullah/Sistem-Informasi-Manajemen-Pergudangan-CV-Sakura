<!-- <?php 
echo "<pre>";
print_r($masuk);
echo "</pre>";
?>   -->


<h3>Masuk Bahan</h3>
<hr>

<div>
	

	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="tanggal">

			<form method="post" class="form-inline" style="margin-top: 25px;">
				<div class="form-group">
					<select class="form-control" name="tahun">
						<option value="">Pilih Tahun</option>
						<?php foreach ($tahun as $key => $value): ?>
							<option value="<?php echo $value ?>"<?php if($key==$tahun_terpilih){echo "selected";} ?>><?php echo $value ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<select class="form-control" name="bulan">
						<option value="">Pilih Bulan</option>
						<?php foreach ($bulan as $key => $value): ?>
							<option value="<?php echo $key ?>"<?php if($key==$bulan_terpilih){echo "selected";} ?>><?php echo $value ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<button class="btn btn-primary">Filter</button>
					<a href="<?php echo base_url("admin/masuk/tambah") ?>" class="btn btn-primary"> Tambah  </a> 
				</div>
			</form>

			<div class="table-responsive" style="margin-top: 25px;">
				<table class="table table-bordered" id="thetable">

					<thead>
						<tr>
							<th>No</th>
							<th>Nama Admin</th>
							<th>Tanggal Bahan Masuk</th>
							<th>Total Bahan Masuk</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($masuk as $key => $value): ?>
							<tr>
								<td><?php echo $key+1 ?></td>
								<td><?php echo $value['username_admin'] ?></td>
								<td><?php echo date ("d M Y", strtotime($value['tanggal_masuk'])) ?></td>
								<td>Rp. <?php echo str_replace(",", ".", number_format($value['total_harga_masuk']))?></td>
								<td>
									<a href="<?php echo base_url("admin/detail_masuk/index/".$value['id_masuk']) ?>"	class="btn btn-info">Detail</a>
									<a href="<?php echo base_url("admin/masuk/ubah/". $value['id_masuk']) ?>" class="btn btn-warning"> Ubah</a>
									<a href="<?php echo base_url("admin/masuk/hapus_masuk/".$value['id_masuk']) ?>" class="btn btn-danger" onclick="return confirm('APAKAH ANDA YAKIN MENGHAPUS TABEL INI, SEMUA INFORMASI YANG BERHUBUNGAN DENGAN TABEL INI AKAN DIHAPUS ?')">Hapus</a>
								</td>
							</tr>

						<?php endforeach ?>
					</tbody>
				</table>
				<div class="text-left">
					
				</div>
			</div>
		</div>
	</div>
</div>
