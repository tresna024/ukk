<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Ubah Status Pengaduan</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    <div class="row">
    <div class="col-lg-12 mb-4">
            <div class="card shadow mb-3 border-bottom-primary">
                <div class="card-header py-3">
                    <a href="<?= base_url('petugas/lap_masuk'); ?>" class="btn btn-primary btn-sm">
                        Kembali</a>
                </div>
                <?php
                validation_errors();
                echo '
                    <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                        <img src="' . base_url('assets/img_laporan/') . $detailaduan[0]['foto'] . '" class="card-img-top" alt="...">
                        </div>
                        <div class="col-md-8 mt-3">
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
                                        <td>
                                        <form action="' . base_url('petugas/ubahstatus/') . $detailaduan[0]['id_pengaduan'] . '" method="post">
                                        <div class="col-auto">
                                <select name="status" id="status" class="form-select">
                                <opetion value="0"';
                if ($detailaduan[0]['status'] == '0') {
                    echo "selected";
                }
                echo '>Menunggu</opetion>
                                <option value="proses"';
                if ($detailaduan[0]['status'] == 'proses') {
                    echo "selected";
                }
                echo '>Proses</opetion>
                                <option value="selesai"';
                if ($detailaduan[0]['status'] == 'selesai') {
                    echo "selected";
                }
                echo '>Selesai</opetion>
                                </select>
                            </div>
                                        
                                        </td>
                                        </th>
                                    </tr>
                                </table>
                        <div class="col-auto">
                        <button type="submit" class="btn btn-sm btn-primary">ubah status </button>
                        </div>
                        </form>
                                </div>
                                </div>
                                

                    </div>
                </div>';
                ?>

            </div>
        </div>
    </div>
</div>