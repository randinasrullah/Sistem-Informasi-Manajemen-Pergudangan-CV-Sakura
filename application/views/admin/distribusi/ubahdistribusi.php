<h3>Ubah Transaksi Distribusi</h3>

<form method="post">
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Pelanggan</th>
					<th>Jumlah</th>
					<th>Catatan Pelanggan</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($pelanggan as $key => $value): ?>
					<tr>
						<td><?php echo $value['nama_pelanggan'] ?></td>
						<td>
							<input type="number" step="any" name="data[<?php echo $value['id_pelanggan'] ?>][jumlah_detail_distribusi]" class="form-control" value="<?php if (isset($value['jumlah_detail_distribusi'])){echo $value['jumlah_detail_distribusi'];} ?>">
						</td>
						<td>
							<input type="text" name="data[<?php echo $value['id_pelanggan'] ?>][catatan_detail_distribusi]" class="form-control" value="<?php if (isset($value['catatan_detail_distribusi'])){echo $value['catatan_detail_distribusi'];} ?>">
						</td>
						<td>
							<?php if (isset($value['id_detail_distribusi'])): ?>
								<a href="<?php echo base_url("admin/distribusi/hapus_detail/".$id_distribusi."/".$value['id_detail_distribusi']) ?>" class="btn btn-danger">Hapus</a>
							<?php endif ?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<button class="btn btn-primary">Simpan</button>
	<a href="<?php echo base_url("admin/distribusi") ?> " class="btn btn-warning" onclick="return confirm('Anda Yakin kembali ke Halaman Tabel Transaksi distribusi ?')">Kembali</a>

</form>