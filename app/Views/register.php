    <!-- Content Register Start -->
    <?= $this->include('auth/header-register') ?>

    <main class="d-flex w-100">
    	<div class="container d-flex flex-column">
    		<div class="row vh-100">
				<div class="col-sm-12 col-md-10 col-lg-8 col-xl-6 mx-auto d-table h-100">
    				<div class="d-table-cell align-middle">

    					<div class="text-center mt-4">
    						<h1 class="h2">Buat Akun!</h1>
                            <img src="<?= base_url('img/photos/logo_pos.png') ?>" style="max-width: 100px; max-height: 100px; margin-bottom: 10px;">
                            <p class="lead">
                                Sistem Manajemen Karyawan Pos
                            </p>
    					</div>

    					<div class="card">
    						<div class="card-body">
    							<div class="m-sm-3">
    								<form action="<?= site_url('auth/attemptRegister'); ?>" method="post">
										<div class="row">
											<div class="col-md-6 mb-3">
												<label class="form-label">Nama Lengkap</label>
												<input class="form-control form-control-lg" type="text" id="nama_user" name="nama_user" placeholder="Masukkan Nama Lengkap" />
											</div>
											<div class="col-md-6 mb-3">
												<label class="form-label">Nomor Telepon</label>
												<input class="form-control form-control-lg" type="text" id="no_hp" name="no_hp" placeholder="Masukkan Nomor Telepon" />
											</div>
										</div>
    									<div class="mb-3">
    										<label class="form-label">Username</label>
    										<input class="form-control form-control-lg" type="text" id="username" name="username" placeholder="Masukkan Username" />
    									</div>
    									<div class="mb-3">
    										<label class="form-label">Password</label>
    										<input class="form-control form-control-lg" type="password" id="password" name="password" placeholder="Masukkan Password" />
    									</div>
										<div class="mb-3">
    										<label class="form-label">Jabatan</label>
    										<input class="form-control form-control-lg" type="jabatan" id="jabatan" name="jabatan" placeholder="Masukkan Jabatan" />
    									</div>
										<div class="row">
											<div class="col-md-6 mb-3">
												<label class="form-label">Tanggal Lahir</label>
												<input class="form-control form-control-lg" type="date" id="tgl_lahir" name="tgl_lahir" placeholder="Masukkan Tanggal Lahir" />
											</div>
											<div class="col-md-6 mb-3">
												<label class="form-label">Kode Angkatan</label>
												<input class="form-control form-control-lg" type="text" id="kode_angkatan" name="kode_angkatan" placeholder="Masukkan Kode Angkatan" />
											</div>
										</div>
										<div class="mb-3">
    										<label class="form-label">Nomor Urut Pegawai</label>
    										<input class="form-control form-control-lg" type="number" id="no_urut" name="no_urut" placeholder="Masukkan Nomor Urut Pegawai" />
    									</div>
										<hr class="mt-3">
    									<div class="d-grid gap-2 mt-3">
    										<button id="registerButton" type="submit" class="btn btn-lg btn-primary" style="background-color: #182C61;">Buat Akun</button>
    									</div>
    								</form>
    							</div>
    						</div>
    					</div>
    					<div class="text-center mb-3">
    						Sudah Punya Akun? <a href="<?= base_url('/login') ?>"><b>Masuk</b></a>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </main>

    <?= $this->include('auth/footer-register') ?>
	<script src="<?= base_url('js/auth/register.js') ?>"></script>
    <!-- Content Register End -->