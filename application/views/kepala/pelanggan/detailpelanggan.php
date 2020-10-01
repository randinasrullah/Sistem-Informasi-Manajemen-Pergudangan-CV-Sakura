<h3>Detail Pemasok</h3>
<!-- <pre>
	<?php print_r($detail) ?>
</pre> -->
 <div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
			<th>No</th>
			<th>Nama Admin</th>
			<th>Tanggal</th>
			<th>Catatan</th>
			<th>Jumlah</th>
			</tr>
		</thead>
		<tbody>
			<?php $total= 0 ?>
			<?php foreach ($detail as $key => $value): ?>
				<tr>
				<td><?php echo $key+1 ?></td>
				<td><?php echo $value['username_admin'] ?></td>	
				<td><?php echo $value['tanggal_distribusi'] ?></td>	
				<td><?php echo $value['catatan_detail_distribusi'] ?></td>	
				<td><?php echo $value['jumlah_detail_distribusi'] ?> kg</td>	
				</tr>
				<?php $total += $value['jumlah_detail_distribusi'] ?>
			<?php endforeach ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="4">Total</th>
				<th><?php echo $total ?> kg</th>
			</tr>
		</tfoot>
	</table>
</div> 

<div>
	<a href="<?php echo base_url("kepala/pelanggan") ?>" class="btn btn-warning" onclick="return confirm('Anda Yakin kembali ke halaman Tabel Pelanggan ?')">Kembali</a>
</div>