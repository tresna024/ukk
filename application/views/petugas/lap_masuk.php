<div class="container-fluid">

    <!-- page heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Laporan Masuk</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="border-bottom-primary">
            <div class="card-header py-3">
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped" id="dataTable" width="100%" cellspacing="0">
                        <thead class="p-3 bg-gray-500 text-white">
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pengaduan</th>
                                <th>Nama</th>
                                <th>Isi Laporan</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($pengaduan as $pg) {
                                if ($pg['status'] == '0') {
                                    $status = 'menunggu';
                                } else {
                                    $status = $pg['status'];
                                }

                                echo '.<tr>
                            <td>' . $no++ . '</td>
                            <td>' . $pg['tgl_pengaduan'] . '</td>
                            <td>' . $pg['nama'] . '</td>
                            <td>' . $pg['isi_laporan'] . '</td>
                            <td>' . $status . '</td>
                            <td>
                            <a href="' . base_url('petugas/detailaduan/') . $pg['id_pengaduan'] . '" class="btn btn-sm btn-primary">Ubah Status</a>
                            <a href="' . base_url('petugas/tanggapan/') . $pg['id_pengaduan'] . '" class="btn btn-sm btn-success">Tanggapan</a></td>
                        </tr>';
                            }


                            ?>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Pengaduan</th>
                                <th>Nama Pelapor</th>
                                <th>Isi Laporan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </tfoot>
                    </table>

                    </td>

                    </tr>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


</div>