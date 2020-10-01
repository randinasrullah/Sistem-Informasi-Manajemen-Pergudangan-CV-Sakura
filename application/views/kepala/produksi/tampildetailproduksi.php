<h3>Detail Produksi Kerupuk</h3>
<hr>

<div class="table-responsive">
	<table class="table table-bordered" id="thetable">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Bahan</th>
				<th>Total Bahan</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($detail_produksi as $key => $value): ?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td><?php echo $value['nama_bahan'] ?></td>
					<td><?php echo $value['jumlah_detail_produksi']." ".$value['satuan_bahan'] ?></td>
				</tr>
				
			<?php endforeach ?>
		</tbody>
	</table>
	<div>
		<a href="<?php echo base_url('kepala/produksi') ?>" class="btn btn-warning">Kembali</a>
	</div>
</div>