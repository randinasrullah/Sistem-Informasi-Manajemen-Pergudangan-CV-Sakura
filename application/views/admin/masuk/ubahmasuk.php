<h3>Ubah Transaksi Masuk</h3>

<form method="post">
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Bahan</th>
					<th>Pemasok</th>
					<th>Jumlah</th>
					<th>Harga</th>
					<!-- <th>Tanggal Kadaluarsa</th> -->
					<th>Aksi</th>
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
									<option value="<?php echo $vp['id_pemasok'] ?>"<?php if (isset($value['id_pemasok']) AND $value['id_pemasok']==$vp['id_pemasok']) {echo "selected";} ?>><?php echo $vp['nama_pemasok'] ?></option>
								<?php endforeach ?>
							</select>
						</td>
						<td><input type="number" step="any" name="data[<?php echo $value['id_bahan'] ?>][jumlah_detail_masuk]" class="form-control" value="<?php if (isset($value['jumlah_detail_masuk'])){echo $value['jumlah_detail_masuk'];} ?>">
						</td>
						<td>
							<input type="number" name="data[<?php echo $value['id_bahan'] ?>][harga_detail_masuk]" class="form-control" value="<?php if (isset($value['harga_detail_masuk'])){echo $value['harga_detail_masuk'];} ?>">
						</td>
						<!-- <td>
							<input type="date" name="data[<?php echo $value['id_bahan'] ?>][tanggal_kadaluarsa_detail_masuk]" class="form-control" value="<?php if (isset($value['tanggal_kadaluarsa_detail_masuk'])){echo $value['tanggal_kadaluarsa_detail_masuk'];} ?>">
						</td> -->
						<td>
							<?php if (isset($value['id_detail_masuk'])): ?>
								<a href="<?php echo base_url("admin/masuk/hapus_detail/".$id_masuk."/".$value['id_detail_masuk']) ?>" class="btn btn-danger">Hapus</a>
							<?php endif ?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<button class="btn btn-primary">Simpan</button>
	<a href="<?php echo base_url("admin/masuk") ?>" class="btn btn-warning" onclick="return confirm('Anda Yakin kembali ke Halaman Tabel Transaksi Masuk ?')">Kembali</a>
</form>