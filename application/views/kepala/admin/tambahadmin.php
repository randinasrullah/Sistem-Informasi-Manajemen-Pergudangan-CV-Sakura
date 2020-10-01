<h3>Tambah Admin</h3>
<hr>



<form method="post">
	<div class="form-group">
		<label>Username Admin</label>
		<input type="text" name="username_admin" class="form-control" value="<?php echo set_value("username_admin") ?>">
		<p><small class="text-danger"><i><?php echo form_error("username_admin") ?></i></small></p>
	</div>
	<div class="form-group">
		<label>Password Admin</label>
		<input type="password" name="password_admin" class="form-control" value="<?php echo set_value("password_admin") ?>">
		<p><small class="text-danger"><i><?php echo form_error("password_admin") ?></i></small></p>
	</div>
	<div class="form-groupf">
		<label>Status Admin</label>
		<select name="status_admin" class="form-control">
			<option value="">Pilih Status</option>
			<option value="Aktif" <?php echo set_select('status_admin','Aktif') ?>>Aktif</option>
			<option value="Tidak aktif"<?php echo set_value('status_admin', 'Tidak aktif') ?>>Tidak Aktif</option>
		</select>
	</div>
	<br>
	<div class="form-group">
		<button class="btn btn-primary">Simpan</button>
		<a href="<?php echo base_url("kepala/admin") ?>" class="btn btn-warning" onclick="return confirm('Anda Yakin kembali ke Halaman Tabel Admin ?')">Kembali</a>
	</div>
</form>