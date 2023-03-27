<div class="flash-data" data-notif="<?= $this->session->userdata('flash'); ?>"></div>
<?php $this->session->unset_userdata('flash') ?>
<!-- Begin Page Content -->
<div class="container-fluid">
	<!-- Page Heading -->
	<a href="<?= base_url('belanja') ?>" class=""><i class=" fas fa-fw fa-arrow-left"></i>Kembali</a>
	<div class="d-sm-flex align-items-center justify-content-between mb-2">
		<h1 class="h3 mb-0 text-gray-800">Laporan Belanja (<?= $bulan['kode_bulan'] ?>)</h1>
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
						<th scope="col">Belanja Bulanan</th>
						<th scope="col">Belanja Parts</th>
						<th scope="col">Ket</th>
						<th scope="col">Aksi</th>
					</tr>
				</thead>
				<tbody>
					<?php $i = 0;
					foreach ($belanja as $s) : ?>
						<tr>
							<th scope="row"><?= ++$i; ?></th>
							<td><?= $s['tanggal'] ?></td>
							<td><?= number_format($s['belanja_1'], 0, ',', ',') ?></td>
							<td><?= number_format($s['belanja_2'], 0, ',', ',') ?></td>
							<td><?= $s['ket'] ?></td>
							<td>
								<a href="#" data-url="<?= base_url('belanja/bulan/' . $bulan['kode_bulan'] . '/hapus/' . $s['id'])  ?>" class="tombol-hapus btn btn-danger btn-sm "><i class="far fa-fw fa-trash-alt"></i></a>
								<a href="<?= base_url('belanja/bulan/'  . $bulan['kode_bulan'] . '/ubah/' . $s['id']) ?>" class="btn btn-primary btn-sm"><i class="fas fa-fw fa-edit"></i></a>
							</td>
						</tr>
					<?php endforeach ?>
				</tbody>
				<thead>
					<tr>
						<th scope="col">#</th>
						<th scope="col">Total</th>
						<th scope="col"><?= number_format($total['belanja_1'], 0, ',', ',') ?></th>
						<th scope="col"><?= number_format($total['belanja_2'], 0, ',', ',') ?></th>
						<th scope="col"></th>
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
				<h5 class="modal-title" id="exampleModalLabel">Tambah Data Belanja</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<?php $bulan = $bulan['kode_bulan'] ?>
				<form method="post" action="<?= base_url('/belanja/bulan/' . $bulan . '/tambah/' . $bulan) ?>">
					<div class="form-group">
						<input type="date" name="tanggal" class="form-control" id="tanggal" required>
						<div class="text-danger">
							<p class=""><?= form_error('tanggal'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<input type="number" name="belanja_1" class="form-control" id="belanja_1" placeholder="Belanja Bulanan">
						<div class=" text-danger">
							<p class=""><?= form_error('belanja_1'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<input type="number" name="belanja_2" class="form-control" id="belanja_2" placeholder="Belanja Parts">
						<div class=" text-danger">
							<p class=""><?= form_error('belanja_2'); ?></p>
						</div>
					</div>
					<div class="form-group">
						<input type="ket" name="ket" class="form-control" id="nominal_blb" placeholder="Keteranagan" required>
						<div class="text-danger">
							<p class=""><?= form_error('ket'); ?></p>
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
