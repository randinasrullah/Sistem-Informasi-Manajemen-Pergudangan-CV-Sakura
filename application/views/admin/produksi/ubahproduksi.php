 <!-- <pre>
	<?php echo print_r($produksi) ?>
</pre>   
 -->
<h3>Ubah Transaksi Masuk</h3>

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
						<td><input type="number" step="any" name="data[<?php echo $value['id_bahan'] ?>][jumlah_detail_produksi]" class="form-control" value="<?php if (isset($value['jumlah_detail_produksi'])){echo $value['jumlah_detail_produksi'];} ?>">
						</td>
						<td>
							<?php if (isset($value['id_detail_produksi'])): ?>
								<a href="<?php echo base_url("admin/produksi/hapus_detail/".$id_produksi."/".$value['id_detail_produksi']) ?>" class="btn btn-danger">Hapus</a>
							<?php endif ?>
						</td>
					</tr>
				<?php endforeach ?>
			</tbody>

			<tfoot>
				<tr>
					<td style="font-weight:	600 ">Total Produksi</td>
					<td>
						<input type="number" step="any" name="jumlah_produksi" class="form-control" value="<?php echo $produksi['jumlah_produksi'] ?>">
					</td> 

				</tr>
			</tfoot> 

		</table>
	</div>
	<button class="btn btn-primary">Simpan</button>
	<a href="<?php echo base_url("admin/produksi") ?>" class="btn btn-warning" onclick="return confirm('Anda Yakin kembali ke Halaman Tabel Transaksi produksi ?')">Kembali</a>
</form>