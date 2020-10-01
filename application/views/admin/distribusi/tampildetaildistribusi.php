<h3>Detail Masuk Distribusi </h3>
<hr>

<div class="table-responsive">
	<table class="table table-bordered" id="thetable">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pelanggan</th>
				<th>Total Distribusi</th>
				<th>Catatan Pelanggan</th>
				
			</tr>
		</thead>
		<tbody>
			<?php foreach ($detail_distribusi as $key => $value): ?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td><?php echo $value['nama_pelanggan'] ?></td>
					<td><?php echo $value['jumlah_detail_distribusi'] ?> kg</td>
					<td><?php echo $value['catatan_detail_distribusi'] ?></td>

				</tr>	
			<?php endforeach ?>
		</tbody>
	</table>
	<div>
		<a href="<?php echo base_url('admin/distribusi') ?>" class="btn btn-warning" onclick="return confirm('Anda Yakin kembali ke Halaman Tabel Transaksi Distribusi ?')">Kembali</a>
	</div>
</div>