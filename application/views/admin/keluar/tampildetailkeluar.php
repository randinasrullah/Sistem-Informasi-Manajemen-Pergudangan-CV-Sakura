<h3>Detail Keluar Bahan </h3>
<hr>

<div class="table-responsive">
	<table class="table table-bordered" id="thetable">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Bahan</th>
				<th>Total Bahan Keluar</th>
				
		</thead>
		<tbody>
			<?php foreach ($detail_keluar as $key => $value): ?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td><?php echo $value['nama_bahan'] ?></td>
					<td><?php echo $value['jumlah_detail_keluar']." ".$value['satuan_bahan'] ?></td>
				</tr>
				
			<?php endforeach ?>
		</tbody>
	</table>
	<div>
		<a href="<?php echo base_url("admin/keluar") ?>" class="btn btn-warning" onclick="return confirm('Anda Yakin kembali ke Halaman Tabel Transaksi Keluar ?')">Kembali</a>
	</div>
</div>