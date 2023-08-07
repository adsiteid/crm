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
            <h4 class=" card-title pt-3">Add User to Group</h4>
            <!-- <p class="card-description">
                MSDP
            </p> -->
        </div>
        <div class="card-body">
            <form class="forms-sample row" action="<?= base_url('/group_sales_save') ?>" method="post">
                <?= csrf_field(); ?>

                <div class="form-group col-lg-6 col-12">
                    <label>Group Name</label>
                    <select class="form-control form-select <?php if (session('errors.group_name')) : ?>is-invalid<?php endif ?>" name="group_name">
                        <option value="" selected>Select Group</option>
                        <?php foreach ($group->getResultArray() as $g) : ?>
                            <option value="<?= $g['id']; ?>"><?= $g['group_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('errors.group_name')); ?>
                    </div>
                </div>


                <div class="form-group col-lg-6 col-12">
                    <label>Admin</label>
                    <select class="form-control form-select <?php if (session('errors.admin_group')) : ?>is-invalid<?php endif ?>" name="admin_group">
                        <option value="<?= user()->id; ?>" selected><?= user()->fullname; ?></option>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('errors.admin_group')); ?>
                    </div>
                </div>


                <div class="form-group col-lg-6 col-12">
                    <label>Sales</label>
                    <select class="form-control form-select <?php if (session('errors.sales')) : ?>is-invalid<?php endif ?>" name="sales">
                        <option value="">Select Sales</option>
                        <?php foreach ($sales->getResultArray() as $u) : ?>
                            <option value="<?= $u['id']; ?>"><?= $u['fullname']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('errors.sales')); ?>
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Manager</label>
                    <select class="form-control form-select <?php if (session('errors.manager')) : ?>is-invalid<?php endif ?>" name="manager">
                        <option value="">Select Manager</option>
                        <?php foreach ($sales->getResultArray() as $u) : ?>
                            <option value="<?= $u['id']; ?>"><?= $u['fullname']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('errors.manager')); ?>
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>General Manager</label>
                    <select class="form-control form-select <?php if (session('errors.general_manager')) : ?>is-invalid<?php endif ?>" name="general_manager">
                        <option value="">Select General Manager</option>
                        <?php foreach ($sales->getResultArray() as $u) : ?>
                            <option value="<?= $u['id']; ?>"><?= $u['fullname']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('errors.general_manager')); ?>
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