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
  <link rel="shortcut icon" href="<?= base_url() ?>document/app_image/logo/logo-adsite-2.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="w-100 mx-3">
          <div class="card col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo text-center">
                <img src="<?= base_url(); ?>/document/app_image/logo/logo-adsite.png" alt="" style="width : 200px;">

                <!-- <img src="vendor/adsite/skydash/images/logo.svg" alt="logo"> -->
              </div>
              <!-- <h6 class="font-weight-light">Sign in to continue.</h6> -->

              <h4 class="text-center mt-2">Ubah / lupa kata sandi ?</h4>
              <form class="pt-3" action="<?= url_to('forgot') ?>" method="post">

                <p class="text-center mb-3 font-weight-light">Kami akan mengirimkan kode untuk mengatur ulang kata sandi Anda ke alamat Email <br> <!--<strong>user()->email</strong></p>-->
                <?= view('Myth\Auth\Views\_message_block') ?>
                <?= csrf_field() ?>

                <div class="form-group">
                  <!-- <label for="email"><?= lang('Auth.emailAddress') ?></label> -->
                  <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?>" >
                  <!-- <input type="hidden" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" placeholder="<?= lang('Auth.email') ?>" value="<?= user()->email; ?>"> -->
                  <div class="invalid-feedback">
                    <?= session('errors.email') ?>
                  </div>
                </div>

                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"> Kirim Kode </button> <?php // lang('Auth.sendInstructions') 
                                                                                                                                        ?>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">

              </form>

            </div>

            <!-- <p class="d-flex justify-content-center mt-3 font-weight-light"><?= lang('Auth.alreadyRegistered') ?> <a class="ml-1" href="<?= url_to('login') ?>"><?= lang('Auth.signIn') ?></a></p> -->

            <!-- <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="ti-facebook mr-2"></i>Connect using facebook
                  </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
                </div> -->



          </div>
        </div>
        <!-- <p class="text-muted text-center mt-2" style="font-size:9px;">@ Copyright <a href="https://www.instagram.com/agit_agustian_/">Agit Agustian</a> - Modified for Diamondland</p> -->
      </div>
    </div>
    <!-- content-wrapper ends -->
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