<h3>Detail Bahan</h3>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">Bahan Masuk</div>
			<div class="pane-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Admin</th>
								<th>Tanggal</th>
								<th>Pemasok</th>
								<th>Jumlah</th>
							</tr>
						</thead>
						<tbody>
							<?php $total = 0 ?>
							<?php $satuan = 0 ?>
							<?php foreach ($masuk as $key => $value): ?>
								<tr>
									<td><?php echo $key+1 ?></td>
									<td><?php echo $value['username_admin'] ?></td>
									<td><?php echo $value['tanggal_masuk'] ?></td>
									<td><?php echo $value['nama_pemasok'] ?></td>
									<td><?php echo $value['jumlah_detail_masuk']." ".$value['satuan_bahan'] ?></td>
								</tr>
								<?php $total += $value['jumlah_detail_masuk'] ?>
								<?php $satuan = $value['satuan_bahan'] ?>
							<?php endforeach ?>
							<tfoot>
								<tr>
									<th colspan="4">Total Bahan</th>
									<th><?php echo $total. " ".$satuan ?></th>
								</tr>
							</tfoot>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="panel panel-default">
			<div class="panel-heading">Bahan Keluar</div>
			<div class="pane-body">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>No</th>
								<th>Admin</th>
								<th>Tanggal</th>
								<th>Jumlah</th>
							</tr>
						</thead>
						<tbody>
							<?php $total = 0 ?>
							<?php $satuan = 0 ?>
							<?php foreach ($keluar as $key => $value): ?>
								<tr>
									<td><?php echo $key+1 ?></td>
									<td><?php echo $value['username_admin'] ?></td>
									<td><?php echo $value['tanggal_keluar'] ?></td>
									<td><?php echo $value['jumlah_detail_keluar']." ".$value['satuan_bahan'] ?></td>
								</tr>
								<?php $total += $value['jumlah_detail_keluar'] ?>
								<?php $satuan = $value['satuan_bahan'] ?>
							<?php endforeach ?>
							<tfoot>
								<tr>
									<th colspan="3">Total Bahan</th>
									<th><?php echo $total. " ".$satuan ?></th>
								</tr>
							</tfoot>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<div>
	<a href="<?php echo base_url("kepala/bahan") ?>" class="btn btn-warning" onclick="return confirm('Anda Yakin kembali ke halaman Tabel Bahan ?')">Kembali</a>
</div>
