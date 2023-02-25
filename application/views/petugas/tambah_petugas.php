<div class="container-fluid">

    <!-- page heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Tambah Data Petugas</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="border-bottom-primary">
            <div class="card-header py-3">
                <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambah">Tambah Data</button>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="p-3 bg-gray-500 text-white">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>telp</th>
                                <th>level</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($petugas as $pt) {
                                echo '<tr>
                                <td>' .  $no++ . '</td>
                                <td>' . $pt['nama_petugas'] . '</td>
                                <td>' . $pt['username'] . '</td>
                                <td>' . $pt['telp'] . '</td>
                                <td>' . $pt['level'] . '</td>
                            </tr>';
                            }
                            ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>telp</th>
                                <th>level</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal tambah data petugas -->
<div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Petugas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('petugas/registrasi_petugas') ?>" method="POST">
                    <div class="form-group row mb-4 mt-4 ml-2 mr-3">
                        <label for="nama_petugas" class="col-sm-3 col-form-label">Nama Petugas</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="nama_petugas" id="nama_petugas">
                        </div>
                    </div>
                    <div class="form-group row mb-4 mt-4 ml-3 mr-3">
                        <label for="username" class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="username" id="username">
                        </div>
                    </div>
                    <div class="form-group row mb-4 mt-4 ml-3 mr-3">
                        <label for="telp" class="col-sm-3 col-form-label">No Hp</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="telp" id="telp">
                        </div>
                    </div>
                    <div class="form-group row mb-4 mt-4 ml-3 mr-3">
                        <label for="password" class="col-sm-3 col-form-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" name="password" id="password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</div>