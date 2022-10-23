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

    <!-- <?php var_dump($data); ?> -->

    <div class="row">
        <div class="col-lg-12">

            <div class="card-box">
                <h4 class="header-title">Striped rows</h4>
                <p class="sub-header">
                    Use <code>.table-striped</code> to add zebra-striping to any table row
                    within the <code>&lt;tbody&gt;</code>.
                </p>
                <div class="row">
                    <div class="col">
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
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            <?php foreach($data as $item) :?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                <td><?= $item["nama"] ?></td>
                                <td><?= $item["gambar"] ?></td>
                                <td><?= $item["email"] ?></td>
                                <td><?= $item["jurusan"] ?></td>
                                <td><?= $item["alamat"] ?></td>
                                <td><?= $item["nis"] ?></td>
                                <td><?= $item["created_at"] ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
    <!-- end row -->

</div> <!-- end container-fluid -->

<?= $this->endSection(); ?>