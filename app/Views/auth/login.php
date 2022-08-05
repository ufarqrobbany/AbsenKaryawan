<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login | Absensi Karyawan</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">
    <?php
    $session = session();
    $login = $session->getFlashdata('login');
    $username = $session->getFlashdata('username');
    $password = $session->getFlashdata('password');
    ?>

    <div class="container">

        <h1 class="text-center text-white mt-5">ABSENSI KARYAWAN</h1>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card  o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">

                        <div class="row">
                            <div class="col-lg">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Silakan Login</h1>
                                    </div>
                                    <form class="user" action="/auth/valid_login" method="post">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user" name="username" id="exampleInputUsername" placeholder="Username" required>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password" required>
                                        </div>

                                        <?php if ($username) : ?>
                                            <p class="text-center text-danger"><?= $username; ?></p>
                                        <?php endif; ?>

                                        <?php if ($password) : ?>
                                            <p class="text-center text-danger"><?= $password; ?></p>
                                        <?php endif; ?>

                                        <?php if ($login) : ?>
                                            <p class="text-center text-success"><?= $login; ?></p>
                                        <?php endif; ?>

                                        <button type="submit" name="submit" class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?= base_url(); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?= base_url(); ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?= base_url(); ?>/js/sb-admin-2.min.js"></script>

</body>

</html>