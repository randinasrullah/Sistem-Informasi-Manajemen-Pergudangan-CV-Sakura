<h3>Ubah Transaksi Keluar</h3>

<form method="post">
	<div class="table-responsive">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Bahan</th>
					<th>Jumlah</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($bahan as $key => $value): ?>
					<tr>
						<td><?php echo $value['nama_bahan'] ?></td>
						<td><input type="number" step="any" name="data[<?php echo $value['id_bahan'] ?>][jumlah_detail_keluar]" class="form-control" value="<?php if (isset($value['jumlah_detail_keluar'])){echo $value['jumlah_detail_keluar'];} ?>">
						</td>
						<td>
							<?php if (isset($value['id_detail_keluar'])): ?>
								<a href="<?php echo base_url("admin/keluar/hapus_detail/".$id_keluar."/".$value['id_detail_keluar']) ?>" class="btn btn-danger">Hapus</a>
							<?php endif ?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</div>
	<button class="btn btn-primary">Simpan</button>
	<a href="<?php echo base_url("admin/keluar") ?> " class="btn btn-warning" onclick="return confirm('Anda Yakin kembali ke Halaman Tabel Transaksi Keluar ?')">Kembali</a>

</form>