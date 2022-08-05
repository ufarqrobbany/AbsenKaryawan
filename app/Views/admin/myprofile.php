<?= $this->extend('admin/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">
    <?php $session = session(); ?>

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">My Profile</h1>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <p class="text-start text-success"><?= session()->getFlashdata('pesan'); ?></p>
    <?php endif; ?>

    <div class="row">
        <div class="col">
            <img class="img-thumbnail rounded-circle mx-auto mb-4 d-block w-25" src="<?= base_url(); ?>/img/default.svg">
            <table class="table">
                <tr>
                    <th>Nama</th>
                    <td><?= $user['nama'] ?></td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td><?= $user['username'] ?></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><?= $user['email'] ?></td>
                </tr>
                <tr>
                    <th>Telp</th>
                    <td><?= $user['telp'] ?></td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td><?= $role = ($user['role'] == 1) ? 'Admin' : 'Karyawan'; ?></td>
                </tr>
            </table>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>