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



<?php if (session()->has('error')) : ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach (session('error') as $error) : ?>
                <li><?= $error ?></li>
            <?php endforeach ?>
        </ul>
    </div>
<?php endif ?>


<?php foreach ($project->getResultArray() as $row); ?>


<form action="<?= base_url('/update_project') ?>" method="post" enctype="multipart/form-data">
    <?php echo  csrf_field(); ?>

    <input type="hidden" name="id" value="<?= $row['id']; ?>">

    <div class="col-12 grid-margin stretch-card p-0">
        <div class="card">
            <div class="card-header bg-white rounded-top">
                <h4 class=" card-title pt-3">Edit Project</h4>
                <!-- <p class="card-description">
                MSDP
            </p> -->
            </div>
            <div class="card-body row">

                <div class="col-lg-3 col-12">
                    <?php if ($row['logo']) : ?>
                        <a type="button" class="file-upload">
                            <img class="image w-100 px-lg-4 px-0 pb-lg-0 pb-5 " src="<?= base_url(); ?>document/image/project/logo/<?= $row['logo']; ?>">
                            <input type="file" class="file-input" name="logo"><!--Choose File-->
                        </a>
                    <?php endif; ?>
                    <?php if (!$row['logo']) : ?>
                        <a type="button" class="file-upload">
                            <img class="image w-100 px-lg-4 px-0 pb-lg-0 pb-5 " src="<?= base_url(); ?>document/image/event/upload.jpg">
                            <input type="file" class="file-input" name="logo"><!--Choose File-->
                        </a>
                    <?php endif; ?>
                </div>

                <div class=" col-lg-3 col-12">
                    <div class="form-group  ">
                        <label>Project Name</label>
                        <input type="text" class="form-control " placeholder="Project" name="project" value="<?= $row['project']; ?>">
                        <div class="invalid-feedback">
                            sdasd
                        </div>
                    </div>
                    <div class="form-group ">
                        <label for="subholding">Subholding</label>
                        <select class="form-control form-select " id="subholding" name="subholding">
                            <option value="<?= $row['subholding']; ?>"><?= $row['subholding']; ?></option>
                            <option value="Subholding 1">Subholding 1</option>
                            <option value="Subholding 2">Subholding 2</option>
                            <option value="Subholding 3">Subholding 3</option>
                        </select>
                        <div class="invalid-feedback">
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-12">
                    <div class="row">
                        <div class="form-group col-lg-4 col-12">
                            <label>City</label>
                            <input type="text" class="form-control" placeholder="City" name="city" value="<?= $row['city']; ?>">
                            <div class="invalid-feedback">
                            </div>
                        </div>

                        <div class="form-group col-lg-8 col-12">
                            <label>Full Address</label>
                            <input type="text" class="form-control" placeholder="Alamat" name="alamat" value="<?= $row['alamat']; ?>">
                            <div class="invalid-feedback">
                            </div>
                        </div>

                        <div class="form-group col-lg-6 col-12">
                            <label>Harga Mulai</label>
                            <input type="text" class="form-control" placeholder="Harga Mulai" name="harga_mulai" value="<?= $row['harga_mulai']; ?>">
                            <div class="invalid-feedback">
                            </div>
                        </div>

                        <div class="form-group col-lg-6 col-12">
                            <label>Cicilan Mulai</label>
                            <input type="text" class="form-control" placeholder="Cicilan Mulai" name="cicilan_mulai" value="<?= $row['cicilan_mulai']; ?>">
                            <div class="invalid-feedback">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>NUP</label>
                    <input type="text" class="form-control" placeholder="nup" name="nup" value="<?= $row['nup']; ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Rental Garansi</label>
                    <input type="text" class="form-control" placeholder="Rental Garansi" name="rental_garansi" value="<?= $row['rental_garansi']; ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Promo Mulai</label>
                    <input type="date" class="form-control" name="promo_berlaku" value="<?= $row['promo_berlaku']; ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Promo Berakhir</label>
                    <input type="date" class="form-control" name="promo_berakhir" value="<?= $row['promo_berakhir']; ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Luas Tanah</label>
                    <input type="text" class="form-control" placeholder="Luas Tanah" name="luas_tanah" value="<?= $row['luas_tanah']; ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Luas Bangunan</label>
                    <input type="text" class="form-control" placeholder="Luas Bangunan" name="luas_bangunan" value="<?= $row['luas_bangunan']; ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-2 col-12">
                    <label>Floor</label>
                    <input type="text" class="form-control" placeholder="Floor" name="floor" value="<?= $row['floor']; ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-2 col-12">
                    <label>Bathroom</label>
                    <input type="text" class="form-control" placeholder="Bathroom" name="bathroom" value="<?= $row['bathroom']; ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-2 col-12">
                    <label>Living Room</label>
                    <input type="text" class="form-control" placeholder="Living Room" name="living_room" value="<?= $row['living_room']; ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-2 col-12">
                    <label>Dinnig Room</label>
                    <input type="text" class="form-control" placeholder="Dinning Room" name="dinning_room" value="<?= $row['dinning_room']; ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-2 col-12">
                    <label>Kitchen</label>
                    <input type="text" class="form-control" placeholder="Kitchen" name="kitchen" value="<?= $row['kitchen']; ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>


                <div class="form-group col-lg-2 col-12">
                    <label>Bed Room</label>
                    <input type="text" class="form-control" placeholder="Bed Room" name="bed_room" value="<?= $row['bed_room']; ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-2 col-12">
                    <label>Rooftop</label>
                    <input type="text" class="form-control" placeholder="Roof Top" name="rooftop" value="<?= $row['rooftop']; ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-2 col-12">
                    <label>Carport</label>
                    <input type="text" class="form-control" placeholder="Carport" name="carport" value="<?= $row['carport']; ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>


                <div class="form-group col-lg-2 col-12">
                    <label>Mezanine</label>
                    <input type="text" class="form-control" placeholder="Mezanine" name="mezanine" value="<?= $row['mezanine']; ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>


                <div class="form-group col-lg-3 col-12">
                    <label>Mobile Phone</label>
                    <input type="text" class="form-control" placeholder="Mobile" name="no_hp" value="<?= $row['no_hp']; ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Telephone</label>
                    <input type="text" class="form-control" placeholder="Phone Number" name="no_telp" value="<?= $row['no_telp']; ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Email</label>
                    <input type="email" class="form-control" placeholder="Email" name="email" value="<?= $row['email']; ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Website</label>
                    <input type="text" class="form-control" placeholder="Website" name="website" value="<?= $row['website']; ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Facebook</label>
                    <input type="text" class="form-control" placeholder="facebook" name="facebook" value="<?= $row['facebook']; ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Instagram</label>
                    <input type="text" class="form-control" placeholder="instagram" name="instagram" value="<?= $row['instagram']; ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Tiktok</label>
                    <input type="text" class="form-control" placeholder="TikTok" name="tiktok" value="<?= $row['tiktok']; ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-lg-3 col-12">
                    <label>Youtube</label>
                    <input type="text" class="form-control" placeholder="youtube" name="youtube" value="<?= $row['youtube']; ?>">
                    <div class="invalid-feedback">
                    </div>
                </div>

                <div class="form-group col-12">
                    <label>Fasilitas</label>
                    <textarea class="form-control pt-4 lh-base " rows="8" name="fasilitas"><?= $row['fasilitas']; ?></textarea>
                </div>

                <div class="col-lg-6 col-12">

                </div>

                <div class="col-12">
                    <script src="https://code.jquery.com/jquery-1.11.3.js"></script>
                    <label>Materport</label>

                    <?php
                    $link = $row['materport'];
                    $sr = unserialize($link);
                    $data2 = array_slice($sr, 1);
                    ?>


                    <div id="req_input" class="datainputs ">
                        <input placeholder="Materport Link" type="text" class="form-control mb-3" name="materport[]" value="<?= $sr[0]; ?>">
                    </div>

                    <?php foreach ($data2 as $mt2) : ?>
                        <div class="required_inp row px-3 mb-3"><input placeholder="Materport Link" type="text" class="form-control col-lg-11 col-9" name="materport[]" value="<?= $mt2; ?>"><input type="button" class="inputRemove btn btn-outline-primary col-lg-1 col-3 p-0  rounded" value="Remove" /></div>
                    <?php endforeach; ?>
                    <a type="button" href="#" id="addmore" class="btn btn-primary add_input">Add more Link</a>
                </div>




            </div>
        </div>
    </div>

    <div class="d-flex justify-content-end p-0 my-2">
        <div class="col-lg-3 col-12"><button type="submit" class="btn btn-primary w-100 ">Submit</button></div>
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