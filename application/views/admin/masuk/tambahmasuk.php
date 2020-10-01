<h3>Tambah Transaksi Masuk</h3>
 <!--  <pre>
	<?php print_r($bahan) ?>
</pre>  -->
<br>
<?php echo $this->session->flashdata('belum_lengkap') ?>
<form method="post">

	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label style="font-size: 18px">Tanggal Masuk</label>
				<input type="date" name="tanggal_masuk" class="form-control" required="">
			</div>
		</div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Bahan</th>
					<th>Pemasok</th>
					<th>Jumlah Bahan</th>
					<!-- <th>Satuan Bahan</th> -->
					<th>Harga Bahan</th>
					<!-- <th>Kadaluarsa Barang</th>  -->
					<!-- <th>Tanggal Masuk</th> -->
				</tr>
			</thead>
			<tbody>
				<?php foreach ($bahan as $key => $value): ?>
					<tr>
						<td><?php echo $value['nama_bahan'] ?></td>
						<td>
							<select class="form-control" name="data[<?php echo $value['id_bahan']  ?>][id_pemasok]">
								<option value="">Pilih Pemasok</option>
								<?php foreach ($pemasok as $idp => $vp): ?>
									<option value="<?php echo $vp['id_pemasok'] ?>"><?php echo $vp['nama_pemasok'] ?></option>
								<?php endforeach ?>
							</select>
						</td>
						<td>
							<div class="input-group">
								<input type="number" step="any" name="data[<?php echo $value['id_bahan'] ?>][jumlah_detail_masuk]" class="form-control">
								<span class="input-group-addon"><?php echo $value['satuan_bahan'] ?></span>
							</div>
						</td>
						<!-- <td><?php echo $value['satuan_bahan'] ?></td> -->
						<td>
							<input type="number" name="data[<?php echo $value['id_bahan'] ?>][harga_detail_masuk]" class="form-control">
						</td>
						<!-- <td><?php echo $value['masa_kadaluarsa'] ?></td> -->
						<!-- <td>
							<input type="date" name="data[<?php echo $value['id_bahan'] ?>][tanggal_kadaluarsa_detail_masuk]" class="form-control">
						</td> -->
						 
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<button class="btn btn-primary">Simpan</button>
	<a href="<?php echo base_url("admin/masuk") ?>" class="btn btn-warning" onclick="return confirm('Anda Yakin kembali ke Halaman Tabel Transaksi Masuk ?')">Kembali</a>
</form>