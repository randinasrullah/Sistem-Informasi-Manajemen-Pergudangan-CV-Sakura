<h3>Data Pelanggan</h3>
<hr>
<!-- <pre>
	<?php print_r($pelanggan) ?>
</pre> -->

<div class="form-group">
	<a href="<?php echo base_url("kepala/pelanggan/tambah") ?>" class="btn btn-primary" style="margin-left: 0px;">Tambah</a>
</div>

<div class="table-responsive">
	<table class="table table-bordered" id="thetable">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pelanggan </th>
				<th>Nomor Pelanggan</th>
				<th>Alamat Pelanggan</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($pelanggan as $key => $value): ?> 
				<tr>
					<td><?php echo $key+1 ?> </td>
					<td><?php echo $value['nama_pelanggan'] ?></td>
					<td><?php echo $value['nomor_pelanggan'] ?> </td>
					<td><?php echo $value['alamat_pelanggan'] ?> </td>
					<td>
					<!-- 	<a href="<?php echo base_url("kepala/pelanggan/detail/".$value['id_pelanggan']) ?>" class="btn btn-info">Detail</a> -->
						<a href="<?php echo base_url("kepala/pelanggan/ubah/".$value['id_pelanggan']) ?>" class="btn btn-warning">Ubah</a>
						<a href="<?php echo base_url("kepala/pelanggan/hapus/".$value['id_pelanggan']) ?>" class="btn btn-danger" onclick="return confirm('APAKAH ANDA YAKIN MENGHAPUS TABEL INI, SEMUA INFORMASI YANG BERHUBUNGAN DENGAN TABEL <?php echo $value['nama_pelanggan'] ?> AKAN DIHAPUS ?')">Hapus</a>
					</td>
				</tr>
				
			<?php endforeach ?>
		</tbody>
	</table>
</div>
