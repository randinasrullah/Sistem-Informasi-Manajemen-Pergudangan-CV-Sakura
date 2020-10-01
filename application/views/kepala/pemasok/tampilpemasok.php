<h3>Data Pemasok</h3>
<hr>

<div class="form-group">
	<a href="<?php echo base_url("kepala/pemasok/tambah") ?>" class="btn btn-primary" style="margin-left: 0px;">Tambah</a>
</div>

<div class="table-responsive">
	<table class="table table-bordered" id="thetable">
		<thead>
			<tr>
				<th>No</th>
				<th>Nama Pemasok </th>
				<th>Nomor Pemasok</th>
				<th>Alamat Pemasok</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($pemasok as $key => $value): ?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td><?php echo $value['nama_pemasok'] ?></td>
					<td><?php echo $value['telepon_pemasok'] ?></td>
					<td><?php echo $value['alamat_pemasok'] ?></td>
					<td>
						<!-- <a href="<?php echo base_url("kepala/pemasok/detail/".$value['id_pemasok']) ?>" class="btn btn-info">Detail</a> -->
						<a href="<?php echo base_url("kepala/pemasok/ubah/".$value['id_pemasok']) ?>" class="btn btn-warning">Ubah</a>
						<a href="<?php echo base_url("kepala/pemasok/hapus/".$value['id_pemasok']) ?>" class="btn btn-danger" onclick="return confirm('APAKAH ANDA YAKIN MENGHAPUS TABEL INI, SEMUA INFORMASI YANG BERHUBUNGAN DENGAN TABEL <?php echo $value['nama_pemasok'] ?> AKAN DIHAPUS ?')">Hapus</a>
					</td>
				</tr>
				
			<?php endforeach ?>
		</tbody>
	</table>
</div>
