<h3>Tambah Transaksi Keluar</h3>

<br>

<form method="post">

	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label style="font-size: 18px">Tanggal keluar</label>
				<br>
				<input type="date" name="tanggal_keluar" class="form-control">
			</div>
		</div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Bahan</th>
					<th>Jumlah</th>
					<!-- 	<th>Satuan Bahan</th> -->
				</tr>
			</thead>
			<tbody>
				<?php foreach ($bahan as $key => $value): ?>
					<tr>
						<td><?php echo $value['nama_bahan'] ?></td>
						<td>
							<div class="input-group">
								<input type="number" step="any" name="data[<?php echo $value['id_bahan'] ?>][jumlah_detail_keluar]" class="form-control">
								<span class="input-group-addon"><?php echo $value['satuan_bahan'] ?></span>
							</div>
						</td>
						<!-- 	<td><?php echo $value['satuan_bahan'] ?></td> -->
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<button class="btn btn-primary">Simpan</button>
	<a href="<?php echo base_url("admin/keluar") ?>" class="btn btn-warning" onclick="return confirm('Anda Yakin kembali ke Halaman Tabel Transaksi Keluar ?')">Kembali</a>
</form>