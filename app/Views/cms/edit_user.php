<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>


<link href="https://fonts.googleapis.com/css?family=Open+Sans:300" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">


<style>
    .avatar-upload {
        position: relative;
        max-width: 160px;
        margin: 0px auto;
    }

    .avatar-edit {
        position: absolute;
        right: 10px;
        z-index: 1;
        top: 10px;
    }

    input {
        display: none;

        +label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 100%;
            background: #FFFFFF;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all .2s ease-in-out;

            &:hover {
                background: #f1f1f1;
                border-color: #d6d6d6;
            }

            &:after {
                content: "\f040";
                font-family: 'FontAwesome';
                color: #757575;
                position: absolute;
                top: 10px;
                left: 0;
                right: 0;
                text-align: center;
                margin: auto;
            }
        }
    }


    .avatar-preview {
        width: 162px;
        height: 162px;
        position: relative;
        border-radius: 100%;
        border: 6px solid #F8F8F8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);

        >div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    }
</style>

<?php foreach ($user->getResultArray() as $row); ?>

<?php //echo view('Myth\Auth\Views\_message_block') 
?>

<div class="col-12 grid-margin stretch-card p-0">
    <div class="card">
        <div class="card-header bg-transparent d-flex justify-content-between align-items-center">

            <label class="badge badge-success mt-2" style="font-size: 10px;">ID User : <?= $row['id']; ?></label>

            <div class="dropdown flex-md-grow-1 flex-xl-grow-0 d-lg-block d-none">
                <button class="btn btn-sm btn-light dropdown-toggle" type="button" id="dropdownMenuDate2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" style="font-size: 11px;">
                    Change Email / Password
                </button>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuDate2">
                    <a class="dropdown-item" href="<?= base_url(); ?>change_email">Change Email</a>
                    <a class="dropdown-item" href="<?= base_url(); ?>forgot">Change Password</a>

                </div>
            </div>
            <!-- <a href="<?= base_url() ?>forgot" class="small text-primary pt-3">
                Change Password
            </a> -->
        </div>

        <div class="col mt-3">
            <!-- flashdata -->
            <?php if (session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success" role="alert">
                    <?= session()->getFlashdata('pesan'); ?>
                </div>
            <?php endif; ?>
        </div>

        <div class="card-body">

            <form action="<?= base_url(); ?>user_update" method="post" class="forms-sample row" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <input type="hidden" name="id" value="<?= $row['id'] ?>">

                <div class="col-lg-3 col-12  my-3">
                    <div class="avatar-upload">
                        <div class="avatar-edit">
                            <input type='file' class="<?php if (session('error.user_image')) : ?>is-invalid<?php endif ?>" id="imageUpload" name="user_image" accept=".png, .jpg, .jpeg" />
                            <label for="imageUpload"></label>
                        </div>
                        <div class="avatar-preview">
                            <?php if ($row['user_image'] !== 'default.jpg') : ?>
                                <div id="imagePreview" style="background-image: url(<?= base_url(); ?>document/image/profile/user/<?= $row['user_image']; ?>);">
                                </div>
                            <?php endif; ?>
                            <?php if ($row['user_image'] == 'default.jpg') : ?>
                                <div id="imagePreview" style="background-image: url(<?= base_url(); ?>document/image/profile/default.jpg);">
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="invalid-feedback">
                        <?= (session('error.user_image')); ?>
                    </div>

                </div>

                <div class="col-lg-4 col-12">
                    <div class="form-group row">
                        <div class="col-12 mb-3">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control <?php if (session('error.fullname')) : ?>is-invalid<?php endif ?>" id="exampleInputName1" placeholder="fullname" name="fullname" value="<?= $row['fullname']; ?>">
                            <div class="invalid-feedback">
                                <?= (session('error.fullname')); ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="exampleInputEmail3">Username</label>
                            <input type="text" class="form-control <?php if (session('error.username')) : ?>is-invalid<?php endif ?>" id="exampleInputEmail3" placeholder="username" name="username" value="<?= $row['username']; ?>">
                            <div class="invalid-feedback">
                                <?= (session('error.username')); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 col-12">
                    <div class="form-group row p-0">
                        <div class="col-lg-6 col-12 mb-3">
                            <label for="hp">Email</label>
                            <input type="email" class="form-control <?php if (session('error.email')) : ?>is-invalid<?php endif ?>" placeholder="Email" name="email" value="<?= $row['email']; ?>">
                            <div class="invalid-feedback">
                                <?= (session('error.email')); ?>
                            </div>
                        </div>
                        <div class=" col-lg-6 col-12 mb-3">
                            <label for="">Contact</label>
                            <input type="number" class="form-control <?php if (session('error.contact')) : ?>is-invalid<?php endif ?>" placeholder="Contact" name="contact" value="<?= $row['contact']; ?>">
                            <div class="invalid-feedback">
                                <?= (session('error.contact')); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 mb-lg-0  mb-3">
                            <label for="">City</label>
                            <input type="text" class="form-control  <?php if (session('error.city')) : ?>is-invalid<?php endif ?>" placeholder="City" name="city" value="<?= $row['city']; ?>">
                            <div class="invalid-feedback">
                                <?= (session('error.city')); ?>
                            </div>
                        </div>
                        <div class="col-lg-8 col-12">
                            <label for="address">Full Address</label>
                            <input type="text" class="form-control <?php if (session('error.address')) : ?>is-invalid<?php endif ?>" id="address" placeholder="address" name="address" value="<?= $row['address']; ?>">
                            <div class="invalid-feedback">
                                <?= (session('error.address')); ?>
                            </div>
                        </div>

                    </div>
                    <div class="d-lg-none d-flex justify-content-lg-end justify-content-center">
                        <p><a href="<?= base_url() ?>change_email">Change Email</a> | <a href="<?= base_url() ?>forgot">Change Password</a></p>
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
                <input type="hidden" name="level" value="<?= $row['level']; ?>">
                <input type="hidden" name="user_id" value="<?= $row['id']; ?>">

            </form>


        </div>
    </div>
</div>




<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });
</script>


<?php $this->endSection(); ?>