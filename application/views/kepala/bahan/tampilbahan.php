<h3>Data Bahan</h3>
<hr>

<!-- <pre>
	<?php print_r($bahan); ?>
</pre>  -->

<div class="form-group">
	<a href="<?php echo base_url("kepala/bahan/tambah") ?>" class="btn btn-primary" style="margin-left: 0px;">Tambah</a>
</div>
<div class="table-responsive">
	<table class="table table-bordered" id="thetable">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Bahan </th>
				<th>Satuan Bahan</th>
				<th>Minimal Stok</th>
				<th>Masa Kadaluarsa</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($bahan as $key => $value): ?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td><?php echo $value['nama_bahan'] ?></td>
					<td><?php echo $value['satuan_bahan'] ?></td>
					<td><?php echo $value['minimal_stok']." ".$value['satuan_bahan'] ?></td>
					<td><?php echo $value['masa_kadaluarsa'] ?></td>
					<td>
						<!-- <a href="<?php echo base_url("kepala/bahan/detail/".$value["id_bahan"]) ?>" class="btn btn-info">Detail</a> -->
						<a href="<?php echo base_url("kepala/bahan/ubah/".$value['id_bahan']) ?>" class="btn btn-warning">Ubah</a>
						<a href="<?php echo base_url("kepala/bahan/hapus/".$value['id_bahan']) ?>" class="btn btn-danger" onclick="return confirm('APAKAH ANDA YAKIN MENGHAPUS TABEL INI, SEMUA INFORMASI YANG BERHUBUNGAN DENGAN TABEL <?php echo strtoupper($value['nama_bahan']) ?> AKAN DIHAPUS ?')">Hapus</a>
					</td>
				</tr>
				
			<?php endforeach ?>
		</tbody>
	</table>
</div>



