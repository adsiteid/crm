<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>

<div class="col-12 grid-margin stretch-card p-0">
    <div class="card">
        <div class="card-header bg-white rounded-top">
            <h4 class=" card-title pt-3">Management Selfservice Divisi Promosi (MSDP)</h4>
            <!-- <p class="card-description">
                MSDP
            </p> -->
        </div>
        <div class="card-body">
            <form class="forms-sample row" action="<?= base_url('/msdp/save') ?>" method="post">
                <?php echo  csrf_field(); ?>
                <div class="form-group col-lg-6 col-12  ">
                    <label for="exampleInputName1">Name</label>
                    <input type="text" class="form-control" id="exampleInputName1" placeholder="Name" name="name">
                </div>
                <div class="form-group col-lg-6 col-12">
                    <label for="exampleInputEmail3">Email address</label>
                    <input type="email" class="form-control" id="exampleInputEmail3" placeholder="Email" name="email">
                </div>
                <div class="form-group col-lg-6 col-12">
                    <label for="hp">Phone</label>
                    <input type="number" class="form-control" id="hp" placeholder="Phone Number" name="phone">
                </div>
                <div class="form-group col-lg-6 col-12">
                    <label for="exampleSelectGender">Team</label>
                    <select class="form-control form-select" id="exampleSelectGender" name="manager">
                        <option>test</option>
                        <option>Test</option>
                    </select>
                </div>
                <div class="form-group col-lg-6 col-12">
                    <label for="exampleSelectGender">Jabatan</label>
                    <select class="form-control form-select" id="exampleSelectGender" name="jabatan">
                        <option>test</option>
                        <option>Test</option>
                    </select>
                </div>
                <div class="form-group col-lg-6 col-12">
                    <label for="exampleSelectGender">Divisi</label>
                    <select class="form-control form-select" id="exampleSelectGender" name="divisi">
                        <option>test</option>
                        <option>Test</option>
                    </select>
                </div>

                <div class="form-group col-lg-6 col-12">
                    <label for="exampleSelectGender">Diajukan kepada</label>
                    <select class="form-control form-select" id="exampleSelectGender" name="diajukan">
                        <option>test</option>
                        <option>Test</option>
                    </select>
                </div>

                <div class="form-group col-lg-6 col-12">
                    <label for="exampleSelectGender">Dibebankan kepada</label>
                    <select class="form-control form-select" id="exampleSelectGender" name="dibebankan">
                        <option>test</option>
                        <option>Test</option>
                    </select>
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


                <div class="form-group">
                    <label for="exampleTextarea1">Isi Pengajuan</label>
                    <textarea class="form-control" id="exampleTextarea1" rows="10" name="isi"></textarea>
                </div>
                <div class="d-flex justify-content-end my-4">
                    <div class="col-4"><button type="submit" class="btn btn-primary w-100 mr-2">Submit</button></div>
                </div>

            </form>
        </div>
    </div>
</div>

<?php $this->endSection(); ?>