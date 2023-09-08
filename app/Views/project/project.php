<?php $this->extend('layout/template'); ?>

<?php $this->section('content'); ?>


<div class="row mb-4 p-0 d-lg-block d-none">
    <!-- <div class="col"><a href=""><a href="" type="button" class="btn btn-sm btn-outline-light bg-white">Back</a></a></div> -->
    <div class="col d-flex p-0 "><a href="<?= base_url(); ?>add_project" type="button" class="btn btn-sm btn-primary">Add Project</a></div>
</div>




<div class="row">

    <!-- flashdata -->
    <?php if (session()->getFlashdata('pesan')) : ?>
        <div class="alert alert-success" role="alert">
            <?= session()->getFlashdata('pesan'); ?>
        </div>
    <?php endif; ?>




    <?php

    foreach ($group->user(user()->id)->getResultArray() as $group) {


        foreach ($project->projects(user()->id, $group['groups'], $group['project'])->getResultArray() as $row) {


    ?>



            <?php if ($row['id'] == "") : ?>
                <div class="col-12 d-flex justify-content-center">
                    <img src="<?= base_url() ?>document/app_image/images/empty.gif" class="d-lg-none d-block py-5" alt="" style="width:60%;">
                    <img src="<?= base_url() ?>document/app_image/images/empty.gif" class="d-lg-block d-none py-5" alt="" style="width:20%;">
                </div>
            <?php endif; ?>


            <div class="col-lg-4 col-6 d-flex align-items-stretch" type="button" onclick="location.href='<?= base_url(); ?>project/<?= $row['id']; ?>'">
                <div class="card mb-3 rounded w-100">
                    <div class=" row d-flex align-items-center g-0">
                        <div class="col-md-4 p-lg-0 p-md-0 ">

                            <?php if ($row['logo'] !== "") : ?>
                                <img src="<?= base_url(); ?>document/image/project/logo/<?= $row['logo'] ?>" class="img-fluid rounded cover " alt="...">
                            <?php endif; ?>

                            <?php if (empty($row['logo'])) : ?>
                                <img src="<?= base_url(); ?>document/image/event/upload.jpg" class="img-fluid rounded cover" alt="...">
                            <?php endif; ?>

                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h6 class="card-title text-primary mb-1 lh-base" style="font-size: 13px;"><?= $row['project'] ?></h6>
                                <p class="card-text small mb-1"><?= $row['alamat'] ?></p>
                                <!-- <p class="card-text text-muted text-small">Last updated 3 mins ago</p> -->
                                <a href="<?= base_url(); ?>project/<?= $row['id']; ?>" class="text-muted" style="font-size: 9px;">Lihat Detail</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    <?php
        }
    }
    ?>

</div>




<?php $this->endSection(); ?>