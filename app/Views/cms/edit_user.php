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

<?php foreach ($user->getResultArray() as $row); ?>

<?php //echo view('Myth\Auth\Views\_message_block') 
?>


<div class="col-12 grid-margin stretch-card p-0">
    <div class="card">
        <div class="card-header bg-white rounded-top d-flex justify-content-between">
            <h4 class=" card-title pt-3">Edit User</h4>
            <a href="#" class="small text-primary pt-3">
                Change Password
            </a>
        </div>
        <div class="card-body">

            <form action="<?= base_url(); ?>user_update" method="post" class="forms-sample row" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <input type="hidden" name="id" value="<?= $row['id'] ?>">

                <div class="col-lg-2 col-12">
                    <label class="mb-2"> User Image</label>
                    <a type="button" class="file-upload">
                        <?php if ($row['user_image'] !== 'default.jpg') : ?>
                            <img class="image w-100 pr-lg-1 px-0 pb-lg-0 pb-5 cover " src="<?= base_url(); ?>document/image/profile/user/<?= $row['user_image']; ?>">
                        <?php endif; ?>
                        <?php if ($row['user_image'] == 'default.jpg') : ?>
                            <img class="image w-100 pr-lg-1 px-0 pb-lg-0 pb-5 cover " src="<?= base_url(); ?>document/image/profile/default.jpg">
                        <?php endif; ?>
                        <input type="file" class="file-input <?php if (session('errors.user_image')) : ?>is-invalid<?php endif ?>" name="user_image">
                        <div class="invalid-feedback">
                            <?= (session('errors.user_image')); ?>
                        </div>
                    </a>
                </div>

                <div class="col-lg-4 col-12">
                    <div class="form-group row">
                        <div class="col-12 mb-3">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" class="form-control <?php if (session('errors.fullname')) : ?>is-invalid<?php endif ?>" id="exampleInputName1" placeholder="fullname" name="fullname" value="<?= $row['fullname']; ?>">
                            <div class="invalid-feedback">
                                <?= (session('errors.fullname')); ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <label for="exampleInputEmail3">Username</label>
                            <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" id="exampleInputEmail3" placeholder="username" name="username" value="<?= $row['username']; ?>">
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
                            <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" placeholder="Email" name="email" value="<?= $row['email']; ?>">
                            <div class="invalid-feedback">
                                <?= (session('errors.email')); ?>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12 mb-3">
                            <label for="">Contact</label>
                            <input type="number" class="form-control <?php if (session('errors.contact')) : ?>is-invalid<?php endif ?>" placeholder="Contact" name="contact" value="<?= $row['contact']; ?>">
                            <div class="invalid-feedback">
                                <?= (session('errors.contact')); ?>
                            </div>
                        </div>
                        <div class="col-lg-4 col-12 mb-lg-0  mb-3">
                            <label for="">City</label>
                            <input type="text" class="form-control  <?php if (session('errors.city')) : ?>is-invalid<?php endif ?>" placeholder="City" name="city" value="<?= $row['city']; ?>">
                            <div class="invalid-feedback">
                                <?= (session('errors.city')); ?>
                            </div>
                        </div>
                        <div class="col-lg-8 col-12">
                            <label for="address">Full Address</label>
                            <input type="text" class="form-control <?php if (session('errors.address')) : ?>is-invalid<?php endif ?>" id="address" placeholder="address" name="address" value="<?= $row['address']; ?>">
                            <div class="invalid-feedback">
                                <?= (session('errors.address')); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group col-lg-6 col-12">
                    <label for="project">Group</label>
                    <select class="form-control form-select <?php if (session('errors.project')) : ?>is-invalid<?php endif ?>" id="project" name="groups" <?php if (in_groups('sales') || in_groups('manager') || in_groups('general_manager')) : ?> disabled <?php endif; ?>>
                        <option value="<?= $row['groups']; ?>"><?php foreach ($group_name->detail($row['groups'])->getResultArray() as $g) : ?><?= $g['group_name']; ?><?php endforeach; ?></option>
                        <?php foreach ($group->getResultArray() as $gp) : ?>
                            <option value="<?= $gp['id']; ?>"><?= $gp['group_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('errors.project')); ?>
                    </div>
                </div>


                <div class="form-group col-lg-6 col-12">
                    <label for="project">Project</label>
                    <select class="form-control form-select <?php if (session('errors.project')) : ?>is-invalid<?php endif ?>" id="project" name="project" <?php if (in_groups('sales') || in_groups('manager') || in_groups('general_manager')) : ?> disabled <?php endif; ?>>
                        <option value="<?= $row['project']; ?>"><?= $row['project']; ?></option>
                        <?php foreach ($projects as $pj) : ?>
                            <option value="<?= $pj['project']; ?>"><?= $pj['project']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('errors.project')); ?>
                    </div>
                </div>



                <div class="form-group col-lg-3 col-12 ">
                    <label for="GM">General Manager</label>
                    <select class="form-control form-select <?php if (session('errors.general_manager')) : ?>is-invalid<?php endif ?>" id="GM" name="general_manager" <?php if (in_groups('sales') || in_groups('manager') || in_groups('general_manager')) : ?> disabled <?php endif; ?>>
                        <?php foreach ($user_group->detail($row['general_manager'])->getResultArray() as $gm); ?>


                        <?php if (!empty($row['general_manager'])) : ?>
                            <option value="<?= $row['general_manager']; ?>"><?= $gm['fullname']; ?></option>
                        <?php endif; ?>
                        <?php if (empty($row['general_manager'])) : ?>
                            <option value="<?= $row['general_manager']; ?>"><?= $row['general_manager']; ?></option>
                        <?php endif; ?>

                        <?php foreach ($sales->getResultArray() as $su) : ?>
                            <option value="<?= $su['id']; ?>"> <?= $su['fullname']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('errors.general_manager')); ?>
                    </div>
                </div>


                <div class="form-group col-lg-3 col-12">
                    <label for="Sales">Sales Manager</label>
                    <select class="form-control form-select <?php if (session('errors.manager')) : ?>is-invalid<?php endif ?>" id="Sales Manager" name="manager" <?php if (in_groups('sales') || in_groups('manager') || in_groups('general_manager')) : ?> disabled <?php endif; ?>>
                        <?php foreach ($user_group->detail($row['manager'])->getResultArray() as $m); ?>

                        <?php if (!empty($row['manager'])) : ?>
                            <option value="<?= $row['manager']; ?>"><?= $m['fullname']; ?></option>
                        <?php endif; ?>
                        <?php if (empty($row['manager'])) : ?>
                            <option value="<?= $row['manager']; ?>"><?= $row['manager']; ?></option>
                        <?php endif; ?>

                        <?php foreach ($sales->getResultArray() as $su) : ?>
                            <option value="<?= $su['id']; ?>"> <?= $su['fullname']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('errors.manager')); ?>
                    </div>
                </div>



                <div class="form-group col-lg-6 col-12">
                    <label for="sumber_leads">Level</label>
                    <select class="form-control form-select <?php if (session('errors.level')) : ?>is-invalid<?php endif ?>" id="sumber_leads" name="level" <?php if (in_groups('sales') || in_groups('manager') || in_groups('general_manager') || in_groups('admin_project')) : ?> disabled <?php endif; ?>>
                        <option value="<?= $row['level']; ?>"><?= $row['level']; ?></option>
                        <?php if (in_groups('admin')) : ?>
                            <option value="admin">Admin</option>
                            <option value="admin_group">Admin Project</option>
                        <?php endif; ?>
                        <option value="admin_project">Admin Assistant</option>
                        <option value="sales">Sales</option>
                        <option value="manager">Manager</option>
                        <option value="general_manager">General Manager</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('errors.level')); ?>
                    </div>
                </div>

                <input type="hidden" name="admin_group" value="<?= $row['admin_group']; ?>">

                <?php if (in_groups('admin_project')) : ?>
                    <input type="hidden" name="level" value="<?= $row['level']; ?>">
                <?php endif ?>

                <?php if (in_groups('sales') || in_groups('manager') || in_groups('general_manager')) : ?>
                    <input type="hidden" name="groups" value="<?= $row['groups']; ?>">
                    <input type="hidden" name="project" value="<?= $row['project']; ?>">
                    <input type="hidden" name="general_manager" value="<?= $row['general_manager']; ?>">
                    <input type="hidden" name="manager" value="<?= $row['manager']; ?>">
                    <input type="hidden" name="level" value="<?= $row['level']; ?>">
                <?php endif ?>

                <!-- <?php if (in_groups('admin_project')) : ?>
                    <input type="hidden" name="level" value="<?= $row['level']; ?>">
                <?php endif ?> -->

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

                <input type="hidden" name="user_id" value="<?= $row['id']; ?>">

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