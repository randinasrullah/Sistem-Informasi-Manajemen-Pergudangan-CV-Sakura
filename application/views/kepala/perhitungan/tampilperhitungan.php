<h3>Perhitungan</h3>

<form method="post" class="form-inline">
	<div class="form-group">
		<select class="form-control" name="id_bahan" required="">
			<option value="">Pilih Bahan</option>
			<?php foreach ($bahan as $key => $value): ?>
				<option value="<?php echo $value['id_bahan'] ?>"<?php if($value['id_bahan']==$id_bahan){echo "selected";} ?>><?php echo $value['nama_bahan']; ?></option>
				
			<?php endforeach ?>
		</select>
	</div>
	<div class="form-group">
		<input type="date" name="tanggal_cek" class="form-control" value="<?php echo $tanggal_cek ?>" required="">
	</div>
	<div class="form-group">
		<button class="btn btn-primary">Hitung Prediksi</button>
	</div>
</form>
<br>

<?php if(!empty($id_bahan)): ?>
	<div class="card">
				<div class="card-body">
					Hasil Prediksi pada <b><?php echo date ("d M Y", strtotime($tanggal_cek))  ?> </b> adalah : <b><?php echo $hasil['ramalan_akhir'] ?></b> Di bulatkan menjadi : <b><?php echo round ($hasil['ramalan_akhir'],0) ?></b> kg
				</div>
			</div>
	<div style="margin-top: 25px">
		<table class="table table-bordered" id="thetable">
			<thead>
				<tr>
					<th>No</th>
					<th>Tanggal</th>
					<th>Pembelian</th>
					<th>Peramalan</th>
					<!-- <th>Error</th>
					<th>MAD</th>
					<th>MSE</th> 
					<th>MAPE</th> -->
				</tr>
			</thead>
			<tbody>
				<?php foreach ($hasil['hitung'] as $key => $value): ?>
					<tr>
						<td><?php echo $key+1 ?></td>				
						<!-- <td><?php echo $value['tanggal'] ?></td> -->				
						<td><?php echo date ("d M Y", strtotime($value['tanggal'])) ?></td>				
						<td><?php echo $value['pembelian'] ?></td>				
						<td><?php echo round ($value['peramalan'], 2) ?></td>				
						<!-- <td><?php echo round ($value['error'], 2) ?></td>				
						<td><?php echo round ($value['mad'], 2) ?></td>				
						<td><?php echo round ($value['mse'], 2) ?></td>				
						<td><?php echo round ($value['mape'], 2) ?></td> --> 			
					</tr>
				<?php endforeach ?>
			</tbody>
			<!-- <tfoot>
				<tr>
					<th colspan="2">Total</th>
					<th><?php echo round ($hasil['t_pembelian'],2) ?></th>
					<th><?php echo round ($hasil['t_peramalan'], 2) ?></th> -->
					<!-- <th><?php echo round ($hasil['t_error'], 2) ?></th>
					<th><?php echo round ($hasil['t_mad'], 2) ?></th>
					<th><?php echo round ($hasil['t_mse'], 2) ?></th>
					<th><?php echo round ($hasil['t_mape'], 2) ?></th> -->
				</tr>
				<!-- <tr>
					<th colspan="4">Rata -Rata </th>
					<th><?php echo round ($hasil['r_error'], 2) ?></th>
					<th><?php echo round ($hasil['r_mad'], 2) ?></th>
					<th><?php echo round ($hasil['r_mse'], 2) ?></th>
					<th><?php echo round ($hasil['r_mape'], 2) ?></th>
				</tr> -->
				<!-- 	</tfoot> -->
			</table>

		</div>
	<?php endif ?>

