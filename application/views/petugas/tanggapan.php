<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Detail Pengaduan</h1>
    </div>

    <div class="row">
        <div class="col-lg-12">

        </div>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Profil -->
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-3 border-bottom-primary">
                <div class="card-header py-3">
                    <a href="<?= base_url('petugas/lap_masuk'); ?>" class="btn btn-primary btn-sm">
                        Kembali</a>
                </div>
                <?php
                validation_errors();
                if ($detailaduan[0]['status'] == '0') {
                    $status = 'menunggu';
                } else {
                    $status = $detailaduan[0]['status'];
                }

                echo '
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                        <img src="' . base_url('assets/img_laporan/') . $detailaduan[0]['foto'] . '" class="card-img-top" alt="...">
                        </div>
                        <div class="col-md-9 mt-3">
                            <div class="table-responsive">
                                <table class="" width="50%" cellspaing="0">
                                    <tr class="text-gray-500 mb-2">
                                        <th>Laporan Dari
                                        <td>:</td>
                                        <td>' . $detailaduan[0]['nama'] . ' | ' . $detailaduan[0]['nik'] . '</td>
                                        </th>
                                    </tr>
                                    <tr class="text-gray-500">
                                        <th>Isi Laporan
                                        <td>:</td>
                                        <td>' . $detailaduan[0]['isi_laporan'] . '</td>
                                        </th>
                                    </tr>
                                    <tr class="text-gray-500">
                                        <th>Status
                                        <td>:</td>
                                        <td>' . $status . '</td>
                                        </th>
                                        </tr>
                                    <tr class="text-gray-500">
                                        <th>Tanggapan
                                        <td>:</td>
                                        <td>';
                $index = 0;
                foreach ($aduantanggapan as $at) {

                    echo '<div class="card-footer">
                                    <p>' . $at['tgl_tanggapan'] . '</p>
                                    <p>' . $at['tanggapan'] . '</p>
                                    </div>';
                    $index++;
                }
                echo '<div class="col-lg-12 mt-4">
                <form action="' . base_url('petugas/tambahtanggapan/') . $detailaduan[0]['id_pengaduan'] . '" method="post">
                <div class="form-floating">
                <textarea class="form-control"  id="tanggapan" name="tanggapan" required></textarea>
                <button type="submit" class="btn btn-sm btn-primary mt-3 float-end">Kirim</button>
                </div>
                </form>
                </div>
                                        </td>
                                        </th>
                                        </tr>
                                        </table>
                                        
                                </div>
                                </div>
                                
                    </div>
                </div>';
                ?>

            </div>
        </div>



    </div>
</div>