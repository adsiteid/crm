<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>



<?php
foreach ($project->getResultArray() as $row);
?>


<style>
    @media only screen and (max-width: 600px) {
        .interior {
            height: 200px;
            object-fit: cover;
            display: flex;
            align-items: center;
        }
    }


    @media only screen and (min-width: 600px) {
        .interior {
            height: 400px;
            object-fit: cover;
            align-items: center;
            display: flex;
        }
    }
</style>


<div class="row d-flex">
    <div class="col-lg-8 col-12 d-flex align-items-stretch mb-4">
        <div class="card w-100">
            <div class="card-body d-flex align-items-center">

                <!-- CAROUSEL -->
                <div id="interior" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner interior w-100 ">
                        <?php foreach ($interior as $files) ?>
                        <div class="carousel-item active col-12">
                            <?php if (!empty($files)) : ?>
                                <a href="<?= base_url() . 'project/interior/' . $row['id']; ?>">
                                    <img src="<?= base_url(); ?>document/image/project/interior/<?= $row['folder']; ?>/<?= $files; ?>" class="d-block w-100" alt="...">
                                </a>
                            <?php endif; ?>

                            <?php if (empty($files)) : ?>
                                <a href="<?= base_url() . 'project/interior/' . $row['id']; ?>">
                                    <img src="<?= base_url(); ?>document/image/default.png" class="d-block w-100" alt="...">
                                </a>
                            <?php endif; ?>

                        </div>
                        <?php
                        foreach ($interior as $files) :
                        ?>
                            <div class="carousel-item">
                                <?php if ($files !== "") : ?>
                                    <a href="<?= base_url() . 'project/interior/' . $row['id']; ?>">
                                        <img src="<?= base_url(); ?>document/image/project/interior/<?= $row['folder']; ?>/<?= $files; ?>" class="d-block w-100" alt="...">
                                    </a>
                                <?php endif; ?>

                                <?php if (empty($files)) : ?>
                                    <a href="<?= base_url() . 'project/interior/' . $row['id']; ?>">
                                        <img src="<?= base_url(); ?>document/image/default.png" class="d-block w-100" alt="...">
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>

                    </div>

                    <button class="carousel-control-prev" type="button" data-bs-target="#interior" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#interior" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>


                <!-- END OF CAROUSEL -->

            </div>
        </div>

    </div>
    <div class="col-lg-4 col-12 d-flex align-items-stretch mb-4">
        <div class="card w-100">
            <div class="card-body ">

                <!-- DETAIL -->
                <h6>Detail Project</h6>
                <hr class="my-4" style="border:1px;">

                <p class="text-muted small mb-1">Project</p>
                <h6 class="mb-3"><?= $row['project']; ?></h6>
                <p class="text-muted small mb-1">Subholding</p>
                <h6 class="mb-3"><?= $row['subholding']; ?></h6>
                <p class="text-muted small mb-1">Alamat</p>
                <h6 class="mb-3"><?= $row['alamat']; ?></h6>
                <p class="text-muted small mb-1">Email</p>
                <h6 class="mb-3"><?= $row['email']; ?></h6>
                <p class="text-muted small mb-1">No Hp</p>
                <h6 class="mb-3"><?= $row['no_hp']; ?></h6>
                <p class="text-muted small mb-1">No. Telp</p>
                <h6 class="mb-3"><?= $row['no_telp']; ?></h6>

                <hr class="my-4" style="border:1px;">

                <!-- END OF DETAIL -->

                <div class="dropdown">
                    <button class="btn btn-primary dropdown-toggle w-100" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                        Materport
                    </button>
                    <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton1">

                        <?php $no = 1;
                        $link = $row['materport'];
                        $data = unserialize($link);
                        ?>
                        <?php if ($row['materport'] !== "") : ?>
                            <?php foreach ($data as $mt) : ?>
                                <li><a class="dropdown-item" href="<?= $mt; ?>">Materport <?= $no++ ?></a></li>
                            <?php endforeach; ?>
                        <?php endif; ?>

                    </ul>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="row d-flex">
    <div class="col-lg-8 col-12 d-flex align-items-stretch mb-4">

        <div class="card w-100">
            <div class="card-body">
                <div class="row d-flex bg-white rounded  py-3 "> <!-- row -->

                    <div class="col-lg-2 col-md-4 col-sm-4 col-4  rounded border-right mb-lg-1 mb-3">
                        <div class="d-flex justify-content-center ">
                            <p style="font-size:12px;">Floor</p>
                        </div>
                        <div class="d-flex justify-content-center ">
                            <img src="<?= base_url(); ?>/document/app_image/icon/diamondland-01.png" style="width:25px; height : 25px ;">
                            <span class="ml-2 text-primary" style="font-size : 20px; font-weight :600px;"> <b><?= $row['floor']; ?></b> </span>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-sm-4 col-4 col-3 rounded border-right mb-lg-1 mb-3">
                        <div class="d-flex justify-content-center ">
                            <p style="font-size:12px;">Bed Room</p>
                        </div>
                        <div class="d-flex justify-content-center ">
                            <img src="<?= base_url(); ?>/document/app_image/icon/diamondland-08.png" style="width:25px; height : 25px ;">
                            <span class="ml-2 text-primary" style="font-size : 20px;  font-weight :600px;"> <b><?= $row['bed_room']; ?></b></span>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-sm-4 col-4 col-3 rounded border-right mb-lg-1 mb-3">
                        <div class="d-flex justify-content-center ">
                            <p style="font-size:12px;">Living Room</p>
                        </div>
                        <div class="d-flex justify-content-center align-items-center">
                            <img src="<?= base_url(); ?>/document/app_image/icon/diamondland-04.png" style="width:25px; height : 25px ;">
                            <span class="ml-2 text-primary" style="font-size : 20px;  font-weight :600px;"> <b><?= $row['living_room']; ?></b> </span>
                        </div>
                    </div>

                    <div class="col-lg-2 col-md-4 col-sm-4 col-4 col-3 rounded border-right mb-lg-1 mb-3">
                        <div class="d-flex justify-content-center ">
                            <p style="font-size:12px;">Kitchen</p>
                        </div>
                        <div class="d-flex justify-content-center ">
                            <img src="<?= base_url(); ?>/document/app_image/icon/diamondland-05.png" style="width:25px; height : 25px ;">
                            <span class="ml-2 text-primary" style="font-size : 20px;  font-weight :600px;"> <b><?= $row['kitchen']; ?></b></span>
                        </div>
                    </div>
                    <!-- 
                    <div class="col-lg col-md-3 col-sm-3 col-3 my-3 justify-content-center  rounded">
                        <div>
                            <p>Bed Room</p>
                        </div>
                        <div class="d-flex ">
                            <img src="image/diamondland-03.png" style="width:30px; height : 30px ;" class="mb-2">
                            <p style="font-size : 24px;  font-weight :600px;"> <?= $row['dinning_room']; ?></p>
                        </div>
                    </div> -->

                    <div class="col-lg-2 col-md-4 col-sm-4 col-4  rounded border-right mb-lg-1 mb-3">
                        <div class="d-flex justify-content-center ">
                            <p style="font-size:12px;">Bath Room</p>
                        </div>
                        <div class="d-flex justify-content-center align-items-center ">
                            <img src="<?= base_url(); ?>/document/app_image/icon/diamondland-02.png" style="width:25px; height : 25px ;">
                            <span class="ml-2 text-primary" style="font-size : 20px;  font-weight :600px;"> <b><?= $row['bathroom']; ?></b></span>
                        </div>
                    </div>
                    <!--
                                                    <div class="col-lg col-md-3 col-sm-3 col-3 my-3 justify-content-center  rounded">
                                                        <div class="d-flex justify-content-center "><p>Bed Room</p></div>
                                                        <div class="d-flex justify-content-center " ">
                                                          <img src="image/diamondland-06.png" style="width:30px; height : 30px ;" class="mb-2"><p class="ml-1"  style="font-size : 24px;  font-weight :600px;"> <b><?= $row['rooftop']; ?></b></p>
                                                          </div>
                                                    </div>
                                                    -->
                    <div class="col-lg-2 col-md-4 col-sm-4 col-4 rounded mb-lg-2 mb-3">
                        <div class="d-flex justify-content-center ">
                            <p style="font-size:12px;">Carport</p>
                        </div>
                        <div class="d-flex justify-content-center align-items-center ">
                            <img src="<?= base_url(); ?>/document/app_image/icon/diamondland-07.png" style="width:25px; height : px ;">
                            <span class="ml-2 text-primary" style="font-size : 20px;  font-weight :600px;"> <b><?= $row['carport']; ?> </b></span>
                        </div>
                    </div>
                </div>

                <hr class="mb-4" style="border:1px;">




                <div class="row d-flex justify-content-between align-items-center px-3">
                    <div class="col-lg-10 col-12 d-flex mb-2 px-2  ">
                        <div class="mr-2"> Luas Tanah :<span style="color : #1F3960;"> <?= $row['luas_tanah']; ?></span> </div>
                        <div>Luas Bangunan : <span style="color : #1F3960;"> <?= $row['luas_bangunan']; ?></span></div>
                    </div>
                    <div class="col-lg-2 col-12 d-lg-block d-none justify-content-end">
                        <!-- bekas materport -->

                    </div>


                    <h6 class="my-3 px-2"> Fasilitas</h6>

                    <div class="px-2"><?= $row['fasilitas']; ?></div>
                </div>

                <hr class="my-4 px-3" style="border:1px;">

                <div class="row  px-3">

                    <div class="col-lg-3 col-sm-3 col-6">
                        <label class="form-label" style="font-size:12px;">Harga Mulai</label>
                        <h5><?= $row['harga_mulai']; ?></h5>
                    </div>

                    <div class="col-lg-3 col-sm-3 col-6">
                        <label for="cicilan_mulai" class="form-label" style="font-size:12px;">Cicilan Mulai</label>
                        <h5><?= $row['cicilan_mulai']; ?></h5>
                    </div>

                    <div class="col-lg-3 col-sm-3 col-6">
                        <label for="rental_garansi" class="form-label" style="font-size:12px;">Rental Garansi</label>
                        <h5><?= $row['rental_garansi']; ?></h5>
                    </div>

                    <div class="col-lg-3 col-sm-3 col-6">
                        <label for="nup" class="form-label" style="font-size:12px;">NUP</label>
                        <h5><?= $row['nup']; ?> </h5>
                    </div>


                </div>


                <hr class="my-4" style="border: 1px;">



                <div class="row mb-3 px-3 ">

                    <div class="col">
                        <label class="form-label" style="font-size:12px;">Promo Berlaku</label>
                        <h6><?= $row['promo_berlaku']; ?></h6>
                    </div>
                    <div class="col">
                        <label class="form-label" style="font-size:12px;">Promo Berakhir</label>
                        <h6><?= $row['promo_berakhir']; ?></h6>
                    </div>

                </div>



                <!-- Akhir isi -->
            </div>
        </div>


    </div>


    <div class="col-lg-4 col-12 d-flex align-items-stretch mb-4">

        <div class="card w-100">
            <div class="card-body">

                <h6>Iklan Digital</h6>
                <hr class="my-4" style="border:1px;">

                <!-- CAROUSEL -->

                <div id="iklandigital" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner iklandigital">
                        <?php foreach ($promotion as $file) ?>
                        <div class="carousel-item active">

                            <?php if (!empty($file)) : ?>
                                <a href="<?= base_url() . 'project/iklan_digital/' . $row['id']; ?>">
                                    <img src="<?= base_url(); ?>document/image/project/promotion/<?= $row['folder']; ?>/<?= $file; ?>" class="d-block w-100" alt="...">
                                </a>
                            <?php endif; ?>

                            <?php if (empty($file)) : ?>
                                <a href="<?= base_url() . 'project/iklan_digital/' . $row['id']; ?>">
                                    <img src="<?= base_url(); ?>document/image/event/upload.jpg" class="d-block w-100" alt="...">
                                </a>
                            <?php endif; ?>

                        </div>
                        <?php
                        foreach ($promotion as $file) :
                        ?>
                            <div class="carousel-item">
                                <?php if (!empty($file)) : ?>
                                    <a href="<?= base_url() . 'project/iklan_digital/' . $row['id']; ?>">
                                        <img src="<?= base_url(); ?>document/image/project/promotion/<?= $row['folder']; ?>/<?= $file; ?>" class="d-block w-100" alt="...">
                                    </a>
                                <?php endif; ?>

                                <?php if (empty($file)) : ?>
                                    <a href="<?= base_url() . 'project/iklan_digital/' . $row['id']; ?>">
                                        <img src="<?= base_url(); ?>document/image/event/upload.jpg" class="d-block w-100" alt="...">
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#iklandigital" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#iklandigital" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>

                <hr class="my-4" style="border:1px;">

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle w-100" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                Lihat Materi Promosi
                            </button>
                            <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton1">
                                <li><a class="dropdown-item" href="<?= base_url(); ?>project/iklan_digital/<?= $row['id']; ?>">Iklan Digital</a></li>
                                <li><a class="dropdown-item" href="<?= base_url(); ?>project/video/<?= $row['id']; ?>">Video Promosi</a></li>
                                <li><a class="dropdown-item" href="<?= base_url(); ?>project/interior/<?= $row['id']; ?>">Image Interior</a></li>
                            </ul>
                        </div>
                    </div>
                </div>


                <!-- <h6 class="mt-5 mb-3">Video Promosi</h6> -->

                <!-- CAROUSEL -->

                <!-- <div id="video" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php foreach ($promotion as $file) ?>
                        <div class="carousel-item active">
                            <div class="embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                            </div>
                        </div>
                        <?php
                        foreach ($promotion as $file) :
                        ?>
                            <div class="carousel-item">
                                <div class="embed-responsive embed-responsive-16by9">
                                    <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/zpOULjyy-n8?rel=0" allowfullscreen></iframe>
                                </div>
                            </div>
                        <?php endforeach; ?>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#video" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#video" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div> -->


                <!-- END OF CAROUSEL -->


            </div>
        </div>
    </div>

    <div class="col-12 d-flex justify-content-between align-items-center my-3 px-4">
        <h6 class="mt-2"> Marketing Tools</h6>
        <?php if (in_groups('admin') || in_groups('admin_group') || in_groups('admin_project') ) : ?>
            <a href="<?= base_url(); ?>add_file/<?= $row['id']; ?>" type="button" class="btn btn-sm btn-outline-light bg-white">Add Marketing Tools</a>
        <?php endif; ?>
    </div>

    <!-- FILES -->

    <div class="col-12 px-lg-3 px-4 mb-3">
        <div class="row px-2">


            <?php foreach ($file_project as $file) : ?>
                <div type="button" class="col-lg-4 col-md-6 col-12 mb-lg-0 mb-2 p-lg-2 p-md-2 p-0 " onclick="location.href='<?= base_url() . 'document/file/project/' . $row['folder'] . '/' . $file; ?>'">
                    <div class="bg-white rounded py-2 d-flex align-items-center justify-content-between p-3">
                        <div>
                            <img src="<?= base_url(); ?>/document/app_image/icon/pdf.png " style="width : 50px;" class="mr-2">

                            <span>
                                <?php
                                if (strlen($file) > 25) {
                                    $file = substr($file, 0, 18) . '...';
                                }
                                echo strtolower($file);
                                ?>
                            </span>
                        </div>

                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20 14V18C20 19.1046 19.1046 20 18 20H6C4.89543 20 4 19.1046 4 18V14M12 15L12 3M12 15L8 11M12 15L16 11" stroke="#4F4F4F" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>


    <div class="d-flex justify-content-end my-4">
        <?php if (in_groups('admin') || in_groups('admin_group') || in_groups('admin_project') ) : ?>
            <a type="button" class="btn btn-outline-primary col-lg-2 col-6" data-toggle="modal" data-target="#delete-data">Delete</a>
            <a href="<?= base_url('/edit_project/' . $row['id']) ?>" class="btn btn-primary col-lg-2 col-6">Edit</a>
        <?php endif; ?>
    </div>


    <!-- delete Modal-->

    <div class="modal fade" id="delete-data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog " role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Data</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body text-center">Are you sure want to delete this data?</div>
                <div class="modal-footer ">
                    <div class="row d-flex col-12 px-0 py-2">
                        <div class="col-6">
                            <button class="btn btn-secondary w-100" type="button" data-dismiss="modal">Cancel</button>
                        </div>
                        <div class="col-6">
                            <form action="<?= base_url(); ?>delete_project/<?= $row['id']; ?>" method="post">
                                <?= csrf_field(); ?>
                                <input type="hidden" name="_method" value="DELETE">
                                <button type="submit" class="btn btn-primary w-100"> Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php $this->endSection(); ?>