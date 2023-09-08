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



<!-- <?php if (session()->has('error')) : ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session('error') as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?> -->


<form action="<?= base_url('/project_save') ?>" method="post" enctype="multipart/form-data">
    <?php echo  csrf_field(); ?>

    <div class="col-12 grid-margin stretch-card p-0">
        <div class="card">
            <div class="card-header bg-transparent">
                <h4 class=" card-title pt-3">Add Project</h4>
                <!-- <p class="card-description">
                MSDP
            </p> -->
            </div>
            <div class="card-body row">

                <div class="col-lg-2 col-12">
                    <label class="mb-3">Logo/Profil</label>
                    <a type="button" class="file-upload">
                        <img class="image w-100 pr-lg-1 px-0 pb-lg-0 pb-5 " src="<?= base_url(); ?>document/image/event/upload.jpg">
                        <input type="file" class="file-input <?php if (session('error.logo')) : ?>is-invalid<?php endif ?>" name="logo"><!--Choose File-->
                        <div class="invalid-feedback">
                            <?= (session('error.logo')); ?>
                        </div>
                    </a>
                </div>



                <div class=" col-lg-4 col-12">
                    <div class="form-group  ">
                        <label>Project Name</label>
                        <input type="text" class="form-control <?php if (session('error.project')) : ?>is-invalid<?php endif ?>" placeholder="Project" name="project" value="<?= old('project'); ?>">
                        <div class="invalid-feedback">
                            <?= (session('error.project')); ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg col-12">
                            <div class="form-group">
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
                        </div>

                    </div>


                </div>

                <div class="col-lg-6 col-12">
                    <div class="row">
                        <div class="form-group col-lg-4 col-12">
                            <label>City</label>
                            <input type="text" class="form-control <?php if (session('error.city')) : ?>is-invalid<?php endif ?>" placeholder="City" name="city" value="<?= old('city'); ?>">
                            <div class="invalid-feedback">
                                <?= (session('error.city')); ?>
                            </div>
                        </div>

                        <div class="form-group col-lg-8 col-12">
                            <label>Full Address</label>
                            <input type="text" class="form-control <?php if (session('error.alamat')) : ?>is-invalid<?php endif ?>" placeholder="Alamat" name="alamat" value="<?= old('alamat'); ?>">
                            <div class="invalid-feedback">
                                <?= (session('error.alamat')); ?>
                            </div>
                        </div>

                        <div class="form-group col-lg-6 col-12">
                            <label>Harga Mulai</label>
                            <input type="text" class="form-control" placeholder="Harga Mulai" name="harga_mulai" value="<?= old('harga_mulai'); ?>">
                            <div class="invalid-feedback">
                            </div>
                        </div>

                        <div class="form-group col-lg-6 col-12">
                            <label>Cicilan Mulai</label>
                            <input type="text" class="form-control" placeholder="Cicilan Mulai" name="cicilan_mulai" value="<?= old('cicilan_mulai'); ?>">
                            <div class="invalid-feedback">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>NUP</label>
                    <input type="text" class="form-control" placeholder="nup" name="nup" value="<?= old('nup'); ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Rental Garansi</label>
                    <input type="text" class="form-control" placeholder="Rental Garansi" name="rental_garansi" value="<?= old('rental_garansi'); ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Promo Mulai</label>
                    <input type="date" class="form-control" name="promo_berlaku" value="<?= old('promo_berlaku'); ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Promo Berakhir</label>
                    <input type="date" class="form-control" name="promo_berakhir" value="<?= old('promo_berakhir'); ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Luas Tanah</label>
                    <input type="text" class="form-control" placeholder="Luas Tanah" name="luas_tanah" value="<?= old('luas_tanah'); ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Luas Bangunan</label>
                    <input type="text" class="form-control" placeholder="Luas Bangunan" name="luas_bangunan" value="<?= old('luas_bangunan'); ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-2 col-12">
                    <label>Floor</label>
                    <input type="text" class="form-control" placeholder="Floor" name="floor" value="<?= old('floor'); ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-2 col-12">
                    <label>Bathroom</label>
                    <input type="text" class="form-control" placeholder="Bathroom" name="bathroom" value="<?= old('bathroom'); ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-2 col-12">
                    <label>Living Room</label>
                    <input type="text" class="form-control" placeholder="Living Room" name="living_room" value="<?= old('living_room'); ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-2 col-12">
                    <label>Dinnig Room</label>
                    <input type="text" class="form-control" placeholder="Dinning Room" name="dinning_room" value="<?= old('dinning_room'); ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-2 col-12">
                    <label>Kitchen</label>
                    <input type="text" class="form-control" placeholder="Kitchen" name="kitchen" value="<?= old('kitchen'); ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>


                <div class="form-group col-lg-2 col-12">
                    <label>Bed Room</label>
                    <input type="text" class="form-control" placeholder="Bed Room" name="bed_room" value="<?= old('bed_room'); ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-2 col-12">
                    <label>Rooftop</label>
                    <input type="text" class="form-control" placeholder="Roof Top" name="rooftop" value="<?= old('rooftop'); ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-2 col-12">
                    <label>Carport</label>
                    <input type="text" class="form-control" placeholder="Carport" name="carport" value="<?= old('carport'); ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>


                <div class="form-group col-lg-2 col-12">
                    <label>Mezanine</label>
                    <input type="text" class="form-control" placeholder="Mezanine" name="mezanine" value="<?= old('mezanine'); ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>


                <div class="form-group col-lg-3 col-12">
                    <label>Mobile Phone</label>
                    <input type="text" class="form-control" placeholder="Mobile" name="no_hp" value="<?= old('no_hp'); ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Telephone</label>
                    <input type="text" class="form-control" placeholder="Phone Number" name="no_telp" value="<?= old('no_telp'); ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?= old('email'); ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Website</label>
                    <input type="text" class="form-control" placeholder="Website" name="website" value="<?= old('website'); ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Facebook</label>
                    <input type="text" class="form-control" placeholder="facebook" name="facebook" value="<?= old('facebook'); ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Instagram</label>
                    <input type="text" class="form-control" placeholder="instagram" name="instagram" value="<?= old('instagram'); ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Tiktok</label>
                    <input type="text" class="form-control" placeholder="TikTok" name="tiktok" value="<?= old('tiktok'); ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Youtube</label>
                    <input type="text" class="form-control" placeholder="youtube" name="youtube" value="<?= old('youtube'); ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-12">
                    <label>Fasilitas</label>
                    <textarea class="form-control pt-4 lh-base " rows="8" name="fasilitas"><?= old('fasilitas'); ?></textarea>
                </div>

                <?php if (in_groups('admin')) : ?>
                    <div class="form-group col-lg-3 col-12">
                        <label for="sumber_leads">Admin Project</label>
                        <select class="form-control form-select <?php if (session('errors.admin_group')) : ?>is-invalid<?php endif ?>" id="sumber_leads" name="admin_group">
                            <option value="">Select Admin Project</option>
                            <?php foreach ($adminProject->getResultArray() as $adp) : ?>
                                <option value="<?= $adp['id']; ?>"><?= $adp['fullname']; ?></option>
                            <?php endforeach; ?>

                        </select>
                        <div class="invalid-feedback">
                            <?= (session('errors.admin_group')); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <div class="col-lg-6 col-12">

                </div>

                <div class="col-12">
                    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
                    <label>Materport</label>

                    <div id="req_input" class="datainputs ">
                        <input placeholder="Materport Link" type="text" class="form-control mb-3" name="materport[]" value="<?= old('materport[]'); ?>">
                    </div>
                    <a type="button" href="#" id="addmore" class="btn btn-primary add_input">Add more Link</a>
                </div>


                <?php if (in_groups('admin_group')) : ?>
                    <input type="hidden" name="admin_group" value="<?= user()->id; ?>">
                <?php endif; ?>


                <?php if (in_groups('admin_project')) : ?>
                    <?php foreach ($adminAssistant->getResultArray() as $adas); ?>
                    <input type="hidden" name="admin_group" value="<?= $adas['admin_group']; ?>">
                <?php endif; ?>



                <div class="d-flex justify-content-end p-0 mt-5 mb-3">
                    <div class="col-lg-3 col-12"><a type="button" class="btn btn-primary w-100 " data-toggle="modal" data-target="#save-data">Submit</a></div>
                </div>

            </div>
        </div>
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


<script>
    $(document).ready(function() {
        $("#addmore").click(function() {
            $("#req_input").append('<div class="required_inp row px-3 mb-3"><input placeholder="Materport Link" type="text" class="form-control col-11" name="materport[]" autofocus>' + '<input type="button" class="inputRemove btn btn-outline-primary col-1 p-0  rounded" value="Remove"/></div>');
        });
        $('body').on('click', '.inputRemove', function() {
            $(this).parent('div.required_inp').remove()
        });
    });
</script>

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