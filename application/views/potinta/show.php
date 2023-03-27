<div class="flash-data" data-notif="<?= $this->session->userdata('flash'); ?>"></div>
<?php $this->session->unset_userdata('flash') ?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading  -->
	<a href="<?= base_url('potinta') ?>" class=""><i class=" fas fa-fw fa-arrow-left"></i>Kembali</a>
	<div class="d-sm-flex align-items-center justify-content-between mb-2">
		<h1 class="h3 mb-0 text-gray-800">Laporan penjualan PO - <?= $po_list['po_ke'] ?></h1>
		<p><?= $po_list['tgl_po'] ?></p>
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
						<th scope="col">Warna</th>
						<th scope="col">Tinta</th>
						<th scope="col">Terjual</th>
						<th scope="col">Modal</th>
						<th scope="col">Untung</th>
						<th scope="col">Customer</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 0;
					foreach ($tinta as $s) : ?>
						<tr>
							<th scope="row"><?= ++$i; ?></th>
							<td><?= $s['tanggal'] ?></td>
							<td class="<?php switch (strtoupper($s['warna'])) {
											case 'C':
												echo ('text-info');
												break;
											case 'M':
												echo ('text-danger');
												break;
											case 'Y':
												echo ('text-warning');
												break;
											case 'K':
												echo ('text-dark');
												break;
											default:
												echo ('text-dark');
												break;
										}; ?>"><?= $s['warna'] ?></td>
							<td><?= $s['tinta'] ?></td>
							<td><?= number_format($s['terjual'], 0, ',', ',') ?></td>
							<td><?= number_format($s['modal'], 0, ',', ',') ?></td>
							<td><?= number_format($s['untung'], 0, ',', ',') ?></td>
							<td><?= $s['customer'] ?></td>
							<td>
								<a href="#" data-url="<?= base_url('potinta/show/' . $po_list['po_ke'] . '/hapus/' . $s['id'])  ?>" class="tombol-hapus btn btn-danger btn-sm "><i class="far fa-fw fa-trash-alt"></i></a>
								<a href="<?= base_url('potinta/show/'  . $po_list['po_ke'] . '/ubah/' . $s['id']) ?>" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-edit"></i></a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
				<!-- <thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Total</th>
						<th scope="col"></th>
						<th scope="col"></th>
						<th scope="col"><?= number_format($total['terjual'], 0, ',', ',') ?></th>
						<th scope="col"><?= number_format($total['modal'], 0, ',', ',') ?></th>
						<th scope="col"><?= number_format($total['untung'], 0, ',', ',') ?></th>
						<th scope="col"></th>
						<th scope="col"></th>
					</tr>
				</thead> -->
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
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Penjualan Tinta</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="post" action="<?= base_url('/potinta/show/' . $po_ke . '/tambah/' . $po_ke) ?>">
					<div class="form-group">
						<input type="date" name="tanggal" class="form-control" id="tanggal" required>
						<div class="text-danger">
							<p class=""><?= form_error('tanggal'); ?></p>
						</div>
					</div>
					<div class="form-group mb-3">
						<select name="warna" class="form-control" id="warna" required>
							<option value="C">Cyan</option>
							<option value="M">Magenta</option>
							<option value="Y">Yellow</option>
							<option value="K">Black</option>
						</select>
					</div>
					<div class="form-group">
						<select type="text" name="tinta" class="form-control" id="tinta" placeholder="Tinta" required>
							<option value="Brother">Brother</option>
							<option value="Canon">Canon</option>
							<option value="Epson 003">Epson 003</option>
							<option value="Epson 664">Epson 664</option>
							<option value="HP">HP</option>
						</select>
					</div>
					<div class="form-group">
						<input type="text" name="customer" class="form-control" id="customer" placeholder="Customer" required>
						<div class="text-danger">
							<p class=""><?= form_error('customer'); ?></p>
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
