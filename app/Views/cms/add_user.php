<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<style>
    .file-upload {
        position: relative;
        overflow: hidden;
    }


    .file-upload input.file-input {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
        height: 100%;
    }
</style>



<?php //echo view('Myth\Auth\Views\_message_block') 
?>


<div class="col-12 grid-margin stretch-card p-0">
    <div class="card">
        <div class="card-header bg-white rounded-top">
            <h4 class=" card-title pt-3">Add User</h4>
            <!-- <p class="card-description">
                MSDP
            </p> -->
        </div>
        <div class="card-body">

            <form action="<?= url_to('register') ?>" method="post" class="forms-sample row" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="col-lg-6 col-12">
                    <div class="form-group row">
                        <div class="col-12 mb-3">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>" id="exampleInputName1" placeholder="fullname" name="fullname" value="<?= old('fullname') ?>">
                            <div class="invalid-feedback">
                                <?= (session('errors.fullname')); ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="exampleInputEmail3">Username</label>
                            <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" id="exampleInputEmail3" placeholder="username" name="username" value="<?= old('username') ?>">
                            <div class="invalid-feedback">
                                <?= (session('errors.username')); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="form-group row p-0">
                        <div class="col-lg-6 col-12 mb-3">
                            <label for="hp">Email</label>
                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" placeholder="Email" name="email" value="<?= old('email') ?>">
                            <div class="invalid-feedback">
                                <?= (session('errors.email')); ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <label for="">Contact</label>
                            <input type="number" class="form-control <?php if (session('errors.contact')) : ?>is-invalid<?php endif ?>" placeholder="Contact" name="contact" value="<?= old('contact') ?>">
                            <div class="invalid-feedback">
                                <?= (session('errors.contact')); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 mb-lg-0  mb-3">
                            <label for="">City</label>
                            <input type="text" class="form-control  <?php if (session('errors.city')) : ?>is-invalid<?php endif ?>" placeholder="City" name="city" value="<?= old('city') ?>">
                            <div class="invalid-feedback">
                                <?= (session('errors.city')); ?>
                            </div>
                        </div>
                        <div class="col-lg-8 col-12">
                            <label for="address">Full Address</label>
                            <input type="text" class="form-control <?php if (session('errors.address')) : ?>is-invalid<?php endif ?>" id="address" placeholder="address" name="address" value="<?= old('address') ?>">
                            <div class="invalid-feedback">
                                <?= (session('errors.address')); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group col-lg-6 col-12">
                    <label for="sumber_leads">Level</label>
                    <select class="form-control form-select <?php if (session('errors.level')) : ?>is-invalid<?php endif ?>" id="sumber_leads" name="level">
                        <?php if (in_groups('admin')) : ?>
                            <option value="">Select Level</option>
                            <option value="admin">Admin</option>
                        <?php endif; ?>
                        <option value="users">User</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('errors.level')); ?>
                    </div>
                </div>



                <div class="form-group col-lg-3 col-12">
                    <label for="password">Password</label>
                    <input type="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" id="password" placeholder="password" name="password">
                    <div class="invalid-feedback">
                        <?= (session('errors.password')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-3 col-12">
                    <label for="password2">Confirm Password</label>
                    <input type="password" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" name="pass_confirm">
                    <div class="invalid-feedback">
                        <?= (session('errors.pass_confirm')); ?>
                    </div>
                </div>


                <div class="d-flex justify-content-end p-0 my-4">
                    <div class="col-lg-3 col-12"><a type="submit" class="btn btn-primary w-100 mr-2" data-toggle="modal" data-target="#save-data">Submit</a></div>
                </div>
                <!-- save Modal-->

                <div class="modal fade" id="save-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog " role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Save data</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">Are you sure want to save this data?</div>
                            <div class="modal-footer ">
                                <div class="row d-flex col-12 px-0 py-2">
                                    <div class="col-6">
                                        <button class="btn btn-secondary w-100" type="button" data-dismiss="modal">Cancel</button>
                                    </div>
                                    <div class="col-6">
                                        <button type="submit" class="btn btn-primary w-100"> Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>

<script>
    $('.file-input').change(function() {
        var curElement = $('.image');
        console.log(curElement);
        var reader = new FileReader();

        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            curElement.attr('src', e.target.result);
        };

        // read the image file as a data URL.
        reader.readAsDataURL(this.files[0]);
    });
</script>


<?php $this->endSection(); ?>