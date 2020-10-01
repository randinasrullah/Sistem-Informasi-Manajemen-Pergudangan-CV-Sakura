<h3>Tambah Transaksi Distribusi</h3>
<br>
<form method="post">

	<div class="row">
		<div class="col-md-3">
			<div class="form-group">
				<label style="font-size: 18px">Tanggal Distribusi</label>
				<input type="date" name="tanggal_distribusi" class="form-control">
			</div>
		</div>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Pelanggan</th>
					<th>Jumlah Distribusi (kg)</th>
					<th>Catatan Pelanggan</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($pelanggan as $key => $value): ?>
					<tr>
						<td><?php echo $value['nama_pelanggan'] ?></td>
						<td>
							<input type="number" step="any" name="data[<?php echo $value['id_pelanggan'] ?>][jumlah_detail_distribusi]" class="form-control">
						</td>
						<td>
							<input type="text" name="data[<?php echo $value['id_pelanggan'] ?>][catatan_detail_distribusi]" class="form-control">
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<button class="btn btn-primary">Simpan</button>
	<a href="<?php echo base_url("admin/distribusi") ?>" class="btn btn-warning" onclick="return confirm('Anda Yakin kembali ke Halaman Tabel Transaksi Distribusi ?')">Kembali</a>
</form>
