<h3>Laporan Distribusi Kerupuk</h3>
<hr>

<div>
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation" class="active"><a href="<?php echo base_url("kepala/distribusi") ?>" aria-controls="tanggal" role="tab" data-toggle="tab">Tanggal</a></li>
		<li role="presentation"><a href="<?php echo base_url("kepala/distribusi/pelanggan") ?>">Pelanggan</a></li>
	</ul>

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
				</div>
			</form>

			<div class="table-responsive" style="margin-top: 25px">
				<table class="table table-bordered" id="thetable">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Admin</th>
							<th>Tanggal Distribusi</th>
							<th>Total Distribusi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($distribusi as $key => $value): ?>
							<tr>
								<td><?php echo $key+1 ?></td>
								<td><?php echo $value['username_admin'] ?></td>
								<td><?php echo date('d M Y',strtotime($value['tanggal_distribusi'])) ?></td>
								<td><?php echo $value['jumlah_distribusi'] ?> kg</td>
								<td>
									<a href="<?php echo base_url("kepala/detail_distribusi/index/".$value['id_distribusi']) ?>"	class="btn btn-info">Detail</a>
								</td>
							</tr>

						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>