<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<div class="col-12 grid-margin stretch-card p-0">
    <div class="card">
        <div class="card-header bg-white rounded-top">
            <h4 class=" card-title pt-3 lh-base">Add Submission</h4>
            <!-- <p class="card-description">
                MSDP
            </p> -->
        </div>
        <div class="card-body">
            <form class="forms-sample row" action="<?= base_url('/msdp/save') ?>" method="post">
                <?php echo  csrf_field(); ?>
                <div class="form-group col-lg-3 col-12  ">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control <?php if (session('error.name')) : ?>is-invalid<?php endif ?>" id="exampleInputName1" placeholder="Name" name="name">
                    <div class="invalid-feedback">
                        <?= (session('error.name')); ?>
                    </div>
                </div>


                <div class="form-group col-lg-3 col-12">
                    <label for="groups">Groups</label>
                    <select class="form-control form-select <?php if (session('error.groups')) : ?>is-invalid<?php endif ?>" id="groups" name="groups">

                        <option value="" selected>Select Option</option>

                        <?php foreach ($user_group->getResultArray() as $grp) : ?>
                            <option value="<?= $grp['groups']; ?>"><?php foreach ($group_project->detail($grp['groups'])->getResultArray() as $user_grp) : ?><?= $user_grp['group_name']; ?><?php endforeach; ?></option>
                        <?php endforeach; ?>

                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.groups')); ?>
                    </div>
                </div>


                <div class="form-group col-lg-3 col-12">
                    <label for="exampleInputEmail3">Email</label>
                    <input type="email" class="form-control <?php if (session('error.email')) : ?>is-invalid<?php endif ?>" id="exampleInputEmail3" placeholder="Email" name="email">
                    <div class="invalid-feedback">
                        <?= (session('error.email')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-3 col-12">
                    <label for="hp">Phone</label>
                    <input type="number" class="form-control <?php if (session('error.phone')) : ?>is-invalid<?php endif ?>" id="hp" placeholder="Phone Number" name="phone">
                    <div class="invalid-feedback">
                        <?= (session('error.phone')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-3 col-12">
                    <label for="Sales">Manager</label>
                    <select class="form-control form-select <?php if (session('error.manager')) : ?>is-invalid<?php endif ?> " id="Sales Manager" name="manager">
                        <option value="" selected>Select Option</option>
                        <?php foreach ($user_group->getResultArray() as $mng) : ?>
                            <option value="<?= $mng['manager']; ?>"><?php foreach ($users->detail($mng['manager'])->getResultArray() as $user_mng) : ?><?= $user_mng['fullname']; ?><?php endforeach; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.manager')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-3 col-12">
                    <label for="exampleSelectGender">Jabatan</label>
                    <select class="form-control form-select <?php if (session('error.jabatan')) : ?>is-invalid<?php endif ?>" id="exampleSelectGender" name="jabatan">
                        <option value="">Select Option</option>
                        <option Value="Admin Group">Admin Group</option>
                        <option Value="Admin Project">Admin Project</option>
                        <option Value="General Manager">General Manager</option>
                        <option Value="Sales Manager">Manager</option>
                        <option Value="Sales">Sales</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.jabatan')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-3 col-12">
                    <label for="project">Project</label>
                    <select class="form-control form-select <?php if (session('error.project')) : ?>is-invalid<?php endif ?> " id="project" name="project">
                        <option value="">Select Option</option>

                        <?php foreach ($user_group->getResultArray() as $usergroup) : ?>
                            <?php foreach ($group->projects($usergroup['groups'])->getResultArray() as $prj) : ?>
                                <option value="<?= $prj['project']; ?>"><?php foreach ($project->detail($prj['project'])->getResultArray() as $prjct) : ?><?= $prjct['project']; ?><?php endforeach; ?></option>
                            <?php endforeach ?>
                        <?php endforeach; ?>

                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.project')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-3 col-12">
                    <label for="exampleSelectGender">Divisi</label>
                    <select class="form-control form-select <?php if (session('error.divisi')) : ?>is-invalid<?php endif ?>" id="exampleSelectGender" name="divisi">
                        <option value="">Select Option</option>
                        <option value="Marcomm">Marcomm</option>
                        <option value="Sales Marketing">Sales Marketing</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.divisi')); ?>
                    </div>
                </div>


                <div class="form-group col-lg-6 col-12  ">
                    <label for="deadline">Deadline</label>
                    <input type="date" class="form-control <?php if (session('error.deadline')) : ?>is-invalid<?php endif ?>" id="deadline" placeholder="Name" name="deadline">
                    <div class="invalid-feedback">
                        <?= (session('error.deadline')); ?>
                    </div>
                </div>

                <div class="form-group col-lg-6 col-12">
                    <label for="exampleSelectGender">Diajukan kepada</label>
                    <select class="form-control form-select <?php if (session('error.diajukan')) : ?>is-invalid<?php endif ?>" id="exampleSelectGender" name="diajukan">
                        <option value="">Select option</option>
                        <option value="Marcomm">Marcomm</option>
                        <option value="Management">Management</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.diajukan')); ?>
                    </div>
                </div>


                <input type="hidden" name="status" value="New">
                <input type="hidden" name="userid" value="<?= user()->id; ?>">


                <div class="form-group">
                    <label for="exampleTextarea1">Isi Pengajuan</label>
                    <textarea class="form-control <?php if (session('error.isi')) : ?>is-invalid<?php endif ?> lh-base" id="exampleTextarea1" rows="10" name="isi"></textarea>
                    <div class="invalid-feedback">
                        <?= (session('error.isi')); ?>
                    </div>
                </div>



                <div class="d-flex justify-content-end my-4">
                    <div class="col-lg-3 col-12 p-0"><a type="button" class="btn btn-primary w-100 mr-2" data-toggle="modal" data-target="#save-data">Submit</a></div>
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





<?php $this->endSection(); ?>