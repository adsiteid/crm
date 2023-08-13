<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>CRM ADSITE.ID</title>
    <!-- plugins:css -->
    <link rel="stylesheet" href="vendor/adsite/skydash/vendors/feather/feather.css">
    <link rel="stylesheet" href="vendor/adsite/skydash/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendor/adsite/skydash/vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="vendor/adsite/skydash/css/vertical-layout-light/style.css">
    <!-- endinject -->
    <link rel="shortcut icon" href="<?= base_url(); ?>document/app_image/logo/logo-adsite-2.png" />
</head>

<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-3">
                    <div class="card col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo text-center">
                                <img src="<?= base_url(); ?>/document/app_image/logo/logo-adsite.png" alt="" style="width : 200px;">
                            </div>
                            <h4 class="text-center"><?= lang('Auth.register') ?></h4>
                            <h6 class="font-weight-light lh-base text-center">Isi form untuk mendaftar</h6>
                            <form action="<?= url_to('register') ?>" method="post" class="pt-3"  enctype="multipart/form-data">
                                <?= csrf_field() ?>
                                <input type="text" name="level" class="form-control d-none" autocomplete="off" value="users">
                                
                                <div class="form-group">
                                    <label for="email"><?= lang('Auth.email') ?></label>
                                    <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?? filter_input(INPUT_GET, 'email', FILTER_SANITIZE_URL) ?>">
                                    <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
                                </div>

                                <div class="form-group">
                                    <label for="username"><?= lang('Auth.username') ?></label>
                                    <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>">
                                    <div class="invalid-feedback">
                                        <?= session('errors.username') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="password"><?= lang('Auth.password') ?></label>
                                    <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= session('errors.password') ?>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                                    <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                    <div class="invalid-feedback">
                                        <?= session('errors.repeatPassword') ?>
                                    </div>
                                </div> 
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary btn-block"><?= lang('Auth.register') ?></button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    <p><?= lang('Auth.alreadyRegistered') ?> <a href="<?= url_to('login') ?>"><?= lang('Auth.signIn') ?></a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>

    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="vendor/adsite/skydash/vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="vendor/adsite/skydash/js/off-canvas.js"></script>
    <script src="vendor/adsite/skydash/js/hoverable-collapse.js"></script>
    <script src="vendor/adsite/skydash/js/template.js"></script>
    <script src="vendor/adsite/skydash/js/settings.js"></script>
    <script src="vendor/adsite/skydash/js/todolist.js"></script>
    <!-- endinject -->
</body>

</html>