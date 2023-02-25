<?= validation_errors() ?>
<?php
if (!empty($error)) {
    echo $error;
}
?>

<!-- ======= Header ======= -->
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="index.html">SiCepu</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
                <li><a class="nav-link scrollto" href="#about">Pengaduan</a></li>
                <li><a class="nav-link scrollto" href="#why-us">Daftar Pengaduan</a></li>
                <li><a class="nav-link scrollto" href="<?= base_url('masyarakat/logout'); ?>">Log Out</a></li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->

    </div>
</header><!-- End Header -->

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

    <div class="container">
        <div class="row">
            <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                <h1>Selamat Datang <b><?= $this->session->nama ?></b> Di </h1>
                <h1>Aplikasi Pengaduan Masyarakat </h1>
            </div>
            <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                <img src="<?= base_url(); ?>assets/style/img/hero-img.png" class="img-fluid animated" alt="">
            </div>
        </div>
    </div>

</section><!-- End Hero -->

<main id="main">


    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Tambah Pengaduan</h2>
            </div>

            <div class="faq-list">
                <ul>
                    <li data-aos="fade-up" data-aos-delay="100">
                        <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse" class="collapse" data-bs-target="#faq-list-1">
                            Tambah Pengaduan
                            <i class="bx bx-chevron-down icon-show"></i>
                            <i class="bx bx-chevron-up icon-close"></i></a>
                        <div id="faq-list-1" class="collapse show" data-bs-parent=".faq-list">
                            <form action="<?= base_url('masyarakat/simpan_aduan') ?>" method="POST" enctype="multipart/form-data">
                                <input type="hidden" value="<?= $this->session->nik ?>" id="nik" name="nik">
                                <div class="form-group row-mb-4 mt-3 ml-3 mr-3">
                                    <label>Foto</label>
                                    <input type="file" name="foto" id="foto" class="form-control" size="20" required>
                                </div>
                                <div class="form-group row-mb-4 mt-2 ml-3 mr-3">
                                    <label>Isi Laporan</label>
                                    <textarea name="isi_laporan" id="isi_laporan" class="form-control"></textarea>
                                </div>
                                <div class="form-group row-mb-4 mt-2 ml-3 mr-3">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                        </div>
                        </form>
            </div>
            </li>
            </ul>
        </div>

        </div>
    </section><!-- End Frequently Asked Questions Section -->





    <!-- ======= Why Us Section ======= -->

    <section id="about" class="about">
        <div class="container-fluid" data-aos="fade-up">

            <div class="section-title">
                <h2>Daftar Pengaduan</h2>
            </div>

            <div class="row">
                <div class="card-deck">
                    <?php
                    foreach ($pengaduan as $data) {
                        if ($data['status'] == '0') {
                            $status = 'Menunggu';
                        } else {
                            $status = $data['status'];
                        }
                        echo '<div class="col-lg-8">
                <div class="col-lg-4">
                    <div class="card">
                        <img class="card-img-top" src="' . base_url('/assets/img_laporan/') . $data['foto'] . '" alt="foto">
                        <div class="card-body">
                            <h5 class="card-title">Status : ' . $status . '</h5>
                            <h5 class="card-title">Isi Laporan</h5>
                            <p class="card-text">' . $data['isi_laporan'] . '</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">
                                <a class="btn btn-primary btn-sm" href="' . base_url('masyarakat/tanggapan/') . $data['id_pengaduan'] . '" ">Lihat Tanggapan</a>
                    </small>
                </div>
                </div>
            </div>
    </div>';
                    }
                    ?>

                </div>
            </div>
        </div>
    </section><!-- End Why Us Section -->

    <!-- modal tambah -->
    <div class=" modal fade" id="tambah_m" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Pengaduan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('masyarakat/simpan_aduan') ?>" method="POST" enctype="multipart/form-data">
                        <input type="hidden" value="<?= $this->session->nik ?>" id="nik" name="nik">
                        <div class="form-group row mb-4 mt-3 ml-3 mr-3">
                            <label>Foto</label>
                            <input type="file" name="foto" id="foto" class="form-control" size="20" required>
                        </div>
                        <div class="form-group row-mb-4 mt-2 ml-3 mr-3">
                            <label>Isi Laporan</label>
                            <textarea name="isi_laporan" id="isi_laporan" class="form-control"></textarea>
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

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="<?= base_url('auth/logout'); ?>">Logout</a>
                </div>
            </div>
        </div>
    </div>