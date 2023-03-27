	<div class="flash-data" data-notif="<?= $this->session->userdata('flash'); ?>"></div>
	<?php $this->session->unset_userdata('flash') ?>
	<!-- Begin Page Content -->
	<div class="container-fluid">
		<!-- Page Heading -->
		<a href="<?= base_url('service') ?>" class=""><i class=" fas fa-fw fa-arrow-left"></i>Kembali</a>
		<div class="d-sm-flex align-items-center justify-content-between mb-2">
			<h1 class="h3 mb-0 text-gray-800">Laporan Service (<?= $bulan['kode_bulan'] ?>)</h1>
			<h3 class="text-gray-800">Bulan <?= ucfirst($bulan['bulan']) ?> <?= $bulan['tahun'] ?></h3>
		</div>
		<div class="tombol-tamabah my-2 flex-row">
			<a href="" id="tambah-data" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#form-tambah-data">Tambah Data</a>
		</div>

		<!-- Content Row -->
		<div class="row">
			<div class="col-lg-12 text-center text-sm" style="font-size: 14px;">
				<table class="table table-sm table-hover">
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Tanggal</th>
							<th scope="col">Customer</th>
							<th scope="col">Alamat</th>
							<th scope="col">Barang</th>
							<th scope="col">BLB</th>
							<th scope="col">Nominal BLB</th>
							<th scope="col">Kulakan</th>
							<th scope="col">Harga Jual</th>
							<th scope="col">Laba</th>
							<th scope="col">Ket</th>
							<th scope="col">Nota</th>
							<th scope="col">Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $i = 0;
						foreach ($services as $s) : ?>
							<tr>
								<th scope="row"><?= ++$i; ?></th>
								<td><?= $s['tanggal'] ?></td>
								<td><?= $s['customer'] ?></td>
								<td><?= $s['alamat'] ?></td>
								<td><?= $s['barang'] ?></td>
								<td><?= $s['blb'] ?></td>
								<td><?= number_format($s['nominal_blb'], 0, ',', ',') ?></td>
								<td><?= number_format($s['kulakan'], 0, ',', ',') ?></td>
								<td><?= number_format($s['harga_jual'], 0, ',', ',') ?></td>
								<td><?= number_format($s['laba'], 0, ',', ',') ?></td>
								<td><?= $s['ket'] ?></td>
								<td><?= number_format($s['nota'], 0, ',', ',') ?></td>
								<td>
									<a href="#" data-url="<?= base_url('service/bulan/' . $bulan['kode_bulan'] . '/hapus/' . $s['id'])  ?>" class="tombol-hapus btn btn-danger btn-sm "><i class="far fa-fw fa-trash-alt"></i></a>
									<a href="<?= base_url('service/bulan/'  . $bulan['kode_bulan'] . '/ubah/' . $s['id']) ?>" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-edit"></i></a>
								</td>
							</tr>
						<?php endforeach ?>
					</tbody>
					<thead>
						<tr>
							<th scope="col">#</th>
							<th scope="col">Total</th>
							<th scope="col"></th>
							<th scope="col"></th>
							<th scope="col"></th>
							<th scope="col"></th>
							<th scope="col"><?= number_format($total['nominal_blb'], 0, ',', ',') ?></th>
							<th scope="col"><?= number_format($total['kulakan'], 0, ',', ',') ?></th>
							<th scope="col"><?= number_format($total['harga_jual'], 0, ',', ',') ?></th>
							<th scope="col"><?= number_format($total['laba'], 0, ',', ',') ?></th>
							<th scope="col"></th>
							<th scope="col"><?= number_format($total['nota'], 0, ',', ',')  ?></th>
							<th scope="col"></th>
						</tr>
					</thead>
				</table>
				<table class="table table-dark">

				</table>
			</div>
		</div>

	</div>
	<!-- /.container-fluid -->


	<!-- Modal -->
	<div class="modal fade" id="form-tambah-data" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Tambah Data Service</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<?php $bulan = $bulan['kode_bulan'] ?>
					<form method="post" action="<?= base_url('/service/bulan/' . $bulan . '/tambah/' . $bulan) ?>">
						<div class="form-group">
							<input type="date" name="tanggal" class="form-control" id="tanggal" required>
							<div class="text-danger">
								<p class=""><?= form_error('tanggal'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<input type="text" name="customer" class="form-control" id="customer" placeholder="Customer" required>
							<div class="text-danger">
								<p class=""><?= form_error('customer'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<input type="text" name="alamat" class="form-control" id="alamat" placeholder="Alamat" required>
							<div class="text-danger">
								<p class=""><?= form_error('alamat'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<input type="text" name="barang" class="form-control" id="barang" placeholder="Barang" required>
							<div class="text-danger">
								<p class=""><?= form_error('barang'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<input type="text" name="blb" class="form-control" id="blb" placeholder="BLB">
							<div class="text-danger">
								<p class=""><?= form_error('blb'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<input type="number" name="nominal_blb" class="form-control" id="nominal_blb" placeholder="Nominal BLB">
							<div class="text-danger">
								<p class=""><?= form_error('nominal_blb'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<input type="number" name="kulakan" class="form-control" id="kulakan" placeholder="Kulakan">
							<div class="text-danger">
								<p class=""><?= form_error('kulakan'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<input type="number" name="harga_jual" class="form-control" id="harga_jual" placeholder="Harga Jual" required>
							<div class="text-danger">
								<p class=""><?= form_error('harga_jual'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<input type="number" name="laba" class="form-control" id="laba" placeholder="Laba" required>
							<div class="text-danger">
								<p class=""><?= form_error('laba'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<input type="text" name="ket" class="form-control" id="ket" placeholder="Keterangan" required>
							<div class="text-danger">
								<p class=""><?= form_error('ket'); ?></p>
							</div>
						</div>
						<div class="form-group">
							<input type="number" name="nota" class="form-control" id="nota" placeholder="Nota" required>
							<div class="text-danger">
								<p class=""><?= form_error('nota'); ?></p>
							</div>
						</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
					<button type="submit" class="btn btn-primary">Tambah Data</button>
				</div>
				<?php if (validation_errors()) {
					echo '<script>
								window.onload = function () {
									document.getElementById("tambah-data").click();
								};								
								  </script>';
				} ?>
				</form>
			</div>
		</div>
	</div>
