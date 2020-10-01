<h3>Laporan Keluar Bahan</h3>
<hr>
<!-- <pre>
	<?php print_r($bahan) ?>
</pre> -->
<div>
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation"><a href="<?php echo base_url("kepala/keluar") ?>">Tanggal</a></li>
		<li role="presentation" class="active"><a href="<?php echo base_url("kepala/keluar/bahan") ?>"
			aria-control="tanggal" role="tab" data-toggle="tab">Bahan</a></li>
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
							<th>Nama bahan</th>
							<th>Total Bahan Keluar</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($bahan as $key => $value): ?>
							<tr>
								<td><?php echo $key+1 ?></td>
								<td><?php echo $value['nama_bahan'] ?></td>
								<td><?php echo $value['total']." ".$value['satuan_bahan'] ?></td>
								<td>
									<a href="<?php echo base_url("kepala/detail_keluar/bahan/".$value['id_bahan']."/".$url) ?>"	class="btn btn-info">Detail</a>
								</td>
							</tr>

						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>	