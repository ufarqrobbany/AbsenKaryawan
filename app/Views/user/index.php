<?= $this->extend('user/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Kehadiran</h1>

    <!-- Table -->
    <div class="row">
        <div class="col-lg">
            <table class="table table-bordered table-responsive">
                <thead>
                    <tr>
                        <th scope="col" class="align-middle">Tanggal</th>
                        <?php for ($x = 1; $x <= 10; $x++) : ?>
                            <th scope="col" class="text-center"><?= $x; ?></th>
                        <?php endfor; ?>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="col" class="align-middle">Ket.</th>
                        <?php for ($x = 1; $x <= 10; $x++) : ?>
                            <td scope="col">
                                <?php
                                switch ($absen["tgl$x"]) {
                                    case 1:
                                        echo 'Hadir';
                                        break;
                                    case 2:
                                        echo 'Alfa';
                                        break;
                                    case 3:
                                        echo 'Izin';
                                        break;
                                    case 4:
                                        echo 'Sakit';
                                        break;
                                    default:
                                        echo '';
                                }
                                ?>
                            </td>
                        <?php endfor; ?>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>