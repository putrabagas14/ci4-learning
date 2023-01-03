<?= $this->extend("template/template"); ?>
<?= $this->section("content"); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Halaman Tambah User</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
            <?php if (!empty(session()->getFlashdata('gagal'))) : ?>
                <div class="alert alert-danger bg-danger text-white border-0 alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?= session()->getFlashdata('gagal'); ?>
                </div>
                <?php endif; ?>
                <h4>Form Input</h4>

                <!-- <?php if (!empty(session()->getFlashdata('berhasil'))) : ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <?= session()->getFlashdata('berhasil'); ?>
                    </div>
                <?php endif; ?> -->

                <form class="form-horizontal" role="form" action="/user/save" method="POST" enctype="multipart/form-data">
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                        <label for="username" class="col-3 col-form-label">Username</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="username" placeholder="Username" name="username" value="<?= old('username') ?>">
                            <?php if($validation->hasError('username')) : ?>
                            <small><div class="alert alert-danger mt-1" role="alert"><?= $validation->getError('username'); ?></div></small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-3 col-form-label">Email</label>
                        <div class="col-9">
                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?= old('email') ?>">
                            <?php if($validation->hasError('email')) : ?>
                                <small><div class="alert alert-danger mt-1" role="alert"><?= $validation->getError('email'); ?></div></small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="password" class="col-3 col-form-label">Password</label>
                        <div class="col-9">
                            <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="<?= old('password') ?>">
                            <?php if($validation->hasError('password')) : ?>
                                <small><div class="alert alert-danger mt-1" role="alert"><?= $validation->getError('password'); ?></div></small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="confirm_password" class="col-3 col-form-label">Konfirmasi Password</label>
                        <div class="col-9">
                            <input type="password" class="form-control" id="confirm_password" placeholder="Konfirmasi Password" name="konfirmasi_password" value="<?= old('konfirmasi_password') ?>">
                            <?php if($validation->hasError('konfirmasi_password')) : ?>
                                <small><div class="alert alert-danger mt-1" role="alert"><?= $validation->getError('konfirmasi_password'); ?></div></small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="level" class="col-3 col-form-label">Level</label>
                        <div class="col-9">
                            <select name="level" id="level">
                                <option value="" selected>-- Choose Option --</option>
                                <option value="admin">Admin</option>
                                <option value="dosen">Dosen</option>
                                <option value="mahasiswa">Mahasiswa</option>
                            </select>
                            <?php if($validation->hasError('level')) : ?>
                                <small><div class="alert alert-danger mt-1" role="alert"><?= $validation->getError('level'); ?></div></small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-0 justify-content-end row">
                        <div class="col-9">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Add</button>
                            <a href="/user" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>