<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>/style/style.css">


    <title>CRM Diamondland</title>

    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url(); ?>/css/sb-admin-2.min.css" rel="stylesheet">



</head>

<body class="halaman-login   ">

    <?php

    // $error = "";

    // if (isset($_GET['pesan'])) {
    //     if ($_GET['pesan'] == "gagal") {
    //         $error = "Email atau password salah";
    //     } elseif ($_GET['pesan'] == "email_kosong") {
    //         $error = "Email belum diisi";
    //     } elseif ($_GET['pesan'] == "password_kosong") {
    //         $error = "password belum diisi";
    //     } elseif ($_GET['pesan'] == "email_atau_password_kosong") {
    //         $error = "Email atau Password belum diisi";
    //     }
    // }
    ?>

    <div class="container  ">

        <!-- Outer Row -->
        <div class="row d-flex justify-content-center align-items-center pt-5 ">

            <div class="col-xl-6 col-lg-6 col-md-9 box-login "> <!-- col-xl-10-->

                <div class="card o-hidden border-0 shadow-lg ">
                    <div class="card-body p-0  ">
                        <!-- Nested Row within Card Body -->
                        <div class="row ">
                            <!-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> -->
                            <div class="col-lg-12"><!-- col-lg-6-->
                                <div class="p-lg-5 p-4">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4"><img src="<?= base_url(); ?>/document/app_image/logo/logo-diamondland-1.png" alt="" style="width : 200px;"></h1>
                                    </div>

                                    <form action="<?= url_to('login') ?>" method="post">
                                        <?= csrf_field() ?>

                                        <?php if ($config->validFields === ['email']) : ?>
                                            <div class="form-group">
                                                <label for="login"><?= lang('Auth.email') ?></label>
                                                <input type="email" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                                                <div class="invalid-feedback">
                                                    <?= session('errors.login') ?>
                                                </div>
                                            </div>
                                        <?php else : ?>
                                            <div class="form-group">
                                                <input type="text" class="form-control form-control-user <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                                                <div class="invalid-feedback">
                                                    <? //= session('errors.login') 
                                                    ?>
                                                </div>
                                            </div>
                                        <?php endif; ?>

                                        <div class="form-group">
                                            <input type="password" name="password" class="form-control form-control-user  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                                            <div class="invalid-feedback">
                                                <? //= session('errors.password') 
                                                ?>
                                            </div>
                                        </div>

                                        <?php if ($config->allowRemembering) : ?>
                                            <div class="form-check ml-1">
                                                <label class="form-check-label ">
                                                    <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?> checked>
                                                    <?= lang('Auth.rememberMe') ?>
                                                </label>
                                            </div>
                                        <?php endif; ?>

                                        <br>

                                        <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.loginAction') ?></button>
                                    </form>
                                    <div class="mt-3">
                                        <?= view('Myth\Auth\Views\_message_block')
                                        ?>
                                    </div>

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