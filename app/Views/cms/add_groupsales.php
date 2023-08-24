<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>


<!-- <?php if (session()->has('error')) : ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session('error') as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?> -->



<div class="col-12 grid-margin stretch-card p-0">
    <div class="card">
        <div class="card-header bg-white rounded-top">
            <h4 class=" card-title pt-3">Invite User to Group</h4>
            <!-- <p class="card-description">
                MSDP
            </p> -->
        </div>
        <div class="card-body">
            <form class="forms-sample row" action="<?= base_url('/group_sales_save') ?>" method="post">
                <?= csrf_field(); ?>

                <div class="form-group col-lg-6 col-12">
                    <label>ID User</label>

                    <input type="text" class="form-control" name="id_user" placeholder="User ID">

                </div>

                <div class="form-group col-lg-6 col-12">
                    <label>Level</label>
                    <select class="form-control form-select <?php if (session('errors.level')) : ?>is-invalid<?php endif ?>" name="level">
                        <option value="">Select Level</option>
                        <option value="admin_group">Admin Group</option>
                        <option value="admin_project">Admin Project</option>
                        <option value="general_manager">General Manager</option>
                        <option value="manager">Manager</option>
                        <option value="sales">Sales</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('errors.level')); ?>
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Group Name</label>
                    <select class="form-control form-select <?php if (session('errors.groups')) : ?>is-invalid<?php endif ?>" name="groups">
                        <option value="" selected>Select Option</option>
                        <?php foreach ($user_group->getResultArray() as $grp) : ?>
                            <option value="<?= $grp['groups']; ?>"><?php foreach ($group_project->detail($grp['groups'])->getResultArray() as $user_grp) : ?><?= $user_grp['group_name']; ?><?php endforeach; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('errors.groups')); ?>
                    </div>
                </div>


                <div class="form-group col-lg-3 col-12">
                    <label>Project</label>
                    <select class="form-control form-select <?php if (session('errors.project')) : ?>is-invalid<?php endif ?>" name="project">
                        <option value="" selected>Select Option</option>
                        <?php foreach ($user_group->getResultArray() as $prj) : ?>
                            <?php foreach ($project->projectGroup($prj['groups'])->getResultArray() as $prj) : ?>
                                <option value="<?= $prj['id']; ?>"><?= $prj['project']; ?></option>
                            <?php endforeach ?>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('errors.project')); ?>
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>General Manager</label>
                    <select class="form-control form-select <?php if (session('errors.general_manager')) : ?>is-invalid<?php endif ?>" name="general_manager">
                        <option value="" selected>Select Option</option>
                        <?php foreach ($user_group->getResultArray() as $gm) : ?>
                            <option value="<?= $gm['general_manager']; ?>"><?php foreach ($users->detail($gm['general_manager'])->getResultArray() as $user_gm) : ?><?= $user_gm['fullname']; ?><?php endforeach; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('errors.general_manager')); ?>
                    </div>
                </div>


                <div class="form-group col-lg-3 col-12">
                    <label>Manager</label>
                    <select class="form-control form-select <?php if (session('errors.manager')) : ?>is-invalid<?php endif ?>" name="manager">
                        <option value="" selected>Select Option</option>
                        <?php foreach ($user_group->getResultArray() as $mng) : ?>
                            <option value="<?= $mng['manager']; ?>"><?php foreach ($users->detail($mng['manager'])->getResultArray() as $user_mng) : ?><?= $user_mng['fullname']; ?><?php endforeach; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('errors.manager')); ?>
                    </div>
                </div>






                <div class="d-flex justify-content-end my-3 p-0">
                    <div class="col-lg-3 col-12"><button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#save-data">Submit</button></div>
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


            </form>


        </div>
    </div>
</div>



<?php $this->endSection(); ?>