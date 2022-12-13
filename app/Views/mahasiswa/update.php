<?= $this->extend("template/template"); ?>
<?= $this->section("content"); ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <h4 class="page-title">Halaman Update Mahasiswa</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card-box">
                <h4>Form Input</h4>

                <form class="form-horizontal" role="form" action="<?= site_url('mahasiswa/update/'.$data['id']) ?>" method="POST">
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                        <label for="inputNama" class="col-3 col-form-label">Nama</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="inputNama" placeholder="Nama" name="nama" value="<?= old('nama', $data['nama']) ?>">
                            <?php if($validation->hasError('nama')) : ?>
                            <small><div class="alert alert-danger mt-1" role="alert"><?= $validation->getError('nama'); ?></div></small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputGambar" class="col-3 col-form-label">Gambar</label>
                        <div class="col-9">
                            <input type="file" class="form-control" id="inputGambar" placeholder="Gambar" name="gambar" value="<?= old('gambar', $data['gambar']) ?>">
                            <?php if($validation->hasError('gambar')) : ?>
                                <small><div class="alert alert-danger mt-1" role="alert"><?= $validation->getError('gambar'); ?></div></small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-3 col-form-label">Email</label>
                        <div class="col-9">
                            <input type="email" class="form-control" id="inputEmail3" placeholder="Email" name="email" value="<?= old('email', $data['email']) ?>">
                            <?php if($validation->hasError('email')) : ?>
                                <small><div class="alert alert-danger mt-1" role="alert"><?= $validation->getError('email'); ?></div></small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputAlamat" class="col-3 col-form-label">Alamat</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="inputAlamat" placeholder="Alamat" name="alamat" value="<?= old('alamat', $data['alamat']) ?>">
                            <?php if($validation->hasError('alamat')) : ?>
                                <small><div class="alert alert-danger mt-1" role="alert"><?= $validation->getError('alamat'); ?></div></small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputJurusan" class="col-3 col-form-label">Jurusan</label>
                        <div class="col-9">
                            <input type="text" class="form-control" id="inputJurusan" placeholder="Jurusan" name="jurusan" value="<?= old('jurusan', $data['jurusan']) ?>">
                            <?php if($validation->hasError('jurusan')) : ?>
                                <small><div class="alert alert-danger mt-1" role="alert"><?= $validation->getError('jurusan'); ?></div></small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputNis" class="col-3 col-form-label">NIS</label>
                        <div class="col-9">
                            <input type="number" class="form-control" id="inputNis" placeholder="NIS" name="nis"  value="<?= old('nis', $data['nis']) ?>">
                            <?php if($validation->hasError('nis')) : ?>
                                <small><div class="alert alert-danger mt-1" role="alert"><?= $validation->getError('nis'); ?></div></small>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="form-group mb-0 justify-content-end row">
                        <div class="col-9">
                            <button type="submit" class="btn btn-info waves-effect waves-light">Update</button>
                            <a href="/mahasiswa" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>