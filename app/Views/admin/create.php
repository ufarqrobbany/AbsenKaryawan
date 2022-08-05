<?= $this->extend('admin/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Tambah User</h1>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <p class="text-start text-danger"><?= session()->getFlashdata('pesan'); ?></p>
    <?php endif; ?>

    <div class="row">
        <div class="col">
            <form action="/admin/save" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="telp" class="col-sm-2 col-form-label">Telp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="telp" name="telp">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                </div>

                <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2 pt-0">Role</legend>
                    <div class="col-sm-10">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="role1" value="1">
                            <label class="form-check-label" for="role1">
                                Admin
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="role" id="role2" value="2" checked>
                            <label class="form-check-label" for="role2">
                                Karyawan
                            </label>
                        </div>
                    </div>
                </fieldset>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>