<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5 col-lg-6 mx-auto">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Registrasi Masyarakat</h1>
                        </div>
                        <form class="user" method="post" action="<?= base_url('masyarakat/registrasi_masyarakat'); ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nik" name="nik" placeholder="Nik">
                                <?= form_error('nik', '<div class ="text-xs text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="nama" name="nama" placeholder="Nama">
                                <?= form_error('nama', '<div class ="text-xs text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="telp" name="telp" placeholder="No Hp">
                                <?= form_error('telp', '<div class ="text-xs text-danger">', '</div>'); ?>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-6 mb-3 mb-sm-0">
                                    <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Username">
                                    <?= form_error('username', '<div class ="text-xs text-danger">', '</div>'); ?>
                                </div>
                                <div class="col-sm-6">
                                    <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                    <?= form_error('password', '<div class ="text-xs text-danger">', '</div>'); ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Registrasi
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>