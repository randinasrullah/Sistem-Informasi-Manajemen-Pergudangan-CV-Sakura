<h3>Tambah Pelanggan</h3>
<hr>

<form method="post">
	<div class="form-group">
		<label>Nama Pelanggan</label>
		<input type="text" name="nama_pelanggan" class="form-control" value="<?php echo set_value("nama_pelanggan") ?>">
		<p><small class="text-danger"><i><?php echo form_error("nama_pelanggan") ?></i></small></p>
	</div>
	<div class="form-group">
		<label>Nomor Pelanggan</label>
		<input type="text" name="nomor_pelanggan" class="form-control" value="<?php echo set_value("nomor_pelanggan") ?>">
		<p><small class="text-danger"><i><?php echo form_error("nomor_pelanggan") ?></i></small></p>
	</div>
	<div class="form-group">
		<label>Alamat Pelanggan</label>
		<input type="text" name="alamat_pelanggan" class="form-control" value="<?php echo set_value("alamat_pelanggan") ?>">
		<p><small class="text-danger"><i><?php echo form_error("alamat_pelanggan") ?></i></small></p>
	</div>
	<br>
	<div class="form-group">
		<button class="btn btn-primary" >Simpan</button>
		<a href="<?php echo base_url("kepala/pelanggan") ?>" class="btn btn-warning" onclick="return confirm('Anda Yakin kembali ke halaman Tabel Pelanggan ?')">Kembali</a>
	</div>
</form>