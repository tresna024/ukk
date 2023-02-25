<div class="container-fluid">
    <div class="row">
        <div class="card-group">

            <div class="col-lg-9">
                <div class="card">
                    <div class="col-lg-3">
                        <a href="<?= base_url('masyarakat/tampilMasyarakat'); ?>" class="btn btn-primary btn-sm">
                            Kembali</a>
                    </div>
                    <?php
                    if ($detailaduan[0]['status'] == '0') {
                        $status = 'menunggu';
                    } else {
                        $status = $detailaduan[0]['status'];
                    }
                    echo '
            <img class="card-img-top" src="' . base_url('assets/img_laporan/') . $detailaduan[0]['foto'] . '" alt="foto"
            style="width : 200px;">
            <div class="card-body">
            <h5 class="card-title">Laporan : ' . $detailaduan[0]['isi_laporan'] . '</h5>
            <h5 class="card-title">Status : ' . $status . '</h5>
            </div>';

                    $index = 0;
                    foreach ($aduantanggapan as $at) {
                        echo '<div class="card-footer">
                <small class="text-muted">' . $at['tgl_tanggapan'] . '</small><br>
                <small class="text-muted">' . $at['tanggapan'] . '</small>
            </div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>