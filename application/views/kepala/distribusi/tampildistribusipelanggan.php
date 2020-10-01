<h3>Laporan Distribusi Pelanggan</h3>
<hr>
<!-- <?php 
echo "<pre>";
print_r($pemasok); 
echo "</pre>"; 
?> -->
<div>
	<ul class="nav nav-tabs" role="tablist">
		<li role="presentation"><a href="<?php echo base_url("kepala/distribusi") ?>">Tanggal</a></li>
		<li role="presentation" class="active"><a href="<?php echo base_url("kepala/distribusi/pelanggan") ?>"aria-controls="pemasok" role="tab" data-toggle="tab">Pelanggan</a></li>
	</ul>

	<div class="tab-content">
		<div role="tabpanel" class="tab-pane active" id="pemasok">
			
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

			<div class="table-responsive" style="margin-top: 25px;">
				<table class="table table-bordered" id="thetable2">
					<thead>
						<tr>
							<th>No</th>
							<th>Nama Pelanggan</th>
							<th>Total Distribusi</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($pelanggan as $key => $value): ?>
							<tr>
								<td><?php echo $key+1 ?></td>
								<td><?php echo $value['nama_pelanggan'] ?></td>
								<td><?php echo $value['total']?> kg</td>
								<td>
									<a href="<?php echo base_url("kepala/detail_distribusi/pelanggan/".$value['id_pelanggan']."/".$url) ?>"	class="btn btn-info">Detail</a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>