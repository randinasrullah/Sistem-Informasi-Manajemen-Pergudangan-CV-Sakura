<h3>Data Admin</h3>
<hr>

<!-- <?php echo $this->session->flashdata('data_tambah') ?> -->
<!-- <?php echo $this->session->flashdata('data_ubah') ?>
<?php echo $this->session->flashdata('data_hapus') ?> -->


<div class="float-left">
	<a href="<?php echo base_url("kepala/admin/tambah") ?>" class="btn btn-primary" style="margin-left: 0px;">Tambah</a>
</div>
<br>
<div class="table-responsive">
	<table class="table table-bordered" id="thetable">
		<thead>
			<tr>
				<th>No</th>
				<th>Username Admin</th>
				<th>Status Admin</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($admin as $key => $value): ?>
				<tr>
					<td><?php echo $key+1 ?></td>
					<td><?php echo $value['username_admin'] ?></td>
					<td><?php echo $value['status_admin'] ?></td>
					<td>
						
						<a href="<?php echo base_url("kepala/admin/ubah/".$value['id_admin']) ?>" class="btn btn-warning"><!-- <i class="fas fa-edit"></i> -->Ubah</a>
						<a href="<?php echo base_url("kepala/admin/hapus/".$value['id_admin']) ?>" class="btn btn-danger" onclick="return confirm('APAKAH ANDA YAKIN MENGHAPUS TABEL INI, SEMUA INFORMASI YANG BERHUBUNGAN DENGAN TABEL <?php echo strtoupper($value['username_admin']) ?> AKAN DIHAPUS ?')"><!-- <i class="fas fa-trash-alt"></i> -->hapus</a>

					</td>
				</tr>
				
			<?php endforeach ?>
		</tbody>
	</table>
</div>
