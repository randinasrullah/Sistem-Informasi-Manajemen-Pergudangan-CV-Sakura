<h3>Ubah Pemasok</h3>
<hr>

<form method="post">
	<div class="form-group">
		<label>Nama Pemasok</label>
		<input type="text" name="nama_pemasok" class="form-control" value="<?php if(!set_value("nama_pemasok")){echo $pemasok['nama_pemasok'];} else {echo set_value("nama_pemasok");} ?>">
		<p><small class="text-danger"><i><?php echo form_error("nama_pemasok") ?></i></small></p>
	</div>
	<div class="form-group">
		<label>Nomor Pemasok</label>
		<input type="text" name="telepon_pemasok" class="form-control" value="<?php if(!set_value("telepon_pemasok")){echo $pemasok['telepon_pemasok'];} else {echo set_value("telepon_pemasok");} ?>">
		<p><small class="text-danger"><i><?php echo form_error("telepon_pemasok") ?></i></small></p>
	</div>
	<div class="form-group">
		<label>Alamat Pemasok</label>
		<input type="text" name="alamat_pemasok" class="form-control" value="<?php if(!set_value("alamat_pemasok")){echo $pemasok['alamat_pemasok'];} else {echo set_value("alamat_pemasok");} ?>">
		<p><small class="text-danger"><i><?php echo form_error("alamat_pemasok") ?></i></small></p>
	</div>
	<br>
	<div class="form-group">
		<button class="btn btn-primary">Simpan</button>
		<a href="<?php echo base_url("kepala/pemasok") ?>" class="btn btn-warning" onclick="return confirm('Anda Yakin kembali ke halaman Tabel Pemasok ?')">Kembali</a>
	</div>
</form>