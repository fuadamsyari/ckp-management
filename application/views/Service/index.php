				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Daftar <?= $title ?></h1>
					</div>

					<!-- Content Row -->
					<!-- 2023 -->
					<div class="data-pertahun">
						<h3>2023</h3>
						<div class="row">
							<!-- Per Bulan -->
							<?php foreach ($perbulan as $bulan) : ?>
								<div class="col-xl-3 col-md-6 mb-4">
									<div class="card border-left-success shadow h-100 py-2">
										<div class="card-body">
											<div class="row no-gutters align-items-center">
												<div class="col mr-2">
													<div class="text font-weight-bold text-primary text-uppercase mb-1">
														<?= ucfirst($bulan['bulan']) ?></div>
													<div class="text-xs mb-0 font-weight-bold text-gray-800">Total Kulakan : <?= number_format($bulan['total']['kulakan'], 0, ',', ',') ?> </div>
													<div class="text-xs mb-0 font-weight-bold text-gray-800">Total Jual : <?= number_format($bulan['total']['harga_jual'], 0, ',', ',') ?></div>
													<div class="text-xs mb-0 font-weight-bold text-gray-800">Total Laba : <?= number_format($bulan['total']['laba'], 0, ',', ',') ?></div>
												</div>
												<div class="col-auto">
													<a href="<?= base_url('service/bulan/' . $bulan['kode_bulan']) ?>" class="text-primary"><i class="fas fa-folder-open fa-2x"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							<?php endforeach ?>
						</div>
					</div>

				</div>
				<!-- /.container-fluid -->
