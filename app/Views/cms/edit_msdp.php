<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>


<?php foreach ($detail->getResultArray() as $row); ?>

<div class="col-12 grid-margin stretch-card p-0">
    <div class="card">
        <div class="card-header bg-white rounded-top">
            <h4 class=" card-title pt-3 lh-base">Management Selfservice Divisi Promosi (MSDP)</h4>
            <!-- <p class="card-description">
                MSDP
            </p> -->
        </div>
        <div class="card-body">
            <form class="forms-sample row" action="<?= base_url() ?>/update_msdp_edit/<?= $row['id']; ?>" method="post">
                <?php echo  csrf_field(); ?>
                <div class="form-group col-lg-6 col-12  ">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control <?php if (session('error.name')) : ?>is-invalid<?php endif ?>" id="exampleInputName1" placeholder="Name" name="name" value="<?= $row['name']; ?>">
                    <div class="invalid-feedback">
                        <?= (session('error.name')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-3 col-12">
                    <label for="exampleInputEmail3">Email</label>
                    <input type="email" class="form-control <?php if (session('error.email')) : ?>is-invalid<?php endif ?>" id="exampleInputEmail3" placeholder="Email" name="email" value="<?= $row['email']; ?>">
                    <div class="invalid-feedback">
                        <?= (session('error.email')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-3 col-12">
                    <label for="hp">Phone</label>
                    <input type="number" class="form-control <?php if (session('error.phone')) : ?>is-invalid<?php endif ?>" id="hp" placeholder="Phone Number" name="phone" value="<?= $row['phone']; ?>">
                    <div class="invalid-feedback">
                        <?= (session('error.phone')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-3 col-12">
                    <label for="exampleSelectGender">Manager</label>
                    <select class="form-control form-select <?php if (session('error.manager')) : ?>is-invalid<?php endif ?>" id="exampleSelectGender" name="manager" value="<?= $row['manager']; ?>">
                        <option value="<?= $row['manager']; ?>"><?= $row['manager']; ?></option>
                        <?php foreach ($user->getResultArray() as $u) : ?>
                            <option value="<?= $u['username'] ?>"><?= $u['username'] ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.manager')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-3 col-12">
                    <label for="exampleSelectGender">Jabatan</label>
                    <select class="form-control form-select <?php if (session('error.jabatan')) : ?>is-invalid<?php endif ?>" id="exampleSelectGender" name="jabatan">
                        <option value="<?= $row['jabatan']; ?>"><?= $row['jabatan']; ?></option>
                        <option Value="General Manager">General Manager</option>
                        <option Value="Sales Manager">Sales Manager</option>
                        <option Value="Sales">Sales</option>
                        <option Value="Other">Other</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.jabatan')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-3 col-12">
                    <label for="exampleSelectGender">Project</label>
                    <select class="form-control form-select <?php if (session('error.project')) : ?>is-invalid<?php endif ?>" id="exampleSelectGender" name="project">
                        <option value="<?= $row['project']; ?>"><?= $row['project']; ?></option>
                        <?php foreach ($projects as $p) : ?>
                            <option value="<?= $p['project']; ?>"><?= $p['project']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.project')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-3 col-12">
                    <label for="exampleSelectGender">Divisi</label>
                    <select class="form-control form-select <?php if (session('error.divisi')) : ?>is-invalid<?php endif ?>" id="exampleSelectGender" name="divisi">
                        <option value="<?= $row['divisi']; ?>"><?= $row['divisi']; ?></option>
                        <option value="Marcomm">Marcomm</option>
                        <option value="Sales Marketing">Sales Marketing</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.divisi')); ?>
                    </div>
                </div>


                <div class="form-group col-lg-3 col-12  ">
                    <label for="deadline">Deadline</label>
                    <input type="date" class="form-control <?php if (session('error.deadline')) : ?>is-invalid<?php endif ?>" id="deadline" placeholder="Name" name="deadline" value="<?= $row['deadline']; ?>">
                    <div class="invalid-feedback">
                        <?= (session('error.deadline')); ?>
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label for="exampleSelectGender">Diajukan kepada</label>
                    <select class="form-control form-select <?php if (session('error.diajukan')) : ?>is-invalid<?php endif ?>" id="exampleSelectGender" name="diajukan">
                        <option value="<?= $row['diajukan']; ?>"><?= $row['diajukan']; ?></option>
                        <option value="Marcomm">Marcomm</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.diajukan')); ?>
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label for="exampleSelectGender">Dibebankan kepada</label>
                    <select class="form-control form-select <?php if (session('error.dibebankan')) : ?>is-invalid<?php endif ?>" id="exampleSelectGender" name="dibebankan">
                        <option value="<?= $row['dibebankan']; ?>"><?= $row['dibebankan']; ?></option>
                        <option value="PT.DIAMOND CITRA PROPERTINDO (DAVE APARTMENT)">PT.DIAMOND CITRA PROPERTINDO (DAVE APARTMENT)</option>
                        <option value="PT. ARBA PROPERTINDO (APPLE 1 CONDOVILLA)">PT. ARBA PROPERTINDO (APPLE 1 CONDOVILLA)</option>
                        <option value="PT. KALIBATA INOVASI MAJU (APPLE 3 CONDOVILLA)">PT. KALIBATA INOVASI MAJU (APPLE 3 CONDOVILLA)</option>
                        <option value="PT. ARBA PROPERTINDO UTAMA (APPLE 8 CONDOVILLA)">PT. ARBA PROPERTINDO UTAMA (APPLE 8 CONDOVILLA)</option>
                        <option value="PT. PEJATEN BERLIAN BINTANG INDONESIA (APPLE ADHI 7)">PT. PEJATEN BERLIAN BINTANG INDONESIA (APPLE ADHI 7)</option>
                        <option value="PT. PEJATEN NIAGA INOVASI BERSAMA (APARTHOUSE - CRYSTAL)">PT. PEJATEN NIAGA INOVASI BERSAMA (APARTHOUSE - CRYSTAL)</option>
                        <option value="PT. PEJATEN KREASI SUKSES INDONESIA (VANADIUM)">PT. PEJATEN KREASI SUKSES INDONESIA (VANADIUM)</option>
                        <option value="PT. PEJATEN BERLIAN BINTANG INDONESIA (PRIME HOME)">PT. PEJATEN BERLIAN BINTANG INDONESIA (PRIME HOME)</option>
                        <option value="PT. MITRA ASRI SUKSES (APARTHOUSE - PURI)">PT. MITRA ASRI SUKSES (APARTHOUSE - PURI)</option>
                        <option value="PT. KARYA INOVASI PRIMA (RIVER 8)">PT. KARYA INOVASI PRIMA (RIVER 8)</option>
                        <option value="PT.CIPTA DIAMOND PROPERTINDO (DMARCO RESIDENCE)">PT.CIPTA DIAMOND PROPERTINDO (DMARCO RESIDENCE)</option>
                        <option value="PT.CIPTA DIAMOND PROPERTINDO (DCROWN RESIDENCE)">PT.CIPTA DIAMOND PROPERTINDO (DCROWN RESIDENCE)</option>
                        <option value="PT.CIPTA DIAMOND PROPERTINDO (DGOLDEN RESIDENCE)">PT.CIPTA DIAMOND PROPERTINDO (DGOLDEN RESIDENCE)</option>
                        <option value="PT.CIPTA DIAMOND PROPERTINDO (GUCII 1 APARTMENT)">PT.CIPTA DIAMOND PROPERTINDO (GUCII 1 APARTMENT)</option>
                        <option value="PT. CIPTA PERMATA PROPERTY INDONESIA (GUCII 3 APARTMENT)">PT. CIPTA PERMATA PROPERTY INDONESIA (GUCII 3 APARTMENT)</option>
                        <option value="PT. ADAM INOVASI UTAMA (DPALM RESIDENCE)">PT. ADAM INOVASI UTAMA (DPALM RESIDENCE)</option>
                        <option value="PT. ADAM INOVASI UTAMA (DMARCO LAND)">PT. ADAM INOVASI UTAMA (DMARCO LAND)</option>
                        <option value="PT.DIAMOND KARYA ABADI (DKA)">PT.DIAMOND KARYA ABADI (DKA)</option>
                        <option value="PT.DIAMOND DEVELOPMENT">PT.DIAMOND DEVELOPMENT</option>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.dibebankan')); ?>
                    </div>
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

                <?php
                $tz = 'Asia/Jakarta';
                $dt = new DateTime("now", new DateTimeZone($tz));
                $date = $dt->format('Y-m-d H:i:s');
                ?>

                <input type="hidden" name="status" value="<?= $row['status']; ?>">
                <input type="hidden" name="userid" value="<?= $row['userid']; ?>">
                <input type="hidden" name="updated_at" value="<?= $date; ?>">

                <div class="form-group">
                    <label for="exampleTextarea1">Isi Pengajuan</label>
                    <textarea class="form-control <?php if (session('error.isi')) : ?>is-invalid<?php endif ?> lh-base" id="exampleTextarea1" rows="10" name="isi"><?= $row['isi']; ?></textarea>
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