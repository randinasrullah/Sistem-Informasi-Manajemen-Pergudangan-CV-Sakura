<h3>Dashboard </h3> 

<!-- <pre>
	<?php print_r($kepala) ?>
</pre> -->
<p class="text-right">
	<?php echo date('l, d M Y') ?>
</p>


<div class="row">
	<div class="col-md-4">
		<div class="panel panel-info">
			<div class="panel-heading" style="padding: 30px;">
				<p><span class="fas fa-clipboard fa-4x pull-left"></span></p>
				<h3 class="text-right"><?php echo $bahan ?> Bahan Baku</h3>
			</div>
			<div class="panel-body">
				<a href="<?php echo base_url("kepala/bahan") ?>" style="text-decoration: none">Detail</a>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="panel panel-success">
			<div class="panel-heading" style="padding: 30px;">
				<p><span class="fab fa-shopify fa-4x pull-left"></span></p>
				<h3 class="text-right"><?php echo $pelanggan ?> Pelanggan</h3>
			</div>
			<div class="panel-body">
				<a href="<?php echo base_url("kepala/pelanggan") ?>" style="text-decoration: none"> Detail</a>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="panel panel-danger">
			<div class="panel-heading" style="padding: 30px;">
				<p><span class="fas fa-cart-arrow-down fa-4x pull-left"></span></p>
				<h3 class="text-right"><?php echo $pemasok ?> Pemasok</h3>
			</div>
			<div class="panel-body">
				<a href="<?php echo base_url("kepala/pemasok") ?>" style="text-decoration: none"> Detail</a>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="panel panel-info">
			<div class="panel-heading" style="padding: 30px;">
				<p><span class="fa fa-users fa-4x pull-left"></span></p>
				<h3 class="text-right"><?php echo $admin ?> Admin</h3>
			</div>
			<div class="panel-body">
				<a href="<?php echo base_url("kepala/admin") ?>" style="text-decoration: none">Detail</a>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="panel panel-success">
			<div class="panel-heading" style="padding: 30px;">
				<p><span class="fa fa-motorcycle fa-4x pull-left"></span></p>
				<h3 class="text-right"><?php echo $distribusi ?> Total Distribusi</h3>
			</div>
			<div class="panel-body">
				<a href="<?php echo base_url("kepala/distribusi") ?>">Detail</a>
			</div> 
		</div>
	</div>

	<div class="col-md-4">
		<div class="panel panel-danger">
			<div class="panel-heading" style="padding: 30px;">
				<p><span class="fa fa-industry fa-4x pull-left"></span></p>
				<h3 class="text-right"><?php echo $produksi ?> Total Produksi</h3>
			</div>
			<div class="panel-body">
				<a href="<?php echo base_url("kepala/produksi") ?>">Detail</a>
			</div> 
		</div>
	</div>

	<div class="col-md-4">
		<div class="panel panel-info">
			<div class="panel-heading" style="padding: 30px;">
				<p><span class="fas fa-arrow-circle-down fa-4x pull-left"></span></p>
				<h3 class="text-right">Bahan Masuk</h3>
			</div>
			<div class="panel-body">
				<a role="button" data-toggle="collapse" href="#collapseMasuk" aria-expanded="false" aria-controls="collapseMasuk">
					Detail
				</a>
				<div class="collapse" id="collapseMasuk">
					<br>
					<p class="keterangan">Status bahan baku masuk untuk tanggal <?php echo date(' d  M  Y') ?></p>
					<!-- <p>DETAIL BARANG YANG DIAMBIL DARI PEMASOK BAHAN BAKU</p> -->
					<table class="table table-bordered" style="margin-top: 20px">
						<thead>
							<tr>
								<th>No</th>
								<th>Bahan</th>
								<th>Jumlah</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($masuk as $key => $value): ?>
								<tr>
									<td><?php echo $key+=1 ?></td>
									<td><?php echo $value['bahan'] ?></td>
									<td><?php echo $value['jumlah']." ".$value['satuan'] ?></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="panel panel-success">
			<div class="panel-heading" style="padding: 30px;">
				<p><span class="fas fa-arrow-circle-up fa-4x pull-left"></span></p>
				<h3 class="text-right">Bahan Keluar</h3>
			</div>
			<div class="panel-body">
				<a role="button" data-toggle="collapse" href="#collapseKeluar" aria-expanded="false" aria-controls="collapseKeluar">
					Detail
				</a>
				<div class="collapse" id="collapseKeluar">
					<p class="keterangan">Status bahan baku keluar untuk tanggal <?php echo date(' d  M  Y') ?></p>
					<table class="table table-bordered" style="margin-top: 20px">
						<thead>
							<tr>
								<th>No</th>
								<th>Bahan</th>
								<th>Jumlah</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($keluar as $key => $value): ?>
								<tr>
									<td><?php echo $key+=1 ?></td>
									<td><?php echo $value['bahan'] ?></td>
									<td><?php echo $value['jumlah']." ".$value['satuan']  ?></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="panel panel-danger">
			<div class="panel-heading" style="padding: 30px;">
				<p><span class="fas fa-warehouse fa-4x pull-left"></span></p>
				<h3 class="text-right">Stok Gudang</h3>
			</div>
			<div class="panel-body">
				<a role="button" data-toggle="collapse" href="#collapseStok" aria-expanded="false" aria-controls="collapseStok">
					Detail
				</a>
				<div class="collapse" id="collapseStok">
					<p class="keterangan">Stok Gudang untuk tanggal <?php echo date(' d  M  Y') ?></p>
					<table class="table table-bordered" style="margin-top: 20px">
						<thead>
							<tr>
								<th>No</th>
								<th>Bahan</th>
								<th>Jumlah</th>
								<th>Minimal Stok</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($stok as $key => $value): ?>
								<tr class="<?php if($value['jumlah']<$value['safety_stok']){
										echo 'bg-danger';
									} ?>" >
									<td><?php echo $key+=1 ?></td>
									<td><?php echo $value['bahan'] ?></td>
									<td><?php echo $value['jumlah']." ".$value['satuan']?></td>
									<td><?php echo $value['safety_stok']." ".$value['satuan'] ?></td>
									<td><?php echo $value['jumlah']-$value['safety_stok'] ?> kg</td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

</div>
