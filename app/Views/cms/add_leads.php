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


                        <?php if (in_groups('sales') || in_groups('manager') || in_groups('general_manager') || in_groups('admin_project')) : ?>
                            <?php foreach ($group_name->detail(user()->groups)->getResultArray() as $g) : ?>
                                <option value="<?= user()->groups; ?>" selected><?= $g['group_name']; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <?php if (in_groups('admin_group')) : ?>
                            <?php foreach ($group->getResultArray() as $g) : ?>
                                <option value="<?= $g['id']; ?>"><?= $g['group_name']; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <?php if (in_groups('admin')) : ?>
                            <option value="" selected>Select Group</option>
                        <?php endif; ?>

                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.groups')); ?>
                    </div>
                </div>




                <div class="form-group col-lg-3 col-12">
                    <label for="project">Project</label>
                    <select class="form-control form-select <?php if (session('error.project')) : ?>is-invalid<?php endif ?> " id="project" name="project">
                        <option value="">Select Project</option>

                        <?php if (in_groups('admin')) :  ?>
                            <?php foreach ($projects as $pj1) : ?>
                                <option value="<?= $pj1['project']; ?>"><?= $pj1['project']; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <?php if (!in_groups('admin')) :  ?>
                            <?php foreach ($projects->getResultArray() as $pj2) : ?>
                                <option value="<?= $pj2['project']; ?>"><?= $pj2['project']; ?></option>
                            <?php endforeach; ?>
                            
                        <?php endif; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.project')); ?>
                    </div>
                </div>

                <div class="form-group col-lg-2 col-12">
                    <label>General Manager</label>
                    <select class="form-control form-select <?php if (session('error.general_manager')) : ?>is-invalid<?php endif ?>" name="general_manager">

                        <?php if (in_groups('admin')) : ?>
                            <option value="">Select Option</option>
                        <?php endif; ?>

                        <?php if (in_groups('sales') || in_groups('manager') || in_groups('admin_project') || in_groups('admin_group')) : ?>
                            <?php if (in_groups('admin_group')) : ?>
                                <option value="" selected>Select Option</option>
                            <?php endif; ?>
                            <?php foreach ($gmsales->getResultArray() as $gm) : ?>
                                <option value="<?= $gm['id']; ?>"> <?= $gm['fullname']; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <?php if (in_groups('general_manager')) : ?>
                            <option value="<?= user()->id; ?>"> <?= user()->fullname; ?></option>
                        <?php endif; ?>

                        <?php if (empty($gm['id'])) : ?>
                            <option value="" selected>Select Option</option>
                        <?php endif; ?>

                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.general_manager')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-2 col-12">
                    <label for="Sales">Sales Manager</label>
                    <select class="form-control form-select <?php if (session('error.manager')) : ?>is-invalid<?php endif ?> " id="Sales Manager" name="manager">


                        <?php if (in_groups('sales') || in_groups('general_manager') || in_groups('admin_group') || in_groups('admin_project')) : ?>
                            <?php foreach ($salesmanager->getResultArray() as $mg) : ?>
                                <?php if (in_groups('admin_group')) : ?>
                                    <option value="" selected>Select Option</option>
                                <?php endif; ?>
                                <option value="<?= $mg['id']; ?>"> <?= $mg['username']; ?></option>
                            <?php endforeach; ?>
                        <?php endif; ?>

                        <?php if (empty($mg['id'])) : ?>
                            <option value="" selected>Select Option</option>
                        <?php endif; ?>

                        <?php if (in_groups('manager')) : ?>
                            <option value="<?= user()->id; ?>"> <?= user()->fullname; ?></option>
                        <?php endif; ?>


                        <?php if (in_groups('admin')) : ?>
                            <option value="" selected>Select Option</option>
                        <?php endif; ?>

                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.manager')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-2 col-12">
                    <label for="Sales">Sales</label>
                    <select class="form-control form-select <?php if (session('error.sales')) : ?>is-invalid<?php endif ?>" id="Sales" name="sales">

                        <?php if (in_groups('sales')) : ?>
                            <option value="<?= user()->id; ?>"><?= user()->fullname;  ?></option>
                        <?php endif; ?>

                        <?php if (!in_groups('sales')) : ?>
                            <option value="" selected>Select Option</option>
                            <?php foreach ($sales->getResultArray() as $sl) : ?>
                                <option value="<?= $sl['id']; ?>"><?= $sl['fullname']; ?></option>
                            <?php endforeach; ?>

                            <?php if (in_groups('admin_project')) : ?>
                                <?php foreach ($gmsales->getResultArray() as $gm) : ?>
                                    <option value="<?= $gm['id']; ?>"> <?= $gm['fullname']; ?></option>
                                <?php endforeach; ?>
                            <?php endif; ?>

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

                <?php if (in_groups('admin_group')) : ?>
                    <input type="hidden" name="admin_group" value="<?= user()->id; ?>">
                <?php endif; ?>

                <?php if (in_groups('sales') || in_groups('manager') || in_groups('general_manager') || in_groups('admin_project')) : ?>
                    <input type="hidden" name="admin_group" value="<?= user()->admin_group; ?>">
                <?php endif; ?>

                <!-- <div class="form-group col-lg-3 col-12">
                    <label for="status">Status</label>
                    <select class="form-control form-select <?php if (session('error.update_status')) : ?>is-invalid<?php endif ?>" id="status" name="update_status">
                        <option value="">Select Status</option>
                        <option value="New">New</option>
                        <option value="Invalid">Invalid</option>
                        <option value="Pending">Pending</option>
                        <option value="Close">Close</option>
                        <option value="Contacted">Contacted</option>
                        <option value="Visit">Visit</option>
                        <option value="Deal">Deal</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.update_status')); ?>
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label for="category">Category</label>
                    <select class="form-control form-select <?php if (session('error.kategori_status')) : ?>is-invalid<?php endif ?>" id="category" name="kategori_status">
                        <option value="">Select Category</option>
                        <option value="New">New</option>
                        <option value="Cold">Cold</option>
                        <option value="Warm">Warm</option>
                        <option value="Hot">Hot</option>
                        <option value="Reserve">Reserve</option>
                        <option value="Booking">Booking</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.kategori_status')); ?>
                    </div>
                </div> -->

                <div class="form-group col-lg-3 col-12">
                    <label for="feedback">Feedback</label>
                    <select class="form-control form-select <?php if (session('error.catatan')) : ?>is-invalid<?php endif ?>" id="feedback" name="catatan">
                        <option value="">Select Feedback</option>
                        <option value="Tidak bisa dihubungi">Tidak bisa dihubungi</option>
                        <option value="Nomor tidak ada di Whatsapp">Nomor tidak ada di Whatsapp</option>
                        <option value="Tidak respon">Tidak respon</option>
                        <option value="Proses Follow Up">Proses Follow Up</option>
                        <option value="Tidak berminat">Tidak berminat</option>
                        <option value="Sangat berminat">Sangat berminat</option>
                        <option value="Sudah pilih property lain">Sudah pilih property lain</option>
                        <option value="Proses BI checking">Proses BI checking</option>
                        <option value="Tidak lolos BI checking">Tidak lolos BI checking</option>
                        <option value="Lolos BI checking">Lolos BI checking</option>
                        <option value="Rumah tidak sesuai">Rumah tidak sesuai</option>
                        <option value="Request full furnished">Request full furnished</option>
                        <option value="Cari rumah full furnished">Cari rumah full furnished</option>
                        <option value="Sedang didiskusikan">Sedang didiskusikan</option>
                        <option value="Transaksi selesai">Transaksi selesai</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.catatan')); ?>
                    </div>
                </div>

                <!-- <div class="form-group col-lg-3 col-12">
                    <label for="reserve">Reserve Amount</label>
                    <input type="number" class="form-control <?php if (session('error.reserve')) : ?>is-invalid<?php endif ?>" id="reserve" placeholder="reserve" name="reserve" value="<?= old('reserve'); ?>">
                    <div class="invalid-feedback">
                        <?= (session('error.reserve')); ?>
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label for="booking">Booking Amount</label>
                    <input type="number" class="form-control <?php if (session('error.booking')) : ?>is-invalid<?php endif ?>" id="booking" placeholder="booking" name="booking" value="<?= old('booking'); ?>">
                    <div class="invalid-feedback">
                        <?= (session('error.booking')); ?>
                    </div>
                </div> -->

                <?php if (in_groups('admin_group')) : ?>
                    <input type="hidden" name="admin_group" value="<?= user()->id; ?>">
                <?php endif; ?>

                <?php if (in_groups('admin_project')) : ?>
                    <?php foreach ($adminAssistant->getResultArray() as $adas) : ?>
                        <input type="hidden" name="admin_group" value="<?= $adas['admin_group']; ?>">
                    <?php endforeach; ?>
                <?php endif; ?>

                <?php if (in_groups('sales') || in_groups('manager') || in_groups('general_manager')) : ?>
                    <?php foreach ($user->getResultArray() as $adas) : ?>
                        <input type="hidden" name="admin_group" value="<?= $adas['admin_group']; ?>">
                    <?php endforeach; ?>
                <?php endif; ?>

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