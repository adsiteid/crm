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


              <form class="pt-3" action="<?= url_to('login') ?>" method="post">
                <?= view('Myth\Auth\Views\_message_block') ?>
                <?= csrf_field() ?>


                <?php if ($config->validFields === ['email']) : ?>
                  <div class="form-group">
                    <label for="login"><?= lang('Auth.email') ?></label>
                    <input type="email" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.email') ?>">
                    <div class="invalid-feedback">
                      <?= session('errors.login') ?>
                    </div>
                  </div>
                <?php else : ?>
                  <div class="form-group">
                    <label for="login"><?= lang('Auth.emailOrUsername') ?></label>
                    <input type="text" class="form-control <?php if (session('errors.login')) : ?>is-invalid<?php endif ?>" name="login" placeholder="<?= lang('Auth.emailOrUsername') ?>">
                    <div class="invalid-feedback">
                      <?= session('errors.login') ?>
                    </div>
                  </div>
                <?php endif; ?>


                <div class="form-group">
                  <label for="password"><?= lang('Auth.password') ?></label>
                  <input type="password" name="password" class="form-control  <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>">
                  <div class="invalid-feedback">
                    <?= session('errors.password') ?>
                  </div>
                </div>


                <div class="mt-3">
                  <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn"><?= lang('Auth.loginAction') ?></button>
                </div>

                <?php if ($config->allowRegistration) : ?>
                  <div class="mt-3">
                    <a href="<?= url_to('register') ?>" type="submit" class="btn btn-block btn-light btn-lg font-weight-medium auth-form-btn"><?= lang('Auth.needAnAccount') ?></a>
                  </div>
                <?php endif; ?>


                <div class="my-4 d-flex justify-content-between align-items-center">

              </form>
              <?php if ($config->allowRemembering) : ?>
                <div class="form-check">
                  <label class="form-check-label text-muted">
                    <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?> checked>
                    <?= lang('Auth.rememberMe') ?>
                  </label>
                </div>
              <?php endif; ?>



              <?php if ($config->activeResetter) : ?>
                <a href="<?= url_to('forgot') ?>" class="auth-link text-black"><?= lang('Auth.forgotYourPassword') ?></a>
              <?php endif; ?>

              <!-- <a href="#" class="auth-link text-black">Forgot password?</a> -->
            </div>
            <hr>
            <div class="my-2 d-flex flex-column justify-content-between align-items-center">
              <a class="p-2 btn btn-lg font-weight-medium auth-form-btn" href="<?= $config->getUrlgoogle() ?>">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 256 262" preserveAspectRatio="xMidYMid">
                  <path d="M255.878 133.451c0-10.734-.871-18.567-2.756-26.69H130.55v48.448h71.947c-1.45 12.04-9.283 30.172-26.69 42.356l-.244 1.622 38.755 30.023 2.685.268c24.659-22.774 38.875-56.282 38.875-96.027" fill="#4285F4" />
                  <path d="M130.55 261.1c35.248 0 64.839-11.605 86.453-31.622l-41.196-31.913c-11.024 7.688-25.82 13.055-45.257 13.055-34.523 0-63.824-22.773-74.269-54.25l-1.531.13-40.298 31.187-.527 1.465C35.393 231.798 79.49 261.1 130.55 261.1" fill="#34A853" />
                  <path d="M56.281 156.37c-2.756-8.123-4.351-16.827-4.351-25.82 0-8.994 1.595-17.697 4.206-25.82l-.073-1.73L15.26 71.312l-1.335.635C5.077 89.644 0 109.517 0 130.55s5.077 40.905 13.925 58.602l42.356-32.782" fill="#FBBC05" />
                  <path d="M130.55 50.479c24.514 0 41.05 10.589 50.479 19.438l36.844-35.974C195.245 12.91 165.798 0 130.55 0 79.49 0 35.393 29.301 13.925 71.947l42.211 32.783c10.59-31.477 39.891-54.251 74.414-54.251" fill="#EB4335" />
                </svg>
                <span>&nbsp;&nbsp;Masuk Dengan Google</span>
              </a>
            </div>
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