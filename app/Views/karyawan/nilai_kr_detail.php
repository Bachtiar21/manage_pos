<?= $this->include('content/sidebar') ?>

<?= $this->include('content/header') ?>

			<main class="content">
                <div class="container-fluid p-0">
                <h5 class="right-aligned" style="float: right">
                    <a href="#">Home</a> / <a href="#">Karyawan</a> / Detail Nilai Pemeriksaan Key Result
                </h5>
                <h1 class="h3 mb-3"><b>Detail Nilai Pemeriksaan Key Result</b></h1>
                    <div class="row">
                        <div class="col-12">
                        <form>
                            <div class="card">
                            <div class="card-body">
                                <!-- Inputan Objective -->
                                <h5 class="card-title">Objective</h5>
                                <input
                                type="text"
                                class="form-control"
                                id="objective" name="objective"
                                value="<?= esc($key_results['objective']) ?>"
                                disabled/>

                                <!-- Inputan Key Result -->
                                <h5 class="card-title">Key Result</h5>
                                <input
                                type="text"
                                class="form-control"
                                id="key_result" name="key_result"
                                value="<?= esc($key_results['key_result']) ?>"
                                disabled/>

                                <div class="row mt-1">
                                    <div class="col-md-6">
                                        <!-- Inputan Q1 -->
                                        <h5 class="card-title mt-2">Q1</h5>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="progress_q1" name="progress_q1"
                                            value="<?= is_null($key_results['progress_q1']) ? 'Belum Diisi' : esc($key_results['progress_q1']) ?>"
                                            disabled/>
                                    </div>
                                    <div class="col-md-6">
                                        <!-- Inputan Q2 -->
                                        <h5 class="card-title mt-2">Q2</h5>
                                        <input
                                            type="text"
                                            class="form-control"
                                            id="progress_q2"
                                            name="progress_q2"
                                            value="<?= is_null($key_results['progress_q2']) ? 'Belum Diisi' : esc($key_results['progress_q2']) ?>"
                                            disabled/>
                                    </div>
                                </div>

                                <!-- Inputan Unit Progress -->
                                <h5 class="card-title mt-2">Unit Progress</h5>
                                <input
                                type="text"
                                class="form-control"
                                id="unit_progress" name="unit_progress"
                                value="<?= is_null($key_results['unit_progress']) ? 'Belum Diisi' : esc($key_results['unit_progress']) ?>"
                                disabled/>

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
                                    Kembali
                                </a>
                                <a href="<?= base_url('/dashboard/karyawan/nilai_pemeriksaan/update/' . $key_results['id_kr']) ?>"
                                    type="button"
                                    class="btn btn-primary">
                                    Edit
                                </a>
                                </div>
                            </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </main>

<?= $this->include('content/footer') ?>