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
                                <input type="text" class="form-control" placeholder="Cari User..." name="keyword">
                                <div class="input-group-append">
                                    <button class="btn btn-info" type="submit" id="button-addon2">Cari</button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-2">
                        <a href="/user" class="btn btn-danger">Clear Filter</a>
                    </div>
                    <div class="col-md-1">
                        <a href="/user/add" class="btn btn-primary">Add</a>
                    </div>
                </div>

                <div class="table-responsive">

                    <table class="table table-striped mb-0">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>UserName</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Level</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php $id_delete = 0; ?>
                            <?php foreach($user as $item) :?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $item["username"]; ?></td>
                                <td><?= $item["email"]; ?></td>
                                <td><?= $item["password"]; ?></td>
                                <td><?= $item["level"]; ?></td>
                                <td><?= $item["created_at"]; ?></td>
                                <!-- if you use site_url() in tag <a></a>, you should change value $indexPage from 'index.php' to '' in app/Config/App.php -->
                                <td>
                                    <a href="<?= site_url('/user/edit/'.$item['id']) ?>"
                                        class="btn btn-info">Edit</a>
                                    <button type="button" class="btn btn-danger" data-toggle="modal"
                                        data-target="#deleteUser">
                                        Delete
                                    </button>
                                    <?php $id_delete = $item['id']; ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
    <!-- end row -->

    <!-- modal -->
    <div class="modal fade" id="deleteUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirm Delete Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Anda yakin ingin menghapus data?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <a href="<?= site_url('/user/delete/'.$id_delete) ?>" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>

</div> <!-- end container-fluid -->

<?= $this->endSection(); ?>