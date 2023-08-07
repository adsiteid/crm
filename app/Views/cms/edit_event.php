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





<?php foreach ($event->getResultArray() as $row); ?>



<?= csrf_field(); ?>
<div class="col-12 grid-margin stretch-card p-0">
    <div class="card">
        <div class="card-header bg-white rounded-top">
            <h4 class=" card-title pt-3">Edit Event</h4>
            <!-- <p class="card-description">
                MSDP
            </p> -->
        </div>
        <div class="card-body">
            <form class="forms-sample row" action="<?= base_url('/update_event/' . $row['id']) ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="form-group col-lg-3 col-12  ">
                    <label for="exampleInputName1">Event Name</label>
                    <input type="text" class="form-control <?php if (session('error.event_name')) : ?>is-invalid<?php endif ?>" id="exampleInputName1" value="<?= $row['event_name']; ?>" name="event_name">
                    <div class="invalid-feedback">
                        <?= (session('error.event_name')); ?>
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label for="subholding">Groups</label>
                    <select class="form-control form-select <?php if (session('error.groups')) : ?>is-invalid<?php endif ?>" id="subholding" name="groups">
                        <option value="<?= $row['groups']; ?>"><?= $row['groups']; ?></option>
                        <?php foreach ($group->getResultArray() as $g) : ?>
                            <option value="<?= $g['id']; ?>"><?= $g['group_name']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.groups')); ?>
                    </div>
                </div>

                
                <div class="form-group col-lg-6 col-12">
                    <label>Project</label>
                    <select class="form-control form-select <?php if (session('error.project')) : ?>is-invalid<?php endif ?>" name="project">
                        <option value="<?= $row['project']; ?>" selected><?= $row['project']; ?></option>
                        <?php foreach ($projects as $p) : ?>
                            <option value="<?= $p['project']; ?>"><?= $p['project']; ?></option>
                        <?php endforeach; ?>
                    </select>
                    <div class="invalid-feedback">
                        <?= (session('error.project')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-2 col-12  ">
                    <label>City</label>
                    <input type="text" class="form-control <?php if (session('error.city')) : ?>is-invalid<?php endif ?>" value="<?= $row['city']; ?>" name="city">
                    <div class="invalid-feedback">
                        <?= (session('error.city')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-4 col-12  ">
                    <label>Full Address</label>
                    <input type="text" class="form-control <?php if (session('error.full_address')) : ?>is-invalid<?php endif ?>" value="<?= $row['full_address']; ?>" name="full_address">
                    <div class="invalid-feedback">
                        <?= (session('error.full_address')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-3 col-12  ">
                    <label>Contact</label>
                    <input type="number" class="form-control <?php if (session('error.contact')) : ?>is-invalid<?php endif ?>" value="<?= $row['contact']; ?>" name="contact">
                    <div class="invalid-feedback">
                        <?= (session('error.contact')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-3 col-12  ">
                    <label>Email</label>
                    <input type="email" class="form-control <?php if (session('error.email')) : ?>is-invalid<?php endif ?>" value="<?= $row['email']; ?>" name="email">
                    <div class="invalid-feedback">
                        <?= (session('error.email')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-6 col-12  ">
                    <label>Date Start</label>
                    <input type="date" class="form-control <?php if (session('error.date_start')) : ?>is-invalid<?php endif ?>" value="<?= $row['date_start']; ?>" name="date_start">
                    <div class="invalid-feedback">
                        <?= (session('error.date_start')); ?>
                    </div>
                </div>
                <div class="form-group col-lg-6 col-12  ">
                    <label>Date End</label>
                    <input type="date" class="form-control <?php if (session('error.date_end')) : ?>is-invalid<?php endif ?>" value="<?= $row['date_end']; ?>" name="date_end">
                    <div class="invalid-feedback">
                        <?= (session('error.date_end')); ?>
                    </div>
                </div>

                <input type="hidden" value="<?= $row['id']; ?>" name="id">



                <!-- <div class="form-group col-lg-6 col-12">
                    <label>File upload</label>
                    <input type="file" name="img[]" class="file-upload-default">
                    <div class="input-group col-xs-12">
                        <input type="file" class="form-control file-upload-info" placeholder="Upload Image">
                        <span class="input-group-append">
                            <button class="file-upload-browse btn btn-primary rounded-right" type="button">Upload</button>
                        </span>
                    </div>
                </div> -->

                <div class="form-group col-lg-8 col-12">
                    <label for="exampleTextarea1">Description</label>
                    <textarea class="form-control <?php if (session('error.description')) : ?>is-invalid<?php endif ?>" id="exampleTextarea1" rows="10" name="description"><?= $row['description']; ?></textarea>
                    <div class="invalid-feedback">
                        <?= (session('error.description')); ?>
                    </div>
                </div>


                <div class="col-lg-4 col-12  ">
                    <label class="mb-2"> Event Image</label>
                    <a type="button" class="file-upload align-items-center object-fit-cover" style="max-height:170px;">

                        <img class="image w-100 pr-lg-1 px-0 pb-lg-0 pb-5 " src="<?= base_url(); ?>document/image/event/<?= $row['image']; ?>">

                        <input type="file" class="file-input <?php if (session('errors.image')) : ?>is-invalid<?php endif ?>" name="image">
                        <div class="invalid-feedback">
                            <?= (session('errors.image')); ?>
                        </div>
                    </a>
                </div>



                <?php if (in_groups('admin_group')) : ?>
                    <input type="hidden" name="admin_group" value="<?= user()->id; ?>">
                <?php endif; ?>

                <?php if (in_groups('admin_project')) : ?>
                    <?php foreach ($adminAssistant->getResultArray() as $adas); ?>
                    <input type="hidden" name="admin_group" value="<?= $adas['admin_group']; ?>">
                <?php endif; ?>


                <div class="d-flex justify-content-end my-3">
                    <div class="col-lg-3 col-12 p-0"><button type="button" class="btn btn-primary w-100" data-toggle="modal" data-target="#save-data">Submit</button></div>
                </div>


                <!-- save Modal-->

                <div class="modal fade" id="save-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog " role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Save changes</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                            </div>
                            <div class="modal-body text-center">Are you sure want to save this changes?</div>
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