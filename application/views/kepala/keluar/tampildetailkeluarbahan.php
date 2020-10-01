<h3> Detail keluar per Bahan</h3>
<hr>
<!--  <?php 
echo "<pre>";
print_r($detail_keluar);
echo "</pre>";
 ?>  -->
<div class="table-responsive">
	<table class="table table-bordered" id="thetable">
		<thead>
			<tr>
				<th>No</th>
				<th>Tanggal keluar</th>
			</tr>
		</thead>
		<tbody>
			<?php foreach ($detail_keluar as $key => $value): ?>
				<tr>
					<td><?php echo $key+=1 ?></td>
					<td><?php echo date("d M Y", strtotime($value['tanggal_keluar'])) ?></td>
					
				</tr>
			<?php endforeach ?>
		</tbody>
	</table>
	<div>
		<a href="<?php echo base_url('kepala/keluar/bahan') ?>" class="btn btn-warning">Kembali</a>
	</div>
</div>