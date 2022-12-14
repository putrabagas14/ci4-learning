<?= $this->extend('template/template'); ?>
<?= $this->section('content'); ?>

<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Abstack</a></li>
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                        <li class="breadcrumb-item active">Basic Tables</li>
                    </ol>
                </div>
                <h4 class="page-title">Basic Tables</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">
                <h4 class="header-title">Striped rows</h4>
                <?php if (!empty(session()->getFlashdata('berhasil'))) : ?>
                <div class="alert alert-success bg-success text-white border-0 alert-dismissible fade show"
                    role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?= session()->getFlashdata('berhasil'); ?>
                </div>
                <?php endif; ?>
                <?php if (!empty(session()->getFlashdata('gagal'))) : ?>
                <div class="alert alert-danger bg-danger text-white border-0 alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <?= session()->getFlashdata('gagal'); ?>
                </div>
                <?php endif; ?>
                <p class="sub-header">
                    Use <code>.table-striped</code> to add zebra-striping to any table row
                    within the <code>&lt;tbody&gt;</code>.
                </p>
                <div class="row">
                    <div class="col-md-9">
                        <form action="" method="get">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control" placeholder="Cari Mahasiswa..." name="keyword">
                                <div class="input-group-append">
                                    <button class="btn btn-info" type="submit" id="button-addon2">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2">
                        <a href="/mahasiswa" class="btn btn-danger">Clear Filter</a>
                    </div>
                    <div class="col-md-1">
                        <a href="/mahasiswa/add" class="btn btn-primary">Add</a>
                    </div>
                </div>

                <div class="table-responsive">

                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Picture</th>
                                <th>Email</th>
                                <th>major</th>
                                <th>address</th>
                                <th>NIS</th>
                                <th>Created At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1 + (2 * ($current_page - 1)); ?>
                            <!-- angka 2 adalah jumlah paginate -->
                            <?php $gambar = ""; ?>
                            <?php foreach($data as $item) :?>
                            <?php if($item["gambar"] == "" || $item["gambar"] == null) {
                                $gambar = "/gambar/makima.jpg";
                            } else {
                                $gambar = $item["gambar"];
                            } ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $item["nama"]; ?></td>
                                <td><img src="<?= $gambar ?>" height="100px" width="100px" alt="gambar tidak ditemukan">
                                </td>
                                <td><?= $item["email"]; ?></td>
                                <td><?= $item["jurusan"]; ?></td>
                                <td><?= $item["alamat"]; ?></td>
                                <td><?= $item["nis"]; ?></td>
                                <td><?= $item["created_at"]; ?></td>
                                <!-- if you use site_url() in tag <a></a>, you should change value $indexPage from 'index.php' to '' in app/Config/App.php -->
                                <td>
                                    <a href="<?= site_url('/mahasiswa/edit/'.$item['id']) ?>"
                                        class="btn btn-info">Edit</a>
                                    <a href="<?= site_url('/mahasiswa/delete/'.$item['id']) ?>"
                                        class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <?= $pager->links('mahasiswa', 'mahasiswa_pagination'); ?>
                    <!-- 'mahasiswa' adalah nama tabel, 'mahasiswa_pagination' adalah nama yang
                    sudah kita tambahkan di App\Config/Pager.php -->
                </div>
            </div>

        </div>

    </div>
    <!-- end row -->

</div> <!-- end container-fluid -->

<?= $this->endSection(); ?>