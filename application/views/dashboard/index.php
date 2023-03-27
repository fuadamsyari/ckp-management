<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<div class="d-sm-flex align-items-center justify-content-between mb-1">
		<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
		<form action="<?= base_url('dashboard/ubahbulan') ?>" method="post" id="ubahbulan">
			<div class="input-group input-group-sm mb-3">
				<div class="input-group-prepend">
					<input type="submit" value="Ubah" class=" btn btn-sm btn-danger" id="inputGroup-sizing-sm">
				</div>
				<select name="bulan" class="form-control form-control-sm">
					<option value="0123" <?php echo ($nama_bulan['kode_bulan'] == "0123") ? "selected" : ""; ?>>Januari</option>
					<option value="0223" <?php echo ($nama_bulan['kode_bulan'] == "0223") ? "selected" : ""; ?>>Februari</option>
					<option value="0323" <?php echo ($nama_bulan['kode_bulan'] == "0323") ? "selected" : ""; ?>>Maret</option>
					<option value="0423" <?php echo ($nama_bulan['kode_bulan'] == "0423") ? "selected" : ""; ?>>April</option>
					<option value="0523" <?php echo ($nama_bulan['kode_bulan'] == "0523") ? "selected" : ""; ?>>Mei</option>
					<option value="0623" <?php echo ($nama_bulan['kode_bulan'] == "0623") ? "selected" : ""; ?>>Juni</option>
					<option value="0723" <?php echo ($nama_bulan['kode_bulan'] == "0723") ? "selected" : ""; ?>>Juli</option>
					<option value="0823" <?php echo ($nama_bulan['kode_bulan'] == "0823") ? "selected" : ""; ?>>Agustus</option>
					<option value="0923" <?php echo ($nama_bulan['kode_bulan'] == "0923") ? "selected" : ""; ?>>September</option>
					<option value="1023" <?php echo ($nama_bulan['kode_bulan'] == "1023") ? "selected" : ""; ?>>Oktober</option>
					<option value="1123" <?php echo ($nama_bulan['kode_bulan'] == "1123") ? "selected" : ""; ?>>November</option>
					<option value="1223" <?php echo ($nama_bulan['kode_bulan'] == "1223") ? "selected" : ""; ?>>Desember</option>
				</select>
			</div>
		</form>


	</div>


	<!-- Content Row -->
	<div class="row">
		<div class="col">
			<h3 class="text-capitalize"><?= $nama_bulan['bulan'] ?></h3>
		</div>
	</div>
	<div class="row">
		<div class="col-md-3">
			<table class="table table-sm">
				<thead class="thead-dark">
					<tr class="text-center">
						<th scope="col" colspan="2">*Service</th>
					</tr>
				</thead>
				<tbody class="">
					<tr>
						<td>Omzet</td>
						<td class="text-right"><?= number_format($service['harga_jual'], 0, ',', ',') ?></td>
					</tr>
					<tr>
						<td>Hutang</td>
						<td class="text-right"><?= number_format($service['kulakan'], 0, ',', ',') ?></td>
					</tr>
					<tr>
						<td class="font-weight-bold">Profit</td>
						<td class="text-right"><?= number_format($service['laba'], 0, ',', ',') ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-3">
			<table class="table table-sm">
				<thead class="thead-dark">
					<tr class="text-center">
						<th scope="col" colspan="2">*Tinta</th>
					</tr>
				</thead>
				<tbody class="">
					<tr>
						<td>Omzet</td>
						<td class="text-right"><?= number_format($tinta['terjual'], 0, ',', ',') ?></td>
					</tr>
					<tr>
						<td>Hutang</td>
						<td class="text-right"><?= number_format($tinta['modal'], 0, ',', ',') ?></td>
					</tr>
					<tr>
						<td class="font-weight-bold">Profit</td>
						<td class="text-right"><?= number_format($tinta['untung'], 0, ',', ',') ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-3">
			<table class="table table-sm">
				<thead class="thead-dark">
					<tr class="text-center">
						<th scope="col" colspan="2">
							Kasbon
							<a data-toggle="modal" data-target="#modalkasbon" style="cursor: pointer;" class="text-warning"><i class="far fa-edit"></i></a>

						</th>
					</tr>
				</thead>
				<tbody class="">
					<tr>
						<td><?= $kasbon['fuad']['nama'] ?></td>
						<td class="text-right"><?= number_format($kasbon['fuad']['kasbon'], 0, ',', ',') ?></td>
					</tr>
					<tr>
						<td><?= $kasbon['other']['nama'] ?></td>
						<td class="text-right"><?= number_format($kasbon['other']['kasbon'], 0, ',', ',')  ?></td>
					</tr>

					<tr>
						<td class="font-weight-bold">Total</td>
						<td class="text-right "><?= number_format($total_kasbon['kasbon'], 0, ',', ',') ?></td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-3">
			<table class="table table-sm">
				<thead class="thead-dark">
					<tr class="text-center">
						<th scope="col" colspan="2">Penggajian</th>
					</tr>
				</thead>
				<tbody class="">
					<tr>
						<td>Gaji Fuad Amsyari</td>
						<td class="text-right"><?= number_format($gaji, 0, ',', ',')  ?></td>
					</tr>
					<tr>
						<td>UKT Kuliah</td>
						<td class="text-right"><?= number_format($kuliah, 0, ',', ',')  ?></td>
					</tr>
					<tr>
						<td class="font-weight-bold">Sisa Saldo</td>
						<td class="text-right">

							<?= number_format(($sisa_saldo['nominal'] + $service['harga_jual'] + $tinta['untung']) - ($total_kasbon['kasbon'] + ($belanja['belanja_1'] + $belanja['belanja_2'])) - ($gaji + $kuliah), 0, ',', ',')
							?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<table class="table table-sm">
				<thead class="thead-dark">
					<tr class="text-center">
						<th scope="col" colspan="2">
							*Pengelolaan uang Toko
							<a data-toggle="modal" data-target="#modalSisaSaldo" style="cursor: pointer;" class="text-warning"><i class="far fa-edit"></i></a>
						</th>

					</tr>
				</thead>
				<tbody class="">
					<tr>
						<td>Sisa Saldo</td>
						<td class="text-right"><?= number_format($sisa_saldo['nominal'], 0, ',', ',')   ?></td>
					</tr>
					<tr>
						<td>Uang Service</td>
						<td class="text-right"><?= number_format($service['harga_jual'], 0, ',', ',') ?></td>
					</tr>
					<tr>
						<td>Uang Tinta</td>
						<td class="text-right"><?= number_format($tinta['untung'], 0, ',', ',') ?></td>
					</tr>
					<tr>
						<td>Kasbon</td>
						<td class="text-right"><?= number_format($total_kasbon['kasbon'], 0, ',', ',') ?></td>
					</tr>
					<tr>
						<td>Uang terbelanja</td>
						<td class="text-right"><?= number_format(($belanja['belanja_1'] + $belanja['belanja_2']), 0, ',', ',') ?></td>
					</tr>
					<tr>
						<td class="font-weight-bold">Saldo</td>
						<td class="text-right">
							<?= $total_saldo =  $total_saldo = number_format((($sisa_saldo['nominal'] + $service['harga_jual'] + $tinta['untung']) - ($total_kasbon['kasbon'] + ($belanja['belanja_1'] + $belanja['belanja_2']))), 0, ',', ',')
							?>
						</td>
					</tr>
				</tbody>
			</table>
		</div>
		<div class="col-md-4">
			<table class="table table-sm">
				<thead class="thead-dark">
					<tr class="text-center">
						<th scope="col" colspan="2">
							Pengelolaan Saldo
							<a data-toggle="modal" data-target="#modalsaldo" style="cursor: pointer;" class="text-warning"><i class="far fa-edit"></i></a>
						</th>
					</tr>
				</thead>
				<tbody class="">
					<tr>
						<td>ATM</td>
						<td class="text-right"><?= number_format($ATM['nominal'], 0, ',', ',')   ?></td>
					</tr>
					<tr>
						<td>Cash</td>
						<td class="text-right"><?= number_format($Cash['nominal'], 0, ',', ',')   ?></td>
					</tr>
					<tr>
						<td>Total</td>
						<td class="text-right"><?= number_format(($ATM['nominal'] + $Cash['nominal']), 0, ',', ',') ?></td>
					</tr>
					<tr>
						<td>Selisih</td>
						<td class="text-danger text-right"><?= number_format((($sisa_saldo['nominal'] + $service['harga_jual'] + $tinta['untung']) - ($total_kasbon['kasbon'] + ($belanja['belanja_1'] + $belanja['belanja_2'])) - ($ATM['nominal'] + $Cash['nominal'])), 0, ',', ',') ?></td>
					</tr>
				</tbody>
			</table>
		</div>
	</div>

</div>
<!-- /.container-fluid -->
<!-- Modal -->
<!-- sisa saldo -->
<div class="modal fade" id="modalSisaSaldo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Sisa Saldo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('dashboard/ubahsisasaldo') ?>" method="post">
				<div class="modal-body">
					<input name="sisa_saldo" class="form-control form-control-sm" type="text" placeholder="<?= $sisa_saldo['nominal']   ?>" value="<?= $sisa_saldo['nominal'] ?>">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Simpan & Ubah</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- modal saldo -->
<div class="modal fade" id="modalsaldo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Set Saldo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('dashboard/ubahsaldo') ?>" method="post">
				<div class="modal-body">
					<label for="saldo_ATM">Saldo ATM</label>
					<input name="ATM" id="saldo_ATM" class="form-control form-control-sm" type="text" placeholder="<?= $ATM['nominal']  ?>" value=" <?= $ATM['nominal']  ?>">
					<label for="saldo_cash">Saldo Cash</label>
					<input name="Cash" id="saldo_cash" class="form-control form-control-sm" type="text" placeholder="<?= $Cash['nominal'] ?>" value="<?= $Cash['nominal']  ?>">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Simpan & Ubah</button>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- modal kasbon -->
<div class="modal fade" id="modalkasbon" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Set Kasbon</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="<?= base_url('dashboard/ubahkasbon') ?>" method="post">
				<div class="modal-body">
					<label for="fuad">Fuad</label>
					<input name="fuad" id="fuad" class="form-control form-control-sm" type="text" placeholder="<?= $kasbon['fuad']['kasbon']  ?>" value="<?= $kasbon['fuad']['kasbon']  ?>">
					<label for="other">Other</label>
					<input name="other" id="other" class="form-control form-control-sm" type="text" placeholder="<?= $kasbon['other']['kasbon']  ?>" value="<?= $kasbon['other']['kasbon']  ?>">
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
					<button type="submit" class="btn btn-primary">Simpan & Ubah</button>
				</div>
			</form>
		</div>
	</div>
</div>