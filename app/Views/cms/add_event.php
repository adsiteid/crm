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
            <h4 class=" card-title pt-3">Add Event</h4>
            <!-- <p class="card-description">
                MSDP
            </p> -->
        </div>
        <div class="card-body">
            <form class="forms-sample row" action="<?= base_url('/event_save') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <div class="form-group col-lg-3 col-12  ">
                    <label for="exampleInputName1">Event Name</label>
                    <input type="text" class="form-control <?php if (session('error.event_name')) : ?>is-invalid<?php endif ?>" id="exampleInputName1" placeholder="Event Name" name="event_name" value="<?= old('event_name'); ?>">
                    <div class="invalid-feedback">
                        <?= (session('error.event_name')); ?>
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label for="subholding">Groups</label>
                    <select class="form-control form-select <?php if (session('error.groups')) : ?>is-invalid<?php endif ?>" id="subholding" name="groups">

                        <option value="" selected>Select Option</option>

                        <?php foreach ($user_group->getResultArray() as $grp) : ?>
                            <option value="<?= $grp['groups']; ?>"><?php foreach ($group_project->detail($grp['groups'])->getResultArray() as $user_grp) : ?><?= $user_grp['group_name']; ?><?php endforeach; ?></option>
                        <?php endforeach; ?>

                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.groups')); ?>
                    </div>
                </div>


                <div class="form-group col-lg-6 col-12">
                    <label for="project">Project</label>
                    <select class="form-control form-select <?php if (session('error.project')) : ?>is-invalid<?php endif ?> " id="project" name="project">
                        <option value="">Select Project</option>

                        <?php foreach ($user_group->getResultArray() as $prj) : ?>
                            <option value="<?= $prj['project']; ?>"><?= $prj['project']; ?></option>
                        <?php endforeach; ?>

                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.project')); ?>
                    </div>
                </div>



                <div class="form-group col-lg-2 col-12  ">
                    <label>City</label>
                    <input type="text" class="form-control <?php if (session('error.city')) : ?>is-invalid<?php endif ?>" placeholder="City" name="city" value="<?= old('city'); ?>">
                    <div class="invalid-feedback">
                        <?= (session('error.city')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-4 col-12  ">
                    <label>Full Address</label>
                    <input type="text" class="form-control <?php if (session('error.full_address')) : ?>is-invalid<?php endif ?>" placeholder="Full Address" name="full_address" value="<?= old('full_address'); ?>">
                    <div class="invalid-feedback">
                        <?= (session('error.full_address')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-3 col-12  ">
                    <label>Contact</label>
                    <input type="number" class="form-control <?php if (session('error.contact')) : ?>is-invalid<?php endif ?>" placeholder="Contact" name="contact" value="<?= old('contact'); ?>">
                    <div class="invalid-feedback">
                        <?= (session('error.contact')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-3 col-12  ">
                    <label>Email</label>
                    <input type="email" class="form-control <?php if (session('error.email')) : ?>is-invalid<?php endif ?>" placeholder="Email" name="email" value="<?= old('email'); ?>">
                    <div class="invalid-feedback">
                        <?= (session('error.email')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-3 col-12  ">
                    <label>Date Start</label>
                    <input type="date" class="form-control <?php if (session('error.date_start')) : ?>is-invalid<?php endif ?>" placeholder="Date Start" name="date_start" value="<?= old('date_start'); ?>">
                    <div class="invalid-feedback">
                        <?= (session('error.date_start')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-3 col-12  ">
                    <label>Date End</label>
                    <input type="date" class="form-control <?php if (session('error.date_end')) : ?>is-invalid<?php endif ?>" placeholder="Date End" name="date_end" value="<?= old('date_end'); ?>">
                    <div class="invalid-feedback">
                        <?= (session('error.date_end')); ?>
                    </div>
                </div>



                <div class="col-lg-6 col-12">
                    <label>File upload</label>
                    <input type="file" name="image" class="form-control <?php if (session('error.image')) : ?>is-invalid<?php endif ?>">
                    <div class="invalid-feedback">
                        <?= (session('error.image')); ?>
                    </div>
                </div>


                <div class="form-group">
                    <label for="exampleTextarea1">Description</label>
                    <textarea class="form-control <?php if (session('error.description')) : ?>is-invalid<?php endif ?>" id="exampleTextarea1" rows="10" name="description"><?= old('description'); ?></textarea>
                    <div class="invalid-feedback">
                        <?= (session('error.description')); ?>
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