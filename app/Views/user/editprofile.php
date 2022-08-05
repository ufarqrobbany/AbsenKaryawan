<?= $this->extend('user/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Edit Profile</h1>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <p class="text-start text-danger"><?= session()->getFlashdata('pesan'); ?></p>
    <?php endif; ?>

    <div class="row">
        <div class="col">
            <form action="/user/update/<?= $user['id_user']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama'] ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" name="username" value="<?= $user['username'] ?>" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="telp" class="col-sm-2 col-form-label">Telp</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="telp" name="telp" value="<?= $user['telp'] ?>">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Edit</button>
            </form>
        </div>
    </div>

    <hr>

    <!-- Page Heading -->
    <h1 class="h3 my-4 text-gray-800">Ganti Password</h1>

    <?php if (session()->getFlashdata('pesanpass')) : ?>
        <p class="text-start text-danger"><?= session()->getFlashdata('pesanpass'); ?></p>
    <?php endif; ?>

    <div class="row">
        <div class="col">
            <form action="/user/updatepass/<?= $user['id_user']; ?>" method="post">
                <?= csrf_field(); ?>
                <div class="row mb-3">
                    <label for="oldpass" class="col-sm-2 col-form-label">Password Lama</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="oldpass" name="oldpass" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="newpass" class="col-sm-2 col-form-label">Password Baru</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="newpass" name="newpass" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>