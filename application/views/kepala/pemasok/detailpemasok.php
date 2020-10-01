<h3>Detail Pemasok</h3>
<div class="table-responsive">
	<table class="table table-bordered">
		<thead>
			<tr>
			<th>No</th>
			<th>Nama Admin</th>
			<th>Tanggal</th>
			<th>Bahan</th>
			<th>Kadaluarsa</th>
			<th>Jumlah</th>
			<th>Harga</th>
			<th>Sub Harga</th>
			</tr>
		</thead>
		<tbody>
			<?php $total= 0 ?>
			<?php foreach ($detail as $key => $value): ?>
				<tr>
				<td><?php echo $key+1 ?></td>
				<td><?php echo $value['username_admin'] ?></td>	
				<td><?php echo $value['tanggal_masuk'] ?></td>	
				<td><?php echo $value['nama_bahan'] ?></td>	
				<td><?php echo $value['tanggal_kadaluarsa_detail_masuk'] ?></td>
				<td><?php echo $value['jumlah_detail_masuk']." ".$value['satuan_bahan'] ?></td>	
				<td><?php echo "Rp ".str_replace(",",".", number_format($value["harga_detail_masuk"])) ?></td>
				<td><?php echo "Rp ".str_replace(",", ".", number_format($value["sub_harga_detail_masuk"])) ?></td>	
				</tr>
				<?php $total += $value['sub_harga_detail_masuk'] ?>
			<?php endforeach ?>
		</tbody>
		<tfoot>
			<tr>
				<th colspan="7">Total</th>
				<th><?php echo "Rp ".str_replace(",", ".", number_format($total)) ?></th>
			</tr>
		</tfoot>
	</table>
</div>
<div>
	<a href="<?php echo base_url("kepala/pemasok") ?>" class="btn btn-warning" onclick="return confirm('Anda Yakin kembali ke halaman Tabel Pemasok ?')">Kembali</a>
</div>