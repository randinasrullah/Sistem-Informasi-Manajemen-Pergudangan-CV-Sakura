<h3>Keluar Bahan  </h3>
<hr>

<div>
	
	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="tanggal">

			<form method="post" class="form-inline" style="margin-top: 25px;">
				<div class="form-group">
					<select class="form-control" name="tahun">
						<option value="">Pilih Tahun</option>
						<?php foreach ($tahun as $key => $value): ?>
							<option value="<?php echo $value ?>"<?php if($key==$tahun_terpilih){echo "selected";} ?>><?php echo $value ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<select class="form-control" name="bulan">
						<option value="">Pilih Bulan</option>
						<?php foreach ($bulan as $key => $value): ?>
							<option value="<?php echo $key ?>"<?php if($key==$bulan_terpilih){echo "selected";} ?>><?php echo $value ?></option>
						<?php endforeach ?>
					</select>
				</div>
				<div class="form-group">
					<button class="btn btn-primary">Filter</button>
					<a href="<?php echo base_url("admin/keluar/tambah") ?>" class="btn btn-primary"> Tambah</a>
				</div>
			</form>

			<div class="table-responsive" style="margin-top: 25px">
				<table class="table table-bordered" id="thetable">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Admin</th>
							<th>Tanggal Bahan Keluar</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($keluar as $key => $value): ?>
							<tr>
								<td><?php echo $key+1 ?></td>
								<td><?php echo $value['username_admin'] ?></td>
								<td><?php echo date ("d M Y", strtotime($value['tanggal_keluar'])) ?></td>
								<td>
									<a href="<?php echo base_url("admin/detail_keluar/index/".$value['id_keluar']) ?>"	class="btn btn-info">Detail</a>
									<a href="<?php echo base_url("admin/keluar/ubah/".$value['id_keluar']) ?>" class="btn btn-warning">Ubah</a>
									<a href="<?php echo base_url("admin/keluar/hapus_keluar/".$value['id_keluar']) ?>" class="btn btn-danger" onclick="return confirm('APAKAH ANDA YAKIN MENGHAPUS TABEL INI, SEMUA INFORMASI YANG BERHUBUNGAN DENGAN TABEL INI AKAN DIHAPUS ?')">Hapus</a>
								</td>
							</tr>

						<?php endforeach ?>
					</tbody>
				</table>

				<div>
					
				</div>
			</div>
		</div>
	</div>
</div>