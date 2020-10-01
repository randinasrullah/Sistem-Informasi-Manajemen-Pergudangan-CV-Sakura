<h3>Detail Masuk Bahan </h3>
<hr>
<!--  <pre>
	<?php print_r($detail_masuk) ?>
</pre>     -->
<div class="table-responsive">
	<table class="table table-bordered" id="thetable">
		<!-- <?php foreach ($detail_masuk as $key => $value): ?>
			<?php echo $value['tanggal_masuk'] ?>
		<?php endforeach ?> -->
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pemasok</th>
				<th>Nama Bahan</th>
				<th>Total Bahan</th>
				<th>Harga Bahan</th>
				<th>Sub Harga</th>
				<th>Masa Kadaluarsa</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($detail_masuk as $key => $value): ?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td><?php echo $value['nama_pemasok'] ?></td>
					<td><?php echo $value['nama_bahan'] ?></td>
					<td><?php echo $value['jumlah_detail_masuk']." ".$value['satuan_bahan'] ?></td>
					<td>Rp. <?php echo str_replace(",", ".", number_format($value['harga_detail_masuk'])) ?></td>
					<td>Rp. <?php echo str_replace(",", ".", number_format($value['sub_harga_detail_masuk'])) ?></td>
					<td><?php echo $value['masa_kadaluarsa'] ?></td>
				</tr>
				
			<?php endforeach ?>
		</tbody>
	</table>
	<div>
		<a href="<?php echo base_url("admin/masuk") ?>" class="btn btn-warning" onclick="return confirm('Anda Yakin kembali ke Halaman Tabel Transaksi Masuk ?')">Kembali</a>
	</div>
</div>