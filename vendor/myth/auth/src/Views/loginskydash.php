<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Skydash Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?=base_url();?>assetskydash/vendors/feather/feather.css">
  <link rel="stylesheet" href="<?=base_url();?>assetskydash/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?=base_url();?>assetskydash/vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?=base_url();?>assetskydash/css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?=base_url();?>assetskydash/images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
          <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
              <div class="brand-logo">
                <img src="<?=base_url();?>assetskydash/images/logo.svg" alt="logo">
              </div>
              <h6 class="font-weight-light">Sign in to continue.</h6>

              
              <form class="pt-3" action="<?= url_to('login') ?>" method="post">
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
                  <button type="button" type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" ><?= lang('Auth.loginAction') ?></button>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  

                <?php if ($config->allowRemembering) : ?>
                    <div class="form-check">
                        <label class="form-check-label text-muted">
                            <input type="checkbox" name="remember" class="form-check-input" <?php if (old('remember')) : ?> checked <?php endif ?>>
                            <?= lang('Auth.rememberMe') ?>
                        </label>
                    </div>
                <?php endif; ?>


                <?php if ($config->allowRegistration) : ?>
						<a href="<?= url_to('register') ?>" class="auth-link text-black"><?= lang('Auth.needAnAccount') ?></a>
				<?php endif; ?>
				<?php if ($config->activeResetter) : ?>
					<a href="<?= url_to('forgot') ?>" class="auth-link text-black"><?= lang('Auth.forgotYourPassword') ?></a>
				<?php endif; ?>
                  <!-- <a href="#" class="auth-link text-black">Forgot password?</a> -->
                </div>
                <!-- <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="ti-facebook mr-2"></i>Connect using facebook
                  </button>
                </div>
                <div class="text-center mt-4 font-weight-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
                </div> -->

                <?= view('Myth\Auth\Views\_message_block') ?>

            </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?=base_url();?>assetskydash/vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?=base_url();?>assetskydash/js/off-canvas.js"></script>
  <script src="<?=base_url();?>assetskydash/js/hoverable-collapse.js"></script>
  <script src="<?=base_url();?>assetskydash/js/template.js"></script>
  <script src="<?=base_url();?>assetskydash/js/settings.js"></script>
  <script src="<?=base_url();?>assetskydash/js/todolist.js"></script>
  <!-- endinject -->
</body>

</html>
