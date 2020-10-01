<!-- <pre>
	 <?php echo print_r($kepala) ?>
</pre>  -->

<h2>Ubah Profile</h2>
<hr>
<?php echo $this->session->flashdata('sukses_profil'); ?>
<form method="post">
	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username_kepala" class="form-control" value="<?php echo $kepala['username_kepala'] ?>" required=" ">
	</div>
	<div class="form-group">
		<label>Password Lama</label>
		<input type="password" name="password_lama" class="form-control">
		<?php if (!$pesan): ?>
		<p class="text-info"><small><i>*Kosongan jika tidak mengubah password</i></small></p>
		<?php else: ?>
			<?php if ($pesan=="pesan_1"): ?>
				<p class="text-danger"><small><i>*Password lama salah.</i></small></p>				
			<?php endif ?>
		<?php endif ?>
	</div>		

	<div class="form-group">
		<label>Password Baru</label>
		<input type="password" name="password_baru" class="form-control">
		<?php if (!$pesan): ?>
			<p class="text-info"><small><i>*Kosongan jika tidak mengubah password</i></small></p>
		<?php else: ?>
			<?php if ($pesan=="pesan_2"): ?>
				<p class="text-danger"><small><i>*Passwrod baru harus diisi.</i></small></p>
			<?php endif ?>
			<?php if ($pesan=="pesan_3"): ?>
				<p class="text-danger"><small><i>*Password baru harus sama dengan password konfirmasi</i></small></p>
			<?php endif ?>
		<?php endif ?>
	</div>

	<div class="form-group">
		<label>Konfirmasi Password Baru</label>
		<input type="password" name="password_konfirmasi" class="form-control">

		<?php if (!$pesan): ?>
			<p class="text-info"><small><i>*Kosongan jika tidak mengubah password</i></small></p>
			<?php else: ?>
				<?php if ($pesan=="pesan_2"): ?>
				<p class="text-danger"><small><i>*Password konfirmasi harus diisi.</i></small></p>					
				<?php endif ?>
				<?php if ($pesan=="pesan_3"): ?>
					<p class="text-danger"><small><i>*Password baru harus sama dengan password konfirmasi.</i></small></p>
				<?php endif ?>
		<?php endif ?>
	</div>
	<div class="form-group">
		<button class="btn btn-primary">Ubah Profil</button>
	</div>
</form>
