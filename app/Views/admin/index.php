<?= $this->extend('admin/templates/index'); ?>

<?= $this->section('content'); ?>
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">Absensi Karyawan</h1>

    <?php if (session()->getFlashdata('pesan')) : ?>
        <p class="text-success"><?= session()->getFlashdata('pesan'); ?></p>
    <?php endif; ?>

    <?php $i = 1; ?>
    <?php $j = 0; ?>
    <?php foreach ($absens as $absen) : ?>
        <form action="/admin/absensi/<?= $absen['id_absen'] ?>" method="post" class="mb-4">
            <!-- Table -->
            <div class="row">
                <div class="col-lg">
                    <table class="table table-bordered table-responsive">
                        <thead>
                            <tr>
                                <th scope="col" rowspan="2" class="align-middle">No</th>
                                <th scope="col" rowspan="2" class="align-middle">Nama</th>
                                <th scope="col" colspan="10" class="text-center">Tanggal</th>
                            </tr>

                            <tr>
                                <?php for ($x = 1; $x <= 10; $x++) : ?>
                                    <th scope="col" class="text-center"><?= $x; ?></th>
                                <?php endfor; ?>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row" class="align-middle"><?= $i++; ?></th>
                                <td class="align-middle">
                                    <?php
                                    echo $users[$j]['nama'];
                                    $j++;
                                    ?>
                                </td>
                                <?php for ($x = 1; $x <= 10; $x++) : ?>
                                    <td class="align-middle">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tgl<?= $x ?>" value="1" <?= $abs = ($absen["tgl$x"] == 1) ? 'checked' : ''; ?>>
                                            <label class="form-check-label">
                                                Hadir
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tgl<?= $x ?>" value="2" <?= $abs = ($absen["tgl$x"] == 2) ? 'checked' : '';  ?>>
                                            <label class="form-check-label">
                                                Alfa
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tgl<?= $x ?>" value="3" <?= $abs = ($absen["tgl$x"] == 3) ? 'checked' : '';  ?>>
                                            <label class="form-check-label">
                                                Izin
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="tgl<?= $x ?>" value="4" <?= $abs = ($absen["tgl$x"] == 4) ? 'checked' : '';  ?>>
                                            <label class="form-check-label">
                                                Sakit
                                            </label>
                                        </div>
                                    </td>
                                <?php endfor; ?>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Save</button>

        </form>
    <?php endforeach; ?>

</div>
<?= $this->endSection(); ?>