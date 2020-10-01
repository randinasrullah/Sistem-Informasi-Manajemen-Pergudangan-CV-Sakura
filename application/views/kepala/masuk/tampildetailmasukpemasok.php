<h3> Detail Masuk per Pemasok</h3>
<hr>
<!--  <?php 
echo "<pre>";
print_r($detail_masuk);
echo "</pre>";
 ?>  -->
<div class="table-responsive">
	<table class="table table-bordered" id="thetable">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Bahan</th>
				<th>Tanggal Masuk</th>
				<th>Total Bahan</th>
				<th>Harga Bahan</th>
				<th>Sub Total</th>
				<th>Masa Kadaluarsa</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($detail_masuk as $key => $value): ?>
				<tr>
					<td><?php echo $key+=1 ?></td>
					<td><?php echo $value['nama_bahan'] ?></td>
					<td><?php echo date("d M Y", strtotime($value['tanggal_masuk'])) ?></td>
					<td><?php echo $value['jumlah_detail_masuk']." ".$value['satuan_bahan'] ?></td>
					<td>Rp <?php echo str_replace(",", ".", number_format($value['harga_detail_masuk'])) ?></td>
					<td>Rp <?php echo str_replace(",", ".", number_format($value['sub_harga_detail_masuk'])) ?></td>
					<td><?php echo $value['masa_kadaluarsa'] ?></td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<div>
		<a href="<?php echo base_url('kepala/masuk/pemasok') ?>" class="btn btn-warning">Kembali</a>
	</div>
</div>