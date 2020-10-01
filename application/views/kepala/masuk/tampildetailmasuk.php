<h3>Detail Masuk Bahan </h3>
<hr>
<!-- <pre>
	<?php print_r($detail_masuk) ?>
</pre> -->
<div class="table-responsive">
	<table class="table table-bordered" id="thetable">
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
			<!-- <?php $total_jumlah = 0 ?>
			<?php $total_sub_harga = 0 ?> -->
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
				<!-- <?php $total_sub_harga += $value['sub_harga_detail_masuk'] ?>
				<?php $total_jumlah += $value['jumlah_detail_masuk'] ?> -->
			<?php endforeach ?>
		</tbody>
		<!-- <tfoot>
			<tr>
				<td colspan="3">Total Harga</td>
				<td><?php echo $total_jumlah ?></td>
				<td></td>
				<td>Rp. <?php echo $total_sub_harga ?></td>
				<td></td>
			</tr>
		</tfoot> -->
	</table>
	<div>
		<a href="<?php echo base_url('kepala/masuk') ?>" class="btn btn-warning">Kembali</a>
	</div>
</div>