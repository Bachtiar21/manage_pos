<?= $this->include('content/sidebar') ?>
<?= $this->include('content/header') ?>

			<main class="content">
                <div class="container-fluid p-0">
                <h5 class="right-aligned" style="float: right">
                    <a href="#">Home</a> / <a href="#">User</a> / Tambah User
                </h5>
                <h1 class="h3 mb-3"><b>Tambah User</b></h1>
                    <div class="row">
                        <div class="col-12">
                        <form id="createUser" action="<?= base_url('user/create') ?>" method="post">
                            <div class="card">
                            <div class="card-body">
                                <!-- Inputan Nama Lengkap -->
                                <h5 class="card-title">Nama Lengkap</h5>
                                <input
                                type="text"
                                class="form-control"
                                id="nama_user" name="nama_user"
                                placeholder="Masukkan Nama Lengkap"
                                required/>

                                <div class="row mt-1">
                                    <div class="col-md-6">
                                        <!-- Inputan Username -->
                                        <h5 class="card-title mt-2">Username</h5>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="username" name="username"
                                            placeholder="Masukkan Username"
                                            required/>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Inputan Password -->
                                        <h5 class="card-title mt-2">Password</h5>
                                        <input
                                            type="password"
                                            class="form-control"
                                            id="password" name="password"
                                            placeholder="Masukkan Password"
                                            required/>
                                    </div>
                                </div>

                                <div class="row mt-1">
                                    <div class="col-md-6">
                                        <!-- Inputan Jenis User -->
                                        <h5 class="card-title mt-2">Jenis User</h5>
                                        <select id="id_role" name="id_role" class="form-control">
                                            <option selected>Pilih Jenis User</option>
                                            <?php foreach ($roles as $role): ?>
                                                <option value="<?= esc($role['id_role']); ?>">
                                                    <?= esc($role['nama_role']); ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Inputan Nomor Handphone -->
                                        <h5 class="card-title mt-2">Nomor Handphone</h5>
                                        <input
                                        type="text"
                                        class="form-control"
                                        id="no_hp" name="no_hp"
                                        placeholder="Masukkan Nomor Handphone"
                                        required/>
                                    </div>
                                </div>

                                <!-- Inputan Tanggal Lahir -->
                                <h5 class="card-title mt-2">Tanggal Lahir</h5>
                                <input
                                type="date"
                                class="form-control"
                                id="tgl_lahir" name="tgl_lahir"
                                placeholder="Masukkan Tanggal Lahir"
                                required/>

                                <h5 class="card-title mt-4">Untuk Field Di Bawah Hanya Diisi Oleh Karyawan</h5>

                                <!-- Inputan Jabatan -->
                                <h5 class="card-title mt-2">Jabatan</h5>
                                <input
                                type="text"
                                class="form-control"
                                id="jabatan" name="jabatan"
                                placeholder="Masukkan Jabatan"
                                />

                                <div class="row mt-1">
                                    <div class="col-md-6">
                                        <!-- Inputan Kode Angkatan -->
                                        <h5 class="card-title mt-2">Kode Angkatan</h5>
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="kode_angkatan" name="kode_angkatan"
                                            placeholder="Masukkan Kode Angkatan"
                                            />
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Inputan Nomor Urut Pegawai -->
                                        <h5 class="card-title mt-2">Nomor Urut Pegawai</h5>
                                        <input
                                            type="number"
                                            class="form-control"
                                            id="no_urut" name="no_urut"
                                            placeholder="Masukkan Nomor Urut Pegawai"
                                            />
                                    </div>
                                </div>

                                <!-- Button Submit -->
                                <div
                                style="
                                    position: relative;
                                    text-align: right;
                                    margin-top: 20px;
                                ">
                                <a href="#"
                                    type="button"
                                    onclick="history.back()"
                                    class="btn btn-info">
                                    Cancel
                                </a>
                                <button
                                    type="submit"
                                    class="btn btn-primary"
                                    id="submitButton">
                                    Simpan
                                </button>
                                </div>
                            </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </main>

<?= $this->include('content/footer') ?>
<script src="<?= base_url('js/user/create.js') ?>"></script>