<h3> Detail Masuk per Pelanggan</h3>
<hr>
<!--  <?php 
echo "<pre>";
print_r($detail_distribusi);
echo "</pre>";
 ?>   -->
<div class="table-responsive">
	<table class="table table-bordered" id="thetable">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pemasok</th>
				<th>Tanggal Distribusi</th>
				<th>Total Bahan</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($detail_distribusi as $key => $value): ?>
				<tr>
					<td><?php echo $key+=1 ?></td>
					<td><?php echo $value['nama_pelanggan'] ?></td>
					<td><?php echo date("d M Y", strtotime($value['tanggal_distribusi'])) ?></td>
					<td><?php echo $value['jumlah_detail_distribusi']?> kg</td>
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<div>
		<a href="<?php echo base_url('kepala/distribusi/pelanggan') ?>" class="btn btn-warning">Kembali</a>
	</div>
</div>