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
            <h4 class=" card-title pt-3">Add Leads</h4>
            <!-- <p class="card-description">
                MSDP
            </p> -->
        </div>
        <div class="card-body">
            <form class="forms-sample row" action="<?= base_url('/add_leads/save') ?>" method="post">

                <?php echo  csrf_field(); ?>

                <div class="form-group col-lg-6 col-12  ">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control <?php if (session('error.nama_leads')) : ?>is-invalid<?php endif ?>" id="exampleInputName1" placeholder="Name" name="nama_leads" value="<?= old('nama_leads'); ?>">
                    <div class="invalid-feedback">
                        <?= (session('error.nama_leads')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-3 col-12">
                    <label for="exampleInputEmail3">Email address</label>
                    <input type="email" class="form-control <?php if (session('error.email')) : ?>is-invalid<?php endif ?>" id="exampleInputEmail3" placeholder="Email" name="email" value="<?= old('email'); ?>">
                    <div class="invalid-feedback">
                        <?= (session('error.email')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-3 col-12">
                    <label for="hp">Phone</label>
                    <input type="number" class="form-control <?php if (session('error.nomor_kontak')) : ?>is-invalid<?php endif ?>" id="hp" placeholder="Phone Number" name="nomor_kontak" value="<?= old('nomor_kontak'); ?>">
                    <div class="invalid-feedback">
                        <?= (session('error.nomor_kontak')); ?>
                    </div>
                </div>



                <div class="form-group col-lg-6 col-12">
                    <label for="address">Address</label>
                    <input type="text" class="form-control <?php if (session('error.alamat')) : ?>is-invalid<?php endif ?>" id="address" placeholder="address" name="alamat" value="<?= old('alamat'); ?>">
                    <div class="invalid-feedback">
                        <?= (session('error.alamat')); ?>
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


                <div class="form-group col-lg-3 col-12">
                    <label for="project">Project</label>
                    <select class="form-control form-select <?php if (session('error.project')) : ?>is-invalid<?php endif ?> " id="project" name="project">
                        <option value="">Select Project</option>

                        <?php foreach ($user_group->getResultArray() as $usergroup) : ?>
                            <?php foreach ($group->projects($usergroup['groups'])->getResultArray() as $prj) : ?>
                                <option value="<?= $prj['project']; ?>"><?php foreach ($projects->detail($prj['project'])->getResultArray() as $prjct) : ?><?= $prjct['project']; ?><?php endforeach; ?></option>
                            <?php endforeach ?>
                        <?php endforeach; ?>

                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.project')); ?>
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>General Manager</label>
                    <select class="form-control form-select <?php if (session('error.general_manager')) : ?>is-invalid<?php endif ?>" name="general_manager">
                        <option value="" selected>Select Option</option>

                        <?php foreach ($user_group->getResultArray() as $gm) : ?>
                            <option value="<?= $gm['general_manager']; ?>"><?php foreach ($users->detail($gm['general_manager'])->getResultArray() as $user_gm) : ?><?= $user_gm['fullname']; ?><?php endforeach; ?></option>
                        <?php endforeach; ?>

                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.general_manager')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-3 col-12">
                    <label for="Sales">Sales Manager</label>
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
                    <label for="Sales">Sales/Agent</label>
                    <select class="form-control form-select <?php if (session('error.sales')) : ?>is-invalid<?php endif ?>" id="Sales" name="sales">


                        <?php if (empty($user_group->getResultArray())) : ?>
                            <option value="<?= user()->id; ?>"><?php foreach ($users->detail(user()->id)->getResultArray() as $user_sls_fetch) : ?><?= $user_sls_fetch['fullname'];  ?><?php endforeach; ?></option>
                        <?php endif; ?>

                        <?php if (!empty($user_group->getResultArray())) : ?>
                            <option value="" selected>Select Option</option>
                            <?php foreach ($user_group->getResultArray() as $sls) : ?>
                                <?php foreach ($group->groups($sls['groups'])->getResultArray() as $user_sls) : ?>
                                    <option value="<?= $user_sls['id_user']; ?>"><?php foreach ($users->detail($user_sls['id_user'])->getResultArray() as $user_sls_fetch) : ?><?= $user_sls_fetch['fullname']; ?><?php endforeach; ?></option>
                                <?php endforeach; ?>
                            <?php endforeach; ?>
                        <?php endif; ?>






                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.sales')); ?>
                    </div>
                </div>



                <div class="form-group col-lg-3 col-12">
                    <label for="sumber_leads">Leads Source</label>
                    <select class="form-control form-select <?php if (session('error.sumber_leads')) : ?>is-invalid<?php endif ?>" id="sumber_leads" name="sumber_leads">
                        <option value="">Select Leads Source</option>
                        <option value="Data Pribadi">Data Pribadi</option>
                        <option value="Canvasing">Canvasing</option>
                        <option value="Walk In">Walk In</option>
                        <option value="Pameran">Pameran</option>
                        <option value="Spanduk">Spanduk</option>
                        <option value="Billboard/Hoarding">Billboard/Hoarding</option>
                        <option value="Refferal">Refferal</option>
                        <option value="Agent">Agent</option>
                        <option value="TikTok">TikTok</option>
                        <option value="Facebook Ads">Facebook Ads</option>
                        <option value="Facebook">Facebook</option>
                        <option value="Instagram Ads">Instagram Ads</option>
                        <option value="Instagram">Instagram</option>
                        <option value="Youtube">Youtube</option>
                        <option value="Whatsapp">Whatsapp</option>
                        <option value="Iklan Pribadi">Iklan Pribadi</option>
                        <option value="Data Marcomm">Data Marcomm</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.sumber_leads')); ?>
                    </div>
                </div>

                <input type="hidden" name="update_status" value="New">
                <input type="hidden" name="kategori_status" value="New">
                <input type="hidden" name="reserve" value="">
                <input type="hidden" name="booking" value="">


                <div class="d-flex justify-content-end p-0 my-2">
                    <div class="col-lg-3 col-12"><a type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#save-data">Submit</a></div>
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