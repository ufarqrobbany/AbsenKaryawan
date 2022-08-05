<?= $this->extend('admin/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">User List</h1>

    <form action="" method="get" class="mb-3" autocomplete="off">
        <div class="row">
            <div class="col col-lg-4">
                <input type="text" name="keyword" value="" class="form-control" placeholder="Cari user...">
            </div>
            <div class="col ml-1">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <p class="text-success"><?= session()->getFlashdata('pesan'); ?></p>
    <?php endif; ?>

    <a href="/admin/create" class="btn btn-primary btn-icon-split mb-3">
        <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
        </span>
        <span class="text">Tambah</span>
    </a>

    <!-- Table -->
    <div class="row">
        <div class="col-lg">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Telp</th>
                        <th scope="col">Email</th>
                        <th scope="col">Username</th>
                        <th scope="col">Role</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach ($users as $user) : ?>
                        <tr>
                            <th scope="row" class="align-middle"><?= $i++; ?></th>
                            <td class="align-middle"><?= $user['nama']; ?></td>
                            <td class="align-middle"><?= $user['telp']; ?></td>
                            <td class="align-middle"><?= $user['email']; ?></td>
                            <td class="align-middle"><?= $user['username']; ?></td>
                            <td class="align-middle"><?= $role = ($user['role'] == 1) ? 'Admin' : 'Karyawan'; ?></td>
                            <td class="align-middle">
                                <?php if ($user['id_user'] != $this_id) : ?>
                                    <a href="<?= base_url('admin/edit/' . $user['id_user']); ?>" class="btn btn-warning">
                                        <i class="fas fa-pen"></i>
                                    </a>

                                    <form action="<?= base_url('admin/' . $user['id_user']); ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="delete">
                                        <button class="btn btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>