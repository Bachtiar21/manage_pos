<?= $this->include('content/sidebar') ?>
<?= $this->include('content/header') ?>

			<main class="content">
                <div class="container-fluid p-0">
                <h5 class="right-aligned" style="float: right">
                    <a href="#">Home</a> / <a href="#">Admin</a> / Daftar Tugas Karyawan
                </h5>
                <!-- List Objective -->
                <h1 class="h3 mb-3"><b>List Tugas Karyawan</b></h1>
                    <div class="col-md-6 mb-3">
                        <div class="d-flex justify-content-start">
                        <a href="<?= base_url('/dashboard/objective/add') ?>"
                            type="button"
                            class="btn btn-info me-2">
                            <i class="align-middle" data-feather="file"></i>
                            Tambah Objective
                        </a>
                        <a href="<?= base_url('/dashboard/key_result/add') ?>"
                            type="button"
                            class="btn btn-info me-2">
                            <i class="align-middle" data-feather="file"></i>
                            Tambah Key Result
                        </a>
                        </div>
                    </div>
                        <div class="row justify-content-center">
                            <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                <div class="row no-gutters" style="height: 40px">
                                    <h1 class="h3 mt-2">Daftar Objective</h1>
                                </div>

                                <hr />
                                <div class="table-container">
                                    <table id="example"
                                    class="table table-striped"
                                    style="width: 100%">
                                    <thead>
                                        <tr style="text-align: center; vertical-align: middle">
                                            <th hidden></th>
                                            <th>Objective</th>
                                            <th>Karyawan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <!-- Fetch Data Start -->
                                    <tbody>
                                        <?php foreach ($objectives as $objective): ?>
                                            <tr>
                                                <td hidden></td>
                                                <td>
                                                    <?= $objective['objective'] ?>
                                                </td>
                                                <td>
                                                    <?= $objective['nama_user'] ?>
                                                </td>
                                                <td>
                                                    <!-- Tambahkan tombol atau link aksi sesuai kebutuhan -->
                                                    <a href="<?= base_url('/dashboard/objective/detail/' . $objective['id_objective']) ?>" class="btn btn-info">Detail</a>
                                                    <a href="<?= base_url('/dashboard/objective/update/' . $objective['id_objective']) ?>" class="btn btn-warning">Edit</a>
                                                    <a href="<?= base_url('objective/delete/' . $objective['id_objective']) ?>" onclick="return confirmDelete(event)" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <!-- Fetch Data End -->
                                    
                                    </table>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                    <div class="pagination">
                                        <button
                                        id="prevPageBtn"
                                        class="btn btn-primary">
                                        Previous
                                        </button>
                                        <span id="currentPage" class="mx-2">Halaman 1</span>
                                        <button
                                        id="nextPageBtn"
                                        class="btn btn-primary">
                                        Next
                                        </button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>

                        <!-- List Key Result -->
                        <div class="row justify-content-center">
                            <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                <div class="row no-gutters" style="height: 40px">
                                    <h1 class="h3 mt-2">Daftar Key Result</h1>
                                </div>

                                <hr />
                                <div class="table-container">
                                    <table id="example"
                                    class="table table-striped"
                                    style="width: 100%">
                                    <thead>
                                        <tr style="text-align: center; vertical-align: middle">
                                            <th hidden></th>
                                            <th>Objective</th>
                                            <th>Key Result</th>
                                            <th colspan="2">Target</th>
                                            <th>Unit Target</th>
                                            <th>Complexity</th>
                                            <th colspan="2">Progress</th>
                                            <th>Unit Progres</th>
                                            <th colspan="2">Assignor Rating</th>
                                            <th>OKR Score Q1</th>
                                            <th>OKR Score Q2</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <!-- Fetch Data Start -->
                                    <tbody>
                                        <?php foreach ($key_results as $key_result): ?>
                                            <tr>
                                                <td hidden></td>
                                                <td>
                                                    <?= $key_result['objective'] ?>
                                                </td>
                                                <td>
                                                    <?= $key_result['key_result'] ?>
                                                </td>
                                                <td>
                                                    <?= isset($key_result['target_q1']) ? $key_result['target_q1'] : 0 ?>
                                                </td>
                                                <td>
                                                    <?= isset($key_result['target_q2']) ? $key_result['target_q2'] : 0 ?>
                                                </td>
                                                <td>
                                                    <?= $key_result['unit_target'] ?>
                                                </td>
                                                <td>
                                                    <?= $key_result['complexity'] ?>
                                                </td>
                                                <td>
                                                    <?= isset($key_result['progress_q1']) ? $key_result['progress_q1'] : 0 ?>
                                                </td>
                                                <td>
                                                    <?= isset($key_result['progress_q2']) ? $key_result['progress_q2'] : 0 ?>
                                                </td>
                                                <td>
                                                    <?= isset($key_result['unit_progress']) ? $key_result['unit_progress'] : 0 ?>
                                                </td>
                                                <td>
                                                    <?= isset($key_result['assignor_rate_q1']) ? $key_result['assignor_rate_q1'] : 0 ?>
                                                </td>
                                                <td>
                                                    <?= isset($key_result['assignor_rate_q2']) ? $key_result['assignor_rate_q2'] : 0 ?>
                                                </td>
                                                <td>
                                                    <?= isset($key_result['okr_score_q1']) ? $key_result['okr_score_q1'] : 0 ?>
                                                </td>
                                                <td>
                                                    <?= isset($key_result['okr_score_q2']) ? $key_result['okr_score_q2'] : 0 ?>
                                                </td>
                                                <td>
                                                    <!-- Tambahkan tombol atau link aksi sesuai kebutuhan -->
                                                    <!-- Contoh: -->
                                                    <a href="<?= base_url('/dashboard/key_result/update/' . $key_result['id_kr']) ?>" class="btn btn-info">Edit</a>
                                                    <a href="<?= base_url('key_result/delete/' . $key_result['id_kr']) ?>" onclick="return confirmDelete(event)" class="btn btn-danger">Delete</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <!-- Fetch Data End -->
                                    
                                    </table>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-md-6">
                                    <div class="pagination">
                                        <button
                                        id="prevPageBtn"
                                        class="btn btn-primary">
                                        Previous
                                        </button>
                                        <span id="currentPage" class="mx-2">Halaman 1</span>
                                        <button
                                        id="nextPageBtn"
                                        class="btn btn-primary">
                                        Next
                                        </button>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </div>
                            </div>
                        </div>
                </div>
            </main>

<?= $this->include('content/footer') ?>
<script src="<?= base_url('js/key_result/delete.js')?>"></script>
<script src="<?= base_url('js/objective/delete.js')?>"></script>