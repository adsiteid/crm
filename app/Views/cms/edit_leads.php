<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<div class="col-12 grid-margin stretch-card p-0">
    <div class="card">
        <div class="card-header bg-white rounded-top">
            <h4 class=" card-title pt-3">Edit Leads</h4>
            <!-- <p class="card-description">
                MSDP
            </p> -->
        </div>

        <?php foreach ($leads->getResultArray() as $row) ?>

        <div class="card-body">
            <form class="forms-sample row" action="<?= base_url('/update_leads/' . $row['id']) ?>" method="post">

                <?= csrf_field(); ?>

                <?php

                $tz = 'Asia/Jakarta';
                $dt = new DateTime("now", new DateTimeZone($tz));
                $date = $dt->format('Y-m-d H:i:s');
                $time = $dt->format('H:i:s');

                ?>


                <input type="hidden" name="id" value="<?= $row['id']; ?>">

                <?php if ($row['time_stamp_invalid'] == NULL) : ?>

                    <input type="hidden" name="time_stamp_invalid" value="<?= $date; ?>">

                <?php endif; ?>

                <?php if ($row['time_stamp_invalid'] !== NULL) : ?>

                    <input type="hidden" name="time_stamp_invalid" value="<?= $row['time_stamp_invalid']; ?>">
                   

                <?php endif; ?>


                <?php if ($row['time_stamp_close'] == NULL) : ?>

                    <input type="hidden" name="time_stamp_close" value="<?= $date; ?>">
        

                <?php endif; ?>

                <?php if ($row['time_stamp_close'] !== NULL) : ?>

                    <input type="hidden" name="time_stamp_close" value="<?= $row['time_stamp_close']; ?>">
                    

                <?php endif; ?>


                <?php if ($row['time_stamp_pending'] == NULL) : ?>

                    <input type="hidden" name="time_stamp_pending" value="<?= $date; ?>">
                   

                <?php endif; ?>

                <?php if ($row['time_stamp_pending'] !== NULL) : ?>

                    <input type="hidden" name="time_stamp_pending" value="<?= $row['time_stamp_pending']; ?>">
                 

                <?php endif; ?>


                <?php if ($row['time_stamp_contacted'] == NULL) : ?>

                    <input type="hidden" name="time_stamp_contacted" value="<?= $date; ?>">
                

                <?php endif; ?>

                <?php if ($row['time_stamp_contacted'] !== NULL) : ?>

                    <input type="hidden" name="time_stamp_contacted" value="<?= $row['time_stamp_contacted']; ?>">
                   

                <?php endif; ?>


                <?php if ($row['time_stamp_visit'] == NULL) : ?>

                    <input type="hidden" name="time_stamp_visit" value="<?= $date; ?>">
                 

                <?php endif; ?>

                <?php if ($row['time_stamp_visit'] !== NULL) : ?>

                    <input type="hidden" name="time_stamp_visit" value="<?= $row['time_stamp_visit']; ?>">
                  

                <?php endif; ?>


                <?php if ($row['time_stamp_deal'] == NULL) : ?>

                    <input type="hidden" name="time_stamp_deal" value="<?= $date; ?>">
                    

                <?php endif; ?>

                <?php if ($row['time_stamp_deal'] !== NULL) : ?>

                    <input type="hidden" name="time_stamp_deal" value="<?= $row['time_stamp_deal']; ?>">
                   

                <?php endif; ?>


                <?php if ($row['time_stamp_reserve'] == NULL) : ?>

                    <input type="hidden" name="time_stamp_reserve" value="<?= $date; ?>">
                  

                <?php endif; ?>

                <?php if ($row['time_stamp_reserve'] !== NULL) : ?>

                    <input type="hidden" name="time_stamp_reserve" value="<?= $row['time_stamp_reserve']; ?>">
                  

                <?php endif; ?>


                <?php if ($row['time_stamp_booking'] == NULL) : ?>

                    <input type="hidden" name="time_stamp_booking" value="<?= $date; ?>">

                <?php endif; ?>

                <?php if ($row['time_stamp_booking'] !== NULL) : ?>

                    <input type="hidden" name="time_stamp_booking" value="<?= $row['time_stamp_booking']; ?>">

                <?php endif; ?>


                <div class="form-group col-lg-6 col-12  ">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control <?php if (session('errors.nama_leads')) : ?>is-invalid<?php endif ?>" id="exampleInputName1" placeholder="Name" name="nama_leads" value="<?= $row['nama_leads']; ?>">
                    <div class="invalid-feedback">
                        <?php echo $validation->getError('nama_leads'); ?>
                    </div>
                </div>
                <div class="form-group col-lg-6 col-12">
                    <label for="exampleInputEmail3">Email address</label>
                    <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" id="exampleInputEmail3" placeholder="Email" name="email" value="<?= $row['email']; ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>
                <div class="form-group col-lg-6 col-12">
                    <label for="hp">Phone</label>
                    <input type="text" class="form-control <?php if (session('errors.nomor_kontak')) : ?>is-invalid<?php endif ?>" id="hp" placeholder="Phone Number" name="nomor_kontak" value="<?= $row['nomor_kontak']; ?>">
                    <div class="invalid-feedback">
                        <?= (session('errors.nomor_kontak')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-6 col-12">
                    <label for="address">Address</label>
                    <input type="text" class="form-control <?php if (session('errors.alamat')) : ?>is-invalid<?php endif ?>" id="address" placeholder="address" name="alamat" value="<?= $row['alamat']; ?>">
                    <div class="invalid-feedback">
                        <?= (session('errors.alamat')); ?>
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label for="project">Group</label>
                    <select class="form-control form-select <?php if (session('errors.groups')) : ?>is-invalid<?php endif ?>" id="groups" name="groups">
                        <option value="<?= $row['groups']; ?>" selected><?php foreach ($group_name->detail($row['groups'])->getResultArray() as $g) : ?><?= $g['group_name']; ?><?php endforeach; ?></option>
                        <?php foreach ($group->getResultArray() as $gp) : ?>
                            <option value="<?= $gp['id']; ?>"><?= $gp['group_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('errors.project')); ?>
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label for="project">Project</label>
                    <select class="form-control form-select <?php if (session('errors.project')) : ?>is-invalid<?php endif ?>" id="project" name="project">
                        <option value="<?= $row['project']; ?>" selected> <?php foreach ($project->detail($row['project'])->getResultArray() as $pj) : ?><?= $pj['project'];?><?php endforeach;?></option>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('errors.project')); ?>
                    </div>
                </div>

                <div class="form-group col-lg-2 col-12">
                    <label for="GM">General Manager</label>
                    <select class="form-control form-select <?php if (session('errors.general_manager')) : ?>is-invalid<?php endif ?>" id="GM" name="general_manager">
                        <option value="<?= $row['general_manager']; ?>"> <?php foreach ($user_group->detail($row['general_manager'])->getResultArray() as $gm) : ?> <?= $gm['fullname'] ?> <?php endforeach; ?> </option>

                       

                    </select>
                    <div class="invalid-feedback">
                        <?= (session('errors.general_manager')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-2 col-12">
                    <label for="Sales">Sales Manager</label>
                    <select class="form-control form-select <?php if (session('errors.manager')) : ?>is-invalid<?php endif ?>" id="Sales Manager" name="manager">
                        <option value="<?= $row['manager']; ?>"> <?php foreach ($user_group->detail($row['manager'])->getResultArray() as $mg) : ?> <?= $mg['fullname'] ?> <?php endforeach; ?> </option>

                       
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('errors.manager')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-2 col-12">
                    <label for="Sales">Sales</label>
                    <select class="form-control form-select <?php if (session('errors.sales')) : ?>is-invalid<?php endif ?>" id="Sales" name="sales">
                        <?php foreach ($user_group->detail($row['sales'])->getResultArray() as $s); ?>
                        <option value="<?= $row['sales']; ?>"><?= $s['fullname']; ?></option>
                        <?php foreach ($sales->getResultArray() as $salesUser) : ?>
                            <option value="<?php echo $salesUser['id']; ?>"><?php echo $salesUser['fullname']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('errors.sales')); ?>
                    </div>
                </div>

                <div class="form-group col-lg-6 col-12">
                    <label for="sumber_leads">Sumber Leads</label>
                    <select class="form-control form-select <?php if (session('errors.sumber_leads')) : ?>is-invalid<?php endif ?>" id="sumber_leads" name="sumber_leads">
                        <option value="<?= $row['sumber_leads']; ?>" selected><?= $row['sumber_leads']; ?></option>
                        <option value="Data Pribadi" <?= ($row['sumber_leads'] == 'Data Pribadi') ? 'class="d-none"' : ''; ?>>Data Pribadi</option>
                        <option value="Canvasing" <?= ($row['sumber_leads'] == 'Canvasing') ? 'class="d-none"' : ''; ?>>Canvasing</option>
                        <option value="Walk In" <?= ($row['sumber_leads'] == 'Walk In') ? 'class="d-none"' : ''; ?>>Walk In</option>
                        <option value="Pameran" <?= ($row['sumber_leads'] == 'Pameran') ? 'class="d-none"' : ''; ?>>Pameran</option>
                        <option value="Spanduk" <?= ($row['sumber_leads'] == 'Spanduk') ? 'class="d-none"' : ''; ?>>Spanduk</option>
                        <option value="Billboard/Hoarding" <?= ($row['sumber_leads'] == 'Billboard/Hoarding') ? 'class="d-none"' : ''; ?>>Billboard/Hoarding</option>
                        <option value="Refferal" <?= ($row['sumber_leads'] == 'Refferal') ? 'class="d-none"' : ''; ?>>Refferal</option>
                        <option value="Agent" <?= ($row['sumber_leads'] == 'Agent') ? 'class="d-none"' : ''; ?>>Agent</option>
                        <option value="TikTok" <?= ($row['sumber_leads'] == 'TikTok') ? 'class="d-none"' : ''; ?>>TikTok</option>
                        <option value="Facebook Ads" <?= ($row['sumber_leads'] == 'Facebook Ads') ? 'class="d-none"' : ''; ?>>Facebook Ads</option>
                        <option value="Facebook" <?= ($row['sumber_leads'] == 'Facebook') ? 'class="d-none"' : ''; ?>>Facebook</option>
                        <option value="Instagram Ads" <?= ($row['sumber_leads'] == 'Instagram Ads') ? 'class="d-none"' : ''; ?>>Instagram Ads</option>
                        <option value="Instagram" <?= ($row['sumber_leads'] == 'Instagram') ? 'class="d-none"' : ''; ?>>Instagram</option>
                        <option value="Youtube" <?= ($row['sumber_leads'] == 'Youtube') ? 'class="d-none"' : ''; ?>>Youtube</option>
                        <option value="Whatsapp" <?= ($row['sumber_leads'] == 'Whatsapp') ? 'class="d-none"' : ''; ?>>Whatsapp</option>
                        <option value="Iklan Pribadi" <?= ($row['sumber_leads'] == 'Iklan Pribadi') ? 'class="d-none"' : ''; ?>>Iklan Pribadi</option>
                        <option value="Data Marcomm" <?= ($row['sumber_leads'] == 'Data Marcomm') ? 'class="d-none"' : ''; ?>>Data Marcomm</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('errors.sumber_leads')); ?>
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label for="status">Status</label>
                    <select class="form-control form-select <?php if (session('errors.update_status')) : ?>is-invalid<?php endif ?>" id="status" name="update_status">
                        <option value="<?= $row['update_status']; ?>" selected><?= $row['update_status']; ?></option>
                        <option value="New" <?= ($row['update_status'] == 'New') ? 'class="d-none"' : ''; ?>>New</option>
                        <option value="Invalid" <?= ($row['update_status'] == 'Invalid') ? 'class="d-none"' : ''; ?>>Invalid</option>
                        <option value="Pending" <?= ($row['update_status'] == 'Pending') ? 'class="d-none"' : ''; ?>>Pending</option>
                        <option value="Close" <?= ($row['update_status'] == 'Close') ? 'class="d-none"' : ''; ?>>Close</option>
                        <option value="Contacted" <?= ($row['update_status'] == 'Contacted') ? 'class="d-none"' : ''; ?>>Contacted</option>
                        <option value="Visit" <?= ($row['update_status'] == 'Visit') ? 'class="d-none"' : ''; ?>>Visit</option>
                        <option value="Deal" <?= ($row['update_status'] == 'Deal') ? 'class="d-none"' : ''; ?>>Deal</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('errors.update_status')); ?>
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label for="category">Category</label>
                    <select class="form-control form-select <?php if (session('errors.kategori_status')) : ?>is-invalid<?php endif ?>" id="category" name="kategori_status">
                        <option value="<?= $row['kategori_status']; ?>" selected><?= $row['kategori_status']; ?></option>
                        <option value="New" <?= ($row['kategori_status'] == 'New') ? 'class="d-none"' : ''; ?>>New</option>
                        <option value="Cold" <?= ($row['kategori_status'] == 'Cold') ? 'class="d-none"' : ''; ?>>Cold</option>
                        <option value="Warm" <?= ($row['kategori_status'] == 'Warm') ? 'class="d-none"' : ''; ?>>Warm</option>
                        <option value="Hot" <?= ($row['kategori_status'] == 'Hot') ? 'class="d-none"' : ''; ?>>Hot</option>
                        <option value="Reserve" <?= ($row['kategori_status'] == 'Reserve') ? 'class="d-none"' : ''; ?>>Reserve</option>
                        <option value="Booking" <?= ($row['kategori_status'] == 'Booking') ? 'class="d-none"' : ''; ?>>Booking</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('errors.kategori_status')); ?>
                    </div>
                </div>

                <div class="form-group col-lg-6 col-12">
                    <label for="feedback">Feedback</label>
                    <select class="form-control form-select <?php if (session('errors.catatan')) : ?>is-invalid<?php endif ?>" id="feedback" name="catatan">
                        <option value="<?= $row['catatan']; ?>" selected><?= $row['catatan']; ?></option>
                        <option value="Tidak bisa dihubungi" <?= ($row['catatan'] == 'Tidak bisa dihubungi') ? 'class="d-none"' : ''; ?>>Tidak bisa dihubungi</option>
                        <option value="Nomor tidak ada di Whatsapp" <?= ($row['catatan'] == 'Nomor tidak ada di Whatsapp') ? 'class="d-none"' : ''; ?>>Nomor tidak ada di Whatsapp</option>
                        <option value="Tidak respon" <?= ($row['catatan'] == 'Tidak respon') ? 'class="d-none"' : ''; ?>>Tidak respon</option>
                        <option value="Tidak berminat" <?= ($row['catatan'] == 'Tidak berminat') ? 'class="d-none"' : ''; ?>>Tidak berminat</option>
                        <option value="Proses Follow Up" <?= ($row['catatan'] == 'Proses Follow Up') ? 'class="d-none"' : ''; ?>>Proses Follow Up</option>
                        <option value="Sangat berminat" <?= ($row['catatan'] == 'Sangat berminat') ? 'class="d-none"' : ''; ?>>Sangat berminat</option>
                        <option value="Sudah pilih property lain" <?= ($row['catatan'] == 'Sudah pilih property lain') ? 'class="d-none"' : ''; ?>>Sudah pilih property lain</option>
                        <option value="Proses BI checking" <?= ($row['catatan'] == 'Proses BI checking') ? 'class="d-none"' : ''; ?>>Proses BI checking</option>
                        <option value="Lolos BI checking" <?= ($row['catatan'] == 'Lolos BI checking') ? 'class="d-none"' : ''; ?>>Lolos BI checking</option>
                        <option value="Tidak lolos BI checking" <?= ($row['catatan'] == 'Tidak lolos BI checking') ? 'class="d-none"' : ''; ?>>Tidak lolos BI checking</option>
                        <option value="Rumah tidak sesuai" <?= ($row['catatan'] == 'Rumah tidak sesuai') ? 'class="d-none"' : ''; ?>>Rumah tidak sesuai</option>
                        <option value="Request full furnished" <?= ($row['catatan'] == 'Request full furnished') ? 'class="d-none"' : ''; ?>>Request full furnished</option>
                        <option value="Cari rumah full furnished" <?= ($row['catatan'] == 'Cari rumah full furnished') ? 'class="d-none"' : ''; ?>>Cari rumah full furnished</option>
                        <option value="Sedang didiskusikan" <?= ($row['catatan'] == 'Sedang didiskusikan') ? 'class="d-none"' : ''; ?>>Sedang didiskusikan</option>
                        <option value="Transaksi selesai" <?= ($row['catatan'] == 'Transaksi selesai') ? 'class="d-none"' : ''; ?>>Transaksi selesai</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('errors.catatan')); ?>
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label for="reserve">Jumlah Reserve</label>
                    <input type="number" class="form-control " id="reserve" placeholder="reserve" name="reserve" value="<?= $row['reserve']; ?>">
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label for="booking">Jumlah Booking</label>
                    <input type="number" class="form-control" id="booking" placeholder="booking" name="booking" value="<?= $row['booking']; ?>">
                </div>

                <!-- <div class="form-group">
                    <label>File upload</label>
                    <input type="file" name="img[]" class="file-upload-default">
                    <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                        </span>
                    </div>
                </div> -->


                <!-- <div class="form-group">
                    <label for="exampleTextarea1">Catatan</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="10"></textarea>
                </div> -->
                <div class="my-4 d-flex justify-content-end">
                    <div class="col-lg-3 col-12 p-0"><a type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#save-data">Submit</a></div>
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